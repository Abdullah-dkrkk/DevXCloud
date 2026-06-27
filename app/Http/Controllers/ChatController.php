<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotFaq;
use App\Models\ChatHistory;
use App\Models\ChatTicket;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketCreated;
use App\Mail\TicketClosed;
use App\Mail\AdminAgentTicketNotification;

class ChatController extends Controller
{
    const FALLBACK_MESSAGE = "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.";

    const FALLBACK_OPTIONS = ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services'];

    public function reply(Request $request)
    {
        $message = trim($request->message);

        if (!$message || strlen($message) > 300) {
            return response()->json(['reply' => 'Invalid message.']);
        }

        $ticketId = $request->ticket_id;
        $botMode = $request->boolean('bot_mode');

        $replyTicket = null;
        $replySessionUser = null;
        if ($ticketId) {
            $replyTicket = ChatTicket::find($ticketId);
            if ($replyTicket) {
                $replySessionUser = User::where('email', $replyTicket->email)->first();
            }
        }

        if ($ticketId && !$botMode && $replyTicket) {
            $userId = auth()->check() ? auth()->id() : ($replySessionUser?->id);
            $msg = ChatMessage::create([
                'ticket_id' => $replyTicket->id,
                'sender_id' => $userId,
                'sender_type' => 'user',
                'message' => $message,
                'created_at' => now(),
            ]);
            $replyTicket->update(['last_activity_at' => now()]);
            return response()->json(['reply' => null, 'ticket_message' => true, 'message_id' => $msg->id]);
        }

        $savedMsgId = 0;
        if ($replyTicket) {
            $saved = ChatMessage::create([
                'ticket_id' => $replyTicket->id,
                'sender_id' => $replySessionUser?->id,
                'sender_type' => 'user',
                'message' => $message,
                'created_at' => now(),
            ]);
            $replyTicket->update(['last_activity_at' => now()]);
            $savedMsgId = $saved->id;
        }

        if ($request->boolean('bot_mode')) {
            $rawMessage = $message;

            if ($this->isGreeting($message)) {
                $greeting = "Welcome to DevXCloud Growth Advisor. I'm here to help you understand how we build growth systems — ask me anything about our solutions, pricing, or how we work.";
                return response()->json(['reply' => $greeting, 'message_id' => $savedMsgId]);
            }

            $faqs = Cache::remember('chatbot_faqs_all', 86400, function () {
                return ChatbotFaq::select('question', 'answer')->get();
            });
            if ($faqs->isEmpty()) {
                $res = ['reply' => self::FALLBACK_MESSAGE];
                $res['options'] = self::FALLBACK_OPTIONS;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $exactMatch = $this->exactMatch($rawMessage, $faqs);
            if ($exactMatch) {
                $res = ['reply' => $exactMatch];
                $options = $this->getFaqOptions($exactMatch);
                if (!empty($options)) $res['options'] = $options;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $bestMatch = $this->bestMatch($rawMessage, $faqs);
            if ($bestMatch) {
                $multi = $this->tryMultiQuestion($rawMessage, $faqs, $bestMatch);
                if ($multi) {
                    $res = ['reply' => $multi];
                    $options = $this->getFaqOptions($multi);
                    if (!empty($options)) $res['options'] = $options;
                    $res['message_id'] = $savedMsgId;
                    return response()->json($res);
                }

                $res = ['reply' => $bestMatch];
                $options = $this->getFaqOptions($bestMatch);
                if (!empty($options)) $res['options'] = $options;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $res = ['reply' => self::FALLBACK_MESSAGE];
            $res['options'] = self::FALLBACK_OPTIONS;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        $rawMessage = $message;

        $recent = ChatHistory::where('question', $rawMessage)
            ->where('asked_at', '>=', now()->subMinutes(5))
            ->orderBy('asked_at', 'desc')
            ->first();

        if ($recent && $recent->answer) {
            $res = ['reply' => $recent->answer];
            if ($this->isFallback($recent->answer)) {
                $res['options'] = self::FALLBACK_OPTIONS;
            } else {
                $options = $this->getFaqOptions($recent->answer);
                if (!empty($options)) $res['options'] = $options;
            }
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        if ($this->isGreeting($message)) {
            $greeting = "Welcome to DevXCloud Growth Advisor. I'm here to help you understand how we build growth systems — ask me anything about our solutions, pricing, or how we work.";
            $this->saveHistory($rawMessage, $greeting, 'bot');
            return response()->json(['reply' => $greeting, 'message_id' => $savedMsgId]);
        }

        $faqs = Cache::remember('chatbot_faqs_all', 86400, function () {
            return ChatbotFaq::select('question', 'answer')->get();
        });
        if ($faqs->isEmpty()) {
            $this->saveHistory($rawMessage, self::FALLBACK_MESSAGE, 'bot');
            $res = ['reply' => self::FALLBACK_MESSAGE];
            $res['options'] = self::FALLBACK_OPTIONS;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        $exactMatch = $this->exactMatch($rawMessage, $faqs);
        if ($exactMatch) {
            $this->saveHistory($rawMessage, $exactMatch, 'bot');
            $res = ['reply' => $exactMatch];
            $options = $this->getFaqOptions($exactMatch);
            if (!empty($options)) $res['options'] = $options;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        $bestMatch = $this->bestMatch($rawMessage, $faqs);
        if ($bestMatch) {
            $multi = $this->tryMultiQuestion($rawMessage, $faqs, $bestMatch);
            if ($multi) {
                $this->saveHistory($rawMessage, $multi, 'bot');
                $res = ['reply' => $multi];
                $options = $this->getFaqOptions($multi);
                if (!empty($options)) $res['options'] = $options;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $this->saveHistory($rawMessage, $bestMatch, 'bot');
            $res = ['reply' => $bestMatch];
            $options = $this->getFaqOptions($bestMatch);
            if (!empty($options)) $res['options'] = $options;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        $faqText = "";
        foreach ($faqs as $faq) {
            $questions = explode('|', $faq->question);
            foreach ($questions as $q) {
                $trimmed = trim($q);
                if ($trimmed) {
                    $faqText .= "Q: {$trimmed}\nA: {$faq->answer}\n\n";
                }
            }
        }

        $geminiCacheKey = 'gemini_' . md5($rawMessage . sha1($faqText));

        $cachedReply = Cache::get($geminiCacheKey);
        if ($cachedReply !== null) {
            $this->saveHistory($rawMessage, $cachedReply, 'bot');
            $res = ['reply' => $cachedReply];
            $options = $this->getFaqOptions($cachedReply);
            if (!empty($options)) $res['options'] = $options;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        try {
            $apiKey = config('services.gemini.api_key');

            $response = Http::withoutVerifying()->timeout(10)->post(
                "https://generativelanguage.googleapis.com/v1/models/gemini-2.0-flash:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => "You are DevXCloud Growth Advisor — professional and consultative.

Your job is to match the user's query to the BEST matching FAQ answer from the list below. The user may write in Roman Urdu (Hinglish), make spelling mistakes, or use creative spellings — understand the INTENT, not the exact words.

Rules:
- Use ONLY the FAQ data below. Never generate answers outside the FAQ.
- If the user asks about 'devxcloud' with ANY spelling (devxxcloud, devvscloud, dxcloud, etc.), treat it as 'devxcloud'.
- If you find a matching FAQ, return its answer EXACTLY as written — do not rewrite or summarize.
- If the question is a greeting (hi, hello, etc.), return the greeting answer from the FAQ.
- If the user asks multiple questions, pick the MOST relevant single FAQ match.
- If NO FAQ matches the user's intent, reply with exactly: NO_MATCH
- Keep answers SHORT — 3 to 5 lines maximum. No long paragraphs.
- Do NOT use markdown, bold, italic, bullet points, or emojis.
- Sound professional, consultative, and natural — not robotic, not hype.

FAQ Data:
$faqText

User Query: $rawMessage"
                            ]
                        ]
                    ]
                ],
                'generationConfig' => [
                        'temperature' => 0.1,
                        'maxOutputTokens' => 800
                    ]
                ]
            );

            if (!$response->successful()) {
                Log::error('Gemini API Error: ' . $response->body());
                $this->saveHistory($rawMessage, self::FALLBACK_MESSAGE, 'bot');
                $res = ['reply' => self::FALLBACK_MESSAGE];
                $res['options'] = self::FALLBACK_OPTIONS;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $data = $response->json();
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$reply || str_contains(strtoupper($reply), 'NO_MATCH')) {
                $this->saveHistory($rawMessage, self::FALLBACK_MESSAGE, 'bot');
                $res = ['reply' => self::FALLBACK_MESSAGE];
                $res['options'] = self::FALLBACK_OPTIONS;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $finalReply = trim($reply);
            Cache::put($geminiCacheKey, $finalReply, 3600);
            $this->saveHistory($rawMessage, $finalReply, 'bot');

            $res = ['reply' => $finalReply];
            $options = $this->getFaqOptions($finalReply);
            if (!empty($options)) $res['options'] = $options;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);

        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            $this->saveHistory($rawMessage, self::FALLBACK_MESSAGE, 'bot');
            $res = ['reply' => self::FALLBACK_MESSAGE];
            $res['options'] = self::FALLBACK_OPTIONS;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }
    }

    private function isFallback($answer)
    {
        return $answer === self::FALLBACK_MESSAGE;
    }

    public function history(Request $request)
    {
        $offset = (int) $request->get('offset', 0);
        $limit = min((int) $request->get('limit', 20), 50);

        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['messages' => [], 'has_more' => false]);
        }

        $histories = ChatHistory::where('user_id', $userId)
            ->where('source', '!=', 'lead')
            ->orderBy('asked_at', 'desc')
            ->orderBy('id', 'desc')
            ->skip($offset)
            ->take($limit + 1)
            ->get();

        $hasMore = $histories->count() > $limit;
        if ($hasMore) {
            $histories = $histories->slice(0, $limit);
        }

        $messages = [];
        foreach ($histories->reverse() as $h) {
            $messages[] = [
                'type' => 'user',
                'text' => $h->question,
            ];
            if ($h->answer) {
                $msg = [
                    'type' => 'bot',
                    'text' => $h->answer,
                ];
                if ($this->isFallback($h->answer)) {
                    $msg['options'] = self::FALLBACK_OPTIONS;
                }
                $messages[] = $msg;
            }
        }

        return response()->json([
            'messages' => $messages,
            'has_more' => $hasMore,
            'next_offset' => $offset + $limit,
        ]);
    }

    private function saveHistory($question, $answer, $source)
    {
        try {
            ChatHistory::create([
                'user_id' => auth()->check() ? auth()->id() : null,
                'session_id' => session()->getId(),
                'question' => $question,
                'answer' => $answer,
                'source' => $source,
                'asked_at' => now(),
                'answered_at' => $answer ? now() : null,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to save chat history: ' . $e->getMessage());
        }
    }

    private function isGreeting($message)
    {
        $short = strlen($message) <= 25;

        $greetings = [
            '/^(hi|hello|hey|heyy|heya|hii|helloo|hellooo)\b/i',
            '/\bhow\'?s it going\b/i',
            '/\bwhat\'?s up\b/i',
            '/\bsup\b/i',
            '/\bgood\s*(morning|afternoon|evening|day)\b/i',
            '/\bkaise ho\b/i',
            '/\bnamaste\b/i',
            '/\bnamaskar\b/i',
            '/\byo\b/i',
            '/\bhowdy\b/i',
        ];

        if ($short) {
            $greetings[] = '/\bhow are you\b/i';
            $greetings[] = '/\bhow\s+are\s+you\b/i';
        }

        foreach ($greetings as $pattern) {
            if (preg_match($pattern, $message)) {
                return true;
            }
        }
        return false;
    }

    private function exactMatch($message, $faqs)
    {
        $msg = mb_strtolower(trim($message));

        foreach ($faqs as $faq) {
            $variations = explode('|', $faq->question);
            foreach ($variations as $variation) {
                if (mb_strtolower(trim($variation)) === $msg) {
                    return $faq->answer;
                }
            }
        }

        return null;
    }

    private function bestMatch($message, $faqs)
    {
        $msg = mb_strtolower(trim($message));
        $msgWords = explode(' ', $msg);
        $msgUnique = array_unique($msgWords);
        $msgCount = count($msgUnique);

        $bestScore = 0;
        $bestAnswer = null;

        foreach ($faqs as $faq) {
            $variations = explode('|', $faq->question);
            foreach ($variations as $variation) {
                $v = mb_strtolower(trim($variation));
                if (!$v) continue;

                $vWords = explode(' ', $v);
                $vUnique = array_unique($vWords);
                $vCount = count($vUnique);

                $common = array_intersect($msgUnique, $vUnique);
                $commonCount = count($common);

                $stopWords = ['the','are','you','he','she','it','we','they','is','am','was','were','be','have','has','had','do','does','did','will','can','not','no','but','if','so','ka','ke','ki','ko','se','he','hai','ho','kya','kia','aap','ap','tum','main','yeh','ye','wo','too','my','your','his','our','its','in','on','at','to','for','of','and','or','hi','hello','hey'];
                $hasSignificant = false;
                foreach ($common as $w) {
                    $len = mb_strlen($w);
                    if ($len >= 4) { $hasSignificant = true; break; }
                    if ($len >= 3 && !in_array($w, $stopWords)) { $hasSignificant = true; break; }
                }

                foreach ($msgWords as $mw) {
                    if (mb_strlen($mw) < 4) continue;
                    foreach ($vWords as $vw) {
                        if (mb_strlen($vw) < 4) continue;
                        if ($mw[0] !== $vw[0]) continue;
                        if (str_contains($mw, $vw) || str_contains($vw, $mw)) {
                            $commonCount = max($commonCount, 1);
                            $hasSignificant = true;
                            break 2;
                        }
                        $mwBigrams = [];
                        for ($i = 0; $i < mb_strlen($mw) - 1; $i++) {
                            $mwBigrams[] = mb_substr($mw, $i, 2);
                        }
                        $vwBigrams = [];
                        for ($i = 0; $i < mb_strlen($vw) - 1; $i++) {
                            $vwBigrams[] = mb_substr($vw, $i, 2);
                        }
                        $commonBigrams = array_intersect($mwBigrams, $vwBigrams);
                        $dice = (2 * count($commonBigrams)) / (count($mwBigrams) + count($vwBigrams));
                        if ($dice >= 0.5) {
                            $commonCount = max($commonCount, 1);
                            $hasSignificant = true;
                            break 2;
                        }
                    }
                }

                if ($commonCount === 0 || !$hasSignificant) continue;

                $uniqueAll = count(array_unique(array_merge($msgUnique, $vUnique)));
                $overlap = ($commonCount / $uniqueAll) * 100;

                $shorter = min($msgCount, $vCount);
                $coverage = ($commonCount / $shorter) * 100;

                $finalScore = ($overlap * 0.4) + ($coverage * 0.6);

                if ($finalScore > $bestScore) {
                    $bestScore = $finalScore;
                    $bestAnswer = $faq->answer;
                }
            }
        }

        return $bestScore >= 40 ? $bestAnswer : null;
    }

    private function getFaqOptions($answer)
    {
        $lower = mb_strtolower($answer);

        $pricingKeywords = ['pricing', 'cost', 'budget', 'price', 'expensive', 'mehnga', 'charge', 'fees', 'package'];
        $solutionKeywords = ['solution', 'choose', 'which one', 'commerceai', 'launchpadai', 'scalecloud', 'elitescale', 'greenscale'];
        $serviceKeywords = ['service', 'help business', 'growth system'];
        $bookCallKeywords = ['book', 'discovery call', 'booking'];

        $hasPricing = false;
        $hasSolution = false;
        $hasService = false;
        $hasBookCall = false;

        foreach ($pricingKeywords as $kw) {
            if (str_contains($lower, $kw)) { $hasPricing = true; break; }
        }
        foreach ($solutionKeywords as $kw) {
            if (str_contains($lower, $kw)) { $hasSolution = true; break; }
        }
        foreach ($serviceKeywords as $kw) {
            if (str_contains($lower, $kw)) { $hasService = true; break; }
        }
        foreach ($bookCallKeywords as $kw) {
            if (str_contains($lower, $kw)) { $hasBookCall = true; break; }
        }

        if ($hasPricing) {
            return ['Book Discovery Call', 'Get Personalized Guidance', 'Explore Services'];
        }
        if ($hasSolution) {
            return ['CommerceAI', 'LaunchPadAI', 'ScaleCloud', 'EliteScale', 'GreenScale Formula'];
        }
        if ($hasService || $hasBookCall) {
            return ['Book Discovery Call', 'Get Personalized Guidance', 'Explore Services'];
        }

        return [];
    }

    private function tryMultiQuestion($message, $faqs, $bestAnswer)
    {
        $msg = mb_strtolower(trim($message));

        $parts = preg_split('/\s+(?:and|aur|,)\s+/i', $msg);
        if (count($parts) < 2) return null;

        $answers = [];
        foreach ($parts as $part) {
            $part = trim($part);
            if (mb_strlen($part) < 5) continue;
            $match = $this->bestMatch($part, $faqs);
            if ($match) {
                $answers[$match] = true;
            }
        }

        $answers = array_keys($answers);
        if (count($answers) < 2) return null;

        $result = '';
        $num = 1;
        foreach ($answers as $a) {
            $result .= "$num. $a\n\n";
            $num++;
        }
        return trim($result);
    }

    public function agentStatus(Request $request)
    {
        $available = User::whereIn('role', ['admin', 'agent'])
            ->where('is_available', true)
            ->where('last_active_at', '>=', now()->subSeconds(30))
            ->exists();

        return response()->json(['available' => $available]);
    }

    public function submitForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'type' => 'required|in:guidance,discovery',
            'form_data' => 'nullable|array',
            'conversation' => 'nullable|string',
        ]);

        $user = $this->findOrCreateUser($data['name'], $data['email']);

        $ticket = ChatTicket::create([
            'ticket_number' => 'DEVX-' . strtoupper(substr(uniqid(), -6)),
            'user_id' => $user->id,
            'session_id' => session()->getId(),
            'name' => $data['name'],
            'email' => $data['email'],
            'form_type' => $data['type'],
            'form_data' => $data['form_data'] ?? [],
            'status' => 'pending',
            'last_activity_at' => now(),
        ]);

        $conversation = !empty($data['conversation']) ? json_decode($data['conversation'], true) : [];
        $lastMessageId = 0;
        if (is_array($conversation)) {
            $sortOrder = 0;
            $count = count($conversation);
            foreach ($conversation as $entry) {
                $sortOrder++;
                $msgType = ($entry['type'] ?? 'user') === 'user' ? 'user' : 'bot';
                $msgOptions = !empty($entry['options']) ? $entry['options'] : [];
                $msg = ChatMessage::create([
                    'ticket_id' => $ticket->id,
                    'sender_id' => $msgType === 'user' ? $user->id : null,
                    'sender_type' => $msgType,
                    'message' => $entry['message'] ?? '',
                    'options' => $msgOptions,
                    'created_at' => now()->subSeconds($count - $sortOrder),
                ]);
                $lastMessageId = $msg->id;
            }
        }

        try {
            Mail::to($ticket->email)->queue(new TicketCreated($ticket));
        } catch (\Exception $e) {
            Log::error('Ticket created email failed: ' . $e->getMessage());
        }

        try {
            $adminEmails = config('admin.emails', []);
            $adminRecipients = collect($adminEmails)->unique()->values()->take(5);

            if ($adminRecipients->isNotEmpty()) {
                $to = $adminRecipients->shift();
                $mail = Mail::to($to);
                if ($adminRecipients->isNotEmpty()) {
                    $mail->bcc($adminRecipients->values()->all());
                }
                $mail->queue(new AdminAgentTicketNotification($ticket, 'Admin'));
            }

            // $agentEmails = User::where('role', 'agent')->limit(10)->pluck('email')->toArray();
            // $agentRecipients = collect($agentEmails)->unique()->values()->take(5);
            // 
            // if ($agentRecipients->isNotEmpty()) {
            //     $to = $agentRecipients->shift();
            //     $mail = Mail::to($to);
            //     if ($agentRecipients->isNotEmpty()) {
            //         $mail->bcc($agentRecipients->values()->all());
            //     }
            //     $mail->queue(new AdminAgentTicketNotification($ticket, 'Agent'));
            // }
        } catch (\Exception $e) {
            Log::error('Ticket admin/agent notification failed: ' . $e->getMessage());
        }

        return response()->json([
            'success' => true,
            'ticket_number' => $ticket->ticket_number,
            'ticket_id' => $ticket->id,
            'token' => hash_hmac('sha256', $ticket->id . $ticket->email, config('app.key')),
            'last_message_id' => $lastMessageId,
        ]);
    }

    public function userMessages(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|exists:chat_tickets,id',
            'since_id' => 'nullable|integer|min:0',
        ]);

        $sinceId = $data['since_id'] ?? 0;

        $messages = ChatMessage::where('ticket_id', $data['ticket_id'])
            ->where('id', '>', $sinceId)
            ->where('message', 'not like', 'Form submitted:%')
            ->orderBy('id')
            ->get(['id', 'message', 'sender_type', 'options', 'created_at']);

        return response()->json(['messages' => $messages]);
    }

