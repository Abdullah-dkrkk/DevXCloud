<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'user_id',
        'session_id',
        'name',
        'email',
        'form_type',
        'form_data',
        'status',
        'assigned_to',
        'last_activity_at',
        'reminder_sent_at',
        'admin_notified_at',
        'close_requested_at',
        'closed_at',
    ];

    protected $casts = [
        'form_data' => 'array',
        'last_activity_at' => 'datetime',
        'reminder_sent_at' => 'datetime',
        'admin_notified_at' => 'datetime',
        'close_requested_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'ticket_id');
    }

    public function lastMessage()
    {
        return $this->hasOne(ChatMessage::class, 'ticket_id')->latestOfMany();
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', ['pending', 'open', 'in_progress']);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }

    public function close(): void
    {
        $this->update([
            'status' => 'closed',
            'closed_at' => now(),
        ]);
    }

    public function verifyToken($token): bool
    {
        $newExpected = hash_hmac('sha256', $this->id . $this->email, config('app.key'));
        if ($token === $newExpected) {
            return true;
        }

        $oldExpected = sha1($this->id . $this->email . 'devxcloud-salt');
        return $token === $oldExpected;
    }

    public function reopen(): void
    {
        $this->update([
            'status' => 'open',
            'closed_at' => null,
            'last_activity_at' => now(),
            'reminder_sent_at' => null,
            'admin_notified_at' => null,
        ]);
    }
}
