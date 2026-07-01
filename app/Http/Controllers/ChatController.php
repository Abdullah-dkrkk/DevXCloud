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
    const FALLBACK_MESSAGE = "Your requirement needs personalized attention from our team. Please connect with us using one of the options below, and we will help you find the right solution.";

    const FALLBACK_OPTIONS = ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services'];

    public function reply(Request $request)
    {
        $message = trim($request->message);

        if (!$message || strlen($message) > 2000) {
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
            $b = $message;

            $lowerB = mb_strtolower(trim($message));
            if ($lowerB === 'hi') {
                return response()->json(['reply' => 'Hi! How can I help you?', 'message_id' => $savedMsgId]);
            }

            if ($this->isCustomQuery($message)) {
                $faqs = Cache::remember('chatbot_faqs_all', 86400, function () {
                    return ChatbotFaq::select('question', 'answer')->get();
                });
                $faqText = $this->getRelevantFaqText($message, $faqs);

                $reply = $this->callAI($message, $faqText);
                if (!$reply) {
                    $res = ['reply' => self::FALLBACK_MESSAGE];
                    $res['options'] = self::FALLBACK_OPTIONS;
                    $res['message_id'] = $savedMsgId;
                    return response()->json($res);
                }

                $res = ['reply' => $reply, 'options' => self::FALLBACK_OPTIONS, 'message_id' => $savedMsgId];
                return response()->json($res);
            }

            if ($this->isAgentConnectRequest($message)) {
                $reply = "Let me connect you with our team. Please share more details about your requirement so we can assist you better.";
                $this->saveHistory($b, $reply, 'bot');
                return response()->json(['reply' => $reply, 'options' => self::FALLBACK_OPTIONS, 'message_id' => $savedMsgId]);
            }

            if ($this->isFuzzyGreeting($message)) {
                $greeting = "Welcome to DevXCloud Growth Advisor. I'm here to help you understand how we build growth systems — ask me anything about our solutions, pricing, or how we work.";
                return response()->json(['reply' => $greeting, 'message_id' => $savedMsgId]);
            }

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

            $exactMatch = $this->exactMatch($b, $faqs);
            if ($exactMatch) {
                $res = ['reply' => $exactMatch];
                $options = $this->getFaqOptions($exactMatch);
                if (!empty($options)) $res['options'] = $options;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $bestMatch = $this->bestMatch($b, $faqs);
            if ($bestMatch) {
                $multi = $this->tryMultiQuestion($b, $faqs, $bestMatch);
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

        $lowerMsg = mb_strtolower(trim($message));

        if ($lowerMsg === 'hi') {
            $reply = 'Hi! How can I help you?';
            $this->saveHistory($rawMessage, $reply, 'bot');
            return response()->json(['reply' => $reply, 'message_id' => $savedMsgId]);
        }

        if ($this->isCustomQuery($message)) {
            $faqs = Cache::remember('chatbot_faqs_all', 86400, function () {
                return ChatbotFaq::select('question', 'answer')->get();
            });
            $faqText = $this->getRelevantFaqText($rawMessage, $faqs);

            $reply = $this->callAI($rawMessage, $faqText);
            if (!$reply) {
                $this->saveHistory($rawMessage, self::FALLBACK_MESSAGE, 'bot');
                $res = ['reply' => self::FALLBACK_MESSAGE];
                $res['options'] = self::FALLBACK_OPTIONS;
                $res['message_id'] = $savedMsgId;
                return response()->json($res);
            }

            $this->saveHistory($rawMessage, $reply, 'bot');
            return response()->json(['reply' => $reply, 'options' => self::FALLBACK_OPTIONS, 'message_id' => $savedMsgId]);
        }

        if ($this->isAgentConnectRequest($message)) {
            $reply = "Let me connect you with our team. Please share more details about your requirement so we can assist you better.";
            $this->saveHistory($rawMessage, $reply, 'bot');
            return response()->json(['reply' => $reply, 'options' => self::FALLBACK_OPTIONS, 'message_id' => $savedMsgId]);
        }

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

        if ($this->isFuzzyGreeting($message)) {
            $greeting = "Welcome to DevXCloud Growth Advisor. I'm here to help you understand how we build growth systems — ask me anything about our solutions, pricing, or how we work.";
            $this->saveHistory($rawMessage, $greeting, 'bot');
            return response()->json(['reply' => $greeting, 'message_id' => $savedMsgId]);
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

        $faqText = $this->getRelevantFaqText($rawMessage, $faqs);

        $cacheKey = 'ai_' . md5($rawMessage . sha1($faqText));

        $cachedReply = Cache::get($cacheKey);
        if ($cachedReply !== null) {
            $this->saveHistory($rawMessage, $cachedReply, 'bot');
            $res = ['reply' => $cachedReply];
            $options = $this->getFaqOptions($cachedReply);
            if (!empty($options)) $res['options'] = $options;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        $reply = $this->callAI($rawMessage, $faqText);
        if (!$reply) {
            $this->saveHistory($rawMessage, self::FALLBACK_MESSAGE, 'bot');
            $res = ['reply' => self::FALLBACK_MESSAGE];
            $res['options'] = self::FALLBACK_OPTIONS;
            $res['message_id'] = $savedMsgId;
            return response()->json($res);
        }

        Cache::put($cacheKey, $reply, 3600);
        $this->saveHistory($rawMessage, $reply, 'bot');

        $res = ['reply' => $reply, 'options' => self::FALLBACK_OPTIONS, 'message_id' => $savedMsgId];
        return response()->json($res);
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

    private function isFuzzyGreeting($message)
    {
        $msg = mb_strtolower(trim($message));
        $len = mb_strlen($msg);
        if ($len < 2 || $len > 6) return false;

        $known = ['hi', 'hey', 'hello', 'hallo', 'yo', 'sup'];
        $maxDist = ($len <= 4) ? 2 : 1;

        foreach ($known as $greeting) {
            if (levenshtein($msg, $greeting) <= $maxDist) {
                return true;
            }
        }
        return false;
    }

    private function isCustomQuery($message)
    {
        $msg = mb_strtolower(trim($message));
        $len = mb_strlen($msg);

        if ($len < 20) return false;

        $catA = [
            '/\b(i have a|i hv a|i run a|i own a|i started a|i operate)\b.*\b(business|compan(y|ies)|brand|store|shop|startup|restaurant|service|venture|firm|kitchen|agency|cafe|studio)\b/is',
            '/\b(my business|my company|my brand|my store|my startup|my shop|my restaurant|my service|my venture|my firm)\b/is',
            '/\b(business|company|brand|store|shop|startup|restaurant|service)\s*(named|called|name is|nam)\b/is',
            '/\b(i sell|i provide|i offer|i make|i create|i manufacture)\b.*\b(product|service|food|meal|kit|recipe|cloth|tech|consult|coach|course|item|good|solution)\b/is',
            '/\b(strug(g)?l(ing|in)?|facing|facin|wasting|wastin|burning|losing|draining)\b.*\b(result|outcome|growth|sale|customer|traffic|lead|roi|money|progress|traction|convers(ion)?|signup|order|revenue)\b/is',
            '/\b(not getting|not getin|not seeing|not seein|havent seen|haven\'?t seen|no result|poor result|bad result|hardly any|barely)\b.*\b(result|outcome|growth|sale|customer|traffic|lead|roi|money|progress|traction|convers(ion)?|signup|order|revenue)\b/is',
            '/\b(wasted|wast|burnt|burning|losing|draining|throwing)\b.*\b(money|budget|fund|dollar|resource|time|thousand|hundred|lakh|crore)\b/is',
            '/\b(guide me|suggest me|advise me|help me with my|help me figure|help me fix|help me solve|help me grow|help me scale)\b/is',
            '/\b(what should i|how can i|how do i|can you help|could you help)\b.*\b(do|fix|solve|improve|grow|market|sell|get|customer|traffic|sale|revenue|start|scale|approach|strategy|next step|plan)\b/is',
            '/\b(located|based|situated|operating)\s*(in|at)\s+\b/is',
            '/\b(need help with my|need advice on my|need guidance for my|need suggestion for my)\b/is',
            '/\b(hv|dnt|idk|pls|plz|struglin|busines|businness|compani|lctd|locatd|vgn|sel|wit|wht|nam)\b/is',
        ];

        $catB = [
            '/\b(commerceai|launchpadai|scalecloud|greenscale|elitescale)\b/is',
            '/\b(pricing?|cost|price|charge|fee|rate|plan|subscription|package|budget|afford|how much)\b/is',
            '/\b(how does|how do|what is|tell me about|explain)\b.*\b(commerceai|launchpadai|scalecloud|greenscale|elitescale|devxcloud|platform|service|solution|tool|feature|growth|market|seo|ads?|software|system)\b/is',
            '/\b(what is|what are|what\'?s the)\b.*\b(pricing?|cost|price|charge|fee|rate|plan|package|subscription)\b/is',
        ];

        $hasA = false;
        $hasB = false;

        foreach ($catA as $p) { if (preg_match($p, $msg)) { $hasA = true; break; } }
        foreach ($catB as $p) { if (preg_match($p, $msg)) { $hasB = true; break; } }

        if ($len > 120) return true;
        if ($hasB && !$hasA) return false;
        if ($hasA) return true;

        return false;
    }

    private function getRelevantFaqText($rawMessage, $faqs, $maxEntries = 10)
    {
        $keywords = array_unique(preg_split('/[\s\p{P}]+/u', mb_strtolower($rawMessage)));
        $keywords = array_filter($keywords, fn($w) => mb_strlen($w) > 2);
        $stopwords = ['the','and','for','are','but','not','you','all','can','had','her','was','one','our','out','has','have','been','some','them','than','what','when','why','which','will','with','your','about','into','over','after','still','also','its','just','only','other','their','this','that','how','who','where','mere','aap','yeh','hai','koi','apna','apne','hain','kaun','kya','kab','kahan','kis','woh','uska','unki','unka','isliye','kyunki'];

        $scored = [];
        foreach ($faqs as $faq) {
            $questions = explode('|', $faq->question);
            $score = 0;
            foreach ($questions as $q) {
                $qWords = array_unique(preg_split('/[\s\p{P}]+/u', mb_strtolower(trim($q))));
                $qWords = array_filter($qWords, fn($w) => mb_strlen($w) > 2 && !in_array($w, $stopwords));
                $matches = array_intersect($keywords, $qWords);
                $score += count($matches);
            }
            $scored[] = ['faq' => $faq, 'score' => $score];
        }

        usort($scored, fn($a, $b) => $b['score'] <=> $a['score']);

        $selected = array_slice($scored, 0, $maxEntries);

        if ($selected[0]['score'] === 0) {
            $selected = array_slice($scored, 0, 5);
        }

        $faqText = '';
        foreach ($selected as $item) {
            $faq = $item['faq'];
            $questions = explode('|', $faq->question);
            foreach ($questions as $q) {
                $trimmed = trim($q);
                if ($trimmed) {
                    $faqText .= "Q: {$trimmed}\nA: {$faq->answer}\n\n";
                }
            }
        }

        return $faqText;
    }

    private function callAI($rawMessage, $faqText)
    {
        try {
            if (mb_strlen($faqText) > 12000) {
                $faqText = mb_substr($faqText, 0, 12000);
            }

            $apiKey = config('services.groq.api_key');

            $response = Http::timeout(10)->withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Content-Type' => 'application/json',
            ])->post('https://api.groq.com/openai/v1/chat/completions', [
                'model' => 'meta-llama/llama-4-scout-17b-16e-instruct',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => "You are DevXCloud Growth Advisor \u2014 a professional growth consultant.

Your job is to help users who ask about their specific business challenges. The user may write in Roman Urdu (Hinglish), make spelling mistakes, or use creative spellings \u2014 understand the INTENT, not the exact words.

Rules:
- Read the user's query carefully. Note their business name, location, and specific problem if mentioned.
- Use the FAQ data below as REFERENCE to understand what DevXCloud offers and stay accurate, but do NOT limit yourself to FAQ answers.
- Write a personalized, professional reply that:
  * Acknowledges their specific situation (business name, problem, goals)
  * Shows understanding of their challenge
  * Relates their problem to relevant DevXCloud solutions (reference FAQ for accuracy)
  * If you find a matching FAQ, you may reference its content naturally in your reply
  * Ends with a polite suggestion to explore next steps
- Keep replies concise (4-6 short paragraphs). Professional tone, natural, not hype.
- You may use simple HTML for formatting: <b>bold</b>, <ul><li>bullet points</li></ul>. Do NOT use markdown (** or *) and do NOT use asterisks for bullets. Always use <ul><li> for lists.
- Use bullet points (<ul><li>...</li></ul>) when listing multiple items.
- Always end your response with a closing line like: 'To get proper guidance for your business, I would recommend connecting with our team so we can understand your needs better and suggest the right approach.'
- If the user's question is completely outside DevXCloud's scope, politely explain that and offer to connect with the team.

FAQ Data (for reference):
$faqText

User Query: $rawMessage",
                    ],
                ],
                'temperature' => 0.1,
                'max_tokens' => 1200,
            ]);

            if (!$response->successful()) {
                Log::error('Groq API Error: ' . $response->body());
                return null;
            }

            $data = $response->json();
            $reply = $data['choices'][0]['message']['content'] ?? null;
            if (!$reply) {
                Log::error('Groq API: unexpected response structure', $data ?? []);
                return null;
            }

            return $this->formatAIResponse($reply);
        } catch (\Exception $e) {
            Log::error('Groq API Exception: ' . $e->getMessage());
            return null;
        }
    }

    private function formatAIResponse($text)
    {
        $text = strip_tags($text, '<b><strong><i><em><u><ul><ol><li><br><p>');
        if (!str_contains($text, '<ul>')) {
            $text = preg_replace('/^[*\-]\s+(.+)$/m', '<li>$1</li>', $text);
            $text = preg_replace('/(<li>.*?<\/li>)(\n<li>.*?<\/li>)+/s', '<ul>$0</ul>', $text);
        }
        $text = preg_replace('/\*\*(.+?)\*\*/', '$1', $text);
        $text = preg_replace('/\*(.+?)\*/', '$1', $text);
        $text = preg_replace('/`(.+?)`/', '$1', $text);
        $text = preg_replace('/~~(.+?)~~/', '$1', $text);
        $text = preg_replace('/^#{1,6}\s+/m', '', $text);
        $text = preg_replace('/\[([^\]]+)\]\([^)]+\)/', '$1', $text);
        $text = preg_replace('/\n+(?=\s*<\/(ul|ol|li|p)>)/i', '', $text);
        $text = preg_replace('/<\/(ul|ol|li|p)>\K\s*\n+/i', '', $text);
        $text = preg_replace('/\n+(?=\s*<(ul|ol|li|p)\b)/i', '', $text);
        $text = preg_replace("/\n{3,}/", "\n\n", $text);
        $text = preg_replace("/[ \t]+\n/", "\n", $text);
        return trim($text);
    }

    private function isAgentConnectRequest($message)
    {
        $msg = mb_strtolower(trim($message));

        $patterns = [
            '/\b(agent|ajent|egent|agnet|gaent|gent|human|insaan|insan|customer\s*service|support)\b/i',
            '/\btalk\s*to\s*(someone|somone|person|human|agent|ajent|team|customer\s*service|support)\b/i',
            '/\bspeak\s*to\s*(someone|somone|person|human|agent|ajent|team|customer\s*service|support)\b/i',
            '/\b(connect|conect|connct|connet)\s*(me\s*)?(to|with)\s*(an?\s*)?(agent|ajent|human|person|team|someone|somone|customer\s*service|support)\b/i',
            '/\btransfer\s*(me\s*)?to\s*(an?\s*)?(agent|ajent|human|support)\b/i',
            '/\b(kisi|kise|someone|somone|insaan|insan)\s*(se\s*)?(baat|bat|bath|talk)/i',
            '/\b(team|agent|ajent)\s*se\s*(baat|bat|bath)/i',
            '/\bmujhe\s*(kisi|kise|insaan|insan)?\s*(se\s*)?(baat|bat|bath|connect|conect|milwa|lagwa|lagao|mila)/i',
            '/\b(baat|bat|bath|connect|conect)\s*(karo|kro|karao|karwao|karado|karvado|lagao|lagwao)/i',
            '/\b(connect|conect|transfer)\s*(kar|karo|kro|do|de|diye|karde|lagwa|lagao|mila)/i',
            '/\b(connect|conect|connct|connet)\s+(as soon as possible|asap|jaldi|turant|abhi|now|urgent|immediately|fast)\b/i',
            '/\bmujhe\s*(connect|conect|agent|ajent|human|insaan|insan)\s*(se\s*)?(baat|bat|bath|karni|karna|chahiye|do|milwa|lagwa)/i',
            '/\b(connect|conect|connct|connet)\s*(me\s*)?(with|to)\s*(customer\s*service|support|customer\s*support|help)\b/i',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $msg)) {
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
            'form_data.business_type' => 'nullable|string|max:255',
            'form_data.question' => 'nullable|string|max:5000',
            'form_data.business_name' => 'nullable|string|max:255',
            'form_data.stage' => 'nullable|string|max:255',
            'form_data.challenge' => 'nullable|string|max:5000',
            'conversation' => 'nullable|string',
            'g-recaptcha-response' => app()->environment('production') ? 'required|string' : 'nullable',
        ]);

        if (app()->environment('production')) {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $data['g-recaptcha-response'],
                'remoteip' => $request->ip(),
            ]);

            $body = $response->json();

            if (!($body['success'] ?? false)) {
                return response()->json(['error' => 'reCAPTCHA verification failed. Please try again.'], 422);
            }

            if (($body['score'] ?? 0) < 0.5) {
                return response()->json(['error' => 'reCAPTCHA score too low. Please try again.'], 422);
            }
        }

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
            'token' => 'nullable|string',
        ]);

        $ticket = ChatTicket::findOrFail($data['ticket_id']);
        if ($ticket->session_id !== session()->getId()) {
            if (empty($data['token']) || !$ticket->verifyToken($data['token'])) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
        }

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
            'token' => 'nullable|string',
        ]);

        $ticket = ChatTicket::findOrFail($data['ticket_id']);
        if ($ticket->session_id !== session()->getId()) {
            if (empty($data['token']) || !$ticket->verifyToken($data['token'])) {
                return response()->json(['error' => 'Unauthorized'], 403);
            }
        }

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

        if (!$ticket->verifyToken($data['token']) && $ticket->session_id !== session()->getId()) {
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
