<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Response on Your Ticket</title>
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

        <tr><td class="email-header-td" style="background:#0176d3;color:#ffffff;padding:20px 30px;">
        <h2 style="margin:0;font-size:22px;">New Response on Your Ticket</h2>
        <p style="margin:5px 0 0;font-size:14px;opacity:0.9;">{{ $ticket->ticket_number }}</p>
        </td></tr>
        <tr><td class="email-body-td" style="padding:30px;">
        <p style="font-size:15px;color:#333;">Hi {{ $ticket->name }},</p>
        <p style="font-size:14px;color:#555;line-height:1.6;">
        An agent has responded to your ticket.
        </p>
        <table class="email-detail-table" width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-size:14px;">
        <tr style="background:#f9fafb;"><td width="35%" style="padding:10px;"><strong>Ticket #</strong></td><td style="padding:10px;">{{ $ticket->ticket_number }}</td></tr>
        <tr><td style="padding:10px;"><strong>Name</strong></td><td style="padding:10px;">{{ $ticket->name }}</td></tr>
        <tr style="background:#f9fafb;"><td style="padding:10px;"><strong>Email</strong></td><td style="padding:10px;">{{ $ticket->email }}</td></tr>
        <tr><td style="padding:10px;"><strong>Agent</strong></td><td style="padding:10px;">{{ $chatMessage->sender->name ?? 'Support Team' }}</td></tr>
        <tr style="background:#f9fafb;"><td style="padding:10px;"><strong>Message</strong></td><td style="padding:10px;">{{ $chatMessage->message }}</td></tr>
        </table>
        <p style="font-size:14px;color:#555;line-height:1.6;margin-top:20px;">
        <!--[if mso]>
        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $reengagementUrl }}" style="height:44px;v-text-anchor:middle;width:160px;" arcsize="10%" stroke="f" fillcolor="#0176d3">
        <w:anchorlock/>
        <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;">View Response</center>
        </v:roundrect>
        <![endif]-->
        <a href="{{ $reengagementUrl }}" target="_blank" style="display:inline-block;min-width:140px;padding:12px 24px;background:#0176d3;border:1px solid #0176d3;border-radius:6px;color:#ffffff;font-size:14px;font-weight:bold;text-align:center;text-decoration:none;mso-hide:all;">View Response</a>
        </p>
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
