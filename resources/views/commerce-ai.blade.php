@extends('layouts.app')

@section('content')

    <style>
        /* .hero-section {
            background-image: url("{{ asset('images/commerce-ai/hero-background.png') }}");
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            padding-top: 140px;
            padding-bottom: 140px;
            align-items: center;
        } */
        /* .custom-commerce-ai nav .navbar-brand {
            filter:brightness(0) invert(1);
        }
        .custom-commerce-ai nav .navbar-nav .nav-link {
            color:var(--theme-white);
        } */
        section.hero-section.commerce-ai {
            background-image: url("{{ asset('images/commerce-ai/hero-background.png') }}");
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
        }
        .hero-section h1 {
            font-weight: 700;
            margin-bottom: 0px;
            font-size: 50px;
            color:white;
            line-height: 60px;
        }
        .hero-section p {
            color:white;
        }
        .hero-section .buttons-wrapper {
            gap:16px;
        }
        .hero-section .buttons-wrapper a {
            text-decoration:none;
            padding:16px 26px;
            color:white;
            border-radius: 14px;
            background: linear-gradient(90deg, #00E1E0 0%, #0052CC 100%);
        }
        .hero-section .buttons-wrapper a:last-child {
            background:transparent;
        }
        .hero-section .content-section {
            gap: 14px;
        }
        section.hero-section.commerce-ai .theme__btn + a {
            background:white;
            color: #0176d3 !important;
            border-radius: 8px;
            padding: 10px 24px !important;
            line-height: 24px;
            font-weight: bolder;
            font-family:"Bricolage-Grotesque";
            font-size: 14px;
            text-transform: uppercase;
            border: none;
        }
        /* section.hero-section.commerce-ai h1,
        section.hero-section.commerce-ai p{
            color:var(--theme-dark);
        } */
    </style>
    <section class="hero-section commerce-ai">
        <div class="container">
            <div class="row px-0">
                <div class="col-lg-6 d-flex flex-column align-items-start justify-content-center content-section">
                    <h1 class="mb-0">Custom-Built AI Growth <br> Engine for eCommerce</h1>
                    <p>
                        CommerceAI combines custom growth strategy with full-stack <br> AI automation delivering forecasting, personalization, <br> and optimization in one complete system.
                    </p>
                    <div class="buttons-wrapper d-flex align-items-center justfy-content-center">
                        <button class="theme__btn" href="javascript:void(0);">Get Your Growth Blueprint</button>
                        <a href="javascript:void(0);">Watch Demo</a>
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

    <style>
        .commerce-ai-turns {
            background-image: url("{{ asset('images/commerce-ai/hero-background.png') }}");
            background-size: cover; 
            background-position: center;
            background-repeat: no-repeat;
            display: flex;
            padding-top: 110px;
            padding-bottom: 120px;
            align-items: center;
        }
        .commerce-ai-turns h2 {
            font-weight: 700;
            margin-bottom: 40px;
            font-size: 40px;
            color:white;
            line-height: 80px;
        }
        .commerce-ai-turns p {
            color:white;
            font-size: 16px;
            max-width:960px;
            margin-bottom: 70px;
            line-height: 30px;
        }
        .commerce-ai-turns .cards-wrapper {
            max-width:1110px;
            /* gap:30px; */
        }
        .commerce-ai-turns .cards-wrapper .col-lg-4 .inner-wrapper {
            border-radius: 20px;
            padding: 30px 40px 40px 40px;
            background:transparent;
            position:relative;
        }
        .commerce-ai-turns .cards-wrapper .col-lg-4 .inner-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            padding: 2px;
            border-radius: 16px;
            background: linear-gradient(135deg, #00f0ff, #8a2be2);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
        .commerce-ai-turns .cards-wrapper .header h4 {
            color:white;
            font-size: 20px;
            line-height: 30px;
        }
        .commerce-ai-turns .cards-wrapper .header{
            gap: 20px;
        }
        .commerce-ai-turns .cards-wrapper .content{
            margin-top: 20px;
            color:white;
        }
    </style>
    <section class="commerce-ai-turns">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center text-center">
                    <h2 class="mb-0">How CommerceAI Turns Data into Growth</h2>
                    <p>
                        Most AI tools automate tasks. Most agencies run ads. But neither builds a system around how your brand actually sells, retains, and grows. CommerceAI is a fully-managed, strategy-first growth engine custom-built for each eCommerce brand. From forecasting inventory to on-site personalization and automated retention flows, every part of the system is tailored to your products, audience, and offers — not pulled from a playbook.
                    </p>
                </div>
            </div>
            <div class="row cards-wrapper d-flex align-items-center justify-content-center mx-auto">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <div class="header flex-column d-flex align-items-start justify-content-center">
                            <img src="{{ asset('images/commerce-ai/strategic-foundation-first.svg') }}" alt="">
                            <h4 class="mb-0">Strategic Foundation First</h4>
                        </div>
                        <div class="content">
                            Every store is different. So before we automate anything, we start with a custom strategy built around your products, customers, and conversion paths.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <div class="header flex-column d-flex align-items-start justify-content-center">
                            <img src="{{ asset('images/commerce-ai/adaptive-ai-infrastructure.svg') }}" alt="">
                            <h4 class="mb-0">Adaptive AI <br> Infrastructure</h4>
                        </div>
                        <div class="content">
                            CommerceAI doesn’t plug in it’s built around your business. From forecasting to personalization, every layer adapts to how your store sells, restocks, and grows.
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <div class="header flex-column d-flex align-items-start justify-content-center">
                            <img src="{{ asset('images/commerce-ai/ai-powered-growth.svg') }}" alt="">
                            <h4 class="mb-0">AI-Powered Growth <br> Execution</h4>
                        </div>
                        <div class="content">
                            You don’t need another report or a half-working flow. CommerceAI delivers a fully-managed system that acts on your data and keeps improving every week.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--  inside the commerce ai section starts from here  -->
    <style>
        section.inside-the-commerce-ai-banner {
            background: url("{{ asset('images/commerce-ai/inside-the-commerce-ai-banner.png') }}") no-repeat center center;
            background-size: cover;
            padding-top: 90px;
            position:relative;
            padding-bottom: 280px;
            margin-top: -2px;
        }
        section.inside-the-commerce-ai-banner::after
        {
            content: "";
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 180px;
            clip-path: ellipse(55% 80% at 50% 100%);
            background: white;
        }
        section.inside-the-commerce-ai-banner .inside-the-commerce-text {
            color:#fff; font-size: 16px; max-width:960px; margin-bottom: 40px; line-height: 30px;
        }
        section.inside-the-commerce-ai-banner .inside-the-commerce-heading {
            font-weight: 700; font-size: 40px; color:#fff; line-height: 50px; margin-bottom: 20px;
        }
        section.inside-the-commerce-ai-banner .inside-section-row{
            max-width: 1480px;
            display:grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            gap: 18px;
            align-items:stretch;
        }
        section.inside-the-commerce-ai-banner .inside-section-row .col {
            padding-right: 0px;
            padding-left: 0px;
            height:auto;
        }
        section.inside-the-commerce-ai-banner .inside-section-row .col .inner-wrapper::before {
            content: "";
            position: absolute;
            inset: 0;
            padding: 2px;
            border-radius: 16px;
            background: linear-gradient(135deg, #00f0ff, #8a2be2);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }
        section.inside-the-commerce-ai-banner .inside-section-row .col .inner-wrapper {
            min-height: 100%;
            position:relative;
        }
        section.inside-the-commerce-ai-banner .inside-section-row .col .inner-wrapper img {
            height: 70px;
            width: 70px;
            margin-bottom: 30px;
        }
        section.inside-the-commerce-ai-banner .inside-section-row .col .inner-wrapper h3 
        {
            margin-bottom: 24px;
            font-weight: 600;
            font-size: 26px;
            line-height: 38px;
            letter-spacing: 0%;
            text-align: center;
            color:white;
        }
        section.inside-the-commerce-ai-banner .inside-section-row .col .inner-wrapper p
        {
            color:white;
            margin-bottom: 0px;
            font-weight: 400;
            font-size: 14px;
            line-height: 23px;
            letter-spacing: 0%;
            text-align: center;
        }
        section.inside-the-commerce-ai-banner .inside-section-row .col .inner-wrapper {
            background: transparent;
            padding: 60px 24px;
            border-radius: 20px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
        }
    </style>
    <section class="inside-the-commerce-ai-banner">
        <div class="container">
            <div class="row px-0">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center text-center">
                    <h2 class="mb-0 inside-the-commerce-heading">Inside the CommerceAI Growth Engine</h2>
                    <p class="inside-the-commerce-text">
                        Explore the 5-phase system designed to help your eCommerce store grow smarter — through strategic personalization, AI automation, and scalable execution.
                    </p>
                </div>
            </div>
            <div class="row inside-section-row">
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/commerce-ai/commerce-1.svg') }}" alt="Commerce 1">
                        <h3>Strategic Foundation</h3>
                        <p>We define your USP, uncover your top-performing products, and map out your ideal customers so your growth starts with strategy, not guesswork.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/commerce-ai/commerce-2.svg') }}" alt="Commerce 1">
                        <h3>Custom AI Growth Blueprint</h3>
                        <p>We design a data-backed system tailored to your store including predictive inventory, bundle logic, and personalization that actually converts.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/commerce-ai/commerce-3.svg') }}" alt="Commerce 1">
                        <h3>Marketing Strategy Setup</h3>
                        <p>We build conversion-focused funnels, ad angles, and retention offers aligned with your audience and ready to scale across channels.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/commerce-ai/commerce-4.svg') }}" alt="Commerce 1">
                        <h3>Tech Stack & Execution Layer</h3>
                        <p>We automate the core of your growth engine from email flows to personalization using tools that adapt to your store in real time.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/commerce-ai/commerce-5.svg') }}" alt="Commerce 1">
                        <h3>Dashboard Reporting & Optimization</h3>
                        <p>We define your USP, uncover your top-performing products, and map out your ideal customers so your growth starts with strategy, not guesswork.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- inside the commer ai section ends here  -->


    <!-- what makes different section starts from here -->
    <style>
        .inner-bg-holder{
            background: url("{{ asset('images/commerce-ai/what-makes-difference.png') }}") no-repeat center center;
            background-size:cover;
            padding-top: 20px;
            padding-bottom: 200px;
            border-bottom-left-radius: 100% 50%;
            border-bottom-right-radius: 100% 50%;
        }
        section.what-makes-difference .what-makes-difference-heading {
            font-weight: 700;
            font-style: Bold;
            font-size: 38px;
            line-height: 80px;
            letter-spacing: 0%;
            text-align: center;
        }
        section.what-makes-difference .what-makes-difference-text {
            font-weight: 400;
            font-size: 20px;
            line-height: 30px;
            letter-spacing: 0%;
            max-width: 790px;
            margin:auto;
            text-align: center;
        }
        section.what-makes-difference .row.difference-cards-wrapper {
            display:grid;
            max-width: 1300px;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 33px;
            margin:auto;
            margin-top: 40px;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col {
            padding: 60px 40px 40px 40px;
            display:flex;
            flex-direction:column;
            position:relative;
            align-items:start;
            background:white;
            border-radius: 20px;
            justify-content:center;
            border-radius: 20px;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col::before {
            content:'';
            position:absolute;
            display:flex;
            min-width: 100%;
            left: 0px;
            top: 0px;
            min-height: 20px;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            align-items:center;
            justify-content:center;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col.orange::before{
            background: #FF6A3D;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col.skyblue::before{
            background: #00E1E0;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col.green::before{
            background: #3CD07B;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col.blue::before{
            background: #0176D3;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col h3 {
            font-weight: 600;
            font-size: 22px;
            line-height: 30px;
            margin-bottom: 20px;
            letter-spacing: 0%;
        }
        section.what-makes-difference .row.difference-cards-wrapper .col p {
            font-weight: 500;
            margin-bottom: 0px;
            font-style: Medium;
            font-size: 16px;
            line-height: 23px;
            letter-spacing: 0%;
        }
    </style>
    <section class="what-makes-difference">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="what-makes-difference-heading">What Makes CommerceAI Different</h2>
                    <p class="what-makes-difference-text">Most agencies hand you a single piece of the puzzle — CommerceAI builds the full growth engine, tailored around your strategy, data, and customers.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="what-makes-difference inner-bg-holder">
        <div class="row difference-cards-wrapper">
            <div class="col orange">
                <h3>Strategy Before Systems</h3>
                <p>Unlike agencies with a menu of random services, we build your growth engine around one thing: your unique brand strategy.</p>
            </div>
            <div class="col skyblue">
                <h3>Custom AI Over Templates</h3>
                <p>No templates. No one-size-fits-all playbooks. Every automation is built around your actual store and customers.</p>
            </div>
            <div class="col green">
                <h3>Retention Over Random Clicks</h3>
                <p>Others focus on clicks. We engineer flows, offers, and bundles to keep customers coming back automatically.</p>
            </div>
            <div class="col blue">
                <h3>Execution Without the Guesswork</h3>
                <p>No dashboards to learn. No freelancers to juggle. We run the full engine so you can run your business.</p>
            </div>
        </div>
    </section>
    <!-- what makes different section ends here -->


    <!-- engine stack section starts from here -->
    <style>
        section.engine-stack {
            background-image: url("{{ asset('images/commerce-ai/engine-stack.png') }}");
            background-repeat:no-repeat;
            background-size:cover;
            background-position:start;
            padding-top: 100px;
            padding-bottom: 260px;
        }
        section.engine-stack .theme__btn{ 
            font-family: "Bricolage-Grotesque";
            border-radius: 8px;
            background: #EB8025 !important;
            text-transform:uppercase;
            letter-spacing: 0.3px !important;
        }
        section.engine-stack .engine-stack-first-row  p {
            margin-bottom: 0px;
        }
        section.engine-stack .engine-stack-first-row {
            padding-bottom: 60px;
        }
        section.engine-stack .actual-grid .col img{
            margin-bottom: 20px;
        }
        section.engine-stack .actual-grid .col h3{
            margin-bottom: 20px;
            font-weight: 600;
            font-size: 24px;
            line-height: 36px;
            letter-spacing: 0%;
        }
        section.engine-stack .actual-grid .col p{
            font-weight: 500;
            font-style: Medium;
            font-size: 16px;
            line-height: 26px;
            letter-spacing: 0%;
        }
        section.engine-stack .actual-grid .col {
            padding:40px;
            background:white;
            border-radius: 20px;
            box-shadow: 0px 0px 30px 0px #00000021;
            border: 1px solid #00000033
        }
        section.engine-stack .actual-grid {
            display:grid;
            grid-template-columns:repeat(4, 1fr);
            grid-template-rows: repeat(2, auto);
            grid-gap: 16px;
            max-width: 1400px;
        }
        section.engine-stack a:hover {
            opacity: 0.8;
        }
        section.engine-stack a{
            font-family:'Nunito-Regular';
            background: #FFBD2F;
            padding: 18px 26px;
            text-decoration:none;
            color:white;
            letter-spacing: 0.2px;
            font-size: 16px;
            border-radius: 12px;
            transition:0.3s;
            width:fit-content;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            margin-top: 80px;
        }
    </style>
    <!-- engine stack section ends here -->
    <section class="engine-stack">
        <div class="container">
            <div class="row engine-stack-first-row d-flex align-items-center justify-content-center text-center">
                <div class="col-lg-12 flex-column d-flex align-items-center justify-content-center text-center">
                    <h2>Explore the CommerceAI Growth Engine Stack</h2>
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


    <!-- strategy section starts from here -->
    <style>
        section.strategy-section {
            padding-top: 100px;
            padding-bottom: 100px;
        }
        section.strategy-section p.main-text {
            margin-bottom: 40px;
        }
        section.strategy-section h2{
            font-weight: 700;
            font-style: Bold;
            font-size: 45px;
            line-height: 80px;
            letter-spacing: 0%;
            text-align: center;
        }
        section.strategy-section .strategy-grid {
            display:grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 20px;
            margin:auto;
            max-width: 1300px;
        }
        section.strategy-section .strategy-grid .col img {
            min-width: 100%;
            margin-bottom: 16px;
            max-height: 228px;
            border-radius: 20px;
        }
        section.strategy-section .strategy-grid .col span.step {
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 18px;
            line-height: 30px;
            letter-spacing: 0%;
        }
        section.strategy-section .strategy-grid .col h3 {
            margin-bottom: 16px;
            font-weight: 600;
            font-size: 24px;
            line-height: 34px;
            letter-spacing: 0%;
        }
        section.strategy-section .strategy-grid .col p {
            margin-bottom: 0px;
            font-weight: 500;
            font-style: Medium;
            font-size: 16px;
            line-height: 26px;
            letter-spacing: 0%;
        }
        section.strategy-section .strategy-grid .col {
            padding: 24px 30px;
            display:flex;
            flex-direction:column; 
            border-radius:20px;
            align-items:start;
            box-shadow: 0px 0px 30px 0px #0000001A;
            justify-content:center;
        }
    </style>
    <section class="strategy-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column mx-auto align-items-center justify-content-center">
                    <h2>How We Turn Strategy into Scalable Growth</h2>
                    <p class="main-text">Every step is built to uncover, activate, and scale your brand’s growth potential.</p>
                </div>
            </div>
            <div class="row strategy-grid">
                <div class="col">
                    <img src="{{ asset('illustrations/i-step-1.svg') }}">
                    <span class="step">Step 1</span>
                    <h3>Growth Discovery Call</h3>
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
                    <p>Every week, we test, review, and improve refining campaigns, updating dashboards, and helping you scale smarter with data.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- strategy section ends here -->

    <!-- faq section starts from here -->
    <style>
        section.faq-section {
            padding-bottom: 100px;
            background: #F7F7F7;
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
                    <h2 class="main-heading">FAQs About CommerceAI</h2>
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
                    <h3>Not sure which growth engine <br> is right for you?</h3>
                    <p class="text-center">We’ll help you choose the best system based on your business stage and goals.</p>
                    <button class="theme__btn text-uppercase">Discover our Growth Engine</button>
               </div>
               <div class="col d-inline-flex align-items-center justify-content-end">
                    <img src="{{ asset('images/robot-image.png') }}" alt="" class="img-fluid">
               </div>
            </div>
        </div>
    </section>
    <!-- growth section ends here -->
@endsection