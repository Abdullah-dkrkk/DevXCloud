<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ChatbotFaq;
use Illuminate\Support\Facades\DB;

class ChatbotFaqSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('chatbot_faqs')->truncate();

        $faqs = [
            // DevXCloud
            [
                'question' => 'what is devxcloud | devxxcloud | devvscloud | devx cloud | dxcloud | about devxcloud | company devxcloud | who is devxcloud | tell me about devxcloud | explain devxcloud | what does devxcloud mean | devxcloud kya hai | devxcloud ke bare mein | what devxcloud do | what does devxcloud do | what do you guys do',
                'answer' => 'DevXCloud is a growth systems company. Instead of offering isolated services like ads or SEO, we diagnose what\'s holding a business back and build a connected system where marketing, retention, and operations work together.'
            ],
            // What does DevXCloud do
            [
                'question' => 'what does devxcloud do | services | what services do you offer | what do you guys do | what exactly do you do | tell me your services | what kind of services you provide | devxcloud services | devxcloud kya karta hai | what service you provide | what services do you offer | my ads are not working | ads not working | ads not performing | my marketing is not working | how to get more customers | how to get customers | need more customers | how can i grow my business | can you grow my business | i want to grow',
                'answer' => 'We help businesses grow more consistently by fixing how their growth works as a system. That includes identifying weak points, building a strategy, and implementing the right tools so everything works together instead of in isolation.'
            ],
            // Agency
            [
                'question' => 'agency | are you an agency | is devxcloud an agency | are you a marketing agency | are you like an agency | kya aap agency ho | difference from agency | how are you different | what makes you different',
                'answer' => 'Not in the traditional sense. Most agencies focus on individual services. We focus on building a complete growth system around your business so results are more stable and predictable.'
            ],
            // Difference
            [
                'question' => 'difference | different from agencies | why different | why choose devxcloud | how are you different | what makes you different | difference between devxcloud and agency | why devxcloud better | devxcloud alag kyun hai | how are you different from other agencies',
                'answer' => 'Most agencies optimize one area at a time like ads or SEO. We look at how everything connects. When growth channels are disconnected, results don\'t last. We fix that by building a system where each part reinforces the other.'
            ],
            // GreenScale
            [
                'question' => 'greenscale | greenscale formula | what is greenscale | tell me about greenscale | vegan system | vegan meal kit system | green scale | greenscale kya hai | what is greenscale formula',
                'answer' => 'GreenScale Formula is DevXCloud\'s growth system for vegan meal-kit businesses. It focuses on retention, demand planning, operational efficiency, customer journey, and sustainable growth.'
            ],
            // CommerceAI
            [
                'question' => 'commerceai | commerce ai | what is commerceai | ecommerce system | ecommerce growth system | ai ecommerce | ecommerce solution | e-commerce | commerceai kya hai | i need ecommerce help | ecommerce help | can you help my ecommerce | can you grow my ecommerce | ecommerce business help',
                'answer' => 'CommerceAI is our growth system for e-commerce brands. It combines strategy, AI-driven personalization, and performance optimization to improve conversions, retention, and overall revenue.'
            ],
            // LaunchPadAI
            [
                'question' => 'launchpadai | launchpad ai | launch pad ai | what is launchpadai | startup system | early stage system | help startups | startup growth system | launchpadai kya hai | startup help | can you help my startup | i want to start business | can you help me start a business | mere startup boht naya hai | mera startup bahut naya hai | very new startup | just started my business | newly launched startup',
                'answer' => 'LaunchPadAI is designed for founders and early-stage businesses. It helps you build a strong foundation with the right strategy, website, and growth setup so you can launch properly instead of guessing.'
            ],
            // ScaleCloud
            [
                'question' => 'scalecloud | scale cloud | what is scalecloud | saas system | saas growth | saas scaling | help saas companies | scalecloud kya hai | saas help | can you help saas | do you work with saas | saas companies',
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
                'question' => 'do you work with saas | saas help | saas companies | can you scale saas | saas business help | can you help saas companies',
                'answer' => 'Yes. That\'s what our ScaleCloud system is built for. It focuses on improving conversion, retention, and overall scalability.'
            ],
            // No website
            [
                'question' => 'i dont have website | no website | dont have website | without website | meri website nahi hai | koi website nahi hai',
                'answer' => 'Yes. In that case, we usually focus on setting up a strong foundation first before scaling anything. That makes everything easier later.'
            ],
            // Discovery call
            [
                'question' => 'discovery call | growth call | consultation call | what is discovery call | what happens in call | discovery call kya hai | free call | what happens in a growth discovery call | how to book call | book a call | book discovery call | book growth discovery call | how can i book a call',
                'answer' => 'A Growth Discovery Call is a short strategy call where we understand your business, identify what is blocking growth, and explain what should be fixed first. It is focused on clarity, not pressure.'
            ],
            // After call
            [
                'question' => 'what happens after call | after call | next step after call | call ke baad kya hota hai | discovery call ke baad',
                'answer' => 'We review your business before the call, then walk through your current setup and explain what\'s limiting growth and what should be fixed first. From there, we can suggest the right next steps.'
            ],
            // Pricing
            [
                'question' => 'price | cost | pricing | how much do you charge | what is your pricing | kitna price hai | fees | charges | kya price hai | how much cost | how much does it cost | i dont have budget | low budget | i do not have a big budget | kitna cost hai | bht mehnga hai | bahut mehnga hai | too expensive | expensive | mehnga hai | price bahut zyada hai',
                'answer' => 'Pricing depends on the business, the scope, and the level of work required. We do not use one fixed package for every business because every growth problem is different. The best first step is a Growth Discovery Call, where we understand the situation and recommend the right direction.'
            ],
            // How to start
            [
                'question' => 'how to start | get started | how can i begin | start working with you | kaise start karein | shuru kaise karein | book call | how to book call | i need a growth plan | need a growth plan | growth plan | i need a plan for growth | business growth plan',
                'answer' => 'The best way to start is by booking a Growth Discovery Call. That gives you a clear view of what\'s working, what\'s not, and what to fix first.'
            ],
            // Confused
            [
                'question' => 'confused | not sure | dont know what to do | dont know problem | confused hoon | samajh nahi aa raha | unsure | i am just exploring | just exploring | exploring options | i need help but i am not sure what i need | i need help but not sure | need help not sure | need help but not sure what i need | i need help but i dont know what i need | help me but not sure | dont know what i need | not sure what i need | need guidance not sure | help me i am confused | i am confused need help',
                'answer' => 'That is completely fine. The best place to start is by understanding your business type and what stage you are in. Then we can point you toward the most relevant solution.'
            ],
            // Timeline
            [
                'question' => 'how long | timeline | how long does it take | how long it take | time frame | timeframe | kitna time lagta hai | how much time',
                'answer' => 'Timeline depends on the project scope. A basic growth audit or strategy direction can be faster, while full system implementation takes longer. After the discovery call, we can give a clearer estimate based on what needs to be built or improved.'
            ],
            // Which solution
            [
                'question' => 'which solution | which one should i choose | which product | what should i choose | meri business ke liye kya sahi hai | what is best for me',
                'answer' => 'It depends on your business type. If you run an e-commerce brand, CommerceAI is usually the best fit. If you are launching a new business, LaunchPadAI is better. If you run a SaaS company, ScaleCloud is more relevant. If you are an established business looking to scale, EliteScale fits better. If you run a vegan meal-kit business, GreenScale Formula is the most specific option.'
            ],
            // SEO
            [
                'question' => 'seo | do you offer seo | seo services | seo help | search engine optimization | kya aap seo karte ho',
                'answer' => 'Yes, but we do not treat SEO as a standalone service. We use SEO as part of a wider growth system, depending on whether it actually supports the business goals.'
            ],
            // Chatbot
            [
                'question' => 'chatbot | do you build chatbots | chatbot services | chatbot help | bot | kya aap chatbot banate ho',
                'answer' => 'Yes, we can help with chatbot strategy and implementation. The goal is not just to add a chatbot, but to make sure it supports lead qualification, customer guidance, and business growth.'
            ],
            // Greetings
            [
                'question' => 'hi | hello | hey | hi there | hello there | salam | assalamualaikum | hello ji | kya haal hai | good morning | good evening | heyy | heya | hii | helloo | howdy | yo | namaste | namaskar',
                'answer' => 'Hi! How can I help you?'
            ],
            // Contact
            [
                'question' => 'contact | contact number | phone number | email | reach you | how to contact | aapse kaise contact karein | contact details | support | help',
                'answer' => 'You can reach us through our Contact page or book a Growth Discovery Call directly from the website.'
            ],
            // Location
            [
                'question' => 'location | where are you based | office | headquarters | address | kahan ho | office kahan hai | where are you located',
                'answer' => 'We work with clients globally. Our team operates remotely, so we can serve businesses worldwide.'
            ],
            // Results & Effectiveness
            [
                'question' => 'results | effectiveness | how effective | case studies | success stories | previous work | past clients | kitna effective hai | kya results aate hain | success rate | kya kaam karta hai | examples | portfolio | proof | yeh sab kitna effective hai | is se fayda hota hai',
                'answer' => 'We focus on making growth more consistent, not just faster. Results vary by business, but the goal is always the same: build a system where each part reinforces the other so growth becomes more predictable and sustainable over time.'
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
