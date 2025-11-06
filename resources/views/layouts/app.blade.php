<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Global CSS -->
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
</head>
<body class="@if(request()->is('/')) custom-home @elseif(request()->is('commerce-ai')) custom-commerce-ai @else custom-{{ str_replace('/', '-', request()->path()) }} @endif">

    <!-- Header -->
    <!-- Header -->
    <style>
        body {
            overflow-x:hidden;
        }
        body.custom-elitescale-ai {
            background: #030C1C;
        }
        body.custom-greenscale-ai {
            background: #FFFFF3;
        }
        @media only screen and (min-width: 1400px) {
            .container {
                max-width: 1460px;
            }
        }
        body {
            background:white;
        }
        /* navbar css starts from here */
        nav {
            height: 100px;
            box-shadow: 0px 4px 40px 0px #0000001F;
        }
        nav .nav-item img {
            height: 12px;
            width: 12px;
            /* display:none; */
        }
        nav .nav-item span {
            margin-right:2px;
            font-size: 14px;
        }
        nav ul .nav-item:not(:last-child):not(.no-padding-right):not(.no-padding-left) {
            padding-right: 8px;
            padding-left: 8px;
        }
        nav .theme__btn {
            background: #0176D3;
            color:#ffffff !important;
            border-radius: 8px;
            padding: 10px 24px !important;
            line-height: 24px;
            font-weight: 600;
            margin-left: 30px;
            font-size: 14px;
            text-transform:uppercase;
        }
        /* navbar css ends here */
    </style>
    <nav class="navbar navbar-expand-lg" id="navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" width="130">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item no-padding-left">
                        <a class="nav-link active" href="{{ url('/commerce-ai') }}">
                            <span>CommerceAI</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/launchpad-ai') }}">
                            <span>LaunchPadAI</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/scalecloud-ai') }}">
                            <span>ScaleCloud</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/elitescale-ai') }}">
                            <span>EliteScale</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/greenscale-ai') }}">
                            <span>GreenScaleFormula</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item no-padding-right">
                        <a class="nav-link active" href="{{ url('/about') }}">
                            <span>About DevXCloud</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active theme__btn" href="{{ url('/') }}">
                            Get a proposal
                        </a>
                    </li>
                    {{-- @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link btn btn-link text-white text-decoration-none" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container-fluid px-0">
        @yield('content')
    </main>

    <!-- Footer -->
     <style>
        footer {
            padding-top: 80px;
            background:var(--theme-primary);
            padding-bottom: 34px;
            font-family:'Montserrat';
        }
        footer .upper-container .first-column p {
            font-weight:600;
            line-height: 28px;
        }
        footer .upper-container .first-column a {
            text-decoration:none;
            color:var(--theme-white);
            font-weight:bolder;
        }
        footer .upper-container ul {
            padding-left: 0px;
            list-style-type:none;
        }
        footer .upper-container ul li:not(:last-child) {
            margin-bottom: 16px;
        }
        footer .upper-container ul li a {
            color:var(--theme-white);
            font-weight: 600;
            font-size: 16px;
            text-decoration:none;
        }
        footer .upper-container h5 {
            font-family:"Bricolage-Grotesque";
            margin-bottom: 20px;
            color:var(--theme-white);
            font-weight: bolder;
        }
        footer .upper-container p.first-col-p {
            font-size: 16px;
            color:var(--theme-white);
            margin-bottom: 40px;
            font-family:"Bricolage-Grotesque";
        }
        footer .address,
        footer .customer-service {
            color: var(--theme-white);
            line-height: 24px;
            font-family:"Bricolage-Grotesque";
            font-weight:bolder;
        }
        footer .privacy-terms-wrapper {
            width: calc(100% - 60px);
            font-family:"Bricolage-Grotesque";
        }
        footer .lower-container button.social-button {
            color: var(--theme-white);
            border: 1px solid var(--theme-white);
            border-radius: 100px;
            padding: 8px 16px;
            font-weight:bolder;
            transition: 0.2s;
            background:transparent;
        }
        footer .lower-container button.social-button:hover {
            color:white;
            background: #0A66C2;
            border-color: #0A66C2;
        }
        footer .lower-container {
            padding-top: 14px;
            font-family:"Bricolage-Grotesque";
            color:var(--theme-white);
        }
        footer .social-buttons-wrapper {
            gap: 8px;
        }
     </style>
    <footer>
        <div class="upper-container container">
            <div class="row">
                <div class="col-lg-3 first-column">
                    <p class="text-start first-col-p">DevXcloud is a powerful Performance <br> Management Software for Employees <br> and a cloud-based HR Platform</p>
                    <div class="privacy-terms-wrapper d-flex align-items-center justify-content-between">
                        <a href="javascript:void(0);" class="privacy">Privacy Policy</a>
                        <a href="javascript:void(0);" class="terms">Terms & Conditions</a>
                    </div>
                </div>
                <div class="col-lg-2 offset-1">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="javascript:void(0);">Why Us</a></li>
                        <li><a href="javascript:void(0);">Products</a></li>
                        <li><a href="javascript:void(0);">Insights</a></li>
                        <li><a href="javascript:void(0);">Pricing</a></li>
                        <li><a href="javascript:void(0);">About Us</a></li>
                        <li><a href="javascript:void(0);">Blog</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5>Other Link</h5>
                    <ul>
                        <li><a href="javascript:void(0);">Contact</a></li>
                        <li><a href="javascript:void(0);">Benefits</a></li>
                        <li><a href="javascript:void(0);">Cookie Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h5>Contact</h5>
                    <div class="address-wrapper d-flex align-items-start justify-content-start">
                        <img src="{{ asset('images/location.svg') }}" alt="Location Icon" class="me-2 mt-1" width="18" height="18">
                        <p class="address">Office 3202, The One Tower, Barsha <br> Heights, PO BOX 500033, UAE.</p>
                    </div>
                    <h5 class="mt-4">Customer Service</h5>
                    <p class="customer-service mb-2 pb-1">
                        <img src="{{ asset('images/call.svg') }}" alt="Location Icon" class="me-2" width="16" height="16">
                        +971 52 2183074 &nbsp;&nbsp;&nbsp; +971 44 466308
                    </p>
                    <p class="customer-service">
                        <img src="{{ asset('images/location.svg') }}" alt="Location Icon" class="me-2" width="16" height="16">
                        sales@gulfhr.ae
                    </p>
                </div>
            </div>
        </div>
        <hr class="container text-white">
        <div class="container lower-container d-flex align-items-center justify-content-between">
            <p>© 2023 gulfHR. &nbsp;&nbsp; All rights reserved.</p>
            <div class="social-buttons-wrapper d-flex align-items-center justify-content-end">
                <button class="social-button">Facebook</button>
                <button class="social-button">Twitter</button>
                <button class="social-button">Gmail</button>
                <button class="social-button">Linkedin</button>
                <button class="social-button">Instagram</button>
                <button class="social-button">Tiktok</button>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // document.addEventListener("DOMContentLoaded", function () {
        //     const navbar = document.getElementById("navbar");

        //     window.addEventListener("scroll", function () {
        //         if (window.scrollY > 150) {
        //         // scroll 100 se zyada → navbar fade out
        //         navbar.classList.add("hidden");
        //         } else {
        //         // scroll 100 se kam → navbar fade in
        //         navbar.classList.remove("hidden");
        //         }
        //     });
        // });
    </script>

</body>
</html>