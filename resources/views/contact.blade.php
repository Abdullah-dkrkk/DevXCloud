@extends('layouts.app')


@section('title', 'Contact Us')


@section('content')
    <!-- banner starts from here -->
    <section class="contact-banner" style="display:none;">
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

                        @php
                            /*
                            Copy-paste ready country dataset (name, dial code, suggested phone placeholder).
                            If you later decide to use a Laravel package (countries + flags), we can replace this array with dynamic data.
                            */
                            $countries = [
                                ['code' => 'US', 'name' => 'United States', 'dial' => '+1',   'ph' => 'e.g. 201 555 0123'],
                                ['code' => 'CA', 'name' => 'Canada',        'dial' => '+1',   'ph' => 'e.g. 416 555 0123'],
                                ['code' => 'GB', 'name' => 'United Kingdom','dial' => '+44',  'ph' => 'e.g. 7400 123456'],
                                ['code' => 'AU', 'name' => 'Australia',     'dial' => '+61',  'ph' => 'e.g. 412 345 678'],
                                ['code' => 'NZ', 'name' => 'New Zealand',   'dial' => '+64',  'ph' => 'e.g. 21 123 4567'],
                                ['code' => 'PK', 'name' => 'Pakistan',      'dial' => '+92',  'ph' => 'e.g. 300 1234567'],
                                ['code' => 'IN', 'name' => 'India',         'dial' => '+91',  'ph' => 'e.g. 98765 43210'],
                                ['code' => 'BD', 'name' => 'Bangladesh',    'dial' => '+880', 'ph' => 'e.g. 1712 345678'],
                                ['code' => 'AE', 'name' => 'United Arab Emirates','dial' => '+971','ph' => 'e.g. 50 123 4567'],
                                ['code' => 'SA', 'name' => 'Saudi Arabia',  'dial' => '+966', 'ph' => 'e.g. 50 123 4567'],
                                ['code' => 'QA', 'name' => 'Qatar',         'dial' => '+974', 'ph' => 'e.g. 3312 3456'],
                                ['code' => 'OM', 'name' => 'Oman',          'dial' => '+968', 'ph' => 'e.g. 9212 3456'],
                                ['code' => 'KW', 'name' => 'Kuwait',        'dial' => '+965', 'ph' => 'e.g. 500 12345'],
                                ['code' => 'BH', 'name' => 'Bahrain',       'dial' => '+973', 'ph' => 'e.g. 3600 1234'],
                                ['code' => 'TR', 'name' => 'Turkey',        'dial' => '+90',  'ph' => 'e.g. 501 234 5678'],
                                ['code' => 'DE', 'name' => 'Germany',       'dial' => '+49',  'ph' => 'e.g. 1512 3456789'],
                                ['code' => 'FR', 'name' => 'France',        'dial' => '+33',  'ph' => 'e.g. 6 12 34 56 78'],
                                ['code' => 'ES', 'name' => 'Spain',         'dial' => '+34',  'ph' => 'e.g. 612 345 678'],
                                ['code' => 'IT', 'name' => 'Italy',         'dial' => '+39',  'ph' => 'e.g. 312 345 6789'],
                                ['code' => 'NL', 'name' => 'Netherlands',   'dial' => '+31',  'ph' => 'e.g. 6 12345678'],
                                ['code' => 'BE', 'name' => 'Belgium',       'dial' => '+32',  'ph' => 'e.g. 470 12 34 56'],
                                ['code' => 'CH', 'name' => 'Switzerland',   'dial' => '+41',  'ph' => 'e.g. 79 123 45 67'],
                                ['code' => 'SE', 'name' => 'Sweden',        'dial' => '+46',  'ph' => 'e.g. 70 123 45 67'],
                                ['code' => 'NO', 'name' => 'Norway',        'dial' => '+47',  'ph' => 'e.g. 412 34 567'],
                                ['code' => 'DK', 'name' => 'Denmark',       'dial' => '+45',  'ph' => 'e.g. 20 12 34 56'],
                                ['code' => 'FI', 'name' => 'Finland',       'dial' => '+358', 'ph' => 'e.g. 40 123 4567'],
                                ['code' => 'IE', 'name' => 'Ireland',       'dial' => '+353', 'ph' => 'e.g. 85 123 4567'],
                                ['code' => 'PT', 'name' => 'Portugal',      'dial' => '+351', 'ph' => 'e.g. 912 345 678'],
                                ['code' => 'PL', 'name' => 'Poland',        'dial' => '+48',  'ph' => 'e.g. 512 345 678'],
                                ['code' => 'RO', 'name' => 'Romania',       'dial' => '+40',  'ph' => 'e.g. 712 345 678'],
                                ['code' => 'GR', 'name' => 'Greece',        'dial' => '+30',  'ph' => 'e.g. 691 234 5678'],
                                ['code' => 'AT', 'name' => 'Austria',       'dial' => '+43',  'ph' => 'e.g. 664 123456'],
                                ['code' => 'CZ', 'name' => 'Czechia',       'dial' => '+420', 'ph' => 'e.g. 601 123 456'],
                                ['code' => 'HU', 'name' => 'Hungary',       'dial' => '+36',  'ph' => 'e.g. 20 123 4567'],
                                ['code' => 'SK', 'name' => 'Slovakia',      'dial' => '+421', 'ph' => 'e.g. 901 123 456'],
                                ['code' => 'UA', 'name' => 'Ukraine',       'dial' => '+380', 'ph' => 'e.g. 50 123 4567'],
                                ['code' => 'RU', 'name' => 'Russia',        'dial' => '+7',   'ph' => 'e.g. 912 345 67 89'],
                                ['code' => 'BR', 'name' => 'Brazil',        'dial' => '+55',  'ph' => 'e.g. 11 91234 5678'],
                                ['code' => 'AR', 'name' => 'Argentina',     'dial' => '+54',  'ph' => 'e.g. 11 2345 6789'],
                                ['code' => 'CL', 'name' => 'Chile',         'dial' => '+56',  'ph' => 'e.g. 9 1234 5678'],
                                ['code' => 'CO', 'name' => 'Colombia',      'dial' => '+57',  'ph' => 'e.g. 300 1234567'],
                                ['code' => 'MX', 'name' => 'Mexico',        'dial' => '+52',  'ph' => 'e.g. 55 1234 5678'],
                                ['code' => 'ZA', 'name' => 'South Africa',  'dial' => '+27',  'ph' => 'e.g. 82 123 4567'],
                                ['code' => 'NG', 'name' => 'Nigeria',       'dial' => '+234', 'ph' => 'e.g. 803 123 4567'],
                                ['code' => 'EG', 'name' => 'Egypt',         'dial' => '+20',  'ph' => 'e.g. 100 123 4567'],
                                ['code' => 'KE', 'name' => 'Kenya',         'dial' => '+254', 'ph' => 'e.g. 712 345678'],
                                ['code' => 'CN', 'name' => 'China',         'dial' => '+86',  'ph' => 'e.g. 138 0013 8000'],
                                ['code' => 'HK', 'name' => 'Hong Kong',     'dial' => '+852', 'ph' => 'e.g. 5123 4567'],
                                ['code' => 'SG', 'name' => 'Singapore',     'dial' => '+65',  'ph' => 'e.g. 8123 4567'],
                                ['code' => 'MY', 'name' => 'Malaysia',      'dial' => '+60',  'ph' => 'e.g. 12 345 6789'],
                                ['code' => 'ID', 'name' => 'Indonesia',     'dial' => '+62',  'ph' => 'e.g. 812 3456 7890'],
                                ['code' => 'PH', 'name' => 'Philippines',   'dial' => '+63',  'ph' => 'e.g. 917 123 4567'],
                                ['code' => 'JP', 'name' => 'Japan',         'dial' => '+81',  'ph' => 'e.g. 90 1234 5678'],
                                ['code' => 'KR', 'name' => 'South Korea',   'dial' => '+82',  'ph' => 'e.g. 10 1234 5678'],
                                ['code' => 'TH', 'name' => 'Thailand',      'dial' => '+66',  'ph' => 'e.g. 81 234 5678'],
                                ['code' => 'VN', 'name' => 'Vietnam',       'dial' => '+84',  'ph' => 'e.g. 912 345 678'],
                            ];

                            // Default dial/placeholder if nothing selected yet
                            $defaultDial = '+';
                            $defaultPhonePh = 'Phone Number';
                        @endphp

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

                            <!-- Row 2: Company + Country (Country dropdown replaces old Phone position) -->
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

                                <div class="form-group select">
                                    <select name="country" id="countrySelect" required>
                                        <option value="" disabled {{ old('country') ? '' : 'selected' }}>Select a country</option>

                                        @foreach ($countries as $c)
                                            <option
                                                value="{{ $c['name'] }}"
                                                data-code="{{ $c['code'] }}"
                                                data-dial="{{ $c['dial'] }}"
                                                data-placeholder="{{ $c['ph'] }}"
                                                {{ old('country') === $c['name'] ? 'selected' : '' }}
                                            >
                                                {{ $c['name'] }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('country')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Row 2.5 (appears AFTER selecting country): Phone (with auto country code) + State -->
                            <div class="row" id="phoneStateRow" style="display: none; grid-template-columns: 1fr 1fr;">
                                <!-- Phone group (50%) -->
                                <div class="form-group" style="min-width: 50%;">
                                    <div class="d-flex align-items-center" style="gap: 10px;">
                                        <!-- Small non-changeable country code field -->
                                        <input
                                            type="text"
                                            id="countryDialCode"
                                            value="{{ old('country_dial_code', $defaultDial) }}"
                                            readonly
                                            tabindex="-1"
                                            aria-hidden="true"
                                            style="min-width: 60px; max-width: 60px; padding-right: 0px !important;"
                                        >

                                        <!-- Actual phone input -->
                                        <input
                                            type="tel"
                                            name="phone"
                                            id="phoneInput"
                                            placeholder="{{ old('phone') ? '' : $defaultPhonePh }}"
                                            value="{{ old('phone') }}"
                                            required
                                            style="min-width: calc(100% - 85px)"
                                        >
                                    </div>

                                    @error('phone')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- State field (50%) -->
                                <div class="form-group">
                                    <select name="state" id="stateSelect" required>
                                        <option value="">Select state</option>
                                    </select>
                                    @error('state')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Website dropdown (replaces radio). 100% width -->
                            <div class="row">
                                <div class="form-group w-100 select">
                                    <select name="has_website" id="hasWebsiteSelect" required style="width: 100%;">
                                        <option value="" disabled {{ old('has_website') ? '' : 'selected' }}>Do you have a website?</option>
                                        <option value="yes" {{ old('has_website') === 'yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="no"  {{ old('has_website') === 'no' ? 'selected' : '' }}>No</option>
                                    </select>

                                    @error('has_website')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group w-100" id="websiteUrlRow" style="display: none;">
                                    <input
                                        type="url"
                                        name="website_url"
                                        id="websiteUrlInput"
                                        placeholder="Website URL"
                                        value="{{ old('website_url') }}"
                                    >
                                    @error('website_url')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- What brings you here today -->
                            <div class="row">
                                <div class="form-group w-100" style="grid-column-start: 1; grid-column-end: 3;">
                                    <label class="mb-2 d-block fw-600"><b>What brings you here today?</b></label>

                                    <div class="devx-checkbox-group">
                                        <label class="devx-checkbox d-flex align-items-center py-2">
                                            <input type="checkbox"
                                                name="reason[]"
                                                value="growth_system"
                                                {{ is_array(old('reason')) && in_array('growth_system', old('reason')) ? 'checked' : '' }}
                                                style="margin-right: 8px; height: 20px; width: 20px;">
                                            <span>I want to explore a growth system for my business</span>
                                        </label>

                                        <label class="devx-checkbox d-flex align-items-center pb-2">
                                            <input type="checkbox"
                                                name="reason[]"
                                                value="second_opinion"
                                                {{ is_array(old('reason')) && in_array('second_opinion', old('reason')) ? 'checked' : '' }}
                                                style="margin-right: 8px; height: 20px; width: 20px;">
                                            <span>I want a second opinion on my current growth setup</span>
                                        </label>

                                        <label class="devx-checkbox d-flex align-items-center pb-2">
                                            <input type="checkbox"
                                                name="reason[]"
                                                value="not_sure"
                                                {{ is_array(old('reason')) && in_array('not_sure', old('reason')) ? 'checked' : '' }}
                                                style="margin-right: 8px; height: 20px; width: 20px;">
                                            <span>I’m not sure which system fits my business yet</span>
                                        </label>
                                    </div>

                                    @error('reason')
                                        <small>{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            <!-- Situation (OPTIONAL textarea) -->
                            <div class="row">
                                <div class="form-group w-100">
                                    <label class="mb-2"><b>Tell us about your situation</b></label>
                                    <textarea
                                        name="message"
                                        rows="5"
                                        placeholder="Briefly describe your business, what you’ve tried so far, and where growth feels unclear right now."
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