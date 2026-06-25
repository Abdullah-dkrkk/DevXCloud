<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Contact Submission</title>
    <style type="text/css">
        /* Email client media queries — supported by Gmail App, Apple Mail, Outlook.com, Samsung Mail */
        @media only screen and (max-width: 600px) {
            .email-wrapper { padding: 20px 0 !important; }
            .email-body { padding: 24px !important; }
            .email-header { padding: 18px 24px !important; }
            .email-footer { padding: 16px 24px !important; }
        }
        @media only screen and (max-width: 480px) {
            .email-wrapper { padding: 10px 0 !important; }
            .email-body { padding: 16px !important; }
            .email-header { padding: 14px 16px !important; }
            .email-header h2 { font-size: 18px !important; }
            .email-header p { font-size: 13px !important; }
            .email-footer { padding: 14px 16px !important; font-size: 11px !important; }
            .email-card { border-radius: 6px !important; }
            /* Stack detail table rows on mobile */
            .detail-table tr { display: block !important; margin-bottom: 2px !important; }
            .detail-table td { display: block !important; width: auto !important; padding: 4px 12px !important; }
            .detail-label { padding-top: 10px !important; padding-bottom: 0 !important; font-size: 13px !important; }
            .detail-value { padding-top: 0 !important; padding-bottom: 10px !important; font-size: 14px !important; }
            .message-box { padding: 12px !important; font-size: 13px !important; }
            .section-heading { font-size: 15px !important; margin-top: 24px !important; }
        }
        @media only screen and (max-width: 360px) {
            .email-body { padding: 12px !important; }
            .email-header { padding: 12px 12px !important; }
            .email-header h2 { font-size: 16px !important; }
            .email-footer { padding: 12px 12px !important; }
            .detail-label { font-size: 12px !important; }
            .detail-value { font-size: 13px !important; }
        }
        /* Ensure proper rendering in Outlook 2007-2019 */
        .ReadMsgBody { width: 100%; }
        .ExternalClass { width: 100%; }
        /* Prevent iOS/WinPhone font scaling */
        body { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">

    <!--[if mso]>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f6f8;">
    <tr><td align="center">
    <![endif]-->
    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" border="0" style="padding:40px 0;background-color:#f4f6f8;">
        <tr>
            <td align="center" style="padding:0 8px;">

                <!--[if mso]>
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
                <tr><td>
                <![endif]-->
                <!-- Main email card — max-width approach for responsive scaling -->
                <table class="email-card" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                    <!-- Header section -->
                    <tr>
                        <td class="email-header" style="background:#0176d3;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;font-weight:600;line-height:1.3;color:#ffffff;">
                                New Contact Form Submission
                            </h2>
                            <p style="margin:6px 0 0;font-size:14px;opacity:0.9;line-height:1.4;color:#ffffff;">
                                A new user has submitted the website contact form
                            </p>
                        </td>
                    </tr>

                    <!-- Body section -->
                    <tr>
                        <td class="email-body" style="padding:30px;">

                            <!-- Contact Details heading -->
                            <h3 class="section-heading" style="margin:0 0 16px;color:#333333;font-size:16px;font-weight:600;line-height:1.3;">
                                Contact Details
                            </h3>

                            <!-- Contact details table -->
                            <table class="detail-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;font-size:14px;line-height:1.5;">

                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">Full Name</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">{{ $contact->full_name }}</td>
                                </tr>

                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">Work Email</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">{{ $contact->work_email }}</td>
                                </tr>

                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">Company</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">{{ $contact->company }}</td>
                                </tr>

                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">Country</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">{{ $contact->country }}</td>
                                </tr>

                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">State</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">{{ $contact->state }}</td>
                                </tr>

                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">Phone</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">{{ $contact->phone }}</td>
                                </tr>

                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">Has Website</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">{{ ucfirst($contact->has_website) }}</td>
                                </tr>

                                @if($contact->website_url)
                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px 8px 10px 14px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;line-height:1.4;">Website URL</td>
                                    <td class="detail-value" width="65%" style="padding:10px 14px 10px 8px;vertical-align:top;color:#555555;font-size:14px;line-height:1.4;">
                                        <a href="{{ $contact->website_url }}" target="_blank" style="color:#0176d3;word-break:break-all;word-wrap:break-word;overflow-wrap:break-word;">{{ $contact->website_url }}</a>
                                    </td>
                                </tr>
                                @endif

                            </table>

                            <!-- User Message section -->
                            @if($contact->message)
                            <h3 class="section-heading" style="margin:28px 0 12px;color:#333333;font-size:16px;font-weight:600;line-height:1.3;">
                                User Message
                            </h3>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f9fafb;border-radius:6px;">
                                <tr>
                                    <td class="message-box" style="padding:16px 18px;font-size:14px;line-height:1.7;color:#555555;word-break:break-word;overflow-wrap:break-word;">
                                        {{ $contact->message }}
                                    </td>
                                </tr>
                            </table>
                            @endif

                            <!-- Submission Info section -->
                            <h3 class="section-heading" style="margin:28px 0 12px;color:#333333;font-size:16px;font-weight:600;line-height:1.3;">
                                Submission Info
                            </h3>
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size:13px;color:#555555;line-height:1.6;">
                                <tr>
                                    <td style="padding:5px 0;vertical-align:top;">
                                        <strong style="color:#333333;">IP Address:</strong> {{ $contact->ip_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 0;vertical-align:top;">
                                        <strong style="color:#333333;">User Agent:</strong>
                                        <span style="word-break:break-all;word-wrap:break-word;overflow-wrap:break-word;">{{ $contact->user_agent }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:5px 0;vertical-align:top;">
                                        <strong style="color:#333333;">Submitted At:</strong> {{ $contact->created_at }}
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer section -->
                    <tr>
                        <td class="email-footer" style="background:#f1f3f5;padding:20px 30px;text-align:center;font-size:12px;color:#666666;line-height:1.6;">
                            This email was automatically generated by your website contact system.
                        </td>
                    </tr>

                </table>
                <!--[if mso]>
                </td></tr></table>
                <![endif]-->

            </td>
        </tr>
    </table>
    <!--[if mso]>
    </td></tr></table>
    <![endif]-->

</body>
</html>
