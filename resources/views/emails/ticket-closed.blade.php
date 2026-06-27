<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ticket Closed</title>
    <style type="text/css">
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
        .ReadMsgBody { width: 100%; }
        .ExternalClass { width: 100%; }
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
                <table class="email-card" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

@if ($isAdminNotification)
                    <tr>
                        <td class="email-header" style="background:#0176d3;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;font-weight:600;line-height:1.3;color:#ffffff;">Ticket Closed</h2>
                            <p style="margin:6px 0 0;font-size:14px;opacity:0.9;line-height:1.4;color:#ffffff;">{{ $ticket->ticket_number }} was closed by {{ $closedByLabel }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-body" style="padding:30px;">
                            <p style="font-size:15px;color:#333333;line-height:1.6;margin:0 0 16px;">Hi Admin,</p>
                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:0 0 20px;">
                                Ticket <strong>{{ $ticket->ticket_number }}</strong> has been closed.
                            </p>
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
                                <tr>
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Closed By</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ $closedByLabel }}</td>
                                </tr>
                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Closed At</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ now()->format('F j, Y, g:i a') }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
@else
                    <tr>
                        <td class="email-header" style="background:#0176d3;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;font-weight:600;line-height:1.3;color:#ffffff;">Your Ticket Has Been Closed</h2>
                            <p style="margin:6px 0 0;font-size:14px;opacity:0.9;line-height:1.4;color:#ffffff;">{{ $ticket->ticket_number }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="email-body" style="padding:30px;">
                            <p style="font-size:15px;color:#333333;line-height:1.6;margin:0 0 16px;">Hi {{ $ticket->name }},</p>
                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:0 0 20px;">
                                Your ticket <strong>{{ $ticket->ticket_number }}</strong> has been closed. We hope we were able to help you!
                            </p>
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
                                <tr style="background:#f9fafb;">
                                    <td class="detail-label" width="35%" style="padding:10px;vertical-align:top;font-weight:700;color:#333333;font-size:13px;">Closed At</td>
                                    <td class="detail-value" width="65%" style="padding:10px;vertical-align:top;color:#555555;font-size:14px;">{{ now()->format('F j, Y, g:i a') }}</td>
                                </tr>
                            </table>

                            <div style="margin:24px 0;padding:16px;background:#f0f7fd;border-radius:6px;">
                                <p style="font-size:14px;color:#333333;font-weight:bold;margin:0 0 8px;">Review the Conversation</p>
                                <p style="font-size:13px;color:#555555;line-height:1.5;margin:0 0 12px;">
                                    You can review the full conversation history for this ticket at any time.
                                </p>
                                <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0;">
                                    <tr>
                                        <td class="email-btn-td" style="border-radius:4px;background:#0176d3;text-align:left;padding:0;">
                                            <!--[if mso]>
                                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $reengagementUrl }}" style="height:40px;v-text-anchor:middle;width:200px;" arcsize="10%" stroke="f" fillcolor="#0176d3">
                                            <w:anchorlock/>
                                            <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold;">
                                            Review Conversation
                                            </center>
                                            </v:roundrect>
                                            <![endif]-->
                                            <!--[if !mso]><!-- -->
                                            <a class="email-btn-responsive" href="{{ $reengagementUrl }}" target="_blank" style="display:inline-block;width:auto;min-width:180px;min-height:40px;line-height:40px;padding:0 22px;background:#0176d3;border:1px solid #0176d3;border-radius:4px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:13px;font-weight:bold;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">
                                                <span class="email-btn-text" style="font-size:13px;">Review Conversation</span>
                                            </a>
                                            <!--<![endif]-->
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:0 0 16px;">
                                If you need help again in the future, feel free to reach out anytime.
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0;">
                                <tr>
                                    <td class="email-btn-td" style="border-radius:4px;background:#0176d3;text-align:left;padding:0;">
                                        <!--[if mso]>
                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ url('/') }}" style="height:44px;v-text-anchor:middle;width:160px;" arcsize="10%" stroke="f" fillcolor="#0176d3">
                                        <w:anchorlock/>
                                        <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;">
                                        Open New Ticket
                                        </center>
                                        </v:roundrect>
                                        <![endif]-->
                                        <!--[if !mso]><!-- -->
                                        <a class="email-btn-responsive" href="{{ url('/') }}" target="_blank" style="display:inline-block;width:auto;min-width:140px;min-height:44px;line-height:44px;padding:0 24px;background:#0176d3;border:1px solid #0176d3;border-radius:4px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">
                                            <span class="email-btn-text" style="font-size:14px;">Open New Ticket</span>
                                        </a>
                                        <!--<![endif]-->
                                    </td>
                                </tr>
                            </table>
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