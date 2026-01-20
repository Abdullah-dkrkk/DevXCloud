@extends('layouts.app')

@section('content')
    <!-- launchpad ai - hero section -->
    <section class="devx__launchpad-hero-section">
        <div class="container">
            <div class="row d-flex flex-lg-row flex-column-reverse">
                <div class="col-lg-6 px-0 d-flex align-items-lg-start align-items-center justify-content-center flex-column">
                    <h1 class="mb-2 devx__color-primary">Custom-Built Launch <br> Engine for Early-Stage <br> Startups</h1>
                    <p>LaunchPadAI combines tailored startup strategy with <br> intelligent automation, delivering positioning, traction, <br> and scale in one complete system.</p>
                    <div class="button-wrapper d-flex align-items-center justify-content-start gap-12">
                        <button class="first-button text-white devx__btn-primary">Build My Launch Plan</button>
                        <button class="second-button devx__btn-secondary bg-white">See How It Works</button>
                    </div>
                </div>
                <div class="col-lg-6 px-0 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/launchpad-ai/launchpad-ai-hero-image.png') }}" alt="Lanchpad AI Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- launchpad ai - hero section ends here -->

    <!-- launchpad ai - build for founders -->
    <section class="devx__launchpad-build-for-founders">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <div class="first-wrapper">
                        <img src="{{ asset('images/launchpad-ai/bff-main-img.png') }}" alt="Build For Founders Main Image" class="img-fluid">
                    </div>
                    <div class="second-wrapper d-flex align-items-start justify-content-center flex-column">
                        <h2 class="mb-lg-2 mb-3 devx__color-primary">Built for Founders Who Want <br> More Than Just a Website</h2>
                        <p>Startups don’t fail from lack of passion; they fail from launching <br> without a plan.</p>
                        <p>We help you map your brand, define your offer, and launch with <br> a strategy so you can grow with confidence from day one.</p>
                        <button class="devx__btn-primary">
                            Let’s Build It
                        </button>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- launchpad ai - build for founders section ends here -->

    <!-- Explore How LaunchPad AI turns -->
    <section class="devx__launchpad-explore-how">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="devx__color-primary text-center">Explore How LaunchPadAI Turns Your Startup <br> into a Launch Machine</h2>
                    <p class="mt-2 mb-sm-5 mb-4 pb-sm-0 pb-2 text-center">LaunchPadAI uses a 5-phase blueprint to map your brand, build your core systems, plan <br> your strategy, and launch with confidence not guesswork.</p>
                </div>
            </div>
        </div>
        <div class="container main-five-cards-wrapper">
            <div class="row">
                <div class="col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper first d-flex align-items-center justify-content-start">
                        <img src="{{ asset('images/launchpad-ai/explore-how-first.svg') }}" alt="Explore How First" class="img-fluid">
                        <div class="content-box">
                            <h3>Strategy & <br> Brand Foundation</h3>
                            <p class="mb-0">Define your USP, audience, <br> and market position with <br> precision.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper second d-flex align-items-center justify-content-start">
                        <img src="{{ asset('images/launchpad-ai/explore-how-second.svg') }}" alt="Explore How Second" class="img-fluid">
                        <div class="content-box">
                            <h3>Digital Build + <br> AI Automation</h3>
                            <p class="mb-0">Create your website, <br> chatbot, and launch-ready <br> backend.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper third d-flex align-items-center justify-content-start">
                        <img src="{{ asset('images/launchpad-ai/explore-how-third.svg') }}" alt="Explore How Third" class="img-fluid">
                        <div class="content-box">
                            <h3>Strategic <br> Launch Plan</h3>
                            <p class="mb-0">Plan your funnel, messaging, <br> and multi-channel rollout.</p>
                        </div>
                    </div>
                </div>
                <div class="offset-2 col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper fourth d-flex align-items-center justify-content-start">
                        <img src="{{ asset('images/launchpad-ai/explore-how-fourth.svg') }}" alt="Explore How Fourth" class="img-fluid">
                        <div class="content-box">
                            <h3>Content & <br> Optimization</h3>
                            <p class="mb-0">Craft founder-led content <br> and test for conversion.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper fifth d-flex align-items-center justify-content-start">
                        <img src="{{ asset('images/launchpad-ai/explore-how-fifth.svg') }}" alt="Explore How Fifth" class="img-fluid">
                        <div class="content-box">
                            <h3>Launch Dashboard <br> & Insights</h3>
                            <p class="mb-0">Track performance and <br> scale with data-driven <br> clarity.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Startups -->
    <section class="devx__launchpad-startups">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-0 d-flex align-items-center justify-content-center">
                    <div class="main-content-wrapper">
                        <h2 class="devx__color-primary">Why Most Startups <br> Launch Blind</h2>
                        <p class="mt-2 mb-0">
                            Most founders believe launching is about having a great idea <br> and a decent-looking website.
                            <br><br>
                            But the truth? Launches fail not because of bad ideas, they <br> fail because there’s no system.
                            <br><br>
                            No positioning. No targeting. No roadmap.
                            <br><br>
                            At LaunchPadAI, we help you skip the guesswork, avoid <br> rookie mistakes, and build a launch engine that’s engineered <br> for traction from day one.
                        </p>
                    </div>
                    <div class="image-cta-wrapper d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('images/launchpad-ai/startups-main-img.png') }}" alt="Startups Main Image" class="img-fluid">
                        <button class="startups-cta-button">Plan Your Launch</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Growth Engine Stack -->
    <section class="devx__launchpad-growth-engine">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="text-white text-center">Explore the LaunchPadAI Growth Engine Stack</h2>
                    <p class="mt-2 mb-5 text-center text-white">
                        See how LaunchPadAI aligns strategy, automation, and data to engineer your <br> startup’s launch success.
                    </p>
                </div>
            </div>
            <div class="row main-rows">
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Brand & Persona <br> Mapping</h3>
                        <p>position your startup with a clear USP and defined customer avatar</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Launch Website <br> & AI Chatbot</h3>
                        <p>position your startup with a clear USP and defined customer avatar</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Funnel Planning + <br> Content Briefs</h3>
                        <p>Strategize your offer flow and prep creator-ready launch content.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Ads Launch <br> Blueprint</h3>
                        <p>Get ad angles, targeting plans, and rollout strategy done for you.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Predictive Launch <br> Metrics</h3>
                        <p>Track KPIs in real-time with custom dashboards and insights.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Conversion <br> A/B Testing</h3>
                        <p>Optimize copy, CTAs, and layouts for early traction and something.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Email & Retargeting <br> Flows</h3>
                        <p>Implement automated follow-ups and launch sequences and something.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">
                        <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" alt="8 Cards Main Img" class="img-fluid">
                        <h3 class="my-3">Strategic Growth <br> Consulting</h3>
                        <p>Ongoing support to adapt and grow post-launch and something.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3 row full cards section -->
    <style>
        section.traction h2 {
            font-size: 40px;
            color: #0F2C4E;
            margin-top: 20px;
            margin-bottom: 16px;
        }
        section.traction .main-para {
            text-align:center;
            line-height: 32px;
        }
        section.traction .content-row {
            padding-top: 60px;
            padding-right: 16px;
            padding-left: 16px;
            padding-bottom: 60px;
        }
        section.traction h4 {
            font-size: 30px;
            line-height: 44px;
        }
    </style>
    <section class="traction">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2>The System Behind Your Traction</h2>
                    <p class="main-para">From funnel strategy to founder-led content, LaunchPadAI equips you with the precise systems that drive <br> growth, conversions, and confidence long after launch day.</p>
                </div>
            </div>

            <!-- first content card -->
            <div class="row content-row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="card-content-wrapper">
                        <h4>Explore How LaunchPadAI Turns Your <br> Startup into a Launch Machine</h4>
                        <p>A founder-first launch framework designed to help you map, build, <br> launch, and grow — with AI support at every step.</p>
                        <div class="smaller-headings d-flex justify-content-center flex-column align-items-start">
                            <div class="content-group">
                                <h5>Strategy & Brand Foundation</h5>
                                <p>Define your USP, audience, and market position with precision.</p>
                            </div>
                            <div class="content-group">
                                <h5>Digital Build + AI Automation</h5>
                                <p>Create your website, chatbot, and launch-ready backend.</p>
                            </div>
                            <div class="content-group">
                                <h5>Strategic Launch Plan</h5>
                                <p>Plan your funnel, messaging, and multi-channel rollout.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/launchpad-ai/content-first.png') }}" class="img-fluid">
                </div>
            </div>

            <!-- second content card -->
            <div class="row content-row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/launchpad-ai/content-first.png') }}" class="img-fluid">
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="card-content-wrapper">
                        <h4>Turn Launch Data Into <br> Smart Decisions</h4>
                        <p>Your launch is only the beginning. We help you test, optimize, and <br> row with a data-first strategy tailored to your brand.</p>
                        <div class="smaller-headings d-flex justify-content-center flex-column align-items-start">
                            <div class="content-group">
                                <h5>Content & Optimization</h5>
                                <p>Craft founder-led content and test for conversion.</p>
                            </div>
                            <div class="content-group">
                                <h5>Launch Dashboard & Insights</h5>
                                <p>Track performance and scale with data-driven clarity.</p>
                            </div>
                            <div class="content-group">
                                <h5>Conversion A/B Testing</h5>
                                <p>Experiment with messaging and offers to drive better results.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- third content card -->
            <div class="row content-row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="card-content-wrapper">
                        <h4>From Traction to Momentum, We’re <br> Built to Scale With You</h4>
                        <p>Whether you're refining your offer or entering new markets, LaunchPadAI <br> gives you the tools, insights, and strategy to grow with intention.</p>
                        <div class="smaller-headings d-flex justify-content-center flex-column align-items-start">
                            <div class="content-group">
                                <h5>Offer Expansion Strategy</h5>
                                <p>Use launch learnings to create irresistible next-tier offers.</p>
                            </div>
                            <div class="content-group">
                                <h5>Channel Diversification</h5>
                                <p>Get help expanding to Meta, Google, LinkedIn, and more.</p>
                            </div>
                            <div class="content-group">
                                <h5>Growth Insights Review</h5>
                                <p>Monthly strategy reports to adjust and scale with precision.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/launchpad-ai/content-first.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- faq section starts from here -->
    <style>
        section.faq-section {
            padding-bottom: 100px;
            background: #ffffff;
        }
        section.faq-section .accordion-body {
            line-height: 32px;
        }
        section.faq-section h2.main-heading{
            font-weight: 700;
            font-style: Bold;
            font-size: 38px;
            line-height: 60px;
            letter-spacing: 0%;
            margin-bottom: 40px;
            padding-top: 50px;
            text-align:center;
        }
        section.faq-section .accordion .accordion-item:not(:last-child) {
            margin-bottom: 10px;
        }
        section.faq-section .accordion-button::after {
            transform:scale(0.8);
        }
        section.faq-section .actual-faq-wrapper {
            max-width: 850px;
            margin:auto;
            padding: 30px;
            background:white;
            border-radius: 20px;
            border: 2px solid #00000026;
        }
        section.faq-section #accordionFlushExample {
            padding-right: 0px;
            padding-left: 0px;
        }
        section.faq-section .accordion-button[aria-expanded="true"] {
            background:#F3F3F3 !important;
            border-bottom: none !important;
        }
        section.faq-section .accordion-button:focus{
            box-shadow:none !important;
        }
        section.faq-section .accordion-item {
            border-bottom:none !important;
        }
        section.faq-section .accordion-body {
            padding-top: 0px !important;
        }
        section.faq-section .accordion-button {
            color: #0F2C4E;
            font-weight: 600;
            padding: 24px !important;
            font-size: 20px;
            line-height: 26px;
            letter-spacing: 0%;
            display:flex;
            box-shadow:none !important;
            border-top-right-radius: 16px !important;
            border-top-left-radius: 16px !important;
            align-items:center;
            justify-content:start;
            gap: 10px;
        }
        section.faq-section .accordion-collapse {
            border-bottom-right-radius: 16px !important;
            background:#F3F3F3 !important;
            border-bottom-left-radius: 16px !important;
        }
    </style>
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="main-heading">FAQs About LaunchPadAI</h2>
                </div>
            </div>
            <div class="row actual-faq-wrapper">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">What makes LaunchPadAI different from typical website agencies?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                We don’t just build websites, we build launch systems. From strategy and funnels to
                                performance dashboards, everything is tailored for growth from day one.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> Can I use LaunchPadAI if I already have a website?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                When you hire freelancers, you often need to manage them closely, align timelines, and coordinate multiple skill sets yourself. Agencies may provide structure, but they can also be rigid, expensive, and slow to adapt.
                                <br><br>
                                CommerceAI removes these bottlenecks by combining technology with expertise. The platform is designed to give you speed, consistency, and measurable results—without you having to chase updates or manage resources on your own.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> Do you work with solo founders or teams?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Results depend on your specific brand and goals, but most businesses see improvements in efficiency and revenue within the first few weeks. The system is designed to learn and optimize continuously, which means your performance keeps improving over time.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> How long does it take to launch with LaunchPadAI?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Setup is usually very quick. Most clients are able to get started within a few days, and the platform guides you step by step so there’s no technical headache.
                                <br><br>
                                Once you’re onboarded, the system begins working immediately in the background, so you don’t lose time waiting for long processes or approvals.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> What if I don’t know my audience or offer yet?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                No heavy management is required. The platform is designed to run with minimal input from you. You’ll have access to dashboards where you can see progress and results, but you don’t have to worry about day-to-day execution.
                                <br><br>
                                That said, you’re always in control. If you want to make adjustments or set specific preferences, the system gives you the flexibility to do so at any time.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> What’s the investment to work with LaunchPadAI?
                            </button>
                        </h2>
                        <div id="flush-collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Yes, absolutely. In fact, smaller brands often see the biggest impact because they can adopt proven strategies quickly without the overhead of building large in-house teams.
                                <br><br>
                                The platform is flexible enough to scale with you as your business grows. Whether you’re just starting or already established, the system adapts to your needs.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq section ends here -->


    <!-- growth section starts from here -->
    <style>
        section.last-banner {
            /* padding-top: 80px;
            padding-bottom: 80px; */
            margin-bottom: 60px;
        }
        section.last-banner a:hover {
            opacity: 0.8;
        }
        section.last-banner .theme__btn{
            font-family:'Bricolage-Grotesque';
            background: #0176D3;
            padding: 18px 26px;
            text-decoration:none;
            color:white;
            letter-spacing: 0.2px;
            font-size: 16px;
            border-radius: 12px;
            outline:none;
            border:none;
            transition:0.3s;
        }
        /* section.last-banner p {
            margin-bottom: 20px;
            font-weight: 500;
            font-style: Medium;
            font-size: 18px;
            line-height: 34px;
            letter-spacing: 0%;
        }
        section.last-banner h3 {
            font-weight: 600;
            font-size: 48px;
            line-height: 58px;
            margin-bottom: 20px;
            letter-spacing: 0%;
        } */
    </style>
    <section class="last-banner">
        <div class="container">
            <div class="row bottom-section d-flex align-items-center justify-content-between">
               <div class="col d-inline-flex align-items-start justify-content-center flex-column">
                    <h3>Ready to Launch <br> Smarter?</h3>
                    <p class="text-center">Let LaunchPadAI guide your startup from idea to <br> growth. Book a free pre-launch strategy session, <br> no pressure, no strings.</p>
                    <button class="theme__btn text-uppercase">Book Your Free Strategy Session</button>
               </div>
               <div class="col d-inline-flex align-items-center justify-content-end">
                    <img src="{{ asset('images/robot-image.png') }}" alt="" class="img-fluid">
               </div>
            </div>
        </div>
    </section>
    <!-- growth section ends here -->
@endsection