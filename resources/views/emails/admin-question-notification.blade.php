<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New Customer Question</title>
    <style type="text/css">
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
            .email-header h1 { font-size: 20px !important; }
            .email-footer { padding: 14px 16px !important; font-size: 11px !important; }
            .email-card { border-radius: 6px !important; }
            .info-section { padding: 14px !important; }
            .question-section { padding: 14px !important; }
        }
        @media only screen and (max-width: 360px) {
            .email-body { padding: 12px !important; }
            .email-header { padding: 12px 12px !important; }
            .email-header h1 { font-size: 18px !important; }
            .email-footer { padding: 12px 12px !important; }
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
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:8px;overflow:hidden;">
                <tr><td>
                <![endif]-->
                <table class="email-card" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td class="email-header" style="background:#0176d3;color:#ffffff;padding:20px 30px;text-align:center;">
                            <h1 style="margin:0;font-size:24px;font-weight:600;line-height:1.3;color:#ffffff;">New Customer Question</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="email-body" style="padding:30px;">

                            <!-- Customer info section -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f8f9fa;border-radius:8px;margin-bottom:20px;">
                                <tr>
                                    <td class="info-section" style="padding:16px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding:0 0 4px;font-size:12px;color:#666666;line-height:1.4;">FROM</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;font-size:16px;font-weight:600;color:#1a1a1a;line-height:1.4;">{{ $userName }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:4px 0 0;font-size:14px;color:#666666;line-height:1.4;">{{ $userEmail }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- Question section -->
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f0f7ff;border-radius:8px;margin-bottom:24px;border-left:4px solid #0176d3;">
                                <tr>
                                    <td class="question-section" style="padding:16px;">
                                        <table width="100%" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td style="padding:0 0 4px;font-size:12px;color:#666666;line-height:1.4;">QUESTION</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;font-size:16px;line-height:1.6;color:#1a1a1a;word-break:break-word;overflow-wrap:break-word;">{{ $questionText }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <!-- CTA Button -->
                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:0;">
                                <tr>
                                    <td style="border-radius:8px;background:#0176d3;text-align:left;padding:0;">
                                        <!--[if mso]>
                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ $dashboardUrl }}" style="height:48px;v-text-anchor:middle;width:280px;" arcsize="17%" strokecolor="#0176d3" fillcolor="#0176d3">
                                        <w:anchorlock/>
                                        <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-weight:600;">
                                        Answer in Agent Dashboard
                                        </center>
                                        </v:roundrect>
                                        <![endif]-->
                                        <!--[if !mso]><!-- -->
                                        <a href="{{ $dashboardUrl }}" target="_blank" style="display:inline-block;width:auto;min-width:240px;min-height:48px;line-height:48px;padding:0 28px;background:#0176d3;border:1px solid #0176d3;border-radius:8px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:16px;font-weight:600;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">
                                            Answer in Agent Dashboard
                                        </a>
                                        <!--<![endif]-->
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer (admin-facing style consistent with contact form) -->
                    <tr>
                        <td class="email-footer" style="background:#f1f3f5;padding:20px 30px;text-align:center;font-size:12px;color:#666666;line-height:1.6;">
                            DevXCloud Support System
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
