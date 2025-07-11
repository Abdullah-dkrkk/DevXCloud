<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Global CSS -->
    <link href="{{ asset('css/global.css') }}" rel="stylesheet">
</head>
<body>  

    <!-- Header -->
    <!-- Header -->
    <style>

        /* navbar css starts from here */
        nav {
            height: 100px;
            box-shadow: 0px 4px 40px 0px #0000001F;
        }
        nav .nav-item img {
            height: 12px;
            width: 12px;
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
            border-radius: 10px;
            padding: 10px 14px !important;
            line-height: 24px;
            font-weight: 600;
            margin-left: 30px;
            font-size: 14px;
            text-transform:uppercase;
        }
        /* navbar css ends here */
    </style>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="Logo" width="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item no-padding-left">
                        <a class="nav-link active" href="{{ url('/') }}">
                            <span>CommerceAI</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">
                            <span>LaunchPadAI</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">
                            <span>Sale Cloud</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">
                            <span>EliteScale</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/') }}">
                            <span>GreenScaleFormula</span>
                            <img src="{{ asset('images/arrow-extended.svg') }}" alt="">
                        </a>
                    </li>
                    <li class="nav-item no-padding-right">
                        <a class="nav-link active" href="{{ url('/') }}">
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
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; {{ date('Y') }} {{ config('app.name') }}
    </footer>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>