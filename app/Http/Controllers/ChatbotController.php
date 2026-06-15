<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotFaq;
use App\Models\ChatHistory;
use App\Models\User;
use App\Mail\LeadWelcome;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    public function reply(Request $request)
    {
        $message = trim($request->message);

        if (!$message || strlen($message) > 300) {
            return response()->json(['reply' => 'Invalid message.']);
        }

        $rawMessage = $message;

        $recent = ChatHistory::where('question', $rawMessage)
            ->where('asked_at', '>=', now()->subMinutes(5))
            ->where(function ($q) {
                if (auth()->check()) {
                    $q->where('user_id', auth()->id());
                } else {
                    $q->where('session_id', session()->getId());
                }
            })
            ->orderBy('asked_at', 'desc')
            ->first();

        if ($recent && $recent->answer) {
            $options = $this->getFaqOptions($recent->answer);
            $res = ['reply' => $recent->answer];
            if (!empty($options)) $res['options'] = $options;
            return response()->json($res);
        }

        if ($this->isGreeting($message)) {
            $greeting = "Welcome to DevXCloud Growth Advisor. I'm here to help you understand how we build growth systems — ask me anything about our solutions, pricing, or how we work.";
            $this->saveHistory($rawMessage, $greeting, 'bot');
            return response()->json(['reply' => $greeting]);
        }

        $faqs = ChatbotFaq::select('question', 'answer')->get();
        if ($faqs->isEmpty()) {
            $fallback = "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.";
            $this->saveHistory($rawMessage, $fallback, 'bot');
            return response()->json([
                'reply' => $fallback,
                'options' => ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services']
            ]);
        }

        $exactMatch = $this->exactMatch($rawMessage, $faqs);
        if ($exactMatch) {
            $this->saveHistory($rawMessage, $exactMatch, 'bot');
            $options = $this->getFaqOptions($exactMatch);
            $res = ['reply' => $exactMatch];
            if (!empty($options)) $res['options'] = $options;
            return response()->json($res);
        }

        $bestMatch = $this->bestMatch($rawMessage, $faqs);
        if ($bestMatch) {
            $multi = $this->tryMultiQuestion($rawMessage, $faqs, $bestMatch);
            if ($multi) {
                $this->saveHistory($rawMessage, $multi, 'bot');
                $options = $this->getFaqOptions($multi);
                $res = ['reply' => $multi];
                if (!empty($options)) $res['options'] = $options;
                return response()->json($res);
            }

            $this->saveHistory($rawMessage, $bestMatch, 'bot');
            $options = $this->getFaqOptions($bestMatch);
            $res = ['reply' => $bestMatch];
            if (!empty($options)) $res['options'] = $options;
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

        try {
            $apiKey = env('GEMINI_API_KEY');

            $response = Http::withoutVerifying()->timeout(30)->post(
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
                $fallback = "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.";
                $this->saveHistory($rawMessage, $fallback, 'bot');
                return response()->json([
                    'reply' => $fallback,
                    'options' => ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services']
                ]);
            }

            $data = $response->json();
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$reply || str_contains(strtoupper($reply), 'NO_MATCH')) {
                $fallback = "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.";
                $this->saveHistory($rawMessage, $fallback, 'bot');
                return response()->json([
                    'reply' => $fallback,
                    'options' => ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services']
                ]);
            }

            $finalReply = trim($reply);
            $this->saveHistory($rawMessage, $finalReply, 'bot');

            $options = $this->getFaqOptions($finalReply);
            $res = ['reply' => $finalReply];
            if (!empty($options)) $res['options'] = $options;
            return response()->json($res);

        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            $fallback = "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.";
            $this->saveHistory($rawMessage, $fallback, 'bot');
            return response()->json([
                'reply' => $fallback,
                'options' => ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services']
            ]);
        }
    }

    public function submitForm(Request $request)
    {
        $type = $request->input('type');
        $data = $request->input('data');

        if (!$type || !$data) {
            return response()->json(['status' => 'error', 'message' => 'Missing data.']);
        }

        $email = $data['email'] ?? null;
        $name = $data['name'] ?? 'Lead';

        $user = null;
        $password = null;

        if ($email && !auth()->check()) {
            $user = User::where('email', $email)->first();

            if (!$user) {
                $password = Str::random(12);
                $user = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                ]);

                try {
                    Mail::to($email)->send(new LeadWelcome($user, $password));
                } catch (\Exception $e) {
                    Log::error('Failed to send lead welcome email: ' . $e->getMessage());
                }
            }

            ChatHistory::where('session_id', session()->getId())
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);

            auth()->login($user);
        }

        $questionText = $type === 'guidance'
            ? 'Personalized Guidance Request'
            : 'Discovery Call Booking Request';

        $answerText = json_encode($data);

        $history = ChatHistory::create([
            'user_id' => $user ? $user->id : (auth()->check() ? auth()->id() : null),
            'session_id' => $user ? null : session()->getId(),
            'question' => $questionText,
            'answer' => $answerText,
            'source' => 'lead',
            'asked_at' => now(),
        ]);

        Log::info('Chatbot form submission: ' . $type, $data);

        return response()->json([
            'status' => 'ok',
            'user_created' => $password !== null,
            'user_id' => $user ? $user->id : null,
        ]);
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
                $messages[] = [
                    'type' => 'bot',
                    'text' => $h->answer,
                ];
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

    public function migrateGuest(Request $request)
    {
        $pairs = $request->input('pairs', []);
        $userId = auth()->id();
        if (!$userId) {
            return response()->json(['status' => 'error', 'message' => 'Not authenticated.']);
        }

        $saved = 0;
        foreach ($pairs as $pair) {
            $question = trim($pair['question'] ?? '');
            $answer = $pair['answer'] ?? null;
            if (!$question) continue;

            $existing = ChatHistory::where('user_id', $userId)
                ->where('question', $question)
                ->where('asked_at', '>=', now()->subHour())
                ->first();

            if ($existing) {
                if ($answer && !$existing->answer) {
                    $existing->update(['answer' => $answer, 'source' => 'bot', 'answered_at' => now()]);
                }
                continue;
            }

            ChatHistory::create([
                'user_id' => $userId,
                'session_id' => null,
                'question' => $question,
                'answer' => $answer,
                'source' => $answer ? 'bot' : 'pending',
                'asked_at' => now(),
                'answered_at' => $answer ? now() : null,
            ]);
            $saved++;
        }

        return response()->json(['status' => 'ok', 'saved' => $saved]);
    }
}