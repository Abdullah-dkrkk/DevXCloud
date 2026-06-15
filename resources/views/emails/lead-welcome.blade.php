<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body style="font-family: Arial, sans-serif; background:#f4f4f4; margin:0; padding:40px;">
    <div style="max-width:600px; margin:auto; background:#fff; border-radius:8px; overflow:hidden;">
        <div style="background:#0a0a23; padding:24px; text-align:center;">
            <h1 style="color:#fff; margin:0; font-size:22px;">Welcome to DevXCloud</h1>
        </div>
        <div style="padding:32px;">
            <p>Hi {{ $user->name }},</p>
            <p>Thank you for reaching out to DevXCloud. We have created your account so you can track your inquiries and access personalized support.</p>

            <div style="background:#f9f9f9; border:1px solid #ddd; border-radius:6px; padding:20px; margin:20px 0;">
                <p style="margin:0 0 8px;"><strong>Email:</strong> {{ $user->email }}</p>
                <p style="margin:0;"><strong>Password:</strong> <code style="background:#eee; padding:4px 8px; border-radius:4px;">{{ $password }}</code></p>
            </div>

            <p style="margin-bottom:24px;">You can log in to your account and view your chat history anytime.</p>

            <a href="{{ url('/login') }}" style="display:inline-block; background:#10b981; color:#fff; text-decoration:none; padding:12px 28px; border-radius:6px; font-weight:bold;">Log In to Your Account</a>

            <p style="margin-top:32px; color:#666; font-size:13px;">We recommend changing your password after logging in.</p>
        </div>
        <div style="background:#f4f4f4; padding:16px; text-align:center; color:#999; font-size:12px;">
            &copy; {{ date('Y') }} DevXCloud. All rights reserved.
        </div>
    </div>
</body>
</html>
