@extends('layouts.app')


@section('title', 'Privacy Terms')


@section('content')
    <style>
        .privacy-content a {
            font-size: 16px;
            text-decoration:none;
            color: #0176d3;
            font-weight: bolder;
            text-transform:lowercase;
        }
        .privacy-banner h1 {
            font-size: clamp(32px, 3.5vw, 46px);
            line-height: clamp(48px, 4.5vw, 60px);
        }
        .privacy-banner {
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
        .privacy-banner .container .row .col-lg-12 {
            min-height: 300px;
        }

        .privacy-content {
            padding-top: 92px;
            padding-bottom: 92px;
            text-align:center;

        }
        @media only screen and (max-width: 576px) {
            .privacy-content {
                padding-top: 46px;
                padding-bottom: 46px;
            }   
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
    <section class="privacy-banner">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-12 h-100 d-flex align-items-center justify-content-center">
                    <h1 class="text-white">Privacy Policy</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="privacy-content">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-8">
                    <div class="inner-wrapper">
                        <h2>Your Privacy Matters to Us</h2>
                        <p>"At DevXCloud, we respect your privacy and take your personal information seriously. This Privacy Policy explains how we collect, use, and protect your data when you visit our website or contact us. By using this website, you agree to the practices described in this policy."</p>

                        <h2>Information We Collect</h2>
                        <p>"When you reach out to DevXCloud, we collect information that you choose to share with us. This may include your name, email address, phone number, website link, and any project details or messages you submit through our forms or chat tools. We only collect data that is necessary to understand your needs and respond to your inquiry."</p>

                        <h2>Why We Collect Your Information</h2>
                        <p>"We use your information to communicate with you, respond to your questions, schedule consultations, and better understand your business goals. This allows us to provide relevant discussions and improve how DevXCloud presents its services. We never sell or rent your personal information to third parties."</p>

                        <h2>Website Analytics and Tracking</h2>
                        <p>"DevXCloud uses analytics and tracking tools to understand how visitors interact with our website. These tools collect general usage data such as pages visited, time spent on the site, device type, and approximate location. This information helps us improve user experience and website performance, and it does not personally identify you."</p>

                        <h2>Cookies</h2>
                        <p>"Our website may use cookies to ensure smooth performance and to analyze visitor behavior. Cookies help us understand which pages are useful and how visitors navigate the site. You can disable cookies in your browser settings if you prefer, though some parts of the website may function differently."</p>

                        <h2>How We Protect Your Data</h2>
                        <p>"We take reasonable steps to keep your information safe from unauthorized access, misuse, or disclosure. While no online platform can guarantee absolute security, we use trusted tools and services to handle data responsibly and limit access to necessary systems only."</p>

                        <h2>Third-Party Tools</h2>
                        <p>"DevXCloud uses third-party services for website analytics, chat features, and communication tools. These services only receive the data required to perform their function and are expected to process information in a secure and responsible way."</p>

                        <h2>Your Rights and Choices</h2>
                        <p>"You have the right to request access to your personal information, ask for corrections, or request deletion of your data. You can also withdraw consent for communication at any time. To make any request, you can contact us directly through the details below."</p>

                        <h2>Updates to This Policy</h2>
                        <p>"We may update this Privacy Policy occasionally to reflect improvements or changes in how we operate. Any updates will be posted on this page with the revised date at the top."</p>

                        <h2>Contact Information</h2>
                        <p>"If you have any questions about this Privacy Policy or how DevXCloud handles your data, you can reach us at:"</p>

                         <p>Email: <a href="mailto:info@devxcloud.com">info@devxcloud.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection