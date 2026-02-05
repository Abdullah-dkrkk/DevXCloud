@extends('layouts.app')


@section('title', 'Privacy Terms')


@section('content')
    <style>
        .privacy-content ul li {
            line-height: 30px;
        }
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
            text-align:center;
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
                    <h1 class="text-white">DevXCloud’s Privacy Policy & Terms of Use</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="privacy-content">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="col-lg-11">
                    <div class="inner-wrapper">

                        <p>
                            This page explains how DevXCloud collects, uses, and protects information, as well as the terms that apply when you access or use this website. It is intended to provide transparency about our practices and set clear expectations for all visitors.
                        </p>

                        <p>
                            By accessing or using this website, you acknowledge and agree to the policies and terms outlined below.
                        </p>

                        <h2>Information We Collect</h2>
                        <p>
                            DevXCloud collects information only when it is necessary to communicate with you, respond to inquiries, or improve the overall website experience. We do not collect information unnecessarily.
                        </p>

                        <ul>
                            <li>Personal details such as your name, email address, or contact information when you submit a form or send us a message</li>
                            <li>Business or project-related information that you voluntarily share during inquiries or discussions</li>
                            <li>Messages, questions, or requests submitted through contact forms, chat tools, or email</li>
                            <li>Limited technical information such as browser type, device information, IP address, and pages visited</li>
                        </ul>

                        <p>
                            We do not intentionally collect sensitive personal data. All information collected is either voluntarily provided by you or required for basic website functionality.
                        </p>

                        <h2>How We Use Your Information</h2>
                        <p>
                            Information collected through this website is used responsibly and strictly for legitimate business purposes.
                        </p>

                        <ul>
                            <li>Responding to inquiries, messages, or consultation requests</li>
                            <li>Communicating with you regarding discussions, services, or potential next steps</li>
                            <li>Improving website performance, usability, and content</li>
                            <li>Analyzing general website usage and engagement trends</li>
                            <li>Maintaining security and preventing misuse of the website</li>
                        </ul>

                        <p>
                            DevXCloud does not sell, rent, or trade your personal information to third parties.
                        </p>

                        <h2>Analytics, Cookies, and Tracking Technologies</h2>
                        <p>
                            We use analytics and tracking technologies to better understand how visitors interact with our website and to improve overall performance.
                        </p>

                        <ul>
                            <li>Analytics tools that provide aggregated insights about traffic and usage</li>
                            <li>Cookies or similar technologies used for functionality, performance, and insights</li>
                            <li>Non-identifying data such as page visits, session duration, and interaction patterns</li>
                        </ul>

                        <p>
                            These tools do not personally identify you. You may manage or disable cookies through your browser settings if you prefer.
                        </p>

                        <h2>Use of Third-Party Services</h2>
                        <p>
                            DevXCloud may rely on trusted third-party service providers to operate and maintain the website.
                        </p>

                        <ul>
                            <li>Website analytics and performance monitoring services</li>
                            <li>Communication or chat functionality providers</li>
                            <li>Hosting, infrastructure, and technical service providers</li>
                        </ul>

                        <p>
                            Third-party providers receive only the information required to perform their services and are expected to handle data securely and responsibly.
                        </p>

                        <h2>Data Protection and Security</h2>
                        <p>
                            We take reasonable measures to protect the information you share with us.
                        </p>

                        <ul>
                            <li>Use of secure and reputable platforms and tools</li>
                            <li>Restricted internal access to personal information</li>
                            <li>Appropriate technical and organizational safeguards</li>
                        </ul>

                        <p>
                            While we take data protection seriously, no online system can be guaranteed to be completely secure. Information shared online is transmitted at your own risk.
                        </p>

                        <h2>Your Rights and Choices</h2>
                        <p>
                            You have control over your personal information and how it is used.
                        </p>

                        <ul>
                            <li>Request access to the personal information we hold about you</li>
                            <li>Request corrections or updates to inaccurate information</li>
                            <li>Request deletion of your personal information</li>
                            <li>Withdraw consent for communications at any time</li>
                        </ul>

                        <p>
                            Requests can be made by contacting us directly, and we will respond within a reasonable timeframe.
                        </p>

                        <h2>Purpose of the Website</h2>
                        <p>
                            This website is provided for general informational and business purposes only.
                        </p>

                        <ul>
                            <li>Content does not constitute professional, legal, or financial advice</li>
                            <li>Browsing the website does not create a client or advisory relationship</li>
                            <li>No guarantees or promises are implied by the information presented</li>
                        </ul>

                        <p>
                            Any formal engagement with DevXCloud begins only after direct communication and mutual agreement.
                        </p>

                        <h2>Consultations and Communications</h2>
                        <p>
                            Submitting a form, inquiry, or message through this website does not guarantee acceptance as a client.
                        </p>

                        <ul>
                            <li>All inquiries are reviewed on a case-by-case basis</li>
                            <li>DevXCloud reserves the right to accept or decline requests</li>
                            <li>No contractual relationship exists until explicitly agreed upon</li>
                        </ul>

                        <p>
                            Work begins only after scope, terms, and expectations are clearly defined and accepted by both parties.
                        </p>

                        <h2>Payments and Transactions</h2>
                        <p>
                            DevXCloud does not process payments, subscriptions, or transactions through this website.
                        </p>

                        <ul>
                            <li>All pricing and commercial discussions are handled separately</li>
                            <li>Payment terms are established only through direct communication</li>
                        </ul>

                        <h2>Intellectual Property</h2>
                        <p>
                            All content on this website is the property of DevXCloud unless otherwise stated.
                        </p>

                        <ul>
                            <li>Text, written materials, and website content</li>
                            <li>Visual elements, graphics, and branding</li>
                            <li>Website structure and original designs</li>
                        </ul>

                        <p>
                            You may not copy, reproduce, distribute, or reuse any content without prior written permission.
                        </p>

                        <h2>Acceptable Use of the Website</h2>
                        <p>
                            You agree to use this website in a lawful and respectful manner.
                        </p>

                        <ul>
                            <li>Do not attempt to disrupt or interfere with website functionality</li>
                            <li>Do not seek unauthorized access to systems or data</li>
                            <li>Do not submit harmful, misleading, or abusive content</li>
                        </ul>

                        <p>
                            DevXCloud reserves the right to restrict or terminate access if misuse is detected.
                        </p>

                        <h2>Accuracy and Limitation of Liability</h2>
                        <p>
                            While we strive to keep information accurate and up to date:
                        </p>

                        <ul>
                            <li>Website content is provided “as is” and for general information only</li>
                            <li>No warranties are made regarding accuracy, completeness, or reliability</li>
                            <li>Use of the website is at your own discretion</li>
                        </ul>

                        <p>
                            DevXCloud is not liable for any direct or indirect damages resulting from website use.
                        </p>

                        <h2>Third-Party Links</h2>
                        <p>
                            This website may contain links to external websites for convenience or reference.
                        </p>

                        <ul>
                            <li>DevXCloud does not control third-party websites</li>
                            <li>We are not responsible for external content, policies, or practices</li>
                        </ul>

                        <p>
                            Visitors should review third-party policies independently.
                        </p>

                        <h2>Updates to This Page</h2>
                        <p>
                            We may update this page periodically to reflect changes in our practices or services. Continued use of the website indicates acceptance of the updated terms.
                        </p>

                        <h2>Contact Information</h2>
                        <p>
                            If you have any questions about this Privacy Policy or Terms of Use, you may contact us at:
                        </p>

                        <p>
                            Email: <a href="mailto:info@devxcloud.com">info@devxcloud.com</a>
                        </p>

                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection