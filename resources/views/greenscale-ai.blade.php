@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="devx__green-hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-start">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-start">
                        <h2>Smarter Growth for Vegan <br> Meal Kit Brands.</h2>
                        <p>Grow your vegan meal kit brand sustainably with <br> the GreenScale Formula™ AI-powered growth engine.</p>
                        <button class="devx__btn-primary">
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
    <section class="devx__green-vegan">
        <div class="container d-flex flex-column align-items-center justify-content-center">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center flex-column">
                    <h2 class="text-center">Turn Your Vegan Meal Kits <br> Into a Growth Engine.</h2>
                    <p class="text-center mt-2 mb-5">GreenScale Formula™ helps vegan meal kit brands grow without wasting <br> ingredients, losing customers, or compromising their values.</p>
                </div>
            </div>
            <div class="row main-cards-wrapper">
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-first.svg') }}" alt="Vegan First">
                        <div class="inner-content-wrapper">
                            <h3 class="mb-2">Predictable Revenue Growth</h3>
                            <p>Turn your meal kits into a steady growth <br> engine powered by AI forecasting and <br> personalization.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-second.svg') }}" alt="Vegan Second">
                        <div class="inner-content-wrapper">
                            <h3 class="mb-2">Reduce Ingredient Waste</h3>
                            <p> Cut costs and support sustainability with <br> smart meal planning and predictive restocks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-third.svg') }}" alt="Vegan Third">
                        <div class="inner-content-wrapper">
                            <h3 class="mb-2">Stronger Subscriptions</h3>
                            <p>Build recurring revenue with retention- <br> driven funnels and loyalty-focused <br>  offers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/greenscale-ai/vegan-fourth.svg') }}" alt="Vegan Fourth">
                        <div class="inner-content-wrapper">
                            <h3 class="mb-2">Sustainable Brand Trust</h3>
                            <p>Grow ethically and win loyalty by aligning with what conscious consumers <br> care about..</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <button class="devx__btn-primary mt-5">
                    Get My Growth Plan
                </button>
            </div>
        </div>
    </section>

    <!-- Future -->
    <section class="devx__green-future">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-start">
                    <div class="inner-wrapper d-flex align-items-start justify-content-center flex-column">
                        <h2>Future-Ready Growth for <br> Smart Vegan Brands.</h2>
                        <p class="mt-2">Watch how GreenScale Formula™ blends <br> AI forecasting with sustainable brand <br> strategies to help vegan meal kit brands <br> scale smarter.</p>
                        <button class="devx__btn-primary">
                            Watch the Demo
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="devx__green-phase">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="text-center">The 5-Phase Engine That <br> Drives Real Growth.</h2>
                    <p class="text-center mt-2 mb-5">A proven, structured system designed to help vegan meal <br> kit brands scale smarter and grow sustainably.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-first.svg') }}" alt="Phase First">
                        <h3>Flavor + Philosophy Foundation</h3>
                        <p class="text-center">Define your USP, positioning, <br> and persona</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-second.svg') }}" alt="Phase Second">
                        <h3>Smart Meal Planning + Forecasting</h3>
                        <p class="text-center">Predict demand and <br> optimize inventory.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-third.svg') }}" alt="Phase Third">
                        <h3>Viral-First Awareness & Retention Strategy</h3>
                        <p class="text-center">Launch campaigns built for <br> growth.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-fourth.svg') }}" alt="Phase Fourth">
                        <h3>Smart Kitchen Stack Setup</h3>
                        <p class="text-center">Integrate AI, automation, <br> and personalization.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper border">
                        <img src="{{ asset('images/greenscale-ai/phase-fifth.svg') }}" alt="Phase Fifth">
                        <h3>Meal Metrics <br> Dashboard + <br> Optimization Loop</h3>
                        <p class="text-center">Track performance and <br> scale smarter.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <button class="devx__btn-primary mt-5">
                        See the Full System
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="devx__green-benefits">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="text-center">
                        The Benefits That Drive <br> Sustainable Growth.
                    </h2>
                    <p class="text-center mt-2 mb-5">
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
                            <h3>Boost Revenue <br> Predictably</h3>
                            <p>Forecast demand and personalize <br> offers to grow smarter.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <div class="image-holder">
                        </div>
                        <div class="inner-content-wrapper">
                            <h3>Cut Ingredient <br> Waste</h3>
                            <p>Smarter meal planning means better <br> margins and less waste.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <div class="image-holder">
                        </div>
                        <div class="inner-content-wrapper">
                            <h3>Increase Retention <br> & Subscriptions</h3>
                            <p>Keep customers coming back with <br> personalized experiences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <div class="image-holder">
                        </div>
                        <div class="inner-content-wrapper">
                            <h3>Get Full Growth <br> Visibility</h3>
                            <p>Real-time dashboards to make <br> confident, data-backed decisions.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <button class="mt-5 devx__btn-primary">
                        Get My Growth Plan
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Different -->
    <section class="devx__green-different">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2>What Makes GreenScale Formula™ Different.</h2>
                    <p class="mt-2 mb-5 text-center">Most agencies sell tactics. We build a system that’s made <br> for your market, not for everyone else.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 border">
                    <h3>What Other Agencies Do</h3>
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
                    <h3>What We Do (GreenScale Formula™)</h3>
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

    <!-- green works -->
    <section class="devx__green-works">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="text-center">How GreenScale Formula™ Works.</h2>
                    <p class="text-center mt-2 mb-5">A clear path from onboarding to sustainable growth.</p>
                </div>
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
                                stroke="#21913B"
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
                                <img src="{{ asset('images/greenscale-ai/formula-first.svg') }}" alt="Formula First" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="content-wrappe mt-4">
                                <h3 class="text-center mb-2">Strategy & Market Mapping</h3>
                                <p class="text-center mb-5">We start by understanding your niche, your offer, and your customers to build the foundation of your growth engine.</p>
                            </div>
                        </div>

                        <!-- second card along with content and curve -->
                        <div class="col d-flex align-items-center justify-content-start flex-column">
                            <div class="mb-4 second-holder">
                                <img src="{{ asset('images/greenscale-ai/formula-second.svg') }}" alt="Formula Second" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="mt-4 first-holder d-flex align-items-center justify-content-center">
                                <div class="count-wrapper d-flex align-items-center justify-content-center">
                                    <h3>02</h3>
                                </div>
                            </div>
                            <div class="content-wrappe mt-4">
                                <h3 class="text-center mb-2">System Build</h3>
                                <p class="text-center mb-3">
                                    Your personalized growth engine is mapped, designed, and prepared for deployment — not just campaigns.
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
                                <img src="{{ asset('images/greenscale-ai/formula-third.svg') }}" alt="Formula Third" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="content-wrapper mt-4">
                                <h3 class="text-center mb-2">Launch & Personalization</h3>
                                <p class="text-center mb-3">
                                    We launch with targeted personalization and predictive strategies to attract and convert your ideal customers.
                                </p>
                            </div>
                        </div>

                        <!-- fourth card along with content and curve -->
                        <div class="col d-flex align-items-center justify-content-start flex-column">
                            <div class="mb-4 second-holder">
                                <img src="{{ asset('images/greenscale-ai/formula-fourth.svg') }}" alt="Formula Fourth" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="mt-4 first-holder d-flex align-items-center justify-content-center">
                                <div class="count-wrapper d-flex align-items-center justify-content-center">
                                    <h3>04</h3>
                                </div>
                            </div>
                            <div class="content-wrapper mt-4">
                                <h3 class="text-center mb-2">Forecast & Optimize</h3>
                                <p class="text-center mb-3">
                                    Real-time dashboards and forecasting help us refine the engine continuously for maximum retention.
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
                                <img src="{{ asset('images/greenscale-ai/formula-fifth.svg') }}" alt="Formula Fifth" class="img-fluid" height="80" width="80">
                            </div>
                            <div class="content-wrappe mt-4">
                                <h3 class="text-center mb-2">Scale Sustainably</h3>
                                <p class="text-center mb-3">
                                    Once everything is aligned, we scale what works and build sustainable long-term growth.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex align-items-center justify-content-center">
                <button class="devx__btn-primary mt-3">Get My Growth Plan</button>
            </div>
        </div>
    </section>

     <!-- faq section starts from here -->
    <section class="devx__green-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-sm-5 mb-4 text-center">FAQs About GreenScale Formula</h2>
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
    <section class="devx__home-ready">
        <div class="container px-0">
            <div class="row devx__bottom-section d-flex align-items-center justify-content-between">
                <div class="col d-flex align-items-start justify-content-center flex-column">
                        <h2 class="mb-2 devx__color-primary">Ready to Scale <br> Smarter?</h2>
                        <p class="text-start">
                            GreenScale Formula™ turns your strategy, forecasting, and retention into a powerful growth engine built for vegan meal kit brands. No guesswork. Just structured, sustainable growth.
                        </p>
                        <div class="col-lg-12 d-flex align-items-center justify-content-start cta-buttons-wrapper">
                            <button class="main-cta-button devx__btn-primary">Get My Growth Plan</button>
                            <button class="secondary-cta-button devx__btn-secondary">Book a Discovery Call</button>
                        </div>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/robot-image.png') }}" alt="Robot With BG" width="350" height="350">
                </div>
            </div>
        </div>
    </section>
@endsection