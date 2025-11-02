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
            line-height: 28px;
        }
        section.launch-hero-section .col-lg-6 h1 {
            font-size: 50px;
            margin-bottom: 20px;
            color: #0F2C4E;
            margin-top: -20px;
        }
        section.launch-hero-section .col-lg-6 img {
            max-width: 600px;
            padding-top: 20px;
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
            background: #FE6A10;
            border: 1px solid #FE6A10;
            color: #fff;
        }
    </style>
    <section class="launch-hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-start justify-content-center flex-column">
                    <h1>Performance Stack for Scaling SaaS Brands</h1>
                    <p>ScaleCloud unifies your SaaS stack with predictive analytics, <br> API integrations, and automated systems, built to accelerate <br> your growth without the chaos.</p>
                    <div class="buttons-wrapper d-flex align-items-center justify-content-start">
                        <button class="first-button">Get My Scaling Plan</button>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/scalecloud-ai/scalecloud-ai-hero-section-img.png') }}" alt="Lanchpad AI Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Build for Founders -->
    <style>
        section.build-for-founders .container .row .col-lg-12{
            gap: 80px;
        }
        section.build-for-founders{
            padding-top: 80px;
            padding-bottom: 80px;
            background: #f7f7f7;
        }
        section.build-for-founders img {
            max-height: 500px;
        }
        section.build-for-founders h2 {
            font-size: 40px;
            color: #0F2C4E;
            margin-bottom: 20px;
        }
        section.build-for-founders h2 + p,
        section.build-for-founders h2 + p + p {
            margin-bottom: 20px;
            line-height: 30px;
            font-weight: 500;
        }
        section.build-for-founders .bff-cta-button:hover{
            opacity: 0.8;
        }
        /* section.build-for-founders .first-wrapper {
            margin-left: -150px;
        } */
        section.build-for-founders .bff-cta-button{
            padding: 14px 32px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            color: #fff;
            border:none;
            margin-top: 10px;
            background: #0176D3;
        }
    </style>
    <section class="build-for-founders">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <div class="first-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/fgs-main-img.png') }}" alt="Build For Founders Main Image" class="img-fluid">
                    </div>
                    <div class="second-wrapper d-flex align-items-start justify-content-center flex-column">
                        <h2>The Fastest-Growing SaaS <br> Brands Are Built on Systems,<br> Not Just Features.</h2>
                        <p>Most SaaS founders are laser-focused on building great features — but <br> once you reach product-market fit, it’s not the product holding you back. It’s <br> the lack of systems. Disconnected tools, manual processes, and missing <br> KPIs create growth friction that can’t be solved with code alone.</p>
                        <p>ScaleCloud replaces this chaos with an intelligent, unified performance <br> stack, designed to connect your data, automate your ops, and give you the <br> predictive visibility to scale with precision.</p>
                    </div>  
                </div>
            </div>
        </div>
    </section>

    <!-- what powers the scalecloud stack -->
    <style>
        section.powers .container .row {
            padding-right: 16px;
            padding-left: 16px;
        }
        section.powers .container .row .col-lg-4 {
            padding: 10px;
        }
        section.powers .container .row .col-lg-4 .inner-wrapper p  {
            text-align:center;
        }
        section.powers .container .row .col-lg-4 .inner-wrapper h5 {
            font-size: 22px;
        }
        section.powers .container .row .col-lg-4 .inner-wrapper h5, 
        section.powers .container .row .col-lg-4 .inner-wrapper p {
            color:white;
        }
        section.powers .container .row .col-lg-4 .inner-wrapper {
            display:flex;
            align-items:center;
            gap: 12px;
            flex-direction:column;
            justify-content:center;
            min-width: 100%;
            min-height: 378px;
            background: linear-gradient(180deg, #002760 0%, #00153A 100%);
            box-shadow: 0px 0px 30px 0px #00000021;
            border-radius: 20px;
        }
        section.powers .main-heading {
            font-size: 40px;
            margin-top: 80px;
            margin-bottom: 20px;    
            text-align:center;
        }
        section.powers .main-para {
            margin-bottom: 40px;
            text-align:center;
        }
    </style>
    <section class="powers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="main-heading">
                        What Powers the ScaleCloud Stack?
                    </h2>
                    <p class="main-para">
                        From API automation to predictive dashboards, every layer of ScaleCloud is engineered to streamline <br> growth and eliminate friction for scaling SaaS brands.
                    </p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5>API Integration Layer</h5>
                        <p>Sync your stack with seamless API connections, <br> no more siloed data or broken flows.</p>
                        <img src="{{ asset('images/scalecloud-ai/power-first.png') }}" alt="Power First" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5>Predictive Analytics Engine</h5>
                        <p>Anticipate churn, trends, and user behaviour <br> before it impacts growth..</p>
                        <img src="{{ asset('images/scalecloud-ai/power-second.png') }}" alt="Power Second" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5>Custom Growth Dashboards</h5>
                        <p>Track your SaaS KPIs in one unified dashboard, <br> no more spreadsheets.</p>
                        <img src="{{ asset('images/scalecloud-ai/power-third.png') }}" alt="Power Third" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5>Automated Workflow Builder</h5>
                        <p>Turn manual tasks into automated flows, from <br> onboarding to retention.</p>
                        <img src="{{ asset('images/scalecloud-ai/power-fourth.png') }}" alt="Power Fourth" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5>KPI & Funnel Intelligence</h5>
                        <p>Optimize every funnel stage with precise <br> KPI tracking.</p>
                        <img src="{{ asset('images/scalecloud-ai/power-fifth.png') }}" alt="Power Fifth" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5>SaaS-Optimized Technical SEO</h5>
                        <p>Track your SaaS KPIs in one unified dashboard, <br> no more spreadsheets.</p>
                        <img src="{{ asset('images/scalecloud-ai/power-sixth.png') }}" alt="Power Sixth" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        section.trusted {
            padding-top: 80px;
            padding-bottom: 100px;
            background: #f7f7f7;
            margin-top: 80px;
        }
        section.trusted h2.main-heading {
            text-align:center;
            font-size: 40px;
            color: #0F2C4E;
        }
        section.trusted p.main-para {
            text-align:center;
            margin-top: 20px;
            margin-bottom: 60px;
        }
        section.trusted .inner-wrapper img{
            transform:scale(0.85);
        }
        section.trusted .inner-wrapper {
            min-height: 140px;
            background: white;
            box-shadow: 0px 4px 40px 0px #00000012;
            border-radius: 14px;
            display:flex;
            align-items:center;
            justify-content:center;
        }
    </style>
    <section class="trusted">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="main-heading">Trusted by SaaS Teams Who Use <br> the Tools You Love</h2>
                    <p class="main-para">From product analytics to CRM and billing, ScaleCloud connects with your stack, so you <br> can scale faster without switching tools.</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/stripe.svg') }}" alt="Stripe" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/intercom.svg') }}" alt="Intercom" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/slack.svg') }}" alt="Slack" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/notion.svg') }}" alt="Notion" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/zapier.svg') }}" alt="Zapier" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/segment.svg') }}" alt="Segment" class="img-fluid">
                    </div>
                </div>
                <div class="col">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/hubspot.svg') }}" alt="Hubspot" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Funnel -->
    <style>
        section.funnel .heading-para-wrapper p {
            text-align:center;
            margin-top: 20px;
            line-height: 28px;
        }
        section.funnel .heading-para-wrapper {
            padding-top: 60px;
            padding-bottom: 60px;
        }
        section.funnel .cards-wrapper-with-no-image .col-lg-4 {
            padding-right: 15px;
            padding-left: 15px;
        }
        section.funnel .cards-wrapper-with-no-image .inner-wrapper h5 {
            line-height: 32px;
            margin-bottom: 12px;
        }
        section.funnel .cards-wrapper-with-no-image .inner-wrapper h4 {
            margin-bottom: 20px;
        }
        section.funnel .cards-wrapper-with-no-image .inner-wrapper {
            display:flex;
            flex-direction:column;
            align-items:start;
            justify-content:end;
            padding: 40px;
            min-height: 444px;
            background: #ECEEF1;
            border-radius: 20px;
        }
        section.funnel .row.button-wrapper a {
            padding: 14px 26px;
            border-radius: 12px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            font-family:"Bricolage-Grotesque";
            text-transform: uppercase;
            letter-spacing: 0.3px;
            transition: 0.2s;
            background: #FE6A10;
            border: 1px solid #FE6A10;
            color: #fff;
            text-decoration:none;
            margin-top: 40px;
            margin-bottom: 80px;
        }
    </style>
    
    <section class="funnel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading-para-wrapper d-flex align-items-center justify-content-center flex-column">
                    <h2>Turn Your Funnel Into a Forecastable Growth Machine</h2>
                    <p>ScaleCloud reveals what’s driving growth, what’s causing churn, and where your next best opportunities <br> lie, so you can scale confidently with data, not assumptions.</p>
                </div>
            </div>
            <div class="row cards-wrapper-with-no-image">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <h4>For Product Teams</h4>
                        <h5>Smarter Product Decisions, <br> Backed by Data</h5>
                        <p>Get a real-time view of feature usage, drop-off <br> points, and user flows, so your team ships what <br> actually drives retention and revenue.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <h4>For Founders & Leadership</h4>
                        <h5>Growth Clarity Without Guesswork</h5>
                        <p>From acquisition to retention, ScaleCloud gives you a full-funnel breakdown with forecasting, so you know exactly where to focus and what’s working</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <h4>For Founders & Leadership</h4>
                        <h5>Growth Clarity Without Guesswork</h5>
                        <p>From acquisition to retention, ScaleCloud gives you a full-funnel breakdown with forecasting, so you know exactly where to focus and what’s working</p>
                    </div>
                </div>
            </div>
            <div class="row button-wrapper d-flex align-items-center justify-content-center">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <a href="javascript:void(0);">Get A Free Growth Audit</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Startups -->
    <style>
        section.startups {
            background: #f7f7f7;
            padding-top: 80px;
            padding-bottom: 80px;
        }
        section.startups h4 + p {
            line-height: 26px;
        }
        section.startups h4 {
            font-size: 38px;
            line-height: 48px;
            margin-bottom: 32px;
            color: #0F2C4E;
        }
        section.startups .col-lg-12 {
            gap: 100px;
        }
        section.startups .image-cta-wrapper img{
            border-radius: 12px;
            max-height: 500px;
        }
    </style>
    <section class="startups">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <div class="main-content-wrapper">
                        <h4>Who’s ScaleCloud Built For?</h4>
                        <p>
                            ScaleCloud is made for forward-thinkers who see where <br> technology is headed and are ready to lead the charge. For <br> brands that want more than survival, they want dominance. In <br> an era shaped by AI, automation, and data-driven decisions, <br> ScaleCloud turns your growth vision into a precise, <br> forecastable reality. Whether you’re scaling a SaaS platform, <br> optimizing for retention, or unlocking new markets, you’ll <br> have the systems to outpace competitors and shape the <br> future of your industry.
                        </p>
                    </div>
                    <div class="image-cta-wrapper d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('images/scalecloud-ai/scalecloud-build-for.png') }}" alt="Startups Main Image" class="img-fluid">
                    </div>
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
                    <h2 class="main-heading">FAQs About SacleCloud</h2>
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
                    <h3>Ready to Scale <br> Smarter?</h3>
                    <p class="text-center">Let ScaleCloud turn your data, insights, and automation into unstoppable growth, so you scale faster, smarter, and with complete clarity.</p>
                    <button class="theme__btn text-uppercase">Get My Growth Plan</button>
               </div>
               <div class="col d-inline-flex align-items-center justify-content-end">
                    <img src="{{ asset('images/robot-image.png') }}" alt="" class="img-fluid">
               </div>
            </div>
        </div>
    </section>
    <!-- growth section ends here -->
@endsection