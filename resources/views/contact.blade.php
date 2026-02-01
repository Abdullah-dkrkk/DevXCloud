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
                    <div class="inner-wrapper d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/launchpad-ai/content-first.svg') }}" class="img-fluid" style="width: 100%; height: 550px;">
                    </div>
                </div>
                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper d-flex flex-column align-items-start justify-content-center">

                        <h2>Contact Now!</h2>
                        <p>submit the form below to contact us if you have any queries or concerns.</p>
                        
                        @if (session('success'))
                            <div class="alert alert-success w-100">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('contact.submit') }}" novalidate class="contact-form">
                            @csrf
                            <div class="row">
                                <!-- first name -->
                                <div class="form-group">
                                    <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
                                    @error('first_name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- last name -->
                                <div class="form-group">
                                    <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                    @error('last_name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- job title -->
                                <div class="form-group">
                                    <input type="text" name="job_title" placeholder="Job Title" value="{{ old('job_title') }}">
                                </div>

                                
                                <!-- work email -->
                                <div class="form-group">
                                    <input type="email" name="work_email" placeholder="Work Email" value="{{ old('work_email') }}" required>
                                    @error('work_email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- company -->
                                <div class="form-group">
                                    <input type="text" name="company" placeholder="Company" value="{{ old('company') }}" required>
                                    @error('company')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- employed status -->
                                <div class="form-group select">
                                    <select name="employed" required>
                                        <option value="">Are you employed?</option>
                                        <option value="yes" {{ old('employed')=='yes'?'selected':'' }}>Yes</option>
                                        <option value="no" {{ old('employed')=='no'?'selected':'' }}>No</option>
                                    </select>
                                    @error('employed')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- mobile phone number -->
                                <div class="form-group">
                                    <input type="tel" name="mobile" placeholder="Mobile Number" value="{{ old('mobile') }}" required>
                                    @error('mobile')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- country -->
                                <div class="form-group select">
                                    <select name="country" required>
                                        <option value="">Select Country</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="USA">USA</option>
                                        <option value="UK">UK</option>
                                    </select>
                                    @error('country')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <!-- language -->
                                <div class="form-group language-dropdown select">
                                    <select name="language" required>
                                        <option value="">Preferred Language</option>
                                        <option value="English">English</option>
                                        <option value="Urdu">Urdu</option>
                                    </select>
                                    @error('language')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- terms and services label -->
                            <div class="form-group pt-0">
                                <label>
                                    <input type="checkbox" name="terms" required>
                                    <p class="mb-0">
                                        I have read and agree to the
                                        <a href="{{ route('terms-of-service') }}" target="_blank">&nbsp;Terms of Service&nbsp;</a>
                                        and
                                        <a href="{{ route('privacy-policy') }}" target="_blank">&nbsp;Privacy Policy&nbsp;</a>
                                    </p>
                                </label>
                                @error('terms') <small>{{ $message }}</small> @enderror
                            </div>

                            <!-- submit button -->
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