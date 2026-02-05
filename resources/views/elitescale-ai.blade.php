@extends('layouts.app')


@section('title', 'Elitescale AI')


@section('content')

    <!-- Hero Section -->
    <section class="devx__elite-hero-section">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between flex-lg-row flex-column-reverse">
                <div class="col-lg-6 d-flex align-items-lg-start align-items-center justify-content-center flex-column">
                    <h2 class="text-white text-lg-start text-center">Growth Engine for <br> High-Revenue Digital Brands</h2>
                    <p class="text-white mt-2 mb-4 text-lg-start text-center">LaunchPadAI combines tailored startup strategy with <br> intelligent automation, delivering positioning, traction, <br> and scale in one complete system.</p>
                    <div class="buttons-wrapper d-flex align-items-center justify-content-start">
                        <button class="devx__btn-primary">Build My Launch Plan</button>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/elitescale-ai/elitescale-main-img.svg') }}" alt="Elitescale AI Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- results -->
    <section class="devx__elite-results">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column text-center">
                    <h2 class="text-white">Results That Help High-Revenue Brands <br> Operate Like Market Leaders</h2>
                    <p class="text-white mt-2 mb-5">EliteScale delivers enterprise-grade systems that give your team clarity, control, and faster growth.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-first.svg') }}" alt="Results First" class="img-fluid">
                        <h3 class="text-center">Growth You Can Forecast</h3>
                        <p class="inner-content text-white text-center">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-second.svg') }}" alt="Results Second" class="img-fluid">
                        <h3 class="text-center">Growth You Can Forecast</h3>
                        <p class="inner-content text-white text-center">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-third.svg') }}" alt="Results Third" class="img-fluid">
                        <h3 class="text-center">Growth You Can Forecast</h3>
                        <p class="inner-content text-white text-center">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-fourth.svg') }}" alt="Results Fourth" class="img-fluid">
                        <h3 class="text-center">Growth You Can Forecast</h3>
                        <p class="inner-content text-white text-center">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mt-5 col-lg-12 d-flex align-items-center justify-content-center">
                    <button class="devx__btn-primary text-center">See the Full EliteStack™ Framework.</button>
                </div>
            </div>
        </div>
    </section>

    <!-- built -->
    <section class="devx__elite-built">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center flex-xl-row flex-column-reverse">
                <div class="col-xl-6 d-flex align-items-center justify-content-center flex-column">
                    <div class="inner-wrapper ps-xl-5 ps-0">
                        <h2 class="mb-3 text-xl-start text-center text-white">What EliteScale Is and <br> Who It’s Built For</h2>
                        <p class="text-xl-start text-center text-white">
                            EliteScale is an enterprise-grade growth engine designed for 7–8 figure <br> digital brands that want to scale smarter, faster, and with complete clarity.
                            <br><br>
                            Whether you’re leading a SaaS platform, running a high-growth eCommerce <br> business, or managing an enterprise digital service, EliteScale equips your <br> team with AI-powered systems, cross-channel visibility, and predictive <br> insights to make smarter decisions at speed.
                            <br><br>
                            It’s built for brands that are done guessing and ready to operate like market <br> leaders.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-8 d-flex align-items-center justify-content-xl-end justify-content-center pe-xl-5">
                    <img src="{{ asset('images/elitescale-ai/elitescale-built-section-main-img.svg') }}" alt="Elitescale Built Section Main Img" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- advantage -->
    <section class="devx__elite-advantage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="mb-2 text-center text-white">The Advantage Behind High-Growth <br> Digital Leaders</h2>
                    <p class="text-center text-white mb-5">EliteScale isn’t just another automation tool, it’s the complete innovation layer that gives <br> high-revenue brands the edge they need to dominate.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-first.svg') }}" alt="Advantage First" class="img-fluid">
                        <h3 class="text-white text-center">Multi‑Channel Domination</h3>
                        <p class="text-white text-center">Orchestrate Google, YouTube, <br> LinkedIn, and Meta campaigns from <br> one AI-powered hub.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-second.svg') }}" alt="Advantage First" class="img-fluid">
                        <h3 class="text-white text-center">AI‑Powered Workflows</h3>
                        <p class="text-white text-center">Automate complex tasks, streamline <br> processes, and optimize your growth <br> stack in real time.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-third.svg') }}" alt="Advantage First" class="img-fluid">
                        <h3 class="text-white text-center">Global Scaling Strategies</h3>
                        <p class="text-white text-center">Enter new markets faster with <br> tailored frameworks designed for <br> enterprise-level expansion.</p>
                    </div>
                </div>


                <!-- second row starts from here -->
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-fourth.svg') }}" alt="Advantage First" class="img-fluid">
                        <h3 class="text-white text-center">Big Data Predictive Analytics</h3>
                        <p class="text-white text-center">Predict future trends, revenue <br> shifts, and churn risks before they <br> happen.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-fifth.svg') }}" alt="Advantage First" class="img-fluid">
                        <h3 class="text-white text-center">AR/VR Integration</h3>
                        <p class="text-white text-center">Create immersive product experiences <br> and interactive campaigns that set you <br> apart.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-sixth.svg') }}" alt="Advantage First" class="img-fluid">
                        <h3 class="text-white text-center">Enterprise Dashboards</h3>
                        <p class="text-white text-center">Centralize every KPI and data <br> stream into one seamless, real-time <br> control center.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- turning -->
    <section class="devx__elite-turning">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between flex-lg-row flex-column">
                <div class="col-lg-6 col-sm-8 d-flex align-items-center justify-content-center mb-lg-0 mb-4">
                    <img src="{{ asset('images/elitescale-ai/turning-main-img.svg') }}" alt="Turning Main Img" class="img-fluid">
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper d-inline-flex align-items-start justify-content-center flex-column">
                        <h2 class="text-start text-white">Turning Data Into Results <br> That Drive Enterprise Growth</h2>
                        <p class="text-start text-white">EliteScale empowers digital leaders to scale smarter, leveraging AI, <br> automation, and big data to unlock your next growth chapter.</p>
                        <button class="devx__btn-primary">
                            See How EliteScale Works
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- growth -->
    <section class="devx__elite-growth-engine">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="text-white text-center">The Ultimate Growth Framework <br> for Market Leaders</h2>
                    <p class="text-white text-center mt-2 mb-5">EliteStack™ combines advanced AI, predictive analytics, and innovation-driven strategy into one seamless 5-phase system - built to <br> help enterprise brands scale smarter, faster, and with absolute precision.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="inner-wrapper">
                        <h5>Phase 1</h5>
                        <h3>Executive Growth <br> Strategy</h3>
                        <img src="{{ asset('images/elitescale-ai/framework-first.svg') }}" alt="Framework First" class="img-fluid">
                        <p>Define positioning, goals, <br> and innovation roadmap.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <h5>Phase 2</h5>
                        <h3>AI Automation <br> Layer</h3>
                        <img src="{{ asset('images/elitescale-ai/framework-second.svg') }}" alt="Framework Second" class="img-fluid">
                        <p>Set up AI-driven workflows <br> for operational efficiency.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <h5>Phase 3</h5>
                        <h3>Campaign <br> Domination</h3>
                        <img src="{{ asset('images/elitescale-ai/framework-third.svg') }}" alt="Framework Third" class="img-fluid">
                        <p>Scale your multi-channel reach with precision targeting.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <h5>Phase 4</h5>
                        <h3>Authority <br> Expansion</h3>
                        <img src="{{ asset('images/elitescale-ai/framework-fourth.svg') }}" alt="Framework Fourth" class="img-fluid">
                        <p>Establish thought leadership <br> and industry influence.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <h5>Phase 5</h5>
                        <h3>Big Data <br> Optimization</h3>
                        <img src="{{ asset('images/elitescale-ai/framework-fifth.svg') }}" alt="Framework Fifth" class="img-fluid">
                        <p>Harness analytics to optimize <br> performance and revenue.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <button class="devx__btn-primary mt-5">
                        See EliteStack™ in Action
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- enterprise -->
    <section class="devx__elite-enterprise">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="text-white text-center">Built for Enterprise Teams Like Yours</h2>
                    <p class="text-white text-center mt-2 mb-5">
                        EliteScale delivers tailored insights, automation, and predictive strategies for every key decision-maker - so your <br> entire organization scales smarter, faster, and more profitably.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/enterprise-first.svg') }}" alt="Enterprise First" class="img-fluid">
                        <h3>For Founders & Leadership</h3>
                        <p class="text-white"><b>Clarity & Innovation at Scale: </b>Stay ahead of market shifts with predictive insights, full-funnel visibility, and innovation strategies that keep you competitive.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/enterprise-second.svg') }}" alt="Enterprise Second" class="img-fluid">
                        <h3>For Product Teams</h3>
                        <p class="text-white"><b>Smarter Roadmaps, Faster Launches: </b>Use real-time data to prioritize features, predict adoption rates, and accelerate product-market fit.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/enterprise-third.svg') }}" alt="Enterprise Third" class="img-fluid">
                        <h3>For Marketing Leaders</h3>
                        <p class="text-white"><b>Data-Driven Growth at Speed: </b>Turn complex analytics into simple, actionable strategies that fuel high-ROI campaigns and customer retention.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- faq section starts from here -->
    <section class="devx__elite-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-sm-5 mb-4 text-center devx__color-primary">FAQs About EliteScale</h2>
                </div>
            </div>
            <div class="row actual-faq-wrapper">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                How is EliteScale different from other growth solutions?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                EliteScale isn’t an off-the-shelf tool. It’s a fully customized growth system powered by AI, big data, and automation. Instead of generic dashboards, we build a predictive growth engine tailored to your KPIs and business goals.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                Who is EliteScale built for?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                EliteScale is designed for enterprise-level digital brands, SaaS companies, and scaling businesses generating seven to eight figures annually—especially those expanding into new markets, regions, or verticals.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                How long does it take to see results?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Most clients begin seeing measurable improvements within 45–60 days. Meaningful growth compounds over time, with the strongest impact typically achieved across a six to twelve month engagement.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                Do you integrate with our existing tools?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Yes. EliteScale integrates seamlessly with your existing CRM, analytics platforms, advertising tools, and SaaS stack using APIs and custom integrations—without disrupting your current workflows.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                Do you offer full marketing execution?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                We provide the growth strategy, funnel architecture, data models, and high-performing creative direction. Execution can be handled by your internal team or trusted partners, ensuring full alignment and scalability.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- faq section ends here -->

    <!-- ready to grow -->
     <section class="devx__elite-ready-to-grow">
        <div class="container px-0">
            <div class="row devx__bottom-section d-flex align-items-center justify-content-between">
                <div class="col d-flex align-items-start justify-content-center flex-column">
                    <h2 class="mb-2 devx__color-primary">Ready to Dominate Your Market?</h2>
                    <p class="text-start">
                        EliteScale turns your data, automation, and predictive <br> insights into an unstoppable growth engine, helping you <br> expand faster, smarter, and at enterprise scale.
                    </p>
                    <button class="devx__btn-primary">Get My Growth Plan</button>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/robot-image.png') }}" alt="Robot With BG" width="350" height="350">
                </div>
            </div>
        </div>
    </section>
@endsection