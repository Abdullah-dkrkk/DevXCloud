<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Customer Question</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f5; padding: 40px;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; border-radius: 12px; padding: 32px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <div style="text-align: center; margin-bottom: 24px;">
            <h1 style="font-size: 24px; color: #1a1a1a; margin: 0;">New Customer Question</h1>
        </div>

        <div style="background: #f8f9fa; border-radius: 8px; padding: 16px; margin-bottom: 20px;">
            <p style="margin: 0 0 4px 0; font-size: 12px; color: #666;">FROM</p>
            <p style="margin: 0; font-size: 16px; font-weight: 600;">{{ $userName }}</p>
            <p style="margin: 4px 0 0 0; font-size: 14px; color: #666;">{{ $userEmail }}</p>
        </div>

        <div style="background: #f0f7ff; border-radius: 8px; padding: 16px; margin-bottom: 20px; border-left: 4px solid #0176d3;">
            <p style="margin: 0 0 4px 0; font-size: 12px; color: #666;">QUESTION</p>
            <p style="margin: 0; font-size: 16px; line-height: 1.5;">{{ $questionText }}</p>
        </div>

        <a href="{{ $dashboardUrl }}"
           style="display: block; text-align: center; background: #0176d3; color: #fff; text-decoration: none; padding: 14px; border-radius: 8px; font-size: 16px; font-weight: 600;">
            Answer in Agent Dashboard
        </a>

        <p style="text-align: center; font-size: 12px; color: #999; margin-top: 20px;">
            DevXCloud Support System
        </p>
    </div>
</body>
</html>
