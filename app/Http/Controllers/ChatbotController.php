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
            $greeting = "Welcome to DevXCloud Growth Advisor. I'm here to help you understand how we build growth systems — ask me anything about our solutions, pricing, or how we work.";
            $this->saveHistory($rawMessage, $greeting, 'bot');
            return response()->json(['reply' => $greeting]);
        }

        $faqs = ChatbotFaq::select('question', 'answer')->get();
        if ($faqs->isEmpty()) {
            $this->saveHistory($rawMessage, null, 'pending');
            return response()->json([
                'reply' => "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.",
                'options' => ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services']
            ]);
        }

        $exactMatch = $this->exactMatch($message, $faqs);
        if ($exactMatch) {
            $this->saveHistory($rawMessage, $exactMatch, 'bot');
            $options = $this->getFaqOptions($exactMatch);
            $res = ['reply' => $exactMatch];
            if (!empty($options)) $res['options'] = $options;
            return response()->json($res);
        }

        $localMatch = $this->fuzzyMatch($message, $faqs);
        if ($localMatch) {
            $this->saveHistory($rawMessage, $localMatch, 'bot');
            $options = $this->getFaqOptions($localMatch);
            $res = ['reply' => $localMatch];
            if (!empty($options)) $res['options'] = $options;
            return response()->json($res);
        }

        $faqText = "";
        foreach ($faqs as $faq) {
            $faqText .= "Q:{$faq->question}|A:{$faq->answer}\n";
        }

        try {
            $apiKey = env('GEMINI_API_KEY');

            $response = Http::withoutVerifying()->timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => "System Instructions:
1. You are DevXCloud Growth Advisor — professional and consultative.
2. Use ONLY the FAQ data provided below. Never generate answers outside the FAQ.
3. The user may make spelling mistakes or typos — fix them internally before matching.
4. If the user asks about 'devxcloud' with any spelling variation (devxxcloud, devvscloud, devxcloud, dxcloud etc.), treat it as 'devxcloud'.
5. Roman Urdu / Hinglish questions are allowed — understand the intent.
6. If the user asks MULTIPLE questions, answer each one in a numbered list.
7. If the answer isn't in the FAQ, reply exactly with: NO_MATCH
8. Keep answers SHORT — 3 to 5 lines maximum. No long paragraphs.
9. Do NOT use markdown formatting (no bold, no italic, no bullet points).
10. Do NOT use emojis.
11. Sound professional and consultative — not robotic, not hype, not fake friendly.

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
                return response()->json([
                    'reply' => "I'm having trouble connecting right now. Please try again in a moment.",
                ]);
            }

            $data = $response->json();
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$reply || str_contains(strtoupper($reply), 'NO_MATCH')) {
                $this->saveHistory($rawMessage, null, 'pending');
                return response()->json([
                    'reply' => "I don't have enough context to answer that accurately. If your question is specific to your business, I can help you continue in one of the following ways.",
                    'options' => ['Get Personalized Guidance', 'Book Discovery Call', 'Explore Services']
                ]);
            }

            $finalReply = trim($reply);
            $this->saveHistory($rawMessage, $finalReply, 'bot');
            return response()->json(['reply' => $finalReply]);

        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            $this->saveHistory($rawMessage, null, 'pending');
            return response()->json([
                'reply' => "Something went wrong. Please try again.",
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

        $questionText = $type === 'guidance'
            ? 'Personalized Guidance Request'
            : 'Discovery Call Booking Request';

        $answerText = json_encode($data);

        $this->saveHistory($questionText, $answerText, 'pending');

        Log::info('Chatbot form submission: ' . $type, $data);

        return response()->json(['status' => 'ok']);
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

        $stopWords = ['the', 'a', 'an', 'is', 'are', 'am', 'was', 'were', 'be', 'been',
                       'i', 'my', 'me', 'we', 'you', 'your', 'he', 'she', 'it', 'they',
                       'this', 'that', 'these', 'those', 'in', 'on', 'at', 'for', 'to',
                       'of', 'with', 'by', 'from', 'and', 'or', 'but', 'not', 'no',
                       'do', 'does', 'did', 'have', 'has', 'had', 'can', 'will', 'would',
                       'could', 'should', 'may', 'might', 'shall', 'about', 'into',
                       'through', 'during', 'before', 'after', 'above', 'below',
                       'up', 'down', 'out', 'off', 'over', 'under', 'again', 'further',
                       'then', 'once', 'here', 'there', 'when', 'where', 'why',
                       'how', 'all', 'each', 'every', 'both', 'few', 'more', 'most',
                       'some', 'any', 'other', 'such', 'only', 'own', 'same', 'so',
                       'than', 'too', 'very', 'just', 'because', 'as', 'until',
                       'while', 'if', 'else', 'hi', 'hello', 'hey', 'thanks'];

        $msgWords = array_diff(explode(' ', $msg), $stopWords);

        foreach ($faqs as $faq) {
            $variations = explode('|', $faq->question);
            foreach ($variations as $variation) {
                $question = mb_strtolower(trim($variation));

                similar_text($question, $msg, $charScore);

                $qWords = array_diff(explode(' ', $question), $stopWords);

                if (count($qWords) === 0) continue;

                $common = array_intersect($msgWords, $qWords);
                $wordScore = count($common) / max(count($qWords), 1) * 100;

                $msgLen = count($msgWords);
                if ($msgLen > 0) {
                    $msgCommon = count(array_intersect($msgWords, $qWords));
                    $msgCoverage = $msgCommon / $msgLen * 100;
                    $wordScore = ($wordScore + $msgCoverage) / 2;
                }

                $totalScore = ($charScore * 0.4) + ($wordScore * 0.6);

                if ($totalScore > $bestScore) {
                    $bestScore = $totalScore;
                    $bestAnswer = $faq->answer;
                }
            }
        }

        return $bestScore >= 60 ? $bestAnswer : null;
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
}