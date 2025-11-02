@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <style>
        .greenscale-hero-section {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        .greenscale-hero-section h1{
            color: #353535;
            margin-bottom: 0px;
        }
        .greenscale-hero-section h1 + p {
            margin-top: 12px;
            margin-bottom: 28px;
        }
        .greenscale-hero-section .cta-button:hover {
            opacity: 0.8;
        }
        .greenscale-hero-section .cta-button {
            background: #21913B;
            border:1px solid #21913B;
            color: #ffffff;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
        }
        .greenscale-hero-section img {
            max-width: 500px;
        }
    </style>
    <section class="greenscale-hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-start">
                        <h1>Smarter Growth <br> for Vegan Meal <br> Kit Brands.</h1>
                        <p>Grow your vegan meal kit brand sustainably with <br> the GreenScale Formula™ AI-powered growth engine.</p>
                        <button class="cta-button">
                            Get My Growth Plan
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/greenscale-ai/greenscale-ai-main-img.png') }}" alt="Greenscale Robot">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Vegan -->
    <style>
        section.vegan {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        section.vegan .main-heading {
            text-align:center;
            margin-bottom: 20px;
            color: #353535;
        }
        section.vegan .main-para {
            text-align:center;
            margin-bottom: 40px;
            line-height: 28px;
        }
        section.vegan .main-cards-wrapper .col-lg-6 {
            padding-right: 0px;
            padding-left: 0px;
            width: calc(50% - 20px);
        }
        section.vegan .main-cards-wrapper {
            width: 1080px;
            display:flex;
            gap: 24px;
        }
        section.vegan .main-cards-wrapper .inner-wrapper p {
            line-height: 28px;
        }
        section.vegan .main-cards-wrapper .inner-wrapper {
            min-height: 250px;
            display:flex;
            align-items:center;
            justify-content:center;
            border: 1px solid #00000033;
            border-radius: 20px;
            box-shadow: 0px 0px 30px 0px #00000014;
            padding: 40px;
            gap: 20px;
        }
        section.vegan .main-cards-wrapper .inner-wrapper img {
            max-height: 70px;
            max-width: 70px;
        }
        section.vegan .main-cards-wrapper h3 {
            color: #353535;
            font-size: 24px;
            line-height: 34px;
            margin-bottom: 12px;
        }
        section.vegan .cta-button:hover {
            opacity: 0.8;
        }
        section.vegan .cta-button {
            background: #21913B;
            border:1px solid #21913B;
            color: #ffffff;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            margin-top: 32px;
        }
    </style>
    <section class="vegan">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center flex-column">
                    <h2 class="main-heading">Turn Your Vegan Meal Kits <br> Into a Growth Engine.</h2>
                    <p class="main-para">GreenScale Formula™ helps vegan meal kit brands grow without wasting <br> ingredients, losing customers, or compromising their values.</p>
                </div>
            </div>
            <div class="row main-cards-wrapper">
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-first.svg') }}" alt="Vegan First">
                        <div class="inner-content-wrapper">
                            <h3>Predictable <br> Revenue Growth</h3>
                            <p>Turn your meal kits into a steady growth <br> engine powered by AI forecasting and <br> personalization.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-second.svg') }}" alt="Vegan Second">
                        <div class="inner-content-wrapper">
                            <h3>Reduce Ingredient <br> Waste</h3>
                            <p> Cut costs and support sustainability with <br> smart meal planning and predictive restocks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-third.svg') }}" alt="Vegan Third">
                        <div class="inner-content-wrapper">
                            <h3>Stronger Retention <br> & Subscriptions</h3>
                            <p>Build recurring revenue with retention- <br> driven funnels and loyalty-focused <br>  offers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-fourth.svg') }}" alt="Vegan Fourth">
                        <div class="inner-content-wrapper">
                            <h3>Sustainable <br> Brand Trust</h3>
                            <p>Grow ethically and win loyalty by aligning with what conscious consumers <br> care about..</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="cta-button">
                    Get My Growth Plan
                </button>
            </div>
        </div>
    </section>

    <!-- Future -->
    <style>
        section.future .container .row .col-lg-12{
            background-image: url("{{ asset('images/greenscale-ai/future-main-img.png') }}");
            background-size: contain; 
            background-position: right;
            background-repeat: no-repeat;
            min-height: 668px;
        }
        section.future .cta-button:hover{
            opacity: 0.8;
        }
        section.future h2 + p {
            margin-top: 12px;
        }
        section.future .cta-button{
            background: #21913B;
            border:1px solid #21913B;
            color: #ffffff;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            margin-top: 16px;
        }
        section.future {
            max-width:1200px;
            margin:auto;
        }
    </style>
    <section class="future">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-start">
                    <div class="inner-wrapper d-flex align-items-start justify-content-center flex-column">
                        <h2>Future-Ready Growth for <br> Smart Vegan Brands.</h2>
                        <p>Watch how GreenScale Formula™ blends <br> AI forecasting with sustainable brand <br> strategies to help vegan meal kit brands <br> scale smarter.</p>
                        <button class="cta-button">
                            Watch the Demo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        section.phase {
            /* background-image: url("{{ asset('images/greenscale-ai/greenscale-phase-bg-img.png') }}"); */
            /* background-repeat:no-repeat;
            background-size:contain;
            background-position:end; */
            padding-top: 100px;
            padding-bottom: 100px;
        }
        section.phase .main-para {
            text-align:center;
            line-height: 28px;
            margin-top: 12px;
            margin-bottom: 32px;
        }
        section.phase .main-heading {
            text-align:center;
            line-height: 34px;
        }
        section.phase .inner-wrapper {
            min-height: 374px;
            border-radius: 20px;
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            padding: 40px 12px;
            gap: 12px;
        }
        section.phase .inner-wrapper h3 {
            font-size: 24px;
            text-align:center;
        }
        section.phase .inner-wrapper img {
            margin-bottom: 12px;
        }
        section.phase .inner-wrapper h3 + p {
            text-align:center;
        }
        section.phase .cta-button:hover {
            opacity: 0.8;
        }
        section.phase .cta-button {
            background: #21913B;
            border:1px solid #21913B;
            color: #ffffff;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            margin-top: 32px;
        }
    </style>
    <section class="phase">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="main-heading">The 5-Phase Engine That <br> Drives Real Growth.</h2>
                    <p class="main-para">A proven, structured system designed to help vegan meal <br> kit brands scale smarter and grow sustainably.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-first.svg') }}" alt="Phase First">
                        <h3>Flavor + <br> Philosophy <br> Foundation</h3>
                        <p>Define your USP, positioning, <br> and persona</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-second.svg') }}" alt="Phase Second">
                        <h3>Smart Meal <br> Planning + <br> Forecasting</h3>
                        <p>Predict demand and <br> optimize inventory.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-third.svg') }}" alt="Phase Third">
                        <h3>Viral-First <br> Awareness & <br> Retention Strategy</h3>
                        <p>Launch campaigns built for <br> growth.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-fourth.svg') }}" alt="Phase Fourth">
                        <h3>Smart Kitchen <br> Stack Setup</h3>
                        <p>Integrate AI, automation, <br> and personalization.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-fifth.svg') }}" alt="Phase Fifth">
                        <h3>Meal Metrics <br> Dashboard + <br> Optimization Loop</h3>
                        <p>Track performance and <br> scale smarter.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <button class="cta-button">
                        See the Full System
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- Benefits -->
    <style>
        section.benefits {
            padding-top: 80px;
            padding-bottom: 80px;
        }
        section.benefits .main-heading {
            text-align:center;
        }
        section.benefits .main-para {
            text-align:center;
            margin-top: 12px;
            margin-bottom: 32px;
        }
        section.benefits .inner-wrapper .image-holder {
            background:#D9D9D9;
            border-top-right-radius: 20px;
            border-top-left-radius: 20px;
            min-width: 100%;
            min-height: 220px;
        }
        section.benefits .inner-wrapper {
            border-radius:20px;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
        }
        section.benefits .inner-wrapper .inner-content-wrapper h5 {
            margin-bottom: 0px;
            line-height: 28px;
        }
        section.benefits .inner-wrapper .inner-content-wrapper {
            padding: 40px 20px;
            display:flex;
            align-items:start;
            border: 1px solid #00000033;
            min-width:100%;
            border-bottom-right-radius: 20px;
            border-bottom-left-radius: 20px;
            justify-content:start;
            gap: 20px;
            flex-direction:column;
        }
        section.benefits .cta-button:hover {
            opacity:0.8;
        }
        section.benefits .cta-button {
            background: #21913B;
            border:1px solid #21913B;
            color: #ffffff;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            margin-top:32px;
        }
    </style>
    <section class="benefits">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="main-heading">
                        The Benefits That Drive <br> Sustainable Growth.
                    </h2>
                    <p class="main-para">
                        See how GreenScale Formula™ turns strategy into real, measurable <br> impact for vegan meal kit brands.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <div class="image-holder">
                        </div>
                        <div class="inner-content-wrapper">
                            <h5>Boost Revenue <br> Predictably</h5>
                            <p>Forecast demand and personalize <br> offers to grow smarter.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <div class="image-holder">
                        </div>
                        <div class="inner-content-wrapper">
                            <h5>Cut Ingredient <br> Waste</h5>
                            <p>Smarter meal planning means better <br> margins and less waste.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <div class="image-holder">
                        </div>
                        <div class="inner-content-wrapper">
                            <h5>Increase Retention <br> & Subscriptions</h5>
                            <p>Keep customers coming back with <br> personalized experiences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <div class="image-holder">
                        </div>
                        <div class="inner-content-wrapper">
                            <h5>Get Full Growth <br> Visibility</h5>
                            <p>Real-time dashboards to make <br> confident, data-backed decisions.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <button class="cta-button">
                        Get My Growth Plan
                    </button>
                </div>
            </div>
        </div>
    </section>



    <!-- Different -->
    <style>
        section.different {
            padding-top: 80px;
            padding-bottom: 80px;
        }
        section.different .main-heading {
            text-align:center;
        }
        section.different .main-para {
            text-align:center;
            margin-top: 16px;
            margin-bottom: 32px;
        }
        section.different .col-lg-6 {
            padding: 70px 40px;
        }
        section.different .col-lg-6:nth-child(2) {
            background: #EEFBE9;
        }
        section.different .col-lg-6 h3 {
            font-size: 24px;
            text-align:center;
            line-height: 34px;
        }
        section.different ul {
            padding-left: 0px;
            margin-top: 32px;
            margin-bottom: 32px;
        }
        section.different {
            max-width: 1200px;
            margin:auto;
        }
        section.different ul li{
            list-style-type:none;
            display:flex;
            align-items:start;
            justify-content:start;
            gap: 12px;
        }
        section.different ul li:not(:last-child) {
            margin-bottom: 20px;
        }
        section.different ul li span {
            position:relative;
            top: 1px;
        }
    </style>
    <section class="different">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h3 class="main-heading">What Makes GreenScale Formula™ Different.</h3>
                    <p class="main-para">Most agencies sell tactics. We build a system that’s made <br> for your market, not for everyone else.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 border">
                    <h3>What Other <br> Agencies Do</h3>
                    <div class="bullets">
                        <ul>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Cross Image">
                                <span>Sell generic ad packages that work the same for every brand</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Cross Image">
                                <span>Rely on trial and error to “figure it out” later</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Cross Image">
                                <span>Focus on short-term clicks, not long-term retention</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Cross Image">
                                <span>Ignore your actual market and customers</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Cross Image">
                                <span>Keep you blind to what’s really driving revenue</span>
                            </li>
                        </ul>
                    </div>
                </div>
                 <div class="col-lg-6 border">
                    <h3>What We Do <br> (GreenScale Formula™)</h3>
                    <div class="bullets">
                        <ul>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image">
                                <span>Build one custom growth engine made only for vegan meal kit brands</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image">
                                <span>Start with market research and buyer insight, not guesswork</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image">
                                <span>Turn your offer into a complete growth system, not just ads</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image">
                                <span>Blend forecasting + retention strategies into your launch</span>
                            </li>
                            <li>
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image">
                                <span>Give you a real-time view of what’s working, every step of the way</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        section.works {
            padding-top: 80px;
            padding-bottom: 80px !important;
        }
        section.works .main-para {
            margin-top: 12px;
            margin-bottom: 32px;
        }
        section.works .row .works-image-holder img {
            max-height: 40px;
            max-width: 40px;
        }
        section.works .row .works-image-holder {
            width: 80px;
            height: 80px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius: 100px;
            border:1px solid #1EAF38;
            margin-bottom: 12px;
        }
        section.works .inner-wrapper {
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            padding: 20px;
            gap: 20px;
            border-radius:20px;
            min-height: calc(100% - 70px);
        }
        section.works .inner-wrapper h5 + p {
            text-align:center;
            line-height:28px;
        }
        section.works .inner-wrapper h5 {
            font-size: 20px;
            text-align:center;
            line-height: 32px;
        }   
        section.works .inner-wrapper-header{
            clip-path: polygon(90% 0, 100% 50%, 90% 100%, 0 100%, 10% 50%, 0 0);
            background:#1eaf388c;
            color:white;
            font-size: 20px;
            display:flex;
            align-items:center;
            justify-content:center;
            min-height: 50px;
            margin-bottom: 20px;
            font-family: "Bricolage-Grotesque";
        }
        section.works .main-cards-wrapper {
            display:grid;
            grid-template-columns: repeat(5, 1fr);
            align-items:stretch;
        }
        section.works .main-cta-button:hover {
            opacity:0.8;
        }
        section.works .main-cta-button {
            background: #21913B;
            border:1px solid #21913B;
            color: #ffffff;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            margin-top:32px;
        }
    </style>
    <section class="works">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="main-heading">How GreenScale Formula™ Works.</h2>
                    <p class="main-para">A clear path from onboarding to sustainable growth.</p>
                </div>
            </div>
            <div class="row main-cards-wrapper">
                <div class="col">
                    <div class="inner-wrapper-header">01</div>
                    <div class="inner-wrapper border">
                        <div class="works-image-holder">
                            <img src="{{ asset('images/greenscale-ai/formula-first.svg') }}" alt="Formula First" class="img-fluid">
                        </div>
                        <h5>Strategy & Market <br> Mapping</h5>
                        <p>We start by understanding your niche, your offer, and your customers to build the foundation of your growth engine.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper-header">02</div>
                    <div class="inner-wrapper border">
                        <div class="works-image-holder">
                            <img src="{{ asset('images/greenscale-ai/formula-second.svg') }}" alt="Formula Second" class="img-fluid">
                        </div>
                        <h5>System Build</h5>
                        <p>Your personalized growth engine is mapped, designed, and prepared for deployment — not just campaigns.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper-header">03</div>
                    <div class="inner-wrapper border">
                        <div class="works-image-holder">
                            <img src="{{ asset('images/greenscale-ai/formula-third.svg') }}" alt="Formula Third" class="img-fluid">
                        </div>
                        <h5>Launch & <br> Personalization</h5>
                        <p>We launch with targeted personalization and predictive strategies to attract and convert your ideal customers.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper-header">04</div>
                    <div class="inner-wrapper border">
                        <div class="works-image-holder">
                            <img src="{{ asset('images/greenscale-ai/formula-fourth.svg') }}" alt="Formula Fourth" class="img-fluid">
                        </div>
                        <h5>Forecast & <br> Optimize</h5>
                        <p>Real-time dashboards and forecasting help us refine the engine continuously for maximum retention.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper-header">05</div>
                    <div class="inner-wrapper border">
                        <div class="works-image-holder">
                            <img src="{{ asset('images/greenscale-ai/formula-fifth.svg') }}" alt="Formula Fifth" class="img-fluid">
                        </div>
                        <h5>Scale <br> Sustainably</h5>
                        <p>Once everything is aligned, we scale what works and build sustainable long-term growth.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                <button class="main-cta-button">Get My Growth Plan</button>
            </div>
        </div>
    </section>



     <!-- faq section starts from here -->
    <style>
        section.faq-section {
            padding-bottom: 100px;
        }
        section.faq-section .main-heading {
            color: #353535 !important;
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
            color:white;
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
            border-radius: 20px;
            border: 2px solid #0000001A;
            background:white;
        }
        section.faq-section #accordionFlushExample {
            padding-right: 0px;
            padding-left: 0px;
        }
        /* section.faq-section .accordion-button[aria-expanded="false"]::after {
            filter:brightness(0) invert(1);
        }  */
        section.faq-section .accordion-button[aria-expanded="true"] {
            background:#FFFFF3 !important;
            color: #000C1C;
            border-bottom: none !important;
            border-top: 1px solid #00000033;
            border-right: 1px solid #00000033;
            border-left: 1px solid #00000033;
        }
        section.faq-section .accordion-button[aria-expanded="true"] img {
            filter:none !important;
        }
        section.faq-section .accordion-button:focus{
            box-shadow:none !important;
        }
        section.faq-section .accordion-item,
        section.faq-section .accordion-button  {
            background:none !important;
        }
        section.faq-section .accordion-item {
            border-bottom:none !important;
        }
        section.faq-section .accordion-body {
            padding-top: 0px !important;
        }
        /* section.faq-section .accordion-button img {
            filter:brightness(0) invert(1);
        } */
        section.faq-section .accordion-button {
            color: #353535;
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
            background:#FFFFF3 !important;
            border-bottom-left-radius: 16px !important;
            border-bottom: 1px solid #00000033;
            border-right: 1px solid #00000033;
            border-left: 1px solid #00000033;
        }
        section.faq-section .accordion-collapse.show p {
            color: #000C1C;
        }
    </style>
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="main-heading">FAQs About GreenScale Formula</h2>
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


    <!-- ready to scale smart -->
    <style>
        section.ready{
            padding-top: 80px;
            padding-bottom: 80px;
        }
        section.ready h3 + p {
            line-height: 28px;
        }
        section.ready h3 {
            font-size: 32px;
            line-height: 40px;
            margin-bottom: 20px;
        }
        section.ready img {
            max-height: 300px;
        }
        section.ready .main-cta-button {
            background: #21913B;
            border:1px solid #21913B;
            color: #ffffff;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
        }
        section.ready .cta-buttons-wrapper button:hover {
            opacity: 0.8;
        }
        section.ready .cta-buttons-wrapper {
            gap:20px;
            margin-top:12px;
        }
        section.ready .cta-buttons-wrapper .secondary-cta-button {
            border: 1px solid #333333 !important;
            background: transparent;
            border:1px solid transparent;
            color: #333333;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
        }
    </style>
    <section class="ready">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper d-flex align-items-start justify-content-center flex-column">
                        <h3>Ready to Scale <br> Smarter?</h3>
                        <p>GreenScale Formula™ turns your strategy, forecasting, <br> and retention into a powerful growth engine built for <br> vegan meal kit brands. No guesswork. Just structured, <br> sustainable growth.</p>
                        <div class="col-lg-12 d-flex align-items-center justify-content-start cta-buttons-wrapper">
                            <button class="main-cta-button">Get My Growth Plan</button>
                            <button class="secondary-cta-button">Book a Discovery Call</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/greenscale-ai/greenscale-banner-robo.png') }}" alt="Greenscale Banner Robo">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection