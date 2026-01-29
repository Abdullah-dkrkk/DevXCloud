@extends('layouts.app')

@section('content')

    <!-- <div class="main-wrapper-container"> -->
        <!-- commerce ai - hero section -->
        <section class="devx__commerce-hero-section">
            <div class="container">
                <div class="row px-0">
                    <div class="col-lg-6 px-0 d-flex flex-column align-items-start justify-content-center content-section">
                        <h1 class="mb-0 text-white">Custom-Built AI Growth <br> Engine for eCommerce</h1>
                        <p class="text-white">
                            CommerceAI combines custom growth strategy with full-stack <br> AI automation delivering forecasting, personalization, <br> and optimization in one complete system.
                        </p>
                        {{-- <div class="buttons-wrapper d-flex align-items-center justfy-content-center">
                            <button class="theme__btn" href="javascript:void(0);">Get Your Growth Blueprint</button>
                            <a href="javascript:void(0);">Watch Demo</a>
                        </div> --}}
                        <div class="button-wrapper d-flex align-items-center justify-content-start gap-12">
                            <button class="devx__btn-primary">Get Your Growth Blueprint</button>
                            <button class="devx__btn-secondary">Watch Demo</button>
                        </div>
                    </div>
                    <div class="col-lg-6 px-0 d-flex align-items-center justify-content-center">
                        <video class="img-fluid" controls autoplay muted loop style="height: 78%; width: 70%; max-width: 550px; max-height: 300px; margin-left: -50px;">
                            <source src="{{ asset('videos/hero-section-video.mp4') }}" type="video/mp4">
                            Your browser does not support HTML video.
                        </video>
                    </div>
                </div>
            </div>
        </section>

        <!-- commerce ai - commerce ai turns section -->
        <section class="devx__commerce-ai-turns">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center text-center">
                        <h2 class="mb-0 text-white">How CommerceAI Turns Data into Growth</h2>
                        <p class="text-white mb-5 mt-2">
                            Most AI tools automate tasks. Most agencies run ads. But neither builds a system around how your brand actually sells, retains, and grows. CommerceAI is a fully-managed, strategy-first growth engine custom-built for each eCommerce brand. From forecasting inventory to on-site personalization and automated retention flows, every part of the system is tailored to your products, audience, and offers — not pulled from a playbook.
                        </p>
                    </div>
                </div>
                <div class="row cards-wrapper d-flex align-items-center justify-content-center mx-auto">
                    <div class="col-lg-4">
                        <div class="inner-wrapper">
                            <div class="header flex-column d-flex align-items-start justify-content-center">
                                <img src="{{ asset('images/commerce-ai/strategic-foundation-first.svg') }}" alt="">
                                <h3 class="mb-0 text-white">Strategic Foundation First</h3>
                            </div>
                            <div class="content text-white">
                                Every store is different. So before we automate anything, we start with a custom strategy built around your products, customers, and conversion paths.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="inner-wrapper">
                            <div class="header flex-column d-flex align-items-start justify-content-center">
                                <img src="{{ asset('images/commerce-ai/adaptive-ai-infrastructure.svg') }}" alt="">
                                <h3 class="mb-0 text-white">Adaptive AI <br> Infrastructure</h3>
                            </div>
                            <div class="content text-white">
                                CommerceAI doesn’t plug in it’s built around your business. From forecasting to personalization, every layer adapts to how your store sells, restocks, and grows.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="inner-wrapper">
                            <div class="header flex-column d-flex align-items-start justify-content-center">
                                <img src="{{ asset('images/commerce-ai/ai-powered-growth.svg') }}" alt="">
                                <h3 class="mb-0 text-white">AI-Powered Growth <br> Execution</h3>
                            </div>
                            <div class="content text-white">
                                You don’t need another report or a half-working flow. CommerceAI delivers a fully-managed system that acts on your data and keeps improving every week.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--  commerce ai - inside the commerce ai banner -->
        <section class="devx__commerce-inside-commerce-ai-banner">
            <div class="container">
                <div class="row px-0">
                    <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center text-center">
                        <h2 class="mb-0 mt-sm-3 mt-4 text-white">Inside the CommerceAI Growth Engine</h2>
                        <p class="mt-2 mb-sm-5 mb-4 inside-the-commerce-text text-white">
                            Explore the 5-phase system designed to help your eCommerce store grow smarter — through strategic personalization, AI automation, and scalable execution.
                        </p>
                    </div>
                </div>
                <div class="row inside-section-row">
                    <div class="col">
                        <div class="inner-wrapper">
                            <img src="{{ asset('images/commerce-ai/commerce-1.svg') }}" alt="Commerce 1">
                            <h3 class="text-white text-center mb-2">Strategic Foundation</h3>
                            <p>We define your USP, uncover your top-performing products, and map out your ideal customers so your growth starts with strategy, not guesswork.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-wrapper">
                            <img src="{{ asset('images/commerce-ai/commerce-2.svg') }}" alt="Commerce 1">
                            <h3 class="text-white text-center mb-2">Custom AI Growth Blueprint</h3>
                            <p>We design a data-backed system tailored to your store including predictive inventory, bundle logic, and personalization that actually converts.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-wrapper">
                            <img src="{{ asset('images/commerce-ai/commerce-3.svg') }}" alt="Commerce 1">
                            <h3 class="text-white text-center mb-2">Marketing Strategy Setup</h3>
                            <p>We build conversion-focused funnels, ad angles, and retention offers aligned with your audience and ready to scale across channels.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-wrapper">
                            <img src="{{ asset('images/commerce-ai/commerce-4.svg') }}" alt="Commerce 1">
                            <h3 class="text-white text-center mb-2">Tech Stack & Execution Layer</h3>
                            <p>We automate the core of your growth engine from email flows to personalization using tools that adapt to your store in real time.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="inner-wrapper">
                            <img src="{{ asset('images/commerce-ai/commerce-5.svg') }}" alt="Commerce 1">
                            <h3 class="text-white text-center mb-2">Dashboard Reporting & Optimization</h3>
                            <p>We define your USP, uncover your top-performing products, and map out your ideal customers so your growth starts with strategy, not guesswork.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> 
    <!-- </div> -->

    <section class="devx__commerce-what-makes-difference">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center">What Makes CommerceAI Different</h2>
                    <p class="what-makes-difference-text mt-2 text-center mx-auto">Most agencies hand you a single piece of the puzzle — CommerceAI builds the full growth engine, tailored around your strategy, data, and customers.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="devx__commerce-what-makes-difference inner-bg-holder">
        <div class="row difference-cards-wrapper">
            <div class="col orange">
                <h3 class="mb-2">Strategy <br> Before Systems</h3>
                <p class="mb-0">Unlike agencies with a menu of random services, we build your growth engine around one thing: your unique brand strategy.</p>
            </div>
            <div class="col skyblue">
                <h3 class="mb-2">Custom AI <br> Over Templates</h3>
                <p class="mb-0">No templates. No one-size-fits-all playbooks. Every automation is built around your actual store and customers.</p>
            </div>
            <div class="col green">
                <h3 class="mb-2">Retention Over <br> Random Clicks</h3>
                <p class="mb-0">Others focus on clicks. We engineer flows, offers, and bundles to keep customers coming back automatically.</p>
            </div>
            <div class="col blue">
                <h3 class="mb-2">Execution Without <br> the Guesswork</h3>
                <p class="mb-0">No dashboards to learn. No freelancers to juggle. We run the full engine so you can run your business.</p>
            </div>
        </div>
    </section>
    <!-- what makes different section ends here -->

    <!-- engine stack section starts from here -->
    <section class="devx__commerce-engine-stack">
        <div class="container">
            <div class="row engine-stack-first-row mb-0 d-flex align-items-center justify-content-center text-center">
                <div class="col-lg-12 flex-column d-flex align-items-center justify-content-center text-center">
                    <h2 class="mb-3">Explore the CommerceAI Growth Engine Stack</h2>
                    <p>See how CommerceAI powers your store’s growth with strategy, automation, and real-time insight.</p>
                </div>
            </div>
            <div class="row actual-grid mx-auto">
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-1.svg') }}" width="60" height="60">
                    <h3>Predictive Inventory Analytics</h3>
                    <p>Forecast demand and reduce inventory waste.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-2.svg') }}" width="60" height="60">
                    <h3>Funnel Strategy & Ad Angle Mapping</h3>
                    <p>Turn buyer personas into high-converting ad strategies.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-3.svg') }}" width="60" height="60">
                    <h3>AI Personalization Engine</h3>
                    <p>Deliver dynamic offers based on real-time user behavior.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-4.svg') }}" width="60" height="60">
                    <h3>Automated Email Flows</h3>
                    <p>Recover carts, re-engage buyers, and boost retention on autopilot.</p>
                </div>
                <!-- second row -->
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-5.svg') }}" width="60" height="60">
                    <h3>Launch Plan + Offer Positioning</h3>
                    <p>Align products with messaging for smarter market entry.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-6.svg') }}" width="60" height="60">
                    <h3>Real-Time Perfor-mance Dashboards</h3>
                    <p>Track revenue, retention, and campaign ROI in one place.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-7.svg') }}" width="60" height="60">
                    <h3>On-Site Optimization & UX Fixes</h3>
                    <p>Enhance speed, structure, and mobile experience.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('images/commerce-ai/engine-stack-8.svg') }}" width="60" height="60">
                    <h3>A/B Testing & Conti-nuous Optimization</h3>
                    <p>Test ads, CTAs, and layouts to keep scaling up.</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <a href="javascript:void(0);" class="theme__btn">Get Your Custom Growth Blueprint</a>
            </div>
        </div>
    </section>
    <!-- engine stack section ends here -->

    <!-- strategy section starts from here -->
    <section class="devx__commerce-strategy-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column mx-auto align-items-center justify-content-center">
                    <h2 class="mb-2 text-center">How We Turn Strategy into Scalable Growth</h2>
                    <p class="main-text text-center">Every step is built to uncover, activate, and scale your brand’s growth potential.</p>
                </div>
            </div>
            <div class="row strategy-grid">
                <div class="col">
                    <img src="{{ asset('illustrations/i-step-1.svg') }}">
                    <span class="step">Step 1</span>
                    <h3>Growth <br> Discovery Call</h3>
                    <p>We start with a deep-dive call to uncover your store’s strengths, gaps, and growth blockers — building the foundation for a custom strategy.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('illustrations/i-step-2.svg') }}">
                    <span class="step">Step 2</span>
                    <h3>Custom Growth Blueprint</h3>
                    <p>We start with a deep-dive call to uncover your store’s strengths, gaps, and growth blockers — building the foundation for a custom strategy.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('illustrations/i-step-3.svg') }}">
                    <span class="step">Step 3</span>
                    <h3>Stack Setup + Smart Systems</h3>
                    <p>We install predictive tools, automation flows, conversion-boosting systems, and your marketing stack everything aligned to your growth blueprint.</p>
                </div>
                <div class="col">
                    <img src="{{ asset('illustrations/i-step-4.svg') }}">
                    <span class="step">Step 4</span>
                    <h3>Weekly Optimization + Reporting</h3>
                    <p>Every week, we test, review, and improve refining campaigns, updating dashboards, and helping you scale smarter with data and other metrics.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- strategy section ends here -->

    <!-- faq section starts from here -->
    <section class="devx__commerce-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-sm-5 mb-4 text-center devx__color-primary">FAQs About CommerceAI</h2>
                </div>
            </div>
            <div class="row actual-faq-wrapper">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> Is this just another agency with a list of services?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Not really. While agencies often provide a broad menu of services, our approach is built around outcomes rather than just a checklist. Instead of offering generic packages, we focus on creating a solution tailored to your goals.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> How is CommerceAI different from hiring freelancers or agencies?
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
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> What kind of results can I expect?
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
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> How long does setup take?
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
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> Do I need to manage anything myself?
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
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> Can this work for new or smaller brands?
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

                    <!-- FAQ 7 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20"> Is there a long-term contract?
                            </button>
                        </h2>
                        <div id="flush-collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                No, there isn’t. You can use the service on a month-to-month basis without being locked into a long contract. This way you stay completely in control of your investment.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- faq section ends here -->

    <!-- growth section starts from here -->
    <section class="devx__home-ready">
        <div class="container px-0">
            <div class="row devx__bottom-section d-flex align-items-center justify-content-between">
                <div class="col d-flex align-items-start justify-content-center flex-column">
                    <h2 class="mb-2 devx__color-primary">Not sure which growth <br> engine is right for you?</h2>
                    <p class="text-start">
                        We’ll help you choose the best system based on your business stage and goals.
                    </p>
                    <button class="devx__btn-primary">Discover our Growth Engine</button>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/robot-image.png') }}" alt="Robot With BG" width="350" height="350">
                </div>
            </div>
        </div>
    </section>
    <!-- growth section ends here -->
@endsection