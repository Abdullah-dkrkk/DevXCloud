<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function reply(Request $request)
    {
        $message = strtolower($request->message);

        $faqs = json_decode(file_get_contents(resource_path('chatbot/faqs.json')), true);

        foreach ($faqs as $faq) {

            foreach ($faq['keywords'] as $keyword) {

                if (str_contains($message, strtolower($keyword))) {
                    return response()->json([
                        'reply' => $faq['answer']
                    ]);
                }
            }
        }

        return response()->json([
            'reply' => "Can you please rephrase your question? I'm here to help."
        ]);
    }
}