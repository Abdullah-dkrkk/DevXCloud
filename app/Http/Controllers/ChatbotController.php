<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotFaq;
use App\Models\ChatHistory;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function reply(Request $request)
    {
        $message = trim($request->message);

        if (!$message || strlen($message) > 300) {
            return response()->json(['reply' => 'Invalid message.']);
        }

        $rawMessage = $message;
        $message = $this->normalizeTypo($message);

        if ($this->isGreeting($message)) {
            $greeting = "Hello! Welcome to DevXCloud Support. How can I help you today? Feel free to ask about our services or anything else.";
            $this->saveHistory($rawMessage, $greeting, 'bot');
            return response()->json(['reply' => $greeting]);
        }

        $faqs = ChatbotFaq::select('question', 'answer')->get();
        if ($faqs->isEmpty()) {
            $this->saveHistory($rawMessage, null, 'pending');
            return response()->json(['reply' => 'No data available.']);
        }

        $exactMatch = $this->exactMatch($message, $faqs);
        if ($exactMatch) {
            $this->saveHistory($rawMessage, $exactMatch, 'bot');
            return response()->json(['reply' => $exactMatch]);
        }

        $localMatch = $this->fuzzyMatch($message, $faqs);
        if ($localMatch) {
            $this->saveHistory($rawMessage, $localMatch, 'bot');
            return response()->json(['reply' => $localMatch]);
        }

        $faqText = "";
        foreach ($faqs as $faq) {
            $faqText .= "Q:{$faq->question}|A:{$faq->answer}\n";
        }

        try {
            $apiKey = env('GEMINI_API_KEY');

            $response = Http::timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => "System Instructions:
1. You are DevXCloud Support.
2. Use ONLY the FAQ data provided below.
3. The user may make spelling mistakes or typos — fix them internally before matching.
4. If the user asks about 'devxcloud' with any spelling variation (devxxcloud, devvscloud, devxcloud, dxcloud etc.), treat it as 'devxcloud'.
5. Roman Urdu / Hinglish questions are allowed — understand the intent.
6. If the user asks MULTIPLE questions, answer each one in a numbered list.
7. If the answer isn't in the FAQ, reply exactly with: NO_MATCH

FAQ Data:
$faqText

User Query: $message"
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
                Log::error('Gemini 2.5 Error: ' . $response->body());
                $this->saveHistory($rawMessage, null, 'pending');
                return response()->json(['reply' => 'Connection error. Please try again.']);
            }

            $data = $response->json();
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$reply || str_contains(strtoupper($reply), 'NO_MATCH')) {
                $this->saveHistory($rawMessage, null, 'pending');
                return response()->json([
                    'reply' => "I couldn't find that in my records. Please ask about DevXCloud services or contact support."
                ]);
            }

            $finalReply = trim($reply);
            $this->saveHistory($rawMessage, $finalReply, 'bot');
            return response()->json(['reply' => $finalReply]);

        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            $this->saveHistory($rawMessage, null, 'pending');
            return response()->json(['reply' => 'Server error occurred.']);
        }
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
        $greetings = [
            '/^(hi|hello|hey|heyy|heya|hii|helloo|hellooo)\b/i',
            '/\bhow are you\b/i',
            '/\bhow\s+are\s+you\b/i',
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

        foreach ($greetings as $pattern) {
            if (preg_match($pattern, $message)) {
                return true;
            }
        }
        return false;
    }

    private function normalizeTypo($message)
    {
        $message = mb_strtolower($message);

        $replacements = [
            '/\bdev+x+cloud\b/i'      => 'devxcloud',
            '/\bdev+x+clouds?\b/i'    => 'devxcloud',
            '/\bde[vv]+xcloud\b/i'    => 'devxcloud',
            '/\bdev*[x]+cloud\b/i'    => 'devxcloud',
            '/\bdev*[x]+clouds?\b/i'  => 'devxcloud',
            '/\bdev[x]+cloud\b/i'     => 'devxcloud',
            '/\bdev+[x]+clouds?\b/i'  => 'devxcloud',
            '/\bdev[xX]+cloud\b/i'    => 'devxcloud',
            '/\bdev+[x]+[c]+loud\b/i' => 'devxcloud',
            '/\bd[x]+cloud\b/i'       => 'devxcloud',
            '/\bd[vv]+xcloud\b/i'     => 'devxcloud',
            '/\bd[e]+[v]+xcloud\b/i'  => 'devxcloud',
            '/\bgreenscale\b/i'       => 'greenscale',
            '/\bgreen\s*scale\b/i'    => 'greenscale',
            '/\blaunch[\s-]?pad\b/i'  => 'launchpadai',
            '/\bscale[\s-]?cloud\b/i' => 'scalecloud',
            '/\belite[\s-]?scale\b/i' => 'elitescale',
            '/\bcommerce[\s-]?ai\b/i' => 'commerceai',
        ];

        return preg_replace(array_keys($replacements), array_values($replacements), $message);
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

    private function fuzzyMatch($message, $faqs)
    {
        $bestScore = 0;
        $bestAnswer = null;
        $msg = mb_strtolower(trim($message));

        foreach ($faqs as $faq) {
            $variations = explode('|', $faq->question);
            foreach ($variations as $variation) {
                $question = mb_strtolower(trim($variation));

                similar_text($question, $msg, $score);

                $words = explode(' ', $msg);
                $qWords = explode(' ', $question);
                $common = array_intersect($words, $qWords);
                $wordScore = count($common) / max(count($qWords), 1) * 100;

                $totalScore = ($score * 0.6) + ($wordScore * 0.4);

                if ($totalScore > $bestScore) {
                    $bestScore = $totalScore;
                    $bestAnswer = $faq->answer;
                }
            }
        }

        return $bestScore >= 65 ? $bestAnswer : null;
    }
}