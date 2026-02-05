@extends('layouts.app')

@section('content')
    <style>
        .contact-banner h1 {
            font-size: clamp(32px, 3.5vw, 46px);
            line-height: clamp(48px, 4.5vw, 60px);
        }
        .contact-banner {
            background: linear-gradient(
                180deg,
                #0f1e46 0%,
                #122a66 18%,
                #143b85 54%,
                #143b85 60%,
                #122a66 94%,
                #0f1e46 100%
            )
        }
        .contact-banner .container .row .col-lg-12 {
            min-height: 300px;
        }

        .contact-content {
            padding-top: 92px;
            padding-bottom: 92px;
        }
        @media only screen and (max-width: 1400px) {
            .container {
                min-width: 100%;
            }
        }
        @media only screen and (max-width: 1330px) {
            nav .theme__btn {
                display:none;
            }
            .navbar-expand-xl .navbar-nav .nav-link {
                text-wrap:nowrap;
            }
            body nav .nav-item span {
                font-size: 12px;
            }
            nav.navbar-expand-xl .container {
                padding-right: 0px;
                padding-left: 0px;
            }
            .navbar-brand {
                padding-left: 16px;
            }
            .navbar-toggler {
                margin-right: 16px;
            }
        }
        @media only screen and (max-width: 1330px) and (min-width: 1024px) {
            .navbar-expand-xl .navbar-nav {
                margin-right: 16px;
            }
        }
        @media only screen and (max-width: 1201px) {
            .navbar-expand-xl .navbar-nav li {
                min-width: 100% !important;
                padding-right: 16px !important;
                padding-left: 16px !important;
            }
            .navbar-expand-xl .navbar-nav {
                float:left;
            }
            .navbar-collapse{
                margin-top: -10px;
                background:white;   
                padding-top: 12px;
                padding-bottom: 24px;
            }
        }

    </style>
    <!-- banner starts from here -->
    <section class="contact-banner">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-12 h-100 d-flex align-items-center justify-content-center">
                    <h1 class="text-white">Contact Us</h1>
                </div>
            </div>
        </div>
    </section>



    <!-- main contact section -->
    <section class="contact-section-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper d-flex align-items-start justify-content-center flex-column">
                        <h2 class="mb-sm-0 mb-3">Let’s Start Your Growth Journey</h2>
                        <p>Tell us a bit about your business. We’ll review your goals and get back with the next steps to build your custom growth system.</p>
                        <ul class="list-unstyled"> 
                            <li class="py-2">
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">Strategy and execution built into one growth system</span>
                            </li>
                            <li class="py-2">
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">No templates. Every solution is engineered for your business</span>
                            </li>
                            <li class="py-2">
                                <img src="{{ asset('images/greenscale-ai/correct-image.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">Built for brands that want scalable systems, not quick fixes</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper w-100 d-flex flex-column align-items-start justify-content-center">

                        @if (session('success'))
                            <div class="alert alert-success w-100">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.submit') }}" novalidate class="contact-form">
                            @csrf

                            <!-- Row 1: Full Name + Work Email -->
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" name="full_name" placeholder="Full Name" value="{{ old('full_name') }}" required>
                                    @error('full_name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email" name="work_email" placeholder="Work Email" value="{{ old('work_email') }}" required>
                                    @error('work_email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2: Company + Phone -->
                            <div class="row">
                                <div class="form-group">
                                    <input type="text" name="company" placeholder="Company" value="{{ old('company') }}" required>
                                    @error('company')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="tel" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 3: Message -->
                            <div class="row">
                                <div class="form-group w-100">
                                    <textarea name="message" placeholder="Your Message" rows="5" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group">
                                <button type="submit" class="devx__btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection