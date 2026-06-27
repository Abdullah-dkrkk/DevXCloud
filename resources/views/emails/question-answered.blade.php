<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Question Has Been Answered</title>
    <style type="text/css">
        @media only screen and (max-width: 600px) {
            .email-table { width: 100% !important; }
            .email-body-td { padding: 24px !important; }
            .email-header-td { padding: 18px 24px !important; }
        }
        @media only screen and (max-width: 480px) {
            .email-body-td { padding: 16px !important; }
            .email-header-td { padding: 14px 16px !important; }
            .email-header-td h2 { font-size: 18px !important; }
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
        <tr>
            <td align="center" style="padding:0 8px;">

                <!--[if mso]>
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
                <tr><td>
                <![endif]-->
                <table class="email-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                    <tr>
                        <td class="email-header-td" style="background:#0176d3;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;">
                                Your Question Has Been Answered
                            </h2>
                            <p style="margin:5px 0 0;font-size:14px;opacity:0.9;">
                                A member of our team has responded to your query
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="email-body-td" style="padding:30px;">

                            <h3 style="margin-top:0;color:#333;">Your Question</h3>
                            <div style="background:#f9fafb;padding:15px;border-radius:6px;font-size:14px;line-height:1.6;margin-bottom:25px;">
                                {{ $question->question }}
                            </div>

                            <h3 style="color:#333;">Our Answer</h3>
                            <div style="background:#e8f4fd;padding:15px;border-radius:6px;font-size:14px;line-height:1.6;border-left:4px solid #0176d3;">
                                {{ $question->answer }}
                            </div>

                            <h3 style="margin-top:30px;color:#333;">Details</h3>
                            <table width="100%" cellpadding="6" cellspacing="0" style="font-size:13px;color:#555;">
                                <tr>
                                    <td><strong>Asked At:</strong> {{ $question->asked_at ? $question->asked_at->format('F j, Y, g:i a') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Answered At:</strong> {{ $question->answered_at ? $question->answered_at->format('F j, Y, g:i a') : 'N/A' }}</td>
                                </tr>
                            </table>

                        </td>
                    </tr>

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
