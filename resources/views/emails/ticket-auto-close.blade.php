<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ticket Auto-Close Notice</title>
    <style type="text/css">
        @media only screen and (max-width: 600px) {
            .email-table { width: 100% !important; }
            .email-body-td { padding: 24px !important; }
            .email-header-td { padding: 18px 24px !important; }
            .email-btn { display: block !important; width: auto !important; text-align: center !important; }
        }
        @media only screen and (max-width: 480px) {
            .email-body-td { padding: 16px !important; }
            .email-header-td { padding: 14px 16px !important; }
            .email-header-td h2 { font-size: 18px !important; }
            .email-detail-table tr { display: block !important; margin-bottom: 2px !important; }
            .email-detail-table td { display: block !important; width: auto !important; padding: 4px 12px !important; }
        }
        @media only screen and (max-width: 360px) {
            .email-body-td { padding: 12px !important; }
            .email-header-td h2 { font-size: 16px !important; }
        }
        @media only screen and (max-width: 320px) {
            .email-body-td { padding: 10px !important; }
            .email-header-td { padding: 10px 10px !important; }
            .email-header-td h2 { font-size: 15px !important; }
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
    <table class="email-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="padding:40px 0;background-color:#f4f6f8;">
    <tr><td align="center" style="padding:0 8px;">

        <!--[if mso]>
        <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
        <tr><td>
        <![endif]-->
        <table class="email-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

        <tr><td class="email-header-td" style="background:#e65100;color:#ffffff;padding:20px 30px;">
        <h2 style="margin:0;font-size:22px;">Ticket Closing Soon</h2>
        <p style="margin:5px 0 0;font-size:14px;opacity:0.9;">{{ $ticket->ticket_number }} will close in 30 minutes</p>
        </td></tr>
        <tr><td class="email-body-td" style="padding:30px;">
        <p style="font-size:15px;color:#333;">Hi {{ $ticket->name }},</p>
        <p style="font-size:14px;color:#555;line-height:1.6;">
        Your ticket <strong>{{ $ticket->ticket_number }}</strong> has been inactive for a while.
        If no reply is received within 30 minutes, this ticket will be automatically closed.
        </p>
        <p style="font-size:14px;color:#555;line-height:1.6;">
        If you still need assistance, please reply to continue the conversation.
        </p>
        <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0;">
            <tr>
                <td style="border-radius:4px;background:#0176d3;text-align:left;padding:0;">
                    <!--[if mso]>
                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $reengagementUrl }}" style="height:44px;v-text-anchor:middle;width:200px;" arcsize="9%" strokecolor="#0176d3" fillcolor="#0176d3">
                    <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;">
                    Reply to Ticket
                    </center>
                    </v:roundrect>
                    <![endif]-->
                    <!--[if !mso]><!-- -->
                    <a class="email-btn" href="{{ $reengagementUrl }}" target="_blank" style="display:inline-block;width:auto;min-width:160px;min-height:44px;line-height:44px;padding:0 24px;background:#0176d3;border:1px solid #0176d3;border-radius:4px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">
                        Reply to Ticket
                    </a>
                    <!--<![endif]-->
                </td>
            </tr>
        </table>
        </td></tr>

        @include('emails.partials.footer')

        </table>
        <!--[if mso]>
        </td></tr></table>
        <![endif]-->

    </td></tr>
    </table>
    <!--[if mso]>
    </td></tr></table>
    <![endif]-->

</body>
</html>