    public function ticketHistory(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|exists:chat_tickets,id',
        ]);

        $conversation = ChatMessage::where('ticket_id', $data['ticket_id'])
            ->where('message', 'not like', 'Form submitted:%')
            ->orderBy('created_at')
            ->get(['id', 'message', 'sender_type', 'options', 'created_at']);

        return response()->json(['conversation' => $conversation]);
    }

    public function typing(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|exists:chat_tickets,id',
            'sender_type' => 'required|in:user,agent,none',
        ]);

        if ($data['sender_type'] === 'none') {
            cache()->forget('ticket_typing_' . $data['ticket_id']);
        } else {
            cache()->put(
                'ticket_typing_' . $data['ticket_id'],
                $data['sender_type'],
                now()->addSeconds(7)
            );
        }

        return response()->json(['success' => true]);
    }

    public function typingStatus($ticketId)
    {
        $typing = cache()->get('ticket_typing_' . $ticketId);

        return response()->json([
            'typing' => !is_null($typing),
            'sender_type' => $typing,
        ]);
    }

    private function findOrCreateUser($name, $email)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt(str()->random(32)),
                'role' => 'user',
            ]);
        }

        return $user;
    }

    public function userCloseTicket(Request $request)
    {
        $data = $request->validate([
            'ticket_id' => 'required|exists:chat_tickets,id',
            'token' => 'required|string',
        ]);

        $ticket = ChatTicket::find($data['ticket_id']);
        if (!$ticket) {
            return response()->json(['error' => 'Ticket not found'], 404);
        }

        $expected = hash_hmac('sha256', $ticket->id . $ticket->email, config('app.key'));
        if ($data['token'] !== $expected && $ticket->session_id !== session()->getId()) {
            return response()->json(['error' => 'Invalid token'], 403);
        }

        if ($ticket->status === 'closed') {
            return response()->json(['success' => true, 'already_closed' => true]);
        }

        $ticket->close();

        ChatMessage::create([
            'ticket_id' => $ticket->id,
            'sender_type' => 'system',
            'message' => 'This ticket has been closed by ' . $ticket->name . '.',
            'created_at' => now(),
        ]);

        try {
            Mail::to($ticket->email)->queue(new TicketClosed($ticket, null, false, $ticket->name));
        } catch (\Exception $e) {
            Log::error('User closed ticket email failed: ' . $e->getMessage());
        }

        try {
            $adminEmails = config('admin.emails', []);
            foreach ($adminEmails as $adminEmail) {
                Mail::to($adminEmail)->queue(new TicketClosed($ticket, null, true, $ticket->name));
            }
        } catch (\Exception $e) {
            Log::error('User closed ticket admin email failed: ' . $e->getMessage());
        }

        return response()->json(['success' => true]);
    }

    public function agentOffline(Request $request)
    {
        $user = $request->user();
        if ($user && $user->isAgent()) {
            $user->update(['is_available' => false]);
        }
        return response()->json(['available' => false]);
    }
}
