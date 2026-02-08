@extends('layouts.app')


@section('title', 'Contact Us')


@section('content')
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
                <div class="col-lg-5 d-flex align-items-center justify-content-center pb-lg-5">
                    <div class="inner-wrapper d-flex align-items-start justify-content-center flex-column pb-lg-5">
                        <h2 class="mb-2 devx__color-primary">Let’s Start Your Growth Journey</h2>
                        <p>Tell us a bit about your business. We’ll review your goals and get back with the next steps to build your custom growth system.</p>
                        <ul class="list-unstyled"> 
                            <li class="py-2">
                                <img src="{{ asset('images/about-page/tick-solid.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">Strategy and execution built into one growth system</span>
                            </li>
                            <li class="py-2">
                                <img src="{{ asset('images/about-page/tick-solid.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">No templates. Every solution is engineered for your business</span>
                            </li>
                            <li class="py-2">
                                <img src="{{ asset('images/about-page/tick-solid.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">Built for brands that want scalable systems, not quick fixes</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper w-100 d-flex flex-column align-items-center justify-content-center">
                        @if (session('success'))
                            <div class="alert alert-success w-100">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.submit') }}" novalidate class="contact-form">

                            <h2 class="devx__color-primary text-center mb-3">Contact Us</h2>
                            
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