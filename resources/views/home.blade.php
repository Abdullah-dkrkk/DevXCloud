@extends('layouts.app')

@section('content')

    <!-- Homepage - Hero section -->
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="px-0 col-lg-6 d-flex align-items-start justify-content-center flex-column">
                    <h1 class="theme__color-secondary">Custom AI Growth <br> Engines Built Around <br> Your Business</h1>
                    <p>DevXCloud designs fully tailored systems powered by <br> strategy AI and real-time data made for business that <br> want more tha just another agency. </p>
                    <div class="button-wrapper d-flex align-items-center justify-content-start gap-12">
                        <button class="theme__btn">Discover our Growth Engine</button>
                        <button class="theme__btn-secondary">See The DevX Process</button>
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
    <!-- End -->

    <!-- Homepage - Explore Growth Engine -->
    <section class="explore-growth-engine w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <h2 class="theme__color-secondary text-center">Explore the Growth Engines Powering Modern <br> Digital Brands </h2>
                    <p class="main-para text-center">Each system is custom built to your stage business model and market integrating AI automation and <br> strategy to drive scalable results.</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center gap-24 cards-wrapper flex-nowrap">
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-4">
                    <img src="{{ asset('illustrations/i-green-scale-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle">
                        <img src="{{ asset('illustrations/i-green-scale-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center">GreenScale Formula™</h3>
                    <p class="text-center">Reduce waste, retain subscribers, and scale with AI-powered bundle planning.</p>
                    <a href="javascript:void(0);" class="theme__btn d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-1">
                    <img src="{{ asset('illustrations/i-commerce-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle">
                        <img src="{{ asset('illustrations/i-commerce-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center">Commerce AI</h3>
                    <p class="text-center">Boost AOV, retention, and personalization with a smart eCommerce system.</p>
                    <a href="javascript:void(0);" class="theme__btn d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-2">
                    <img src="{{ asset('illustrations/i-launch-pad-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle">
                        <img src="{{ asset('illustrations/i-launch-pad-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center">LaunchPadAI</h3>
                    <p class="text-center">Launch smarter with predictive analytics, UX optimization, and AI onboarding</p>
                    <a href="javascript:void(0);" class="theme__btn d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-3">
                    <img src="{{ asset('illustrations/i-scale-cloud-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle d-flex align-items-center justify-content-center">
                        <img src="{{ asset('illustrations/i-scale-cloud-ai-icon.svg') }}" alt="" class="img-fluid" style="margin-top:-6px;">
                    </div>
                    <h3 class="text-center">ScaleCloud</h3>
                    <p class="text-center">Scale your SaaS with smart automation, integrations, and real-time performance insights.</p>
                    <a href="javascript:void(0);" class="theme__btn d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-1">
                    <img src="{{ asset('illustrations/i-commerce-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle">
                        <img src="{{ asset('illustrations/i-elitescale-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center">EliteScale</h3>
                    <p class="text-center">For high-revenue brands expanding through data, A/B testing, and innovation systems.</p>
                    <a href="javascript:void(0);" class="theme__btn d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                    </a>
                </div>
            </div>
            <div class="row bottom-section d-flex align-items-center justify-content-between">
               <div class="col d-inline-flex align-items-start justify-content-center flex-column">
                    <h3>Not sure which growth engine is right for you?</h3>
                    <p class="text-center">We’ll help you choose the best system based on your business stage and goals.</p>
                    <button class="theme__btn">Discover our Growth Engine</button>
               </div>
               <div class="col d-inline-flex align-items-center justify-content-end">
                    <img src="{{ asset('images/robot-image.png') }}" alt="" class="img-fluid">
               </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Here’s How We Build Your Custom Growth Engine -->
    <section class="how-we-build">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Here’s How We Build Your Custom Growth Engine</h2>
                <p class="text-center head-para mx-auto">From strategic discovery to execution and optimization everything we do is purpose built to move your business forward powered by data and AI.</p>
            </div>
            <div class="container curved-section-wrapper">
                <style>
                    .curved-section-wrapper .col {
                        padding-right: 0px;
                        padding-left: 0px; 
                    }
                    .curved-section-wrapper .col .main-holder {
                        height: 200px; 
                    }
                    .curved-section-wrapper div.counter {
                        height: 50px;
                        width: 50px;
                        transform:scale(1.2);
                        border-radius: 100px;
                        font-family:"Plus Jakarta Sans", sans-serif;
                        color:white;
                        background:#0176d3;
                        position:relative;
                        top: -22px; 
                        z-index: 2;
                    }
                    .curved-section-wrapper .first-wrapper {
                        position:relative;
                    }
                    .curved-section-wrapper .overlay-circle {
                        position:absolute;
                        min-width: 100%;
                        min-height: 286px;
                        border-radius: 50%;
                        top: 0px;
                        border:.15em dashed #00000063;
                    }
                    .curved-section-wrapper .second-wrapper {
                        background:white;
                        z-index: 1;
                    }
                    .curved-section-wrapper .row .col:last-child .overlay-second-half {
                        position:absolute;
                        right: 0px;
                        background:white;
                        min-height: 100% !important;
                    }
                    .curved-section-wrapper .row .col:first-child .overlay-first-half {
                        position:absolute;
                        left: 0px;
                        background:white;
                        min-height: 100% !important;
                    }
                    .curved-section-wrapper .row .col:first-child .overlay-second-half {
                        position:absolute;
                        right: 0px;
                        min-height: 100% !important;
                    }
                    .curved-section-wrapper .overlay-circle.override {
                        top: -174px;
                        width: calc(100% + 26px);
                    }
                    .curved-section-wrapper div.counter.override {
                        top: 28px;
                    }

                    /* for handeling the border radius of the .overlay-circle circles */

                    /* first column */
                    .curved-section-wrapper .row .col:nth-child(1) .second-wrapper {
                        position:relative;
                        bottom: -8px;
                        border-radius: 18px;
                        min-height: 104px;
                        border-top-right-radius: 25px;
                    }
                    .curved-section-wrapper .row .col:nth-child(1) .overlay-circle {
                        border-bottom:none !important;
                    }
                    .curved-section-wrapper .row .col:nth-child(1) .overlay-second-half {
                        background: linear-gradient(to bottom, transparent 0%, transparent 50%, #ffffff 50%, #ffffff 100%);
                    }

                    /* third column */
                    .curved-section-wrapper .row .col:nth-child(3) .second-wrapper {
                        background: linear-gradient(to bottom, transparent 0%, transparent 0%, #ffffff 22%, #ffffff 100%);
                    }
                    .curved-section-wrapper .row .col:nth-child(3) .overlay-second-half {
                        min-width: 100% !important;
                        min-height: 50% !important;
                        bottom: 0px !important;
                        background:white !important;
                        position:absolute !important;
                    }
                    .curved-section-wrapper .row .col:nth-child(3) .second-wrapper {
                        position:relative;
                        bottom: -8px;
                        border-radius: 18px;
                        min-height: 104px;
                    }

                    /* second column */
                    .curved-section-wrapper .row .col:nth-child(2) .overlay-second-half {
                        position: absolute;
                        min-width: calc(100% + 25px);
                        height: 234px;
                        top: -3px;
                        background: white;
                        border: none;
                        border-bottom-right-radius: 50%;
                        border-bottom-left-radius: 50%;
                    }

                    /* fourth column */
                    .curved-section-wrapper .row .col:nth-child(4) .overlay-second-half {
                        position: absolute;
                        min-width: calc(100% + 25px);
                        height: 240px;
                        top: -4px;
                        background: white;
                        border: none;
                        border-bottom-right-radius: 50%;
                        border-bottom-left-radius: 50%;
                    }

                    /* fifth column */
                    .curved-section-wrapper .row .col:nth-child(5) .overlay-first-half {
                        z-index: 1;
                        min-height: 100%;
                        min-width: 50%;
                        background:white;
                        right: 0px;
                        position:absolute;
                    }
                    .curved-section-wrapper .row .col:nth-child(5) .overlay-second-half {
                        min-width: 100% !important;
                        min-height: 50% !important;
                        bottom: 0px;
                        background:white !important;
                        position:absolute !important;
                    }
                    body .curved-section-wrapper .row .col:nth-child(5) .second-wrapper {
                        border-top-left-radius: 35px;
                    }

                    /* .curved-section-wrapper .row .col:nth-child(2) .overlay-circle{
                        border-top-right-radius: 0px !important;
                        border-top-left-radius: 0px !important;
                    }
                    .curved-section-wrapper .row .col:nth-child(3) .overlay-circle{
                        border-bottom-right-radius: 0px !important;
                        border-bottom-left-radius: 0px !important;
                    }
                    .curved-section-wrapper .row .col:nth-child(4) .overlay-circle{
                        border-top-right-radius: 0px !important;
                        border-top-left-radius: 0px !important;
                    }
                    .curved-section-wrapper .row .col:nth-child(5) .overlay-circle{
                        border-bottom-right-radius: 0px !important;
                        border-bottom-left-radius: 0px !important;
                    } */
                </style>
                <div class="row">
                    <!-- first column -->
                    <div class="col">
                        <div class="d-flex main-holder align-items-center justify-content-center flex-column">
                            <div class="first-wrapper w-100 h-50 d-flex align-items-start justify-content-center">
                                <div class="counter d-flex align-items-center justify-content-center">
                                    01
                                </div>
                                <div class="overlay-circle d-flex align-items-center justify-content-center">
                                    <div class="overlay-first-half w-50"></div>
                                    <div class="overlay-second-half w-50"></div>
                                </div>
                            </div>
                            <div class="second-wrapper w-100 h-50 d-flex align-items-start justify-content-center">
                                <img src="{{ asset('illustrations/i-growth-strategy-discovery.svg') }}" alt="Growth Strategy Discovery" class="img-fluid" height="80" width="80">
                            </div>
                        </div>
                    </div>
                    <!-- second column -->
                    <div class="col">
                        <div class="d-flex main-holder align-items-center justify-content-center flex-column-reverse">
                            <div class="first-wrapper w-100 h-50 d-flex align-items-end justify-content-center">
                                <div class="counter override d-flex align-items-center justify-content-center">
                                    02
                                </div>
                                <div class="overlay-circle override d-flex align-items-center justify-content-center">
                                    <div class="overlay-first-half w-50"></div>
                                    <div class="overlay-second-half w-50"></div>
                                </div>
                            </div>
                            <div class="second-wrapper w-100 h-50 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('illustrations/i-custom-system-blueprint.svg') }}" alt="Custom System Blueprint" class="img-fluid" height="80" width="80">
                            </div>
                        </div>
                    </div>
                    <!-- third column -->
                    <div class="col">
                        <div class="d-flex main-holder align-items-center justify-content-center flex-column">
                            <div class="first-wrapper w-100 h-50 d-flex align-items-start justify-content-center">
                                <div class="counter d-flex align-items-center justify-content-center">
                                    03
                                </div>
                                <div class="overlay-circle d-flex align-items-center justify-content-center">
                                    <div class="overlay-first-half w-50"></div>
                                    <div class="overlay-second-half w-50"></div>
                                </div>
                            </div>
                            <div class="second-wrapper w-100 h-50 d-flex align-items-start justify-content-center">
                                <img src="{{ asset('illustrations/i-smart-implementation.svg') }}" alt="Smart Implementation" class="img-fluid" height="80" width="80">
                            </div>
                        </div>
                    </div>
                    <!-- fourth column -->
                    <div class="col">
                        <div class="d-flex main-holder align-items-center justify-content-center flex-column-reverse">
                            <div class="first-wrapper w-100 h-50 d-flex align-items-end justify-content-center">
                                <div class="counter override d-flex align-items-center justify-content-center">
                                    04
                                </div>
                                <div class="overlay-circle override d-flex align-items-center justify-content-center">
                                    <div class="overlay-first-half w-50"></div>
                                    <div class="overlay-second-half w-50"></div>
                                </div>
                            </div>
                            <div class="second-wrapper w-100 h-50 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('illustrations/i-live-optimization-and-reporting.svg') }}" alt="Live Optimization & Reporting" class="img-fluid" height="80" width="80">
                            </div>
                        </div>
                    </div>
                    <!-- fifth column -->
                    <div class="col">
                        <div class="d-flex main-holder align-items-center justify-content-center flex-column">
                            <div class="first-wrapper w-100 h-50 d-flex align-items-start justify-content-center">
                                <div class="counter d-flex align-items-center justify-content-center">
                                    05
                                </div>
                                <div class="overlay-circle d-flex align-items-center justify-content-center">
                                    <div class="overlay-first-half w-50"></div>
                                    <div class="overlay-second-half w-50"></div>
                                </div>
                            </div>
                            <div class="second-wrapper w-100 h-50 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('illustrations/i-scale-or-extend.svg') }}" alt="Scale or Extend" class="img-fluid" height="80" width="80">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cards-row">
                <div class="col wrapper-col">
                    <div class="col custom-col-1 d-flex align-items-center justify-content-start flex-column">
                        <img src="{{ asset('illustrations/i-growth-strategy-discovery.svg') }}" alt="Growth Strategy Discovery" class="img-fluid" height="80" width="80">
                        <h5 class="text-center">Growth Strategy Discovery</h5>
                        <p class="text-center">We start with deep research into your goals, blockers, competition, and market.</p>
                    </div>
                </div>
                <div class="col wrapper-col">
                    <div class="col custom-col-2 d-flex align-items-center justify-content-start flex-column">
                        <img src="{{ asset('illustrations/i-custom-system-blueprint.svg') }}" alt="Custom System Blueprint" class="img-fluid" height="80" width="80">
                        <h5 class="text-center">Custom System Blueprint</h5>
                        <p class="text-center">
                            Based on your needs, we design a fully personalized system AI flows, automation, dashboards, and more.
                        </p>
                    </div>
                </div>
                <div class="col wrapper-col">
                    <div class="col custom-col-3 d-flex align-items-center justify-content-start flex-column">
                        <img src="{{ asset('illustrations/i-smart-implementation.svg') }}" alt="Smart Implementation" class="img-fluid" height="80" width="80">
                        <h5 class="text-center">Smart Implementation</h5>
                        <p class="text-center">
                            We bring your system to life from campaigns and automations to personalization and SEO.
                        </p>
                    </div>
                </div>
                <div class="col wrapper-col">
                    <div class="col custom-col-4 d-flex align-items-center justify-content-start flex-column">
                        <img src="{{ asset('illustrations/i-live-optimization-and-reporting.svg') }}" alt="Live Optimization & Reporting" class="img-fluid" height="80" width="80">
                        <h5 class="text-center">Live Optimization & Reporting</h5>
                        <p class="text-center">
                            You get real-time dashboards, weekly reviews, and AI-based recommendations to keep improving.
                        </p>
                    </div>
                </div>
                <div class="col wrapper-col">
                    <div class="col custom-col-5 d-flex align-items-center justify-content-start flex-column">
                        <img src="{{ asset('illustrations/i-scale-or-extend.svg') }}" alt="Scale or Extend" class="img-fluid" height="80" width="80">
                        <h5 class="text-center">Scale or Extend</h5>
                        <p class="text-center">
                            As your business evolves, we help expand your system adding features, automations, and verticals as needed.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row robot-row" style="display:none;">
                <div class="col d-flex align-items-center justify-content-center flex-column">
                    <img src="{{ asset('images/robot-image.png') }}" alt="Robot Image" height="500" width="500">
                    <div class="d-flex align-items-center flex-column justify-content-center">
                        <h3 class="text-center">Want a custom growth system tailored to your business?</h3>
                        <button class="theme__btn">Discover our Growth Engine</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Why Founders Trust -->
    <section class="why-founders">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Why Founders Trust the DevXCloud Approach</h2>
                <p class="text-center head-para mx-auto">
                    Our growth systems are designed to solve real problems built for founders who want clarity, control, and performance at scale.
                </p>
            </div>
            <div class="row mb-2 cards-wrapper">
                <div class="col-lg-6 mb-4">
                    <div class="inner-column border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/strategy-first-foundation.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start">Strategy-First <br> Foundation</h3>
                            <p class="text-start">
                                No generic service bundles we start with deep analysis and real objectives.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="inner-column border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/custom-systems.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start">Custom Systems, Not <br> Templates</h3>
                            <p class="text-start">
                                No generic service bundles we start with deep analysis and real objectives.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-column border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/transpraency-from-day-one.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start">Transparency From <br> Day One</h3>
                            <p class="text-start">
                                No generic service bundles we start with deep analysis and real objectives.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-column border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/build-to-scale-with-you.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start">Built to Scale <br> With You</h3>
                            <p class="text-start">
                                No generic service bundles we start with deep analysis and real objectives.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center d-none">
                <h4 class="text-center">Ready to build your growth engine?</h4>
                <div class="button-wrapper d-flex align-items-center justify-content-center">
                    <button class="theme__btn">Let's talk strategy</button>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Powered by trusted platforms -->
    <section class="trusted-platforms">
        <div class="container">
            <h2>Powered by trusted platforms</h2>

            <div class="owl-carousel trusted-carousel">
                <div class="item">
                    <div class="inner-col border">
                        <img src="{{ asset('images/shopify.svg') }}" alt="Shopify" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col border">
                        <img src="{{ asset('images/klaviyo.svg') }}" alt="Klaviyo" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col border">
                        <img src="{{ asset('images/meta.svg') }}" alt="Meta" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col border">
                        <img src="{{ asset('images/chatgpt.svg') }}" alt="Chatgpt" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col border">
                        <img src="{{ asset('images/brown-chart.svg') }}" alt="Brown Chart" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col border">
                        <img src="{{ asset('images/webflow.svg') }}" alt="Webflow" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col border">
                        <img src="{{ asset('images/random-square.svg') }}" alt="Random Square" height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Explore the Growth Engines -->
    <section class="explore">
        <div class="container">
            <div class="row mx-auto">
                <h2 class="text-center">
                    Explore the Growth Engines in Action
                </h2>
                <p class="text-center">
                    Which one fits your business best? Dive deeper into how each engine works and what problems it solves so you can scale smarter, not louder.
                </p>
            </div>
            <div class="row mx-auto">
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-green-scale-ai-icon.svg') }}" alt="Random Square" height="100" width="100">    
                        <h3>GreenScale Formula™</h3>
                        <p>For ethical or plant-based brands scaling smarter with bundle optimization and retention flows.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="theme__btn">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-commerce-ai-icon.svg') }}" alt="Random Square" height="100" width="100">        
                        <h3>CommerceAI</h3>
                        <p>For eCommerce brands scaling with personalization, bundling, and smart inventory.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="theme__btn">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-launch-pad-ai-icon.svg') }}" alt="Random Square" height="100" width="100">    
                        <h3>LaunchPadAI</h3>
                        <p>For founders launching smarter with AI onboarding, UX, and predictive dashboards.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="theme__btn">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 offset-2">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-scale-cloud-ai-icon.svg') }}" alt="Random Square" height="100" width="100">    
                        <h3>ScaleCloud</h3>
                        <p>For SaaS companies automating infrastructure, reporting, and real-time optimization.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="theme__btn">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-elitescale-ai-icon.svg') }}" alt="Random Square" height="100" width="100">    
                        <h3>EliteScale</h3>
                        <p>For high-revenue brands expanding through data, A/B testing, and innovation systems.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="theme__btn">Explore the System</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Ready To build -->
    <section class="ready">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-7 d-flex align-items-start justify-content-center">
                    <div class="inner-col d-flex flex-column align-items-start justify-content-center">
                        <h2>Ready to Build Your <br> Growth Engine?</h2>
                        <p class="text-start">
                            We don’t sell random services. We build systems designed to grow with you powered by AI, personalization,and strategy.
                        </p>
                        <button class="theme__btn">Let’s Build It Together</button>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/robot-image.png') }}" alt="Robot With BG" width="350" height="350">
                </div>
            </div>
        </div>
    </section>
    <!-- End -->
     
@endsection