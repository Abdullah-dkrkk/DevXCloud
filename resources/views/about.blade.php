@extends('layouts.app')

@section('content')
    <!-- hero section -->
    <section class="devx__about-hero-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-end">
                    <h1 class="text-center">Your AI-driven growth partner <br> for modern brands.</h1>
                    <p class="text-center">We help modern brands grow by building AI-powered growth systems tailored to their business. Unlike agencies that rely on random campaigns, we create predictable strategies designed to increase traffic, convert more customers, and scale revenue consistently.</p>
                    <img src="{{ asset('images/about-page/about-hero-banner-robot.png') }}" alt="About Banner Hero Robot">
                </div>
            </div>
        </div>
    </section>

    <!-- secondary card -->
    <section class="devx__about-real-results">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/about-page/real-results-main-image.png') }}" alt="Real Results Main Image">
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="content-wrapper">
                        <h2>We Build Growth Systems That Drive Real Results.</h2>
                        <p>We help brands grow by turning their strategy into a structured, data-driven growth engine. From defining a strong USP and mapping customer personas to building AI-powered systems, every step is designed to attract more customers, increase revenue, improve retention, and scale growth predictably.</p>
                        <a href="javascript:void(0);" class="theme__btn">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- video banner -->
    <section class="devx__about-video-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex align-items-center justify-content-center">
                    <a href="javascript:void(0);">
                        <img src="{{ asset('images/about-page/about-banner-video-section-thumbnail-content.png') }}" alt="About Video Thumbnail Main Image">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- video timeline section -->
    <section class="devx__about-timeline-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 flex-column d-flex align-items-center justify-content-center">
                    <h2>Our Journey & the People Who Built It</h2>
                    <p class="text-center">Every growth engine starts with people. Here’s how a small idea grew into DevXCloud — and the team who made it happen.</p>
                </div>
                <div class="col-lg-12">

                    <!-- first timeline row -->
                    <div class="row">
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="card">
                                <span class="time">2020</span>
                                <h5 class="text-center">DevXCloud Idea <br> Was Born</h5>
                                <p class="text-center">A simple idea to build smarter growth engines for founders</p>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line circle-rounded"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col bended-first">
                            <div class="blue-line"></div>
                        </div>
                    </div>

                    <!-- second timeline row -->
                    <div class="row second-row">
                        <div class="col d-flex align-items-center justify-content-center line-col bended-third">
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line circle-rounded circle-center"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="card">
                                <span class="time">2022</span>
                                <h5 class="text-center">CommerceAI <br> Launched</h5>
                                <p class="text-center">The first official growth engine went live.</p>
                            </div>    
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line circle-rounded circle-center"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col bended-second">
                            <div class="card">
                                <div class="image-avatar"></div>
                                <h5 class="text-center">Sarah Lee</h5>
                                <p class="text-center">Turning strategy into growth.</p>
                            </div>
                        </div>
                    </div>

                    <!-- third timeline row  -->
                    <div class="row third-row">
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="card">
                                <span class="time">2023</span>
                                <div class="row">
                                    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                                        <div class="image-avatar"></div>
                                        <h5>James Park</h5>
                                        <p>AI Strategist</p>
                                    </div>
                                    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                                        <div class="image-avatar"></div>
                                        <h5>Maria Khan</h5>
                                        <p>UX Engineer</p>
                                    </div>
                                    <div class="col-lg-4 d-flex flex-column align-items-center justify-content-center">
                                        <div class="image-avatar"></div>
                                        <h5>Alex Wu</h5>
                                        <p>Growth Analyst</p>
                                    </div>
                                </div>
                                <p class="text-center pt-4">Core Growth Team Formed</p>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line circle-rounded circle-center"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col bended-fourth">
                            <div class="blue-line"></div>
                        </div>
                    </div>

                    <!-- fourth timeline row -->
                    <div class="row fourth-row">
                        <div class="col d-flex align-items-center justify-content-center"></div>
                        <div class="col d-flex align-items-center justify-content-center"></div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="card">
                                <span class="time">2024</span>
                                <h5 class="text-center">Next Chapter? <br> Maybe You.</h5>
                                <a href="javascript:void(0);" class="theme__btn">Join the Team</a>
                            </div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col">
                            <div class="blue-line circle-rounded circle-center"></div>
                        </div>
                        <div class="col d-flex align-items-center justify-content-center line-col bended-second">
                            <div class="card">
                                <span class="time">2024</span>
                                <h5 class="text-center">GreenScale Formula™ Launch</h5>
                                <p class="text-center">DevXCloud expands into niche growth solutions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about - growth begins section -->
    <section class="devx__about-growth-begins">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2>Where Real Growth Begins</h2>
                    <div class="content-wrapper">
                        <p>Sustainable growth isn’t built on marketing alone. It starts with the right foundation: a clear business model, a defined target market, and systems designed to scale without falling apart.</p>
                        <p>The truth is, most brands don’t fail because their product is bad. They struggle because their growth strategy is scattered. Most agencies sell one piece of the puzzle and leave you to figure out the rest.</p>
                        <p>DevXCloud changes that by bringing everything under one roof where strategy, positioning, systems, execution, and optimization work together as one connected growth engine.</p>
                        <p>Instead of trying to stitch together vendors, tools, and teams, you get one structure, one team, and one clear path to scale with speed and confidence. Because real growth doesn’t come from juggling pieces - it comes from everything clicking together.</p>
                        <img src="{{ asset('images/about-page/real-growth-begins-main-image.jpeg') }}" alt="About Video Thumbnail Main Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about - traditional agencies -->
    <section class="devx__about-traditional-agencies">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2>DevXCloud vs Traditional Agencies</h2>
                    <p>Other agencies give you a piece of the puzzle. We build the whole machine, set it up, and help you run it.</p>
                    <div class="points-wrapper row">
                        <div class="col-lg-5 d-flex flex-column align-items-center justify-content-center">
                            <h4>DevXCloud</h4>
                            <ul class="bullet-points-wrapper">
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Checked Icon">
                                    Full growth engine that runs on strategy, not guesswork
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Checked Icon">
                                    Tailored game plan built around your product and market
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Checked Icon">
                                    One structure that connects everything from ads to data
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Checked Icon">
                                    Custom-built systems that grow with your brand
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Checked Icon">
                                    Real-time insights you actually understand and use
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Checked Icon">
                                    Strategic direction that stays with you after setup
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Checked Icon">
                                    Strategic direction that stays with you after setup
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-2 d-flex flex-column align-items-center justify-content-center">
                            <h4>Core Elements a <br> Centre Column</h4>
                            <ul class="bullet-points-wrapper bpw-col-lg-2 d-flex flex-column align-items-center justify-content-center">
                                <li>Strategy</li>
                                <li>Positioning</li>
                                <li>Execution</li>
                                <li>Systems</li>
                                <li>Analytics</li>
                                <li>Direction</li>
                                <li>Optimization</li>
                            </ul>
                        </div>
                        <div class="col-lg-5 second-5-col d-flex flex-column align-items-center justify-content-center">
                            <h4>Other Agencies</h4>
                            <ul class="bullet-points-wrapper">
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Crossed Icon">
                                    One-off services with no real direction
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Crossed Icon">
                                    Copy-paste templates everyone gets
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Crossed Icon">
                                    Scattered efforts and loose ends
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Crossed Icon">
                                    Same “packages” they sell to everyone
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Crossed Icon">
                                    Pretty dashboards you never open
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Crossed Icon">
                                    No roadmap, no ownership
                                </li>
                                <li>
                                    <img src="{{ asset('images/greenscale-ai/cross-image.svg') }}" alt="Crossed Icon">
                                    Launch and disappear after month one
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about - faq section -->
    <section class="devx__about-faq">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex flex-column align-items-center justify-content-center">
                    <h2 class="main-heading">FAQs About DevXCloud</h2>
                    <p>Here are the most common questions founders ask before working with us.</p>
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
@endsection