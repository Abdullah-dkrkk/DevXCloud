<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to DevXCloud</title>
    <style type="text/css">
        @media only screen and (max-width: 600px) {
            .email-table { width: 100% !important; }
            .email-body-td { padding: 24px !important; }
            .email-header-td { padding: 18px 24px !important; }
        }
        @media only screen and (max-width: 480px) {
            .email-body-td { padding: 16px !important; }
            .email-header-td { padding: 14px 16px !important; }
            .email-header-td h1 { font-size: 18px !important; }
        }
        @media only screen and (max-width: 360px) {
            .email-body-td { padding: 12px !important; }
            .email-header-td h1 { font-size: 16px !important; }
        }
        @media only screen and (max-width: 320px) {
            .email-body-td { padding: 10px !important; }
            .email-header-td { padding: 10px 10px !important; }
            .email-header-td h1 { font-size: 15px !important; }
        }
        .ReadMsgBody { width: 100%; }
        .ExternalClass { width: 100%; }
        body { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    </style>
</head>
<body style="margin:0;padding:0;background-color:#f4f4f4;font-family:Arial,Helvetica,sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;">

    <!--[if mso]>
    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:#f4f4f4;">
    <tr><td align="center">
    <![endif]-->
    <table class="email-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="padding:40px 0;background-color:#f4f4f4;">
        <tr>
            <td align="center" style="padding:0 8px;">

                <!--[if mso]>
                <table role="presentation" width="600" cellpadding="0" cellspacing="0" border="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
                <tr><td>
                <![endif]-->
                <table class="email-table" width="100%" cellpadding="0" cellspacing="0" border="0" style="max-width:600px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td class="email-header-td" style="background:#0a0a23;padding:24px 30px;text-align:center;">
                            <h1 style="color:#ffffff;margin:0;font-size:22px;">Welcome to DevXCloud</h1>
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="email-body-td" style="padding:32px;">
                            <p style="font-size:15px;color:#333333;line-height:1.6;margin:0 0 16px;">Hi {{ $user->name }},</p>
                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:0 0 20px;">
                                Thank you for reaching out to DevXCloud. We have created your account so you can track your inquiries and access personalized support.
                            </p>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background:#f9f9f9;border:1px solid #dddddd;border-radius:6px;">
                                <tr>
                                    <td style="padding:20px;">
                                        <p style="margin:0 0 8px;font-size:14px;color:#555555;">
                                            <strong style="color:#333333;">Email:</strong> {{ $user->email }}
                                        </p>
                                        <p style="margin:0;font-size:14px;color:#555555;">
                                            <strong style="color:#333333;">Password:</strong>
                                            <span style="background:#eeeeee;padding:4px 8px;border-radius:4px;font-family:monospace;font-size:13px;">{{ $password }}</span>
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size:14px;color:#555555;line-height:1.6;margin:24px 0 0;">
                                You can log in to your account and view your chat history anytime.
                            </p>

                            <table role="presentation" cellpadding="0" cellspacing="0" border="0" style="margin:24px 0 0;">
                                <tr>
                                    <td style="border-radius:6px;background:#10b981;text-align:left;padding:0;">
                                        <!--[if mso]>
                                        <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{ url('/login') }}" style="height:48px;v-text-anchor:middle;width:200px;" arcsize="12%" strokecolor="#10b981" fillcolor="#10b981">
                                        <center style="color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;">
                                        Log In to Your Account
                                        </center>
                                        </v:roundrect>
                                        <![endif]-->
                                        <!--[if !mso]><!-- -->
                                        <a href="{{ url('/login') }}" target="_blank" style="display:inline-block;width:auto;min-width:180px;min-height:48px;line-height:48px;padding:0 28px;background:#10b981;border:1px solid #10b981;border-radius:6px;color:#ffffff;font-family:Arial,Helvetica,sans-serif;font-size:14px;font-weight:bold;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;">
                                            Log In to Your Account
                                        </a>
                                        <!--<![endif]-->
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:28px 0 0;font-size:13px;color:#666666;line-height:1.5;">
                                We recommend changing your password after logging in.
                            </p>
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
