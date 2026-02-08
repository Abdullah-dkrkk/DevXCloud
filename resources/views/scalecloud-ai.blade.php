@extends('layouts.app')

@section('title', 'Scalecloud AI')

@section('content')
    <!-- scalecloud ai - hero section -->
    <section class="devx__launch-hero-section">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-between flex-lg-row flex-column-reverse">
                <div class="col-lg-6 px-0 d-flex align-items-lg-start align-items-center justify-content-center flex-column">
                    <h1 class="devx__color-primary mb-2">Performance Stack for <br> Scaling SaaS Brands</h1>
                    <p class="text-lg-start text-center">ScaleCloud unifies your SaaS stack with predictive analytics, <br> API integrations, and automated systems, built to accelerate <br> your growth without the chaos.</p>
                    <div class="buttons-wrapper d-flex align-items-center justify-content-start">
                        <a href="{{ url('/contact') }}" class="devx__btn-primary">Get My Scaling Plan</a>
                    </div>
                </div>
                <div class="col-lg-6 px-0 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/scalecloud-ai/scalecloud-ai-hero-section-img.svg') }}" alt="Lanchpad AI Hero Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- scalecloud ai - hero section ends here -->

    <!-- scalecloud ai - build for founders -->
    <section class="devx__launch-build-for-founders">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-lg-row flex-column">
                    <div class="first-wrapper w-50 d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/scalecloud-ai/fgs-main-img.svg') }}" alt="Build For Founders Main Image" class="img-fluid">
                    </div>
                    <div class="w-50 second-wrapper d-flex align-items-lg-start align-items-center justify-content-center flex-column">
                        <h2 class="devx__color-primary mb-2 text-lg-start text-center">The Fastest-Growing SaaS <br> Brands Are Built on Systems,<br> Not Just Features.</h2>
                        <p class="text-lg-start text-center">Most SaaS founders are laser-focused on building great features — but <br> once you reach product-market fit, it’s not the product holding you back. It’s <br> the lack of systems. Disconnected tools, manual processes, and missing <br> KPIs create growth friction that can’t be solved with code alone.</p>
                        <p class="text-lg-start text-center">ScaleCloud replaces this chaos with an intelligent, unified performance <br> stack, designed to connect your data, automate your ops, and give you the <br> predictive visibility to scale with precision.</p>
                    </div>  
                </div>
            </div>
        </div>
    </section>
    <!-- scalecloud ai - build for founders ends here -->

    <!-- scalecloud ai - what powers the scalecloud stack -->
    <section class="devx__launchpad-powers">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                    <h2 class="devx__color-primary text-center">
                        What Powers the ScaleCloud Stack?
                    </h2>
                    <p class="text-center mt-2 mb-4">
                        From API automation to predictive dashboards, every layer of ScaleCloud is engineered to streamline <br> growth and eliminate friction for scaling SaaS brands.
                    </p>
                </div>
            </div>
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <h5 class="text-white text-center">API Integration Layer</h5>
                        <p class="text-white mb-3">Sync your stack with seamless API connections, <br> no more siloed data or broken flows.</p>
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-1.svg') }}" alt="Power First" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5 class="text-white text-center">Predictive Analytics Engine</h5>
                        <p class="text-white mb-3">Anticipate churn, trends, and user behaviour <br> before it impacts growth..</p>
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-2.svg') }}" alt="Power First" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5 class="text-white text-center">Custom Growth Dashboards</h5>
                        <p class="text-white mb-3">Track your SaaS KPIs in one unified dashboard, <br> no more spreadsheets.</p>
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-3.svg') }}" alt="Power First" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5 class="text-white text-center">Automated Workflow Builder</h5>
                        <p class="text-white mb-3">Turn manual tasks into automated flows, from <br> onboarding to retention.</p>
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-4.svg') }}" alt="Power First" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5 class="text-white text-center">KPI & Funnel Intelligence</h5>
                        <p class="text-white mb-3">Optimize every funnel stage with precise <br> KPI tracking.</p>
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-5.svg') }}" alt="Power First" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper ">
                        <h5 class="text-white text-center">SaaS-Optimized Technical SEO</h5>
                        <p class="text-white mb-3">Track your SaaS KPIs in one unified dashboard, <br> no more spreadsheets.</p>
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-6.svg') }}" alt="Power First" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- scalecloud ai - what powers the scalecloud stack ends here-->

    <!-- scalecloud ai - trusted -->
    <section class="devx__launch-trusted">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="devx__color-primary text-center">Trusted By SaaS Teams Who Use <br> the Tools You Love</h2>
                    <p class="text-center mt-2 mb-4">From product analytics to CRM and billing, ScaleCloud connects with your stack, so you <br> can scale faster without switching tools.</p>
                </div>
            </div>
           <div class="saas-trusted-clients-updated">
                <!-- ORIGINAL ITEMS -->
                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/stripe.svg') }}" alt="Stripe" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/intercom.svg') }}" alt="Intercom" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/slack.svg') }}" alt="Slack" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/notion.svg') }}" alt="Notion" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/zapier.svg') }}" alt="Zapier" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/segment.svg') }}" alt="Segment" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/hubspot.svg') }}" alt="Hubspot" class="img-fluid">
                    </div>
                </div>

                <!-- DUPLICATE ITEMS (for seamless marquee loop) -->
                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/stripe.svg') }}" alt="Stripe" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/intercom.svg') }}" alt="Intercom" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/slack.svg') }}" alt="Slack" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/notion.svg') }}" alt="Notion" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/zapier.svg') }}" alt="Zapier" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/segment.svg') }}" alt="Segment" class="img-fluid">
                    </div>
                </div>

                <div class="col item">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/hubspot.svg') }}" alt="Hubspot" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- scalecloud ai - trusted ends here -->
    
    <!-- scalecloud ai - funnel -->
    <section class="devx__launch-funnel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading-para-wrapper d-flex align-items-center justify-content-center flex-column">
                    <h2 class="devx__color-primary text-center">Turn Your Funnel Into a Forecastable Growth Machine</h2>
                    <p class="mt-2 mb-4 text-center">ScaleCloud reveals what’s driving growth, what’s causing churn, and where your next best opportunities <br> lie, so you can scale confidently with data, not assumptions.</p>
                </div>
            </div>
            <div class="row cards-wrapper-with-no-image">
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-updated-1.svg') }}" alt="Launch Icon 1" class="img-fluid w-50 mb-2">
                        <h2 class="main-inner-heading">For Product Teams & Management</h2>
                        <h3 class="mb-2">Smarter Product Decisions, <br> Backed by Data</h3>
                        <p>Get a real-time view of feature usage, drop-off points, and user flows, so your team ships what <br> actually drives retention and revenue.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-updated-2.svg') }}" alt="Launch Icon 1" class="img-fluid w-50 mb-2">
                        <h2 class="main-inner-heading">For Founders & Leadership</h2>
                        <h3 class="mb-2">Growth Clarity Without Guesswork</h3>
                        <p>From acquisition to retention, ScaleCloud gives you a full-funnel breakdown with forecasting, so you know exactly where to focus and what’s working</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="inner-wrapper">
                        <img src="{{ asset('images/scalecloud-ai/launch-icon-updated-3.svg') }}" alt="Launch Icon 1" class="img-fluid w-50 mb-2">
                        <h2 class="main-inner-heading">For Founders & Leadership</h2>
                        <h3 class="mb-2">Growth Clarity Without Guesswork</h3>
                        <p>From acquisition to retention, ScaleCloud gives you a full-funnel breakdown with forecasting, so you know exactly where to focus and what’s working</p>
                    </div>
                </div>
            </div>
            <div class="row mt-sm-5 mt-4 button-wrapper d-flex align-items-center justify-content-center">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <a href="{{ url('/contact') }}" class="devx__btn-primary d-inline-flex align-items-center justify-content-center">Get A Free Growth Audit</a>
                </div>
            </div>
        </div>
    </section>
    <!-- scalecloud ai - funnel ends here -->

    <!-- scalecloud ai - startups -->
    <section class="devx__launch-startups">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="main-content-wrapper">
                        <h2 class="devx__color-primary mb-2">Who’s ScaleCloud Built For?</h2>
                        <p class="mb-4">
                            ScaleCloud is made for forward-thinkers who see where <br> technology is headed and are ready to lead the charge. For <br> brands that want more than survival, they want dominance. In <br> an era shaped by AI, automation, and data-driven decisions, <br> ScaleCloud turns your growth vision into a precise, <br> forecastable reality. Whether you’re scaling a SaaS platform, <br> optimizing for retention, or unlocking new markets, you’ll <br> have the systems to outpace competitors and shape the <br> future of your industry.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image-cta-wrapper d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ asset('images/scalecloud-ai/scalecloud-build-for.svg') }}" alt="Startups Main Image" class="img-fluid w-75">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- scalecloud ai -statups ends here -->

    <!-- scalecloud ai -faq -->
    <section class="devx__launch-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-sm-5 mb-4 text-center devx__color-primary">FAQs About Scalecloud</h2>
                </div>
            </div>
            <div class="row actual-faq-wrapper">
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <!-- FAQ 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                How is ScaleCloud different from other analytics tools?
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                ScaleCloud isn’t just a dashboard, it’s a predictive growth engine built for SaaS. We forecast churn, upsells, and MRR shifts before they happen, and automate workflows so your team acts on insights instantly.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                How long does it take to see results?
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Most teams start spotting conversion lift and churn drop within 4–6 weeks after integration. The forecasting layer starts improving accuracy almost immediately once your historical data is connected.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                Do we need a data team to use it?
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Nope. ScaleCloud’s interface is designed for non-technical teams, with one-click integrations and pre-built SaaS KPI templates. Your dev team just connects the APIs, and we handle the heavy lifting.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                Can ScaleCloud work with our current tools?
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Yes, it plays nice with your existing stack (HubSpot, Stripe, Intercom, Segment, GA4, etc.) so there’s no major workflow disruption.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                <img src="{{ asset('images/commerce-ai/faq-info-icon.svg') }}" width="20" height="20">
                                What’s the typical ROI?
                            </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                Clients report 2–5x ROI
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- scalecloud ai - faq ends here -->

    <!-- growth section starts from here -->
    <section class="devx__launch-ready">
        <div class="container px-0">
            <div class="row devx__bottom-section d-flex align-items-center justify-content-between">
                <div class="col d-flex align-items-start justify-content-center flex-column">
                    <h2 class="mb-2 devx__color-primary">Ready to Scale Smarter?</h2>
                    <p class="text-start">
                        Let ScaleCloud turn your data, insights, and automation into unstoppable growth, so you scale faster, smarter, and with complete clarity.
                    </p>
                    <a href="{{ url('/contact') }}" class="devx__btn-primary">Get My Growth Plan</a>
                </div>
                <div class="col d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/robot-image.png') }}" alt="Robot With BG" width="350" height="350">
                </div>
            </div>
        </div>
    </section>
    <!-- growth section ends here -->
@endsection