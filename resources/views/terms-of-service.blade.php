@extends('layouts.app')

@section('content')
    <style>
        .terms-content a {
            font-size: 16px;
            text-decoration:none;
            color: #0176d3;
            font-weight: bolder;
            text-transform:lowercase;
        }
        .terms-banner h1 {
            font-size: clamp(32px, 3.5vw, 46px);
            line-height: clamp(48px, 4.5vw, 60px);
        }
        .terms-banner {
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
        .terms-banner .container .row .col-lg-12 {
            min-height: 300px;
        }

        .terms-content {
            padding-top: 92px;
            padding-bottom: 92px;
        }
        @media only screen and (max-width: 576px) {
            .terms-content {
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
    <section class="terms-banner">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-12 h-100 d-flex align-items-center justify-content-center">
                    <h1 class="text-white">Terms of service</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="terms-content">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-8">
                    <div class="inner-wrapper">
                        <h2>Agreement to These Terms</h2>
                        <p>"Welcome to DevXCloud. By accessing or using our website, you agree to follow these Terms of Service. If you do not agree with these terms, please do not use this website. These terms apply to all visitors, users, and anyone who contacts us through the website."</p>

                        <h2>Purpose of This Website</h2>
                        <p>"The DevXCloud website exists to provide information about our services and allow visitors to contact us for consultations or inquiries. Using this website does not create a client relationship or business agreement. Any formal engagement or service delivery will only begin after direct communication and mutual agreement."</p>

                        <h2>Contact and Consultation Requests</h2>
                        <p>"When you submit a form or message through our website, you agree that DevXCloud may contact you using the details you provided. Submitting a request does not guarantee service availability or project acceptance. We reserve the right to accept or decline inquiries at our discretion."</p>

                        <h2>No On-Site Payments</h2>
                        <p>"DevXCloud does not process payments directly through this website at this time. Any pricing discussions, proposals, invoices, or payment arrangements take place through direct communication outside the website."</p>

                        <h2>Intellectual Property</h2>
                        <p>"All content on this website, including text, visuals, branding, and design elements, belongs to DevXCloud unless stated otherwise. You may not copy, reproduce, or use any content from this website without written permission."</p>

                        <h2>Website Usage</h2>
                        <p>"You agree not to misuse this website or attempt to disrupt its operation. You may not use the website for unlawful purposes, spam, or harmful activities. DevXCloud may restrict access to the website if misuse is detected."</p>

                        <h2>Information Accuracy</h2>
                        <p>"We aim to keep the information on this website accurate and up to date. However, we do not guarantee that all content is complete, error-free, or current at all times. Information on the site may change without notice."</p>

                        <h2>Limitation of Responsibility</h2>
                        <p>"DevXCloud is not responsible for any direct or indirect loss that may result from using this website or relying on its content. Visiting the website is at your own discretion and risk."</p>

                        <h2>Third-Party Links</h2>
                        <p>"Our website may contain links to third-party websites or tools. DevXCloud is not responsible for the content, policies, or practices of external websites."</p>

                        <h2>Changes to These Terms</h2>
                        <p>"We may update these Terms of Service occasionally. Any changes will be posted on this page with an updated date at the top. Continued use of the website means you accept the updated terms."</p>

                        <h2>Contact Information</h2>
                        <p>"If you have any questions about these Terms of Service, you can reach us at:"</p>

                        <p>Email: <a href="mailto:info@devxcloud.com">info@devxcloud.com</a></p>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection