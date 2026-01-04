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
@endsection