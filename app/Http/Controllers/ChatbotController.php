<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function reply(Request $request)
    {
        $message = strtolower(trim($request->message));

        $faqs = json_decode(file_get_contents(resource_path('chatbot/faqs.json')), true);

        $exactMatches = [];
        $scoredMatches = [];

        foreach ($faqs as $faq) {

            foreach ($faq['keywords'] as $keyword) {

                $keyword = strtolower(trim($keyword));

                // ✅ STRICT MATCH (HIGH PRIORITY)
                if ($message === $keyword || str_contains($message, $keyword)) {
                    $exactMatches[] = $faq['answer'];
                    break;
                }
            }
        }

        // 🔥 If exact match found → return ONLY that
        if (!empty($exactMatches)) {
            return response()->json([
                'reply' => implode("\n\n---\n\n", array_unique($exactMatches))
            ]);
        }

        // 🔥 fallback to smart matching ONLY if no exact match
        foreach ($faqs as $faq) {

            $score = 0;

            foreach ($faq['keywords'] as $keyword) {

                $keywordWords = explode(' ', strtolower($keyword));
                $matchCount = 0;

                foreach ($keywordWords as $word) {
                    if (strlen($word) > 3 && str_contains($message, $word)) {
                        $matchCount++;
                    }
                }

                if ($matchCount >= ceil(count($keywordWords) * 0.7)) {
                    $score += $matchCount;
                }
            }

            if ($score > 0) {
                $scoredMatches[] = [
                    'answer' => $faq['answer'],
                    'score' => $score
                ];
            }
        }

        if (!empty($scoredMatches)) {

            usort($scoredMatches, function ($a, $b) {
                return $b['score'] <=> $a['score'];
            });

            // 🔥 LIMIT RESULTS (IMPORTANT)
            $topMatches = array_slice($scoredMatches, 0, 2);

            $answers = array_unique(array_column($topMatches, 'answer'));

            return response()->json([
                'reply' => implode("\n\n", $answers)
            ]);
        }

        return response()->json([
            'reply' => "Right now I don’t have a clear answer for that.\n\nBut we can look into it and get back to you properly."
        ]);
    }
}