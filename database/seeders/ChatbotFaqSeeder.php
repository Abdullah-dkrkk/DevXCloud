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
        DB::table('chatbot_faqs')->truncate();

        $faqs = [
            // DevXCloud — with common typo/alternative variations
            [
                'question' => 'what is devxcloud | devxxcloud | devvscloud | devx cloud | dxcloud | about devxcloud | company devxcloud | who is devxcloud | tell me about devxcloud | explain devxcloud | what does devxcloud mean | devxcloud kya hai | devxcloud ke bare mein',
                'answer' => 'DevXCloud is a growth systems company. Instead of offering isolated services like ads or SEO, we diagnose what\'s holding a business back and build a connected system where marketing, retention, and operations work together.'
            ],
            // What does DevXCloud do
            [
                'question' => 'what does devxcloud do | services | what services do you offer | what do you guys do | what exactly do you do | tell me your services | what kind of services you provide | devxcloud services | devxcloud kya karta hai',
                'answer' => 'We help businesses grow more consistently by fixing how their growth works as a system. That includes identifying weak points, building a strategy, and implementing the right tools so everything works together instead of in isolation.'
            ],
            // Agency
            [
                'question' => 'agency | are you an agency | is devxcloud an agency | are you a marketing agency | are you like an agency | kya aap agency ho',
                'answer' => 'Not in the traditional sense. Most agencies focus on individual services. We focus on building a complete growth system around your business so results are more stable and predictable.'
            ],
            // Difference
            [
                'question' => 'difference | different from agencies | why different | why choose devxcloud | how are you different | what makes you different | difference between devxcloud and agency | why devxcloud better | devxcloud alag kyun hai',
                'answer' => 'Most agencies optimize one area at a time like ads or SEO. We look at how everything connects. When growth channels are disconnected, results don\'t last. We fix that by building a system where each part reinforces the other.'
            ],
            // GreenScale
            [
                'question' => 'greenscale | greenscale formula | what is greenscale | tell me about greenscale | vegan system | vegan meal kit system | green scale | greenscale kya hai',
                'answer' => 'GreenScale Formula is our growth system built specifically for vegan meal kit brands. It focuses on connecting demand, retention, and operations so growth becomes stable instead of creating more pressure like waste or churn.'
            ],
            // CommerceAI
            [
                'question' => 'commerceai | commerce ai | what is commerceai | ecommerce system | ecommerce growth system | ai ecommerce | ecommerce solution | e-commerce | commerceai kya hai',
                'answer' => 'CommerceAI is our growth system for e-commerce brands. It combines strategy, AI-driven personalization, and performance optimization to improve conversions, retention, and overall revenue.'
            ],
            // LaunchPadAI
            [
                'question' => 'launchpadai | launchpad ai | launch pad ai | what is launchpadai | startup system | early stage system | help startups | startup growth system | launchpadai kya hai',
                'answer' => 'LaunchPadAI is designed for founders and early-stage businesses. It helps you build a strong foundation with the right strategy, website, and growth setup so you can launch properly instead of guessing.'
            ],
            // ScaleCloud
            [
                'question' => 'scalecloud | scale cloud | what is scalecloud | saas system | saas growth | saas scaling | help saas companies | scalecloud kya hai',
                'answer' => 'ScaleCloud is built for SaaS companies that want to scale efficiently. It focuses on automation, data, and system optimization to improve conversions, reduce churn, and support long-term growth.'
            ],
            // EliteScale
            [
                'question' => 'elitescale | elite scale | what is elitescale | advanced scaling | enterprise growth | high level scaling | elitescale kya hai',
                'answer' => 'EliteScale is our high-level growth system for established businesses. It combines advanced strategy, data, and multi-channel scaling to help brands expand aggressively and operate at a higher level.'
            ],
            // Work with startups
            [
                'question' => 'do you work with startups | startup help | early stage business help | can you help my startup | startup ke sath kaam karte ho | kya aap startups ke sath kaam karte hain',
                'answer' => 'Yes. For early-stage businesses, we usually focus on building a strong foundation first so growth doesn\'t break later.'
            ],
            // Work with ecommerce
            [
                'question' => 'do you work with ecommerce | ecommerce help | online store help | can you grow my ecommerce | ecommerce ke sath kaam karte ho | e-commerce business help',
                'answer' => 'Yes. Our CommerceAI system is designed specifically for e-commerce businesses looking to grow more consistently.'
            ],
            // Work with SaaS
            [
                'question' => 'do you work with saas | saas help | saas companies | can you scale saas | saas business help',
                'answer' => 'Yes. That\'s what our ScaleCloud system is built for. It focuses on improving conversion, retention, and overall scalability.'
            ],
            // No website
            [
                'question' => 'i dont have website | no website | dont have website | without website | meri website nahi hai | koi website nahi hai',
                'answer' => 'Yes. In that case, we usually focus on setting up a strong foundation first before scaling anything. That makes everything easier later.'
            ],
            // Discovery call
            [
                'question' => 'discovery call | growth call | consultation call | what is discovery call | what happens in call | discovery call kya hai | free call',
                'answer' => 'It\'s a short call where we understand your business, identify what\'s not working, and walk you through what\'s likely holding growth back. It\'s more about clarity than pitching.'
            ],
            // After call
            [
                'question' => 'what happens after call | after call | next step after call | call ke baad kya hota hai | discovery call ke baad',
                'answer' => 'We review your business before the call, then walk through your current setup and explain what\'s limiting growth and what should be fixed first. From there, we can suggest the right next steps.'
            ],
            // Pricing
            [
                'question' => 'price | cost | pricing | how much do you charge | what is your pricing | kitna price hai | fees | charges | kya price hai',
                'answer' => 'It depends on the business and the level of work required. Since everything is customized, pricing is usually discussed after understanding your setup.'
            ],
            // How to start
            [
                'question' => 'how to start | get started | how can i begin | start working with you | kaise start karein | shuru kaise karein | book call',
                'answer' => 'The best way to start is by booking a Growth Discovery Call. That gives you a clear view of what\'s working, what\'s not, and what to fix first.'
            ],
            // Confused
            [
                'question' => 'confused | not sure | dont know what to do | dont know problem | confused hoon | samajh nahi aa raha | unsure',
                'answer' => 'That\'s actually very common. Most businesses don\'t have a clear view of what\'s really causing unstable growth. That\'s exactly what the discovery process is for.'
            ],
            // Greetings
            [
                'question' => 'hi | hello | hey | hi there | hello there | salam | assalamualaikum | hello ji | kya haal hai | good morning | good evening',
                'answer' => 'Hi! How can I help you?'
            ],
            // Contact
            [
                'question' => 'contact | contact number | phone number | email | reach you | how to contact | aapse kaise contact karein | contact details | support | help',
                'answer' => 'You can reach us through our Contact page or book a Growth Discovery Call directly from the website.'
            ],
            // Location
            [
                'question' => 'location | where are you based | office | headquarters | address | kahan ho | office kahan hai',
                'answer' => 'We work with clients globally. Our team operates remotely, so we can serve businesses worldwide.'
            ],
        ];

        foreach ($faqs as $faq) {
            ChatbotFaq::create([
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ]);
        }
    }
}