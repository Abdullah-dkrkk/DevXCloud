@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <style>
        section.launch-hero-section .row {
            padding-right: 16px;
            padding-left: 16px;
        }   
        section.launch-hero-section .button-wrapper {
            border:2px solid red;
        }
        section.launch-hero-section .col-lg-6 h1 + p {
            margin-bottom: 24px;
            color: #ffffff;
            line-height: 32px;
        }
        section.launch-hero-section .col-lg-6 h1 {
            font-size: 50px;
            margin-bottom: 20px;
            color: #ffffff;
            margin-top: -20px;
        }
        section.launch-hero-section .col-lg-6 img {
            max-width: 500px;
            padding-top: 20px;
            margin-top: 100px;
            margin-bottom: 100px;
        }
        section.launch-hero-section .col-lg-6 .buttons-wrapper {
            gap: 14px;
        }
        section.launch-hero-section .col-lg-6 .buttons-wrapper button:hover {
            opacity: 0.8;
        }
        section.launch-hero-section .col-lg-6 .buttons-wrapper button{
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
        section.launch-hero-section .col-lg-6 .buttons-wrapper button.second-button{
            border:2px solid #0F2C4E;
            background:white;
            color: #0F2C4E;
        }
        section.launch-hero-section .col-lg-6 .buttons-wrapper button.first-button {
            background: #00CEAF;
            border: 1px solid #00CEAF;
            color: #0F2C4E;
        }
    </style>
    <section class="launch-hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-start justify-content-center flex-column">
                    <h1>Growth Engine <br> for High-Revenue <br> Digital Brands</h1>
                    <p>LaunchPadAI combines tailored startup strategy with <br> intelligent automation, delivering positioning, traction, <br> and scale in one complete system.</p>
                    <div class="buttons-wrapper d-flex align-items-center justify-content-start">
                        <button class="first-button">Build My Launch Plan</button>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/elitescale-ai/elitescale-main-img.png') }}" alt="Elitescale AI Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    

    <!-- results -->
    <style>
        section.results {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        section.results h2 {
            color:white;
            margin-top: 32px;
            line-height: 48px;
        }
        section.results p.main-para {
            margin-top: 12px;
            margin-bottom: 40px;
            color:white;
        }
        section.results .inner-wrapper {
            border: 1px solid #FFFFFF4D;
            min-height: 368px;
            border-radius: 16px;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            gap: 12px;
        }
        section.results .inner-wrapper .inner-content {
            color:white;
            text-align:center;
        }
        section.results h4 {
            color: #EFCE4E;
            text-align:center;
        }
        section.results .results-main-cta-button:hover {
            opacity: 0.8;
        }
        section.results .results-main-cta-button {
            background: #00CEAF;
            border: 1px solid #00CEAF;
            color: #0F2C4E;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            margin-top: 40px;
            margin-bottom: 30px;
        }
    </style>
    <section class="results">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column text-center">
                    <h2>Results That Help High-Revenue Brands <br> Operate Like Market Leaders</h2>
                    <p class="main-para">EliteScale delivers enterprise-grade systems that give your team clarity, control, and faster growth.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-first.png') }}" alt="Results First" class="img-fluid">
                        <h4>Growth You Can <br> Forecast</h4>
                        <p  class="inner-content">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-second.png') }}" alt="Results Second" class="img-fluid">
                        <h4>Growth You Can <br> Forecast</h4>
                        <p  class="inner-content">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-third.png') }}" alt="Results Third" class="img-fluid">
                        <h4>Growth You Can <br> Forecast</h4>
                        <p  class="inner-content">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/results-fourth.png') }}" alt="Results Fourth" class="img-fluid">
                        <h4>Growth You Can <br> Forecast</h4>
                        <p  class="inner-content">Predict trends, plan ahead, and <br> scale with data clarity — not <br> guesswork.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <button class="results-main-cta-button">See the Full EliteStack™ Framework.</button>
                </div>
            </div>
        </div>
    </section>

    <style>
        section.built {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        section.built p {
            line-height: 32px;
        }
        section.built h2 {
            line-height: 48px;
        }
        section.built h2,
        section.built p {
            color:white
        }
        section.built img {
            max-width: 500px;
        }
    </style>
    <section class="built">
        <div class="container">
            <div class="row">
                <div class="offset-1 col-lg-6 d-flex align-items-start justify-content-center flex-column">
                    <h2>What EliteScale Is and <br> Who It’s Built For</h2>
                    <p>
                        EliteScale is an enterprise-grade growth engine designed for 7–8 figure <br> digital brands that want to scale smarter, faster, and with complete clarity.
                        <br><br>
                        Whether you’re leading a SaaS platform, running a high-growth eCommerce <br> business, or managing an enterprise digital service, EliteScale equips your <br> team with AI-powered systems, cross-channel visibility, and predictive <br> insights to make smarter decisions at speed.
                        <br><br>
                        It’s built for brands that are done guessing and ready to operate like market <br> leaders.
                    </p>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-end">
                    <img src="{{ asset('images/elitescale-ai/elitescale-built-section-main-img.png') }}" alt="Elitescale Built Section Main Img" class="img-fluid">
                </div>
            </div>
        </div>
    </section>


    <style>
        section.advantage {
            padding-top: 60px;
            padding-bottom: 80px;
        }
        section.advantage .main-para {
            margin-bottom: 40px;
            margin-top: 12px;
            line-height: 32px;
        }
        section.advantage .main-para, 
        section.advantage .main-heading {
            color:white;
            text-align:center;
        }
        section.advantage .inner-wrapper h5 + p {
            color:white;
            text-align:center;
            line-height: 28px;
        }
        section.advantage .inner-wrapper h5 {
            color: #EFCE4E;
            font-size: 22px;
        }
        section.advantage .inner-wrapper {
            min-height: 324px;
            border: 1px solid #FFFFFF4D;
            border-radius: 12px;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            gap:20px;
        }
        section.advantage .row .col-lg-4 {
            padding-right: 15px;
            padding-left: 15px;
        }
        section.advantage .row .col-lg-4:nth-child(4),
        section.advantage .row .col-lg-4:nth-child(5),
        section.advantage .row .col-lg-4:nth-child(6) {
            margin-top: 30px;
        }
    </style>
    <section class="advantage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="main-heading">The Advantage Behind High-Growth <br> Digital Leaders</h2>
                    <p class="main-para">EliteScale isn’t just another automation tool, it’s the complete innovation layer that gives <br> high-revenue brands the edge they need to dominate.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-first.svg') }}" alt="Advantage First" class="img-fluid">
                        <h5>Multi‑Channel Domination</h5>
                        <p>Orchestrate Google, YouTube, <br> LinkedIn, and Meta campaigns from <br> one AI-powered hub.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-second.svg') }}" alt="Advantage First" class="img-fluid">
                        <h5>AI‑Powered Workflows</h5>
                        <p>Automate complex tasks, streamline <br> processes, and optimize your growth <br> stack in real time.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-third.svg') }}" alt="Advantage First" class="img-fluid">
                        <h5>Global Scaling Strategies</h5>
                        <p>Enter new markets faster with <br> tailored frameworks designed for <br> enterprise-level expansion.</p>
                    </div>
                </div>


                <!-- second row starts from here -->
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-fourth.svg') }}" alt="Advantage First" class="img-fluid">
                        <h5>Big Data Predictive Analytics</h5>
                        <p>Predict future trends, revenue <br> shifts, and churn risks before they <br> happen.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-fifth.svg') }}" alt="Advantage First" class="img-fluid">
                        <h5>AR/VR Integration</h5>
                        <p>Create immersive product experiences <br> and interactive campaigns that set you <br> apart.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/advantage-sixth.svg') }}" alt="Advantage First" class="img-fluid">
                        <h5>Enterprise Dashboards</h5>
                        <p>Centralize every KPI and data <br> stream into one seamless, real-time <br> control center.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        section.turning {
            background: #00070F;
            padding-top: 80px;
            padding-bottom: 80px;
        }
        section.turning .inner-wrapper h2 + p {
            line-height:32px;
        }
        section.turning .inner-wrapper h2, 
        section.turning .inner-wrapper h2 + p {
            color:white;
        }
        section.turning .inner-wrapper {
            display:inline-flex;
            flex-direction:column;
            align-items:start;
            justify-content:center;
            gap: 20px;
        }
        section.turning .turning-cta-button:hover {
            opacity: 0.8;
        }
        section.turning .turning-cta-button {
            background: #00CEAF;
            border: 1px solid #00CEAF;
            color: #0F2C4E;
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
        section.turning {
            margin-bottom: 20px;
        }
    </style>
    <section class="turning">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/elitescale-ai/turning-main-img.png') }}" alt="Turning Main Img" class="img-fluid">
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper">
                        <h2>Turning Data Into Results <br> That Drive Enterprise Growth</h2>
                        <p>EliteScale empowers digital leaders to scale smarter, leveraging AI, <br> automation, and big data to unlock your next growth chapter.</p>
                        <button class="turning-cta-button">
                            See How EliteScale Works
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style>
        section.growth .main-heading {
            color:white;
            text-align:center;
        }
        section.growth .main-para {
            color:white;
            text-align:center;
            margin-top: 16px;
            line-height: 28px;
            margin-bottom: 40px;
        }
        section.growth {
            padding-top: 80px;
            padding-bottom: 80px;
        }
        section.growth .inner-wrapper {
            display:flex;
            min-height: 400px;
            align-items:center;
            justify-content:center;
            flex-direction:column;
            border: 1px solid #FFFFFF4D;
            border-radius: 20px;
            padding: 50px 20px;
            gap: 18px;
        }
        section.growth .col {
            padding-right: 10px;
            padding-left: 10px;
        }
        section.growth .inner-wrapper img {
            max-height: 80px;
        }
        section.growth .inner-wrapper h3 {
            font-size: 24px;
            line-height: 34px;
        }
        section.growth .inner-wrapper p {
            font-size: 14px;
            line-height: 24px;
        }
        section.growth .inner-wrapper h3,
        section.growth .inner-wrapper h5,
        section.growth .inner-wrapper p {
            text-align:center;
            color:white;
        }
        section.growth .growth-cta-button:hover {
            opacity: 0.8;
        }
        section.growth .growth-cta-button {
            background: #00CEAF;
            border: 1px solid #00CEAF;
            color: #0F2C4E;
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            margin-top: 40px;
            margin-bottom: 40px;
        }
    </style>
    <section class="growth">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="main-heading">The Ultimate Growth Framework <br> for Market Leaders</h2>
                    <p class="main-para">EliteStack™ combines advanced AI, predictive analytics, and innovation-driven strategy into one seamless 5-phase system - built to <br> help enterprise brands scale smarter, faster, and with absolute precision.</p>
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
                    <button class="growth-cta-button">
                        See EliteStack™ in Action
                    </button>
                </div>
            </div>
        </div>
    </section>


    <style>
        section.enterprise {
            padding-top: 80px;
            padding-bottom: 80px;
        }
        section.enterprise .main-heading {
            color:white;
        }
        section.enterprise .main-para {
            margin-top: 12px;
            line-height: 28px;
            color:white;
            text-align:center;
            margin-bottom: 40px;
        }
        section.enterprise .inner-wrapper h4 {
            margin-top: 12px;
        }
        section.enterprise .inner-wrapper h4,
        section.enterprise .inner-wrapper p {
            margin-bottom: 0px;
        }
        section.enterprise .inner-wrapper h5 {
            margin-bottom: 12px;
        }
        section.enterprise .inner-wrapper p {
            line-height: 28px;
        }
        section.enterprise .inner-wrapper {
            border: 1px solid #FFFFFF33;
            background: #0C1727;
            min-height: 500px;
            border-radius: 16px;
            color:white ;
            display:flex;
            align-items:start;
            justify-content:center;
            flex-direction:column;
            gap: 20px;
            padding: 24px;
        }
    </style>
    <section class="enterprise">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="main-heading">Built for Enterprise Teams Like Yours</h2>
                    <p class="main-para">
                        EliteScale delivers tailored insights, automation, and predictive strategies for every key decision-maker - so your <br> entire organization scales smarter, faster, and more profitably.
                    </p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/enterprise-first.png') }}" alt="Enterprise First" class="img-fluid">
                        <h4>For Founders & Leadership</h4>
                        <h5>Clarity & Innovation at Scale</h5>
                        <p>Stay ahead of market shifts with predictive insights, full-funnel visibility, and innovation strategies that keep you competitive.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/enterprise-second.png') }}" alt="Enterprise Second" class="img-fluid">
                        <h4>For Product Teams</h4>
                        <h5>Smarter Roadmaps, Faster Launches</h5>
                        <p>Use real-time data to prioritize features, predict adoption rates, and accelerate product-market fit.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/enterprise-third.png') }}" alt="Enterprise Third" class="img-fluid">
                        <h4>For Marketing Leaders</h4>
                        <h5>Data-Driven Growth at Speed</h5>
                        <p>Turn complex analytics into simple, actionable strategies that fuel high-ROI campaigns and customer retention.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- faq section starts from here -->
    <style>
        section.faq-section {
            padding-bottom: 100px;
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
            border: 2px solid #FFFFFF33
        }
        section.faq-section #accordionFlushExample {
            padding-right: 0px;
            padding-left: 0px;
        }
        section.faq-section .accordion-button[aria-expanded="false"]::after {
            filter:brightness(0) invert(1);
        } 
        section.faq-section .accordion-button[aria-expanded="true"] {
            background:#EFCE4E !important;
            color: #000C1C;
            border-bottom: none !important;
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
        section.faq-section .accordion-button img {
            filter:brightness(0) invert(1);
        }
        section.faq-section .accordion-button {
            color: #ffffff;
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
            background:#EFCE4E !important;
            border-bottom-left-radius: 16px !important;
        }
        section.faq-section .accordion-collapse.show p {
            color: #000C1C;
        }
    </style>
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="main-heading">FAQs About EliteScale</h2>
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

    <style>
        section.ready-to-grow {
            padding-top: 80px;
            padding-bottom: 120px;
        }
        section.ready-to-grow .inner-wrapper p {
            line-height:28px;
        }
        section.ready-to-grow .inner-wrapper {
            display:flex;
            flex-direction:column;
            align-items:start;
            gap:20px;
            justify-content:center;
            color:white;
        }
        section.ready-to-grow .inner-wrapper .ready-to-grow-cta-button:hover {
            opacity: 0.8;
        }
        section.ready-to-grow .inner-wrapper img {
            max-height: 500px;
        }
        section.ready-to-grow .inner-wrapper .ready-to-grow-cta-button{
            background: #00CEAF;
            border: 1px solid #00CEAF;
            color: #0F2C4E;
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
    <section class="ready-to-grow">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper">
                        <h2 class="main-heading">Ready to Dominate Your Market?</h2>
                        <p class="main-para">EliteScale turns your data, automation, and predictive <br> insights into an unstoppable growth engine, helping you <br> expand faster, smarter, and at enterprise scale.</p>
                        <button class="ready-to-grow-cta-button">
                            Get My Growth Plan
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/elitescale-ai/elitescale-robot.png') }}" alt="Elitescale Roboto">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection