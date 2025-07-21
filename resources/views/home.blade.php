@extends('layouts.app')

@section('content')
    <style>
        /* hero section css starts from here */
        .hero-section .theme__btn {
            background: #0176D3;
            color:#ffffff !important;
            border-radius: 10px;
            padding: 10px 14px !important;
            line-height: 24px;
            font-weight: 600;
            font-size: 14px;
            text-transform:uppercase;
            border:none;
        }
        .hero-section .theme__btn-secondary {
            border: 1px solid #0176D3;
            background: white;
            color:#0176D3;
            border-radius: 10px;
            padding: 10px 14px;
            line-height: 24px;
            font-size: 14px;
            font-weight: 600;
            text-transform:uppercase;
        }
        .gap-12 {
            gap: 12px;
        }
        .theme__color-primary {
            color: #239DD2;
        }
        .theme__color-secondary {
            color: #0F2C4E;
        }
        .hero-section h1 {
            font-size: 55px;
            line-height: 64px; 
            margin-bottom: 0px;
        }
        .hero-section {
            padding-top: 60px;
            padding-bottom: 120px;
        }
        .hero-section p {
            font-size: 20px;
            color: #5D5D5D;
            font-weight: 500;
            margin-top: 14px;
            margin-bottom: 26px;
        }
        /* hero section css ends here */


        /* explore growth engine css starts from here */
        .explore-growth-engine {
            /* background: #F7F7F7; */
            padding-top: 80px;
            padding-bottom: 80px;
        }
        .explore-growth-engine h2 {
            font-size: 35px;
        }
        .explore-growth-engine p.main-para {
            font-size: 18px;
            font-weight: 500;
        }
        .gap-18 {
            gap: 18px;
        }
        .explore-growth-engine .cards-wrapper {
            margin-top: 40px;
        }
        .explore-growth-engine .cards-wrapper .col {
            background:#f7f7f7;
            border-radius: 20px;
        }
        .explore-growth-engine .cards-wrapper .rounded-circle {
            height: 120px;
            width: 120px;
            box-shadow: 0px 4px 20px 0px #00000026;
            margin-top: -60px;
            background:white;
            margin-bottom: 28px;
        }
        .explore-growth-engine .cards-wrapper p {
            font-size: 16px;
            padding-right: 10px;
            padding-left: 10px;
            margin-bottom: 60px;
        }
        .explore-growth-engine .cards-wrapper h3 {
            font-size: 20px;
            padding-right: 15px;
            padding-left: 15px;
            margin-bottom: 28px;
            font-weight:bolder;
            font-family:'Montserrat';
        }
        .explore-growth-engine .cards-wrapper .a-image-wrapper {
            padding: 5px 12px;
            border-radius: 8px;
            background:white;
        }
        .explore-growth-engine .cards-wrapper a{
            background: #0052CC;
            border-radius: 14px;
            padding: 10px 10px 10px 14px;
            text-decoration:none;
            color:white;
            margin-bottom: 28px;
        }
        .explore-growth-engine .theme__btn {
            background: #0176D3;
            color:#ffffff !important;
            border-radius: 10px;
            padding: 10px 14px !important;
            line-height: 24px;
            font-weight: 600;
            font-size: 14px;
            text-transform:uppercase;
            border:none;
        }
        .gap-10 {
            gap: 10px;
        }
        .explore-growth-engine .bottom-section p {
            font-size: 18px;
            margin-bottom: 28px;
        }
        .explore-growth-engine .bottom-section h3 {
            font-size: 32px;
            margin-bottom: 28px;
        }
        /* explore growth engine css ends here */
    </style>
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="px-0 col-lg-6 d-flex align-items-start justify-content-center flex-column">
                    <h1 class="theme__color-secondary">Custom AI Growth Engines Built Around Your Business</h1>
                    <p>DevXCloud designs fully tailored systems powered by <br> strategy AI and real-time data made for business that <br> want more tha just another agency. </p>
                    <div class="button-wrapper d-flex align-items-center justify-content-start gap-12">
                        <button class="theme__btn">Discover our Growth Engine</button>
                        <button class="theme__btn-secondary">See The DevX Process</button>
                    </div>
                </div>
                <div class="col-lg-6 px-0">
                    <img src="{{ asset('images/hero-section-image.png') }}" alt="Hero Banner Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <section class="explore-growth-engine w-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-0">
                    <h2 class="theme__color-secondary text-center">Explore the Growth Engines Powering Modern Digital Brands and </h2>
                    <p class="main-para text-center">Each system is custom built to your stage business model and market integrating AI automation and strategy to drive scalable results.</p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center gap-18 cards-wrapper flex-nowrap">
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-1">
                    <img src="{{ asset('images/card-1.png') }}" alt="">
                    <div class="rounded-circle"></div>
                    <h3 class="text-center">Commerce AI</h3>
                    <p class="text-center">Boost AOV, retention, and personalization with a smart eCommerce system.</p>
                    <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                        <div class="a-image-wrapper">
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-2">
                    <img src="{{ asset('images/card-1.png') }}" alt="">
                    <div class="rounded-circle"></div>
                    <h3 class="text-center">LaunchPadAI</h3>
                    <p class="text-center">Launch smarter with predictive analytics, UX optimization, and AI onboarding</p>
                    <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                        <div class="a-image-wrapper">
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-3">
                    <img src="{{ asset('images/card-3.png') }}" alt="">
                    <div class="rounded-circle"></div>
                    <h3 class="text-center">ScaleCloud</h3>
                    <p class="text-center">Scale your SaaS with smart automation, integrations, and real-time performance insights.</p>
                    <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                        <div class="a-image-wrapper">
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-4">
                    <img src="{{ asset('images/card-1.png') }}" alt="">
                    <div class="rounded-circle"></div>
                    <h3 class="text-center">GreenScale Formula™</h3>
                    <p class="text-center">Reduce waste, retain subscribers, and scale with AI-powered bundle planning.</p>
                    <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                        <div class="a-image-wrapper">
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </div>
                    </a>
                </div>
                <div class="col px-0 d-flex flex-column align-items-center justify-content-center theme__col-5">
                    <img src="{{ asset('images/card-1.png') }}" alt="">
                    <div class="rounded-circle"></div>
                    <h3 class="text-center">CommerceAI</h3>
                    <p class="text-center">Boost AOV, retention, and personalization with a smart eCommerce system.</p>
                    <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center gap-10">
                        <span>Learn More</span>
                        <div class="a-image-wrapper">
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </div>
                    </a>
                </div>
            </div>
            <div class="row bottom-section">
               <div class="col-lg-4 px-0">
                    <img src="{{ asset('images/robot-image.png') }}" alt="" class="img-fluid">
               </div>
               <div class="col-lg-5 px-0 d-flex align-items-center justify-content-center flex-column">
                    <h3 class="text-center theme__color-secondary">Not sure which growth engine is right for you?</h3>
                    <p class="text-center">We’ll help you choose the best system based on your business stage and goals.</p>
                    <button class="theme__btn">Let’s Build Your Custom Plan Together</button>
               </div>
            </div>
        </div>
    </section>

    <!-- Here’s How We Build Your Custom Growth Engine section starts from here -->
    <style>
        section.how-we-build {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        section.how-we-build .new__design-btn {
            background: #0176D3;
            border-radius: 10px;
            padding: 14px 28px;
            transition: 0.2s;
            border:none;
            color:white;
        }
        section.how-we-build .new__design-btn:hover {
            opacity: 0.8;
        }
        section.how-we-build h2 {
            color: #0F2C4E;
        }
        section.how-we-build .head-para{
            max-width: 790px;
            margin-top: 30px;
            margin-bottom: 50px;
        }
        section.how-we-build .counter-img {
            margin-bottom: 20px;
        }
        section.how-we-build .counter-img + img {
            margin-bottom: 20px;
        }
        section.how-we-build .counter-img + img + h5 {
            padding-right: 8px;
            padding-left: 8px;
            font-family: 'Montserrat';
            line-height: 28px;
            font-weight: bolder;
            color: #0F2C4E;
            margin-bottom: 20px;
        }
        section.how-we-build .counter-img + img + h5 + p {
            padding-right: 8px;
            padding-left: 8px;
        }
        section.how-we-build .custom-col-1 .counter-img + img {
            margin-bottom: 30px;
        
        }
        section.how-we-build .robot-row h3, 
        section.how-we-build .robot-row h3 + button {
            margin-right: 50px;
        }
        section.how-we-build .robot-row h3{
            max-width: 500px;
            color: #0F2C4E;
            font-size: 30px;
            margin-bottom: 20px;
        }
    </style>
    <section class="how-we-build">
        <div class="container">
            <div class="row">
                <h2 class="text-center">Here’s How We Build Your Custom Growth Engine</h2>
                <p class="text-center head-para mx-auto">From strategic discovery to execution and optimization everything we do is purpose built to move your business forward powered by data and AI.</p>
            </div>
            <div class="row">
                <div class="col custom-col-1 d-flex align-items-center justify-content-start flex-column">
                    <img src="{{ asset('images/design-1.svg') }}" alt="Design 1" class="counter-img" height="40" width="40">
                    <img src="{{ asset('images/design-search-icon.svg') }}" alt="Search Icon">
                    <h5 class="text-center">
                        Growth Strategy Discovery
                    </h5>
                    <p class="text-center">We start with deep research into your goals, blockers, competition, and market.</p>
                </div>
                <div class="col custom-col-2 d-flex align-items-center justify-content-start flex-column">
                    <img src="{{ asset('images/design-2.svg') }}" alt="Design 2" class="counter-img" height="40" width="40">
                    <img src="{{ asset('images/ai-icon.svg') }}" alt="AI Icon">
                    <h5 class="text-center">
                        Custom System Blueprint
                    </h5>
                    <p class="text-center">
                        Based on your needs, we design a fully personalized system AI flows, automation, dashboards, and more.
                    </p>
                </div>
                <div class="col custom-col-3 d-flex align-items-center justify-content-start flex-column">
                    <img src="{{ asset('images/design-3.svg') }}" alt="Design 3" class="counter-img" height="40" width="40">
                    <img src="{{ asset('images/blazing-settings-icon.svg') }}" alt="Blazing Settings">
                    <h5 class="text-center">
                        Smart Implementation
                    </h5>
                    <p class="text-center">
                        We bring your system to life from campaigns and automations to personalization and SEO.
                    </p>
                </div>
                <div class="col custom-col-4 d-flex align-items-center justify-content-start flex-column">
                    <img src="{{ asset('images/design-4.svg') }}" alt="Design 4" class="counter-img" height="40" width="40">
                    <img src="{{ asset('images/chart-icon.svg') }}" alt="Chart Icon">
                    <h5 class="text-center">
                        Live Optimization & Reporting
                    </h5>
                    <p class="text-center">
                        You get real-time dashboards, weekly reviews, and AI-based recommendations to keep improving.
                    </p>
                </div>
                <div class="col custom-col-5 d-flex align-items-center justify-content-start flex-column">
                    <img src="{{ asset('images/design-5.svg') }}" alt="Design 5" class="counter-img" height="40" width="40">
                    <img src="{{ asset('images/trend-icon.svg') }}" alt="Trend Icon">
                    <h5 class="text-center">Scale or Extend</h5>
                    <p class="text-center">
                        As your business evolves, we help expand your system adding features, automations, and verticals as needed.
                    </p>
                </div>
            </div>
            <div class="row robot-row">
                <div class="col d-flex align-items-center justify-content-end">
                    <div class="d-flex align-items-end flex-column justify-content-center">
                        <h3 class="text-end">Want a custom growth system tailored to your business?</h3>
                        <button class="new__design-btn ms-auto">
                            Let’s Build It Together
                        </button>
                    </div>
                    <img src="{{ asset('images/robot-with-bg.png') }}" alt="Robot Image">
                </div>
            </div>
        </div>
    </section>
    <!-- Here’s How We Build Your Custom Growth Engine section ends here -->


    <!-- Why Founders Trust the DevXCloud Approach starts from here -->
    <style>
        section.why-founders {
            background: #f7f7f7;
            padding-top: 100px;
            padding-bottom: 100px;
        }
        section.why-founders h2 {
            color: #0F2C4E;
            font-size: 35px;
        }
        section.why-founders .head-para {
            max-width: 816px;
            margin-top: 20px;
            margin-bottom: 40px;
        }
        section.why-founders .cards-wrapper .col-lg-6 .inner-column{
            border-radius: 20px;
            background:white;
            gap: 20px;
            padding: 40px;
        }
        section.why-founders .cards-wrapper .col-lg-6 .inner-column h3 {
            font-size: 20px;
            font-family:'Montserrat';
            color: #0F2C4E;
            font-weight:bolder;
            margin-bottom: 10px;
            line-height: 28px;
        }
        section.why-founders .cards-wrapper {
            max-width: 1080px;
            margin:auto;
        }
        section.why-founders .new__design-btn {
            background: #0176D3;
            border-radius: 10px;
            padding: 14px 28px;
            transition: 0.2s;
            border:none;
            color:white;
        }
        section.why-founders h4 { 
            color: #0F2C4E;
            font-size: 24px;
            margin-top: 60px;
            margin-bottom: 26px;
        }
        section.why-founders .new__design-btn:hover {
            opacity: 0.8;
        }
    </style>
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
            <div class="row d-flex align-items-center justify-content-center">
                <h4 class="text-center">Ready to build your growth engine?</h4>
                <div class="button-wrapper d-flex align-items-center justify-content-center">
                    <button class="new__design-btn">Let’s Talk Strategy</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Why Founders Trust the DevXCloud Approach ends here -->


    <!-- Powered by trusted platforms section starts from here -->
    <style>
        section.trusted-platforms {
            padding-top: 100px;
            padding-bottom: 100px;
        }
        section.trusted-platforms .inner-col {
            border:1px solid #e8e8e8;
            border-radius: 14px;
            padding: 20px;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        section.trusted-platforms h2 {
            color: #0F2C4E;
            text-align:center;
            margin-bottom: 40px;
        }
    </style>
    <section class="trusted-platforms">
        <div class="container">
            <h2>Powered by trusted platforms:</h2>
            <div class="row">
                <div class="col">
                    <div class="inner-col border">
                        <img src="{{ asset('images/shopify.svg') }}" alt="Shopify" height="60" width="60">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-col border">
                        <img src="{{ asset('images/klaviyo.svg') }}" alt="Klaviyo" height="60" width="60">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-col border">
                        <img src="{{ asset('images/meta.svg') }}" alt="Meta" height="60" width="60">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-col border">
                        <img src="{{ asset('images/chatgpt.svg') }}" alt="Chatgpt" height="60" width="60">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-col border">
                        <img src="{{ asset('images/brown-chart.svg') }}" alt="Brown Chart" height="60" width="60">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-col border">
                        <img src="{{ asset('images/webflow.svg') }}" alt="Webflow" height="60" width="60">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-col border">
                        <img src="{{ asset('images/random-square.svg') }}" alt="Random Square" height="60" width="60">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Powered by trusted platforms ends here -->


    <!-- Explore the Growth Engines in Action starts from here -->
    <style>
        section.explore {
            padding-top: 100px;
            padding-bottom: 100px;
            background: #f7f7f7;
        }
        section.explore h2 {
            color: #0F2C4E;
        }
        section.explore h2 + p {
            max-width: 820px;
            margin:auto;
            margin-top: 10px;
            margin-bottom: 50px;
        }
        section.explore .row {
            max-width: 1240px;
        }
        section.explore a.explore-the-system {
            color: #239DD2;
            gap: 8px;
        }
        section.explore .row .inner-col {
            border-radius: 14px;
            padding: 50px;
            background:white;
        }
        section.explore .rounded-img + h3 + p {
            margin-bottom: 24px;
        }
        section.explore .rounded-img + h3 {
            margin-bottom: 24px;
            font-family:'Montserrat';
            color: #0F2C4E;
            font-size: 24px;
            font-weight: bolder;
        }
        section.explore .rounded-img {
            background: #0F2C4E14;
            height: 90px;
            width: 90px;
            margin-bottom: 40px;
            border-radius: 100px;
        }
    </style>
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
                    <div class="inner-col border d-flex align-items-start flex-column justify-content-center">
                        <div class="rounded-img"></div>
                        <h3>CommerceAI</h3>
                        <p>For eCommerce brands scaling with personalization, bundling, and smart inventory.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <span>Explore the System</span>
                            <img src="{{ asset('images/blue-arrow.svg') }}" alt="Random Square" height="12" width="12">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-start flex-column justify-content-center">
                        <div class="rounded-img"></div>
                        <h3>LaunchPadAI</h3>
                        <p>For founders launching smarter with AI onboarding, UX, and predictive dashboards.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <span>Explore the System</span>
                            <img src="{{ asset('images/blue-arrow.svg') }}" alt="Random Square" height="12" width="12">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="inner-col border d-flex align-items-start flex-column justify-content-center">
                        <div class="rounded-img"></div>
                        <h3>ScaleCloud</h3>
                        <p>For SaaS companies automating infrastructure, reporting, and real-time optimization.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <span>Explore the System</span>
                            <img src="{{ asset('images/blue-arrow.svg') }}" alt="Random Square" height="12" width="12">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 offset-2">
                    <div class="inner-col border d-flex align-items-start flex-column justify-content-center">
                        <div class="rounded-img"></div>
                        <h3>EliteScale</h3>
                        <p>For high-revenue brands expanding through data, A/B testing, and innovation systems.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <span>Explore the System</span>
                            <img src="{{ asset('images/blue-arrow.svg') }}" alt="Random Square" height="12" width="12">
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-col border d-flex align-items-start flex-column justify-content-center">
                        <div class="rounded-img"></div>
                        <h3>GreenScale Formula™</h3>
                        <p>For ethical or plant-based brands scaling smarter with bundle optimization and retention flows.</p>
                        <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center explore-the-system">
                            <span>Explore the System</span>
                            <img src="{{ asset('images/blue-arrow.svg') }}" alt="Random Square" height="12" width="12">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Explore the Growth Engines in Action ends here -->

    <!-- ready to build your growth engine starts from here -->
    <style>
        section.ready {
            padding-top: 100px;
            padding-bottom: 100px;
        }
        section.ready h2 {
            color: #0F2C4E;
            line-height: 44px;
            margin-bottom: 30px;
        }
        section.ready .new__design-btn {
            background: #0176D3;
            border-radius: 10px;
            padding: 14px 28px;
            transition: 0.2s;
            border:none;
            color:white;
        }
        section.ready .new__design-btn:hover {
            opacity: 0.8;
        }
        section.ready h2 + p {
            max-width: 500px;
            margin-bottom: 30px;
        }
    </style>
    <section class="ready">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-6 d-flex align-items-start justify-content-center">
                    <div class="inner-col d-flex flex-column align-items-start justify-content-center">
                        <h2>Ready to Build Your <br> Growth Engine?</h2>
                        <p class="text-start">
                            We don’t sell random services. We build systems designed to grow with you powered by AI, personalization,and strategy.
                        </p>
                        <button class="new__design-btn">Let’s Build It Together</button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('images/robot-with-bg.png') }}" alt="Robot With BG">
                </div>
            </div>
        </div>
    </section>
    <!-- ready to build your growth engine ends here -->
@endsection