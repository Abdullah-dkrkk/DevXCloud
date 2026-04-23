<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatbotFaq;
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

        $faqs = ChatbotFaq::select('question', 'answer')->get();
        if ($faqs->isEmpty()) {
            return response()->json(['reply' => 'No data available.']);
        }

        $faqText = "";
        foreach ($faqs as $faq) {
            $faqText .= "Q:{$faq->question}|A:{$faq->answer}\n";
        }

        try {
            $apiKey = env('GEMINI_API_KEY');

            // ⚡ UPDATED TO GEMINI 2.5 FLASH
            $response = Http::timeout(30)->post(
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key={$apiKey}",
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => "System Instructions:
                                1. You are DevXCloud Support.
                                2. Use ONLY the FAQ data provided below.
                                3. If the user asks MULTIPLE questions, answer each one in a numbered list.
                                4. If the answer isn't in the FAQ, reply exactly with 'NO_MATCH'.
                                
                                FAQ Data:
                                $faqText
                                
                                User Query: $message"]
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
                return response()->json(['reply' => 'Connection error. Please try again.']);
            }

            $data = $response->json();
            $reply = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

            if (!$reply || str_contains(strtoupper($reply), 'NO_MATCH')) {
                return response()->json([
                    'reply' => "I couldn't find that in my records. Please ask about DevXCloud services or contact support."
                ]);
            }

            return response()->json(['reply' => trim($reply)]);

        } catch (\Exception $e) {
            Log::error('Gemini Exception: ' . $e->getMessage());
            return response()->json(['reply' => 'Server error occurred.']);
        }
    }
}