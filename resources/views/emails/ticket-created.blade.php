<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ticket Created</title>
    <style type="text/css">
        /* Email client media queries — supported by Gmail App, Apple Mail, Outlook.com, Samsung Mail */
        @media only screen and (max-width: 600px) {
            .email-wrapper { padding: 20px 0 !important; }
            .email-body { padding: 24px !important; }
            .email-header { padding: 18px 24px !important; }
            .email-footer { padding: 16px 24px !important; }
            .email-btn-responsive { width: 100% !important; }
            .email-btn-td { display: block !important; width: 100% !important; text-align: center !important; }
        }
        @media only screen and (max-width: 480px) {
            .email-wrapper { padding: 10px 0 !important; }
            .email-body { padding: 16px !important; }
            .email-header { padding: 14px 16px !important; }
            .email-header h2 { font-size: 18px !important; }
            .email-header p { font-size: 13px !important; }
            .email-footer { padding: 14px 16px !important; font-size: 11px !important; }
            .email-card { border-radius: 6px !important; }
            .detail-table tr { display: block !important; margin-bottom: 2px !important; }
            .detail-table td { display: block !important; width: auto !important; padding: 4px 12px !important; }
            .detail-label { padding-top: 10px !important; padding-bottom: 0 !important; font-size: 13px !important; }
            .detail-value { padding-top: 0 !important; padding-bottom: 10px !important; font-size: 14px !important; }
        }
        @media only screen and (max-width: 360px) {
            .email-body { padding: 12px !important; }
            .email-header { padding: 12px 12px !important; }
            .email-header h2 { font-size: 16px !important; }
            .email-footer { padding: 12px 12px !important; }
            .detail-label { font-size: 12px !important; }
            .detail-value { font-size: 13px !important; }
            .email-btn-text { font-size: 13px !important; }
        }
        @media only screen and (max-width: 320px) {
            .email-body { padding: 10px !important; }
            .email-header { padding: 10px 10px !important; }
            .email-header h2 { font-size: 15px !important; }
            .email-footer { padding: 10px 10px !important; font-size: 10px !important; }
            .detail-label { font-size: 11px !important; }
            .detail-value { font-size: 12px !important; }
            .email-btn-responsive { min-width: 0 !important; width: 100% !important; padding-left: 16px !important; padding-right: 16px !important; }
            .email-btn-text { font-size: 12px !important; }
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

@php
    $fieldCount = !empty($formFields) ? count($formFields) : 0;
@endphp
@if ($isAdminNotification)
                    <!-- Admin Header -->
                    <tr>
                        <td class="email-header" style="background:#e74c3c;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;font-weight:600;line-height:1.3;color:#ffffff;">New Support Ticket</h2>
                            <p style="margin:6px 0 0;font-size:14px;opacity:0.9;line-height:1.4;color:#ffffff;">{{ $ticket->name }} has submitted a {{ $formTypeLabel }}</p>
                        </td>
                    </tr>

                    <!-- Admin Body -->
                    <tr>
                        <td class="email-body" style="padding:30px;">
                            <p style="font-size:15px;color:#333333;line-height:1.6;margin:0 0 12px;">Hi Admin,</p>
                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:0 0 18px;">
                                A new <strong>{{ $formTypeLabel }}</strong> request has been submitted by <strong>{{ $ticket->name }}</strong>.
                            </p>

                            <!-- Details table -->
                            <!-- Admin row pattern: 0=Ticket#(gray), 1=Customer(white), 2=RequestType(gray), then form fields, then Status, then SubmittedAt -->
                            @php $adminStatusIdx = 3 + $fieldCount; $adminSubmittedIdx = 4 + $fieldCount; @endphp
                            <table class="detail-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;font-size:14px;line-height:1.5;">
                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Ticket #</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $ticket->ticket_number }}</td>
                                </tr>
                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Customer</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $ticket->name }} &lt;{{ $ticket->email }}&gt;</td>
                                </tr>
                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Request Type</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $formTypeLabel }}</td>
                                </tr>
@if (!empty($formFields))
@foreach ($formFields as $field)
                                <tr @if ($loop->even) style="background:#f9fafb;" @endif>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">{{ $field['label'] }}</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $field['value'] }}</td>
                                </tr>
@endforeach
@endif
                                <tr @if ($adminStatusIdx % 2 === 0) style="background:#f9fafb;" @endif>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Status</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ ucfirst($ticket->status) }}</td>
                                </tr>
                                <tr @if ($adminSubmittedIdx % 2 === 0) style="background:#f9fafb;" @endif>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Submitted At</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $ticket->created_at->format('F j, Y, g:i a') }}</td>
                                </tr>
                            </table>

                            <!-- Admin CTA Button — Outlook-compatible table wrapper -->
                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:25px 0 0;">Review and manage this ticket in the dashboard:</p>
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:16px 0 0;">
                                <tr>
                                    <td class="email-btn-td" style="border-radius:4px;background:#e74c3c;text-align:left;padding:0;">
                                        <!--[if mso]>
                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ route('dashboard') }}" style="height:44px;v-text-anchor:middle;width:220px;" arcsize="9%" strokecolor="#e74c3c" fillcolor="#e74c3c">
                                        <w:anchorlock/>
                                        <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;">
                                        Open Dashboard
                                        </center>
                                        </v:roundrect>
                                        <![endif]-->
                                        <!--[if !mso]><!-- -->
                                        <a class="email-btn-responsive" href="{{ route('dashboard') }}" target="_blank" style="display:inline-block;width:auto;min-width:180px;min-height:44px;line-height:44px;padding:0 24px;background:#e74c3c;border:1px solid #e74c3c;border-radius:4px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">
                                            <span class="email-btn-text" style="font-size:14px;">Open Dashboard</span>
                                        </a>
                                        <!--<![endif]-->
                                    </td>
                                </tr>
                            </table>
                            <p style="font-size:12px;color:#666666;line-height:1.4;margin:12px 0 0;font-style:italic;word-break:break-all;word-wrap:break-word;overflow-wrap:break-word;">
                                Or copy this link: {{ route('dashboard') }}
                            </p>
                        </td>
                    </tr>
@else
                    <!-- Customer Header -->
                    <tr>
                        <td class="email-header" style="background:#0176d3;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;font-weight:600;line-height:1.3;color:#ffffff;">We've Received Your Request</h2>
                            <p style="margin:6px 0 0;font-size:14px;opacity:0.9;line-height:1.4;color:#ffffff;">{{ $formTypeLabel }} &mdash; {{ $ticket->ticket_number }}</p>
                        </td>
                    </tr>

                    <!-- Customer Body -->
                    <tr>
                        <td class="email-body" style="padding:30px;">
                            <p style="font-size:15px;color:#333333;line-height:1.6;margin:0 0 12px;">Hi {{ $ticket->name }},</p>
                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:0 0 18px;">
                                Thank you for reaching out to DevXCloud. Your <strong>{{ $formTypeLabel }}</strong> request has been received and a support ticket has been created. A member of our team will review it and get back to you shortly.
                            </p>

                            <!-- Details table -->
                            <!-- Customer row pattern: 0=Ticket#(gray), 1=Name(white), 2=Email(gray), 3=RequestType(white), then form fields, then Status, then SubmittedAt -->
                            @php $customerStatusIdx = 4 + $fieldCount; $customerSubmittedIdx = 5 + $fieldCount; @endphp
                            <table class="detail-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="border-collapse:collapse;font-size:14px;line-height:1.5;">
                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Ticket #</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $ticket->ticket_number }}</td>
                                </tr>
                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Name</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $ticket->name }}</td>
                                </tr>
                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Email</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $ticket->email }}</td>
                                </tr>
                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Request Type</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $formTypeLabel }}</td>
                                </tr>
@if (!empty($formFields))
@foreach ($formFields as $field)
                                <tr @if ($loop->odd) style="background:#f9fafb;" @endif>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">{{ $field['label'] }}</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $field['value'] }}</td>
                                </tr>
@endforeach
@endif
                                <tr @if ($customerStatusIdx % 2 === 0) style="background:#f9fafb;" @endif>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Status</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ ucfirst($ticket->status) }}</td>
                                </tr>
                                <tr @if ($customerSubmittedIdx % 2 === 0) style="background:#f9fafb;" @endif>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Submitted At</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $ticket->created_at->format('F j, Y, g:i a') }}</td>
                                </tr>
                            </table>

                            <!-- Customer CTA Button — continue conversation -->
                            <h3 style="color:#333333;margin:28px 0 12px;font-size:16px;font-weight:600;line-height:1.3;">Continue the Conversation</h3>
                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:0 0 16px;">
                                Click the button below to continue your conversation with our team:
                            </p>

                            <!-- Customer CTA Button — Outlook-compatible table wrapper -->
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0;">
                                <tr>
                                    <td class="email-btn-td" style="border-radius:4px;background:#0176d3;text-align:left;padding:0;">
                                        <!--[if mso]>
                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $reengagementUrl }}" style="height:44px;v-text-anchor:middle;width:260px;" arcsize="9%" strokecolor="#0176d3" fillcolor="#0176d3">
                                        <w:anchorlock/>
                                        <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;">
                                        Continue the Conversation
                                        </center>
                                        </v:roundrect>
                                        <![endif]-->
                                        <!--[if !mso]><!-- -->
                                        <a class="email-btn-responsive" href="{{ $reengagementUrl }}" target="_blank" style="display:inline-block;width:auto;min-width:200px;min-height:44px;line-height:44px;padding:0 24px;background:#0176d3;border:1px solid #0176d3;border-radius:4px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">
                                            <span class="email-btn-text" style="font-size:14px;">Continue the Conversation</span>
                                        </a>
                                        <!--<![endif]-->
                                    </td>
                                </tr>
                            </table>
                            <p style="font-size:12px;color:#666666;line-height:1.4;margin:12px 0 0;font-style:italic;word-break:break-all;word-wrap:break-word;overflow-wrap:break-word;">
                                Or copy this link: {{ $reengagementUrl }}
                            </p>
                        </td>
                    </tr>
@endif

                    @include('emails.partials.footer')

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
