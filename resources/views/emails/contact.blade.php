<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Contact Submission</title>
</head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background-color:#f4f6f8;">
        <tr>
            <td align="center">

                <!-- Main card -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">

                    <!-- Header -->
                    <tr>
                        <td style="background:#0176d3;color:#ffffff;padding:20px 30px;">
                            <h2 style="margin:0;font-size:22px;">
                                New Contact Form Submission
                            </h2>
                            <p style="margin:5px 0 0;font-size:14px;opacity:0.9;">
                                A new user has submitted the website contact form
                            </p>
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding:30px;">

                            <h3 style="margin-top:0;color:#333;">Contact Details</h3>

                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-size:14px;">

                                <tr style="background:#f9fafb;">
                                    <td width="35%"><strong>Full Name</strong></td>
                                    <td>{{ $contact->full_name }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Work Email</strong></td>
                                    <td>{{ $contact->work_email }}</td>
                                </tr>

                                <tr style="background:#f9fafb;">
                                    <td><strong>Company</strong></td>
                                    <td>{{ $contact->company }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Country</strong></td>
                                    <td>{{ $contact->country }}</td>
                                </tr>

                                <tr style="background:#f9fafb;">
                                    <td><strong>State</strong></td>
                                    <td>{{ $contact->state }}</td>
                                </tr>

                                <tr>
                                    <td><strong>Phone</strong></td>
                                    <td>{{ $contact->phone }}</td>
                                </tr>

                                <tr style="background:#f9fafb;">
                                    <td><strong>Has Website</strong></td>
                                    <td>{{ ucfirst($contact->has_website) }}</td>
                                </tr>

                                @if($contact->website_url)
                                <tr>
                                    <td><strong>Website URL</strong></td>
                                    <td>
                                        <a href="{{ $contact->website_url }}" target="_blank">
                                            {{ $contact->website_url }}
                                        </a>
                                    </td>
                                </tr>
                                @endif

                            </table>

                            <!-- Message -->
                            @if($contact->message)
                            <h3 style="margin-top:30px;color:#333;">User Message</h3>
                            <div style="background:#f9fafb;padding:15px;border-radius:6px;font-size:14px;line-height:1.6;">
                                {{ $contact->message }}
                            </div>
                            @endif

                            <!-- Meta info -->
                            <h3 style="margin-top:30px;color:#333;">Submission Info</h3>
                            <table width="100%" cellpadding="6" cellspacing="0" style="font-size:13px;color:#555;">
                                <tr>
                                    <td><strong>IP Address:</strong> {{ $contact->ip_address }}</td>
                                </tr>
                                <tr>
                                    <td><strong>User Agent:</strong> {{ $contact->user_agent }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Submitted At:</strong> {{ $contact->created_at }}</td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f1f3f5;padding:20px 30px;text-align:center;font-size:12px;color:#666;">
                            This email was automatically generated by your website contact system.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
