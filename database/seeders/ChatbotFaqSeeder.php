<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChatbotFaq;
use Illuminate\Support\Facades\DB;

class ChatbotFaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Table ko clean karein taake duplicates na hon
        DB::table('chatbot_faqs')->truncate();

        $faqs = [
            [
                'question' => 'what is devxcloud',
                'answer' => 'DevXCloud is a growth systems company. Instead of offering isolated services like ads or SEO, we diagnose what’s holding a business back and build a connected system where marketing, retention, and operations work together.'
            ],
            [
                'question' => 'what does devxcloud do',
                'answer' => 'We help businesses grow more consistently by fixing how their growth works as a system. That includes identifying weak points, building a strategy, and implementing the right tools so everything works together instead of in isolation.'
            ],
            [
                'question' => 'agency',
                'answer' => 'Not in the traditional sense. Most agencies focus on individual services. We focus on building a complete growth system around your business so results are more stable and predictable.'
            ],
            [
                'question' => 'difference',
                'answer' => 'Most agencies optimize one area at a time like ads or SEO. We look at how everything connects. When growth channels are disconnected, results don’t last. We fix that by building a system where each part reinforces the other.'
            ],
            [
                'question' => 'greenscale',
                'answer' => 'GreenScale Formula is our growth system built specifically for vegan meal kit brands. It focuses on connecting demand, retention, and operations so growth becomes stable instead of creating more pressure like waste or churn.'
            ],
            [
                'question' => 'commerceai',
                'answer' => 'CommerceAI is our growth system for e-commerce brands. It combines strategy, AI-driven personalization, and performance optimization to improve conversions, retention, and overall revenue.'
            ],
            [
                'question' => 'launchpadai',
                'answer' => 'LaunchPadAI is designed for founders and early-stage businesses. It helps you build a strong foundation with the right strategy, website, and growth setup so you can launch properly instead of guessing.'
            ],
            [
                'question' => 'scalecloud',
                'answer' => 'ScaleCloud is built for SaaS companies that want to scale efficiently. It focuses on automation, data, and system optimization to improve conversions, reduce churn, and support long-term growth.'
            ],
            [
                'question' => 'elitescale',
                'answer' => 'EliteScale is our high-level growth system for established businesses. It combines advanced strategy, data, and multi-channel scaling to help brands expand aggressively and operate at a higher level.'
            ],
            [
                'question' => 'do you work with startups',
                'answer' => 'Yes. For early-stage businesses, we usually focus on building a strong foundation first so growth doesn’t break later.'
            ],
            [
                'question' => 'do you work with ecommerce',
                'answer' => 'Yes. Our CommerceAI system is designed specifically for e-commerce businesses looking to grow more consistently.'
            ],
            [
                'question' => 'do you work with saas',
                'answer' => 'Yes. That’s what our ScaleCloud system is built for. It focuses on improving conversion, retention, and overall scalability.'
            ],
            [
                'question' => 'i dont have website',
                'answer' => 'Yes. In that case, we usually focus on setting up a strong foundation first before scaling anything. That makes everything easier later.'
            ],
            [
                'question' => 'discovery call',
                'answer' => 'It’s a short call where we understand your business, identify what’s not working, and walk you through what’s likely holding growth back. It’s more about clarity than pitching.'
            ],
            [
                'question' => 'what happens after call',
                'answer' => 'We review your business before the call, then walk through your current setup and explain what’s limiting growth and what should be fixed first. From there, we can suggest the right next steps.'
            ],
            [
                'question' => 'price',
                'answer' => 'It depends on the business and the level of work required. Since everything is customized, pricing is usually discussed after understanding your setup.'
            ],
            [
                'question' => 'how to start',
                'answer' => 'The best way to start is by booking a Growth Discovery Call. That gives you a clear view of what’s working, what’s not, and what to fix first.'
            ],
            [
                'question' => 'confused',
                'answer' => 'That’s actually very common. Most businesses don’t have a clear view of what’s really causing unstable growth. That’s exactly what the discovery process is for.'
            ],
            [
                'question' => 'hi',
                'answer' => 'Hi! How can I help you?'
            ]
        ];

        foreach ($faqs as $faq) {
            ChatbotFaq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ]);
        }
    }
}