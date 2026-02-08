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
                            <li class="py-3">
                                <img src="{{ asset('images/about-page/tick-solid.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">Strategy and execution built into one growth system</span>
                            </li>
                            <li class="py-3">
                                <img src="{{ asset('images/about-page/tick-solid.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">No templates. Every solution is engineered for your business</span>
                            </li>
                            <li class="py-3">
                                <img src="{{ asset('images/about-page/tick-solid.svg') }}" alt="Correct Image" height="20" width="20">
                                <span class="ms-sm-2 ms-1">Built for brands that want scalable systems, not quick fixes</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 d-flex align-items-center justify-content-center">
                    <div class="inner-wrapper w-100 d-flex flex-column align-items-center justify-content-center">

                        <form method="POST" action="{{ route('contact.submit') }}" novalidate class="contact-form">
                            @csrf

                            <h2 class="devx__color-primary mb-1">Start a Growth Conversation</h2>
                            <p>
                                Tell us a bit about your business and what feels unclear.
                                We’ll guide you on the right next step.
                            </p>

                            @if (session('success'))
                                <div class="alert alert-success w-100">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <!-- Row 1: Name + Work Email -->
                            <div class="row">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="full_name"
                                        placeholder="Full Name"
                                        value="{{ old('full_name') }}"
                                        required
                                    >
                                    @error('full_name')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input
                                        type="email"
                                        name="work_email"
                                        placeholder="Work Email"
                                        value="{{ old('work_email') }}"
                                        required
                                    >
                                    @error('work_email')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2: Company + Phone (Phone REQUIRED, no optional) -->
                            <div class="row">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="company"
                                        placeholder="Company Name"
                                        value="{{ old('company') }}"
                                        required
                                    >
                                    @error('company')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input
                                        type="tel"
                                        name="phone"
                                        placeholder="Phone Number"
                                        value="{{ old('phone') }}"
                                        required
                                    >
                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 3: Do you have a website? -->
                            <div class="row">
                                <div class="form-group w-100">
                                    <label class="mb-1 d-block mb-3">Do you have a website?</label>

                                    <div class="d-flex gap-4">
                                        <label class="d-flex align-items-center justify-content-between">
                                            <input type="radio" name="has_website" value="yes"
                                                {{ old('has_website') === 'yes' ? 'checked' : '' }} style="margin-right: 8px; height: 20px; width: 20px;">
                                            Yes
                                        </label>

                                        <label class="d-flex align-items-center justify-content-between">
                                            <input type="radio" name="has_website" value="no"
                                                {{ old('has_website') === 'no' ? 'checked' : '' }} style="margin-right: 8px; height: 20px; width: 20px;">
                                            No
                                        </label>
                                    </div>

                                    @error('has_website')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Website URL (only if YES) -->
                            <div class="row" id="websiteUrlRow" style="display: none;">
                                <div class="form-group w-100">
                                    <input
                                        type="url"
                                        name="website_url"
                                        placeholder="Website URL"
                                        value="{{ old('website_url') }}"
                                    >
                                    @error('website_url')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 4: Country (REQUIRED, no optional) -->
                            <div class="row w-100">
                                <div class="col-lg-12 form-group w-100" style="grid-column-start: 1; grid-column-end: 3;">
                                    <input
                                        type="text"
                                        name="country"
                                        placeholder="Country"
                                        value="{{ old('country') }}"
                                        required
                                    >
                                    @error('country')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- What brings you here today -->
                            <div class="row">
                                <div class="form-group w-100" style="grid-column-start: 1; grid-column-end: 3;">
                                    <label class="mb-2 d-block fw-600"><b>What brings you here today?</b></label>

                                    <div class="devx-radio-group">
                                        <label class="devx-radio d-flex align-items-center py-2">
                                            <input type="radio" name="reason" value="growth_system"
                                                {{ old('reason') === 'growth_system' ? 'checked' : '' }} style="margin-right: 8px; height: 20px; width: 20px;">
                                            <span>I want to explore a growth system for my business</span>
                                        </label>

                                        <label class="devx-radio d-flex align-items-center pb-2">
                                            <input type="radio" name="reason" value="second_opinion"
                                                {{ old('reason') === 'second_opinion' ? 'checked' : '' }} style="margin-right: 8px; height: 20px; width: 20px;">
                                            <span>I want a second opinion on my current growth setup</span>
                                        </label>

                                        <label class="devx-radio d-flex align-items-center pb-2">
                                            <input type="radio" name="reason" value="not_sure"
                                                {{ old('reason') === 'not_sure' ? 'checked' : '' }} style="margin-right: 8px; height: 20px; width: 20px;">
                                            <span>I’m not sure which system fits my business yet</span>
                                        </label>
                                    </div>

                                    @error('reason')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 5: Situation (OPTIONAL textarea) -->
                            <div class="row">
                                <div class="form-group w-100">
                                    <textarea
                                        name="message"
                                        rows="5"
                                        placeholder="Tell us about your situation"
                                    >{{ old('message') }}</textarea>

                                    @error('message')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="form-group">
                                <button type="submit" class="devx__btn-primary">
                                    Start the Conversation
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection