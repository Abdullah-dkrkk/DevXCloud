@extends('layouts.app')

@section('title', 'Homepage')

@section('content')

    <!-- Homepage - Hero section -->
    <section class="devx__home-hero-section">
        <div class="container">
            <div class="row">
                <div class="px-0 col-lg-6 d-flex align-items-start justify-content-center flex-column">
                    <h1 class="devx__color-primary mb-2">Custom Growth <br> Systems Built Around <br> Your Business</h1>
                    <p>We diagnose what’s holding your growth back, <br> design a clear roadmap, and execute with data, <br> automation, and strategy working as one system.</p>
                    <div class="button-wrapper d-flex align-items-center justify-content-start gap-12">
                        <a href="{{ url('/contact') }}" class="devx__btn-primary">Start Your Growth Diagnosis</a>
                        <a href="#devx__home-explore-growth-engine" class="devx__btn-secondary">Explore Growth Systems</a>
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
    <section class="devx__home-explore-growth-engine w-100" id="devx__home-explore-growth-engine">
        <div class="container px-0">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <h2 class="devx__color-primary text-center">Explore Growth Systems Built for Specific <br> Industries and Outcomes</h2>
                    <p class="main-para text-center mt-2">Each system is purpose-built for a specific industry, starting with diagnosis and ending in <br> execution to deliver clear growth outcomes.</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center gap-24 mt-4 cards-wrapper flex-nowrap">
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-4">
                    <img src="{{ asset('illustrations/i-green-scale-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle mb-4">
                        <img src="{{ asset('illustrations/i-green-scale-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center mb-2">GreenScale Formula™</h3>
                    <p class="text-center">A Custom Growth System Built Specifically for Vegan Meal Kit Brands</p>
                    <a href="{{ url('/greenscale-ai') }}" class="devx__btn-primary d-flex align-items-center justify-content-center gap-10 mb-4">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-1">
                    <img src="{{ asset('illustrations/i-commerce-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle mb-4">
                        <img src="{{ asset('illustrations/i-commerce-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center mb-2">Commerce AI</h3>
                    <p class="text-center">A Custom Growth System Built for All E-Commerce Brands</p>
                    <a href="{{ url('/commerce-ai') }}" class="devx__btn-primary d-flex align-items-center justify-content-center gap-10 mb-4">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-2">
                    <img src="{{ asset('illustrations/i-launch-pad-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle mb-4">
                        <img src="{{ asset('illustrations/i-launch-pad-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center mb-2">LaunchPadAI</h3>
                    <p class="text-center">A Structured Growth Foundation Built for Founders and Early-Stage Businesses</p>
                    <a href="{{ url('/launchpad-ai') }}" class="devx__btn-primary d-flex align-items-center justify-content-center gap- mb-4">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-3">
                    <img src="{{ asset('illustrations/i-scale-cloud-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle mb-4 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('illustrations/i-scale-cloud-ai-icon.svg') }}" alt="" class="img-fluid" style="margin-top:-6px;">
                    </div>
                    <h3 class="text-center mb-2">ScaleCloud</h3>
                    <p class="text-center"> A Scalable Growth Infrastructure Built for SaaS Companies</p>
                    <a href="{{ url('/scalecloud-ai') }}" class="devx__btn-primary d-flex align-items-center justify-content-center gap-10 mb-4">
                        <span>Learn More</span>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-1">
                    <img src="{{ asset('illustrations/i-elitescale-ai-bg.svg') }}" alt="" class="img-fluid">
                    <div class="rounded-circle mb-4">
                        <img src="{{ asset('illustrations/i-elitescale-ai-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                    <h3 class="text-center mb-2">EliteScale</h3>
                    <p class="text-center">An Advanced Growth System Built for High-Revenue Digital Brands</p>
                    <a href="{{ url('/elitescale-ai') }}" class="devx__btn-primary d-flex align-items-center justify-content-center gap-10 mb-4">
                        <span>Learn More</span>
                    </a>
                </div>
            </div>
            <div class="row devx__bottom-section d-flex align-items-center justify-content-between">
               <div class="col d-inline-flex align-items-start justify-content-center flex-column">
                    <h2 class="mb-2 devx__color-primary">Not sure which growth engine is right for you?</h2>
                    <p class="mb-3">We’ll help you figure out the right system based on your business stage and what you’re trying to achieve.</p>
                    <a class="devx__btn-primary" href="{{ url('/contact') }}">Talk to Our Team</a>
               </div>
               <div class="col d-inline-flex align-items-center justify-content-end">
                    <img src="{{ asset('images/robot-image.png') }}" alt="" class="img-fluid">
               </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Here’s How We Build -->
    <section class="devx__home-how-we-build" id="devx__home-how-we-build">
        <div class="container">
            <div class="row">
                <h2 class="text-center devx__color-primary mb-2">Here’s How We Build Your Custom Growth Engine</h2>
                <p class="text-center head-para mb-4 pb-4 mx-auto">From strategic discovery to execution and optimization everything we do is purpose built to move your business forward powered by data and AI.</p>
            </div>
            <div class="container curved-section-wrapper custom-slider">
                <div class="row position-relative">
                    <div class="svg-wrapper position-absolute d-flex align-items-center justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1220 180" width="80%" height="180" fill="none">
                            <path
                                d="
                                M 0 20
                                C 140 20, 165 160, 305 160
                                C 445 160, 470 20, 610 20
                                C 750 20, 775 160, 915 160
                                C 1055 160, 1080 30, 1220 30
                                "
                                stroke="#0176d3"
                                stroke-width="3"
                                stroke-linecap="round"
                                stroke-dasharray="6 10"
                            />
                        </svg>
                    </div>

                    <div class="count-image-wrapper row z-1">

                        <!-- first card along with content and curve -->
                        <div class="col d-flex align-items-center justify-content-start flex-column">
                            <div class="mb-4 first-holder d-flex align-items-center justify-content-center">
                                <div class="count-wrapper d-flex align-items-center justify-content-center">
                                    <h3>01</h3>
                                </div>
                            </div>
                            <div class="mt-4 second-holder">
                                <img src="{{ asset('illustrations/i-growth-strategy-discovery.svg') }}" alt="Growth Strategy Discovery" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="content-wrappe mt-4">
                                <h3 class="text-center mb-2">Growth Strategy Discovery</h3>
                                <p class="text-center mb-3">We start with deep research into your goals, blockers, competition, and market.</p>
                            </div>
                        </div>

                        <!-- second card along with content and curve -->
                        <div class="col d-flex align-items-center justify-content-start flex-column">
                            <div class="mb-4 second-holder">
                                <img src="{{ asset('illustrations/i-custom-system-blueprint.svg') }}" alt="Custom System Blueprint" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="mt-4 first-holder d-flex align-items-center justify-content-center">
                                <div class="count-wrapper d-flex align-items-center justify-content-center">
                                    <h3>02</h3>
                                </div>
                            </div>
                            <div class="content-wrappe mt-4">
                                <h3 class="text-center mb-2">Custom System Blueprint</h3>
                                <p class="text-center mb-3">
                                    Based on your needs, we design a fully personalized system AI flows, automation, dashboards, and more.
                                </p>
                            </div>
                        </div>

                        <!-- third card along with content and curve -->
                        <div class="col d-flex align-items-center justify-content-start flex-column">
                            <div class="mb-4 first-holder d-flex align-items-center justify-content-center">
                                <div class="count-wrapper d-flex align-items-center justify-content-center">
                                    <h3>03</h3>
                                </div>
                            </div>
                            <div class="mt-4 second-holder">
                                <img src="{{ asset('illustrations/i-smart-implementation.svg') }}" alt="Smart Implementation" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="content-wrapper mt-4">
                                <h3 class="text-center mb-2">Smart <br> Implementation</h3>
                                <p class="text-center mb-3">
                                    We bring your system to life from campaigns and automations to personalization and SEO.
                                </p>
                            </div>
                        </div>

                        <!-- fourth card along with content and curve -->
                        <div class="col d-flex align-items-center justify-content-start flex-column">
                            <div class="mb-4 second-holder">
                                <img src="{{ asset('illustrations/i-live-optimization-and-reporting.svg') }}" alt="Live Optimization & Reporting" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="mt-4 first-holder d-flex align-items-center justify-content-center">
                                <div class="count-wrapper d-flex align-items-center justify-content-center">
                                    <h3>04</h3>
                                </div>
                            </div>
                            <div class="content-wrapper mt-4">
                                <h3 class="text-center mb-2">Live Optimization & Reporting</h3>
                                <p class="text-center mb-3">
                                    You get real-time dashboards, weekly reviews, and AI-based recommendations to keep improving.
                                </p>
                            </div>
                        </div>

                        <!-- fifth card along with content and curve -->
                        <div class="col d-flex align-items-center justify-content-start flex-column">
                            <div class="mb-4 first-holder d-flex align-items-center justify-content-center">
                                <div class="count-wrapper d-flex align-items-center justify-content-center">
                                    <h3>05</h3>
                                </div>
                            </div>
                            <div class="mt-4 second-holder">
                                <img src="{{ asset('illustrations/i-scale-or-extend.svg') }}" alt="Scale or Extend" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="content-wrappe mt-4">
                                <h3 class="text-center mb-2">Scale or <br> Extend</h3>
                                <p class="text-center mb-3">
                                    As your business evolves, we help expand your system adding features, automations, and verticals as needed.
                                </p>
                            </div>
                        </div>
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
    <section class="devx__home-why-founders">
        <div class="container">
            <div class="row">
                <h2 class="text-center devx__color-primary">Our Approach to Building Sustainable Growth Systems</h2>
                <p class="text-center head-para mx-auto py-3">
                    We focus on understanding the business first, then designing and executing systems built for long-term growth
                </p>
            </div>
            <div class="row mb-2 cards-wrapper mx-auto">
                <div class="col-lg-6 mb-4">
                    <div class="inner-column gap-20 py-5 px-4 border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/strategy-first-foundation.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start mb-2">Strategy-First <br> Foundation</h3>
                            <p class="text-start">
                                We start by understanding the business model, market, and constraints before deciding what to build, fix, or scale.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="inner-column gap-20 py-5 px-4 border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/custom-systems.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start mb-2">Custom Systems, Not <br> Templates</h3>
                            <p class="text-start">
                                Every system is designed around the specific business, stage, and goals — not pre-built packages or one-size-fits-all frameworks.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-column gap-20 py-5 px-4 border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/transpraency-from-day-one.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start mb-2">Transparency From <br> Day One</h3>
                            <p class="text-start">
                                You get clear visibility into what’s being done, why decisions are made, and how progress is measured from the start.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-column gap-20 py-5 px-4 border d-flex align-items-start justify-content-start">
                        <div class="inner-column-first">
                            <img src="{{ asset('images/build-to-scale-with-you.svg') }}" alt="Strategy First Foundation">
                        </div>
                        <div class="inner-column-second">
                            <h3 class="text-start mb-2">Built to Scale <br> With You</h3>
                            <p class="text-start">
                                Systems are designed to adapt as the business grows, so foundations don’t need to be rebuilt every time priorities change.
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
    <section class="devx__home-trusted-platforms">
        <div class="container">
            <h2 class="text-center mb-4 pb-3 devx__color-primary">
                Powered by trusted platforms
            </h2>

            <div class="trusted-marquee">
                <div class="trusted-marquee__track">
                    <!-- ORIGINAL ITEMS -->
                    <div class="trusted-item">
                        <img src="{{ asset('images/shopify.svg') }}" alt="Shopify" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/klaviyo.svg') }}" alt="Klaviyo" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/meta.svg') }}" alt="Meta" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/chatgpt.svg') }}" alt="Chatgpt" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/brown-chart.svg') }}" alt="Brown Chart" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/webflow.svg') }}" alt="Webflow" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/random-square.svg') }}" alt="Random Square" height="60">
                    </div>

                    <!-- DUPLICATE ITEMS (required for seamless loop) -->
                    <div class="trusted-item">
                        <img src="{{ asset('images/shopify.svg') }}" alt="Shopify" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/klaviyo.svg') }}" alt="Klaviyo" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/meta.svg') }}" alt="Meta" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/chatgpt.svg') }}" alt="Chatgpt" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/brown-chart.svg') }}" alt="Brown Chart" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/webflow.svg') }}" alt="Webflow" height="60">
                    </div>
                    <div class="trusted-item">
                        <img src="{{ asset('images/random-square.svg') }}" alt="Random Square" height="60">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="devx__home-trusted-platforms" style="display:none;">
        <div class="container">
            <h2 class="text-center mb-4 pb-3 devx__color-primary">Powered by trusted platforms</h2>

            <div class="owl-carousel trusted-carousel">
                <div class="item">
                    <div class="inner-col d-flex align-items-center justify-content-center py-3 px-2 border">
                        <img src="{{ asset('images/shopify.svg') }}" alt="Shopify" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col d-flex align-items-center justify-content-center py-3 px-2 border">
                        <img src="{{ asset('images/klaviyo.svg') }}" alt="Klaviyo" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col d-flex align-items-center justify-content-center py-3 px-2 border">
                        <img src="{{ asset('images/meta.svg') }}" alt="Meta" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col d-flex align-items-center justify-content-center py-3 px-2 border">
                        <img src="{{ asset('images/chatgpt.svg') }}" alt="Chatgpt" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col d-flex align-items-center justify-content-center py-3 px-2 border">
                        <img src="{{ asset('images/brown-chart.svg') }}" alt="Brown Chart" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col d-flex align-items-center justify-content-center py-3 px-2 border">
                        <img src="{{ asset('images/webflow.svg') }}" alt="Webflow" height="60" width="60">
                    </div>
                </div>

                <div class="item">
                    <div class="inner-col d-flex align-items-center justify-content-center py-3 px-2 border">
                        <img src="{{ asset('images/random-square.svg') }}" alt="Random Square" height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Explore the Growth Engines -->
    <section class="devx__home-explore">
        <div class="container">
            <div class="row mx-auto">
                <h2 class="text-center devx__color-primary">
                    Explore the Growth Systems
                </h2>
                <p class="text-center mx-auto mt-2 mb-4 pb-3">
                    Each system is designed for a specific type of business and growth stage. Choose the one that fits you to explore it in detail.

                </p>
            </div>
            <div class="row mx-auto">
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-green-scale-ai-icon.svg') }}" alt="Random Square" height="100" width="100" class="mb-2">    
                        <h3 class="py-3">GreenScale Formula™</h3>
                        <p class="text-center">For Vegan Meal Kit Brands</p>
                        <a href="{{ url('/greenscale-ai') }}" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="devx__btn-primary">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-commerce-ai-icon.svg') }}" alt="Random Square" height="100" width="100" class="mb-2">        
                        <h3 class="py-3">CommerceAI</h3>
                        <p class="text-center">For E-Commerce Brands</p>
                        <a href="{{ url('/commerce-ai') }}" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="devx__btn-primary">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-launch-pad-ai-icon.svg') }}" alt="Random Square" height="100" width="100" class="mb-2">    
                        <h3 class="py-3">LaunchPadAI</h3>
                        <p class="text-center">For Founders & Early-Stage Businesses</p>
                        <a href="{{ url('/launchpad-ai') }}" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="devx__btn-primary">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 offset-2">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-scale-cloud-ai-icon.svg') }}" alt="Random Square" height="100" width="100" class="mb-2">    
                        <h3 class="py-3">ScaleCloud</h3>
                        <p class="text-center">For SaaS Companies</p>
                        <a href="{{ url('/scalecloud-ai') }}" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="devx__btn-primary">Explore the System</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-col border d-flex align-items-center flex-column justify-content-center">
                        <img src="{{ asset('illustrations/i-elitescale-ai-icon.svg') }}" alt="Random Square" height="100" width="100" class="mb-2">    
                        <h3 class="py-3">EliteScale</h3>
                        <p class="text-center">For High-Revenue Digital Brands</p>
                        <a href="{{ url('/elitescale-ai') }}" class="d-flex align-items-center justify-content-center explore-the-system">
                            <button class="devx__btn-primary">Explore the System</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End -->

    <!-- Homepage - Ready To build -->
    <section class="devx__home-ready">
        <div class="container px-0">
            <div class="row devx__bottom-section d-flex align-items-center justify-content-between">
                <div class="col d-flex align-items-start justify-content-center flex-column">
                    <!-- <div class="inner-col d-flex flex-column align-items-start justify-content-center"> -->
                        <h2 class="mb-2 devx__color-primary">Ready to Build Your <br> Growth Engine?</h2>
                        <p class="text-start">
                            Let’s start building the right growth system for your business
                        </p>
                        <a class="devx__btn-primary" href="{{ url('/contact') }}">Let’s Build It Together</a>
                    <!-- </div> -->
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/robot-image.png') }}" alt="Robot With BG" width="350" height="350">
                </div>
            </div>
        </div>
    </section>
    <!-- End -->
     
@endsection