<?php

namespace App\Console\Commands;

use App\Models\ChatTicket;
use App\Models\ChatMessage;
use App\Models\User;
use App\Mail\TicketClosed;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class AutoCloseTickets extends Command
{
    protected $signature = 'tickets:auto-close';
    protected $description = 'Send inactivity reminders and auto-close stale tickets';

    public function handle()
    {
        $this->info('Checking tickets for auto-close...');

        $this->sendCustomerReminders();
        $this->notifyAdmins();
        $this->autoCloseStale();

        $this->info('Done.');
    }

    private function sendCustomerReminders(): void
    {
        $tickets = ChatTicket::whereIn('status', ['pending', 'open', 'in_progress'])
            ->whereNotNull('assigned_to')
            ->whereNull('reminder_sent_at')
            ->where('last_activity_at', '<=', now()->subHour())
            ->get();

        foreach ($tickets as $ticket) {
            $lastMsg = ChatMessage::where('ticket_id', $ticket->id)
                ->orderBy('id', 'desc')
                ->first();

            if (!$lastMsg || $lastMsg->sender_type === 'user') {
                continue;
            }

            ChatMessage::create([
                'ticket_id' => $ticket->id,
                'sender_type' => 'system',
                'message' => "We haven't heard back from you in a while — just checking in! Are you still available, or is there anything else we can help you with?",
                'options' => ['I\'m still here', 'Close this Ticket'],
                'created_at' => now(),
            ]);

            $ticket->update([
                'reminder_sent_at' => now(),
                'last_activity_at' => now(),
            ]);

            $this->info("Reminder sent for ticket {$ticket->ticket_number}");
        }
    }

    private function notifyAdmins(): void
    {
        $tickets = ChatTicket::whereIn('status', ['pending', 'open', 'in_progress'])
            ->whereNotNull('reminder_sent_at')
            ->whereNull('admin_notified_at')
            ->where('reminder_sent_at', '<=', now()->subHour())
            ->get();

        foreach ($tickets as $ticket) {
            $lastMsg = ChatMessage::where('ticket_id', $ticket->id)
                ->orderBy('id', 'desc')
                ->first();

            if (!$lastMsg || $lastMsg->sender_type === 'user') {
                continue;
            }

            $agent = $ticket->agent;
            $adminEmails = config('admin.emails', []);

            $subject = "Action Needed: Ticket {$ticket->ticket_number} - No response from customer";
            $message = "Ticket {$ticket->ticket_number} by {$ticket->name} ({$ticket->email}) hasn't received a response for over an hour after the reminder was sent. It's a good time to close this ticket if the customer's needs have been addressed.";

            if ($agent) {
                try {
                    Mail::raw($message, function ($mail) use ($agent, $subject) {
                        $mail->to($agent->email)->subject($subject);
                    });
                } catch (\Exception $e) {
                    Log::error("Failed to notify agent about ticket {$ticket->ticket_number}: " . $e->getMessage());
                }
            }

            foreach ($adminEmails as $adminEmail) {
                try {
                    Mail::raw($message, function ($mail) use ($adminEmail, $subject) {
                        $mail->to($adminEmail)->subject($subject);
                    });
                } catch (\Exception $e) {
                    Log::error("Failed to notify admin about ticket {$ticket->ticket_number}: " . $e->getMessage());
                }
            }

            $ticket->update(['admin_notified_at' => now()]);

            $this->info("Admin notified for ticket {$ticket->ticket_number}");
        }
    }

    private function autoCloseStale(): void
    {
        $tickets = ChatTicket::whereIn('status', ['pending', 'open', 'in_progress'])
            ->whereNotNull('admin_notified_at')
            ->where('admin_notified_at', '<=', now()->subHour())
            ->get();

        foreach ($tickets as $ticket) {
            $lastMsg = ChatMessage::where('ticket_id', $ticket->id)
                ->orderBy('id', 'desc')
                ->first();

            if ($lastMsg && $lastMsg->sender_type === 'user') {
                continue;
            }

            $ticket->close();

            ChatMessage::create([
                'ticket_id' => $ticket->id,
                'sender_type' => 'system',
                'message' => 'This ticket has been automatically closed due to inactivity.',
                'created_at' => now(),
            ]);

            try {
                Mail::to($ticket->email)->send(new TicketClosed($ticket, null));
            } catch (\Exception $e) {
                Log::error("Auto-close email failed for ticket {$ticket->ticket_number}: " . $e->getMessage());
            }

            try {
                $adminEmails = config('admin.emails', []);
                foreach ($adminEmails as $adminEmail) {
                    Mail::to($adminEmail)->send(new TicketClosed($ticket, null, true));
                }
            } catch (\Exception $e) {
                Log::error("Auto-close admin email failed for ticket {$ticket->ticket_number}: " . $e->getMessage());
            }

            $this->info("Auto-closed ticket {$ticket->ticket_number}");
        }
    }
}
