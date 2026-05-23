<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your Question Has Been Answered</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background-color:#f4f6f8;">
        <tr>
            <td align="center">

                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                    <tr>
                        <td style="background:#0176d3;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;">
                                Your Question Has Been Answered
                            </h2>
                            <p style="margin:5px 0 0;font-size:14px;opacity:0.9;">
                                A member of our team has responded to your query
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:30px;">

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

                    <tr>
                        <td style="background:#f1f3f5;padding:20px 30px;text-align:center;font-size:12px;color:#666;">
                            You can view your full chat history in your account dashboard.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
