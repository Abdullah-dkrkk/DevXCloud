<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Ticket Created</title></head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background-color:#f4f6f8;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
@if ($isAdminNotification)
<tr><td style="background:#e74c3c;color:#ffffff;padding:20px 30px;">
<h2 style="margin:0;font-size:22px;">New Support Ticket</h2>
<p style="margin:5px 0 0;font-size:14px;opacity:0.9;">{{ $ticket->name }} has submitted a {{ $formTypeLabel }}</p>
</td></tr>
<tr><td style="padding:30px;">
<p style="font-size:15px;color:#333;">Hi Admin,</p>
<p style="font-size:14px;color:#555;line-height:1.6;">
A new <strong>{{ $formTypeLabel }}</strong> request has been submitted by <strong>{{ $ticket->name }}</strong>.
</p>
<table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-size:14px;">
<tr style="background:#f9fafb;"><td width="35%" style="padding:10px;"><strong>Ticket #</strong></td><td style="padding:10px;">{{ $ticket->ticket_number }}</td></tr>
<tr><td style="padding:10px;"><strong>Customer</strong></td><td style="padding:10px;">{{ $ticket->name }} &lt;{{ $ticket->email }}&gt;</td></tr>
<tr style="background:#f9fafb;"><td style="padding:10px;"><strong>Request Type</strong></td><td style="padding:10px;">{{ $formTypeLabel }}</td></tr>
@if (!empty($formFields))
@foreach ($formFields as $field)
<tr @if ($loop->even) style="background:#f9fafb;" @endif><td style="padding:10px;"><strong>{{ $field['label'] }}</strong></td><td style="padding:10px;">{{ $field['value'] }}</td></tr>
@endforeach
@endif
<tr><td style="padding:10px;"><strong>Status</strong></td><td style="padding:10px;">{{ ucfirst($ticket->status) }}</td></tr>
<tr style="background:#f9fafb;"><td style="padding:10px;"><strong>Submitted At</strong></td><td style="padding:10px;">{{ $ticket->created_at->format('F j, Y, g:i a') }}</td></tr>
</table>
<p style="font-size:14px;color:#555;line-height:1.6;margin-top:25px;">
<a href="{{ url('/admin/dashboard') }}" style="display:inline-block;padding:10px 24px;background:#e74c3c;color:#fff;text-decoration:none;border-radius:4px;">Open Agent Dashboard</a>
</p>
</td></tr>
@else
<tr><td style="background:#0176d3;color:#ffffff;padding:20px 30px;">
<h2 style="margin:0;font-size:22px;">We've Received Your Request</h2>
<p style="margin:5px 0 0;font-size:14px;opacity:0.9;">{{ $formTypeLabel }} &mdash; {{ $ticket->ticket_number }}</p>
</td></tr>
<tr><td style="padding:30px;">
<p style="font-size:15px;color:#333;">Hi {{ $ticket->name }},</p>
<p style="font-size:14px;color:#555;line-height:1.6;">
Thank you for reaching out to DevXCloud. Your <strong>{{ $formTypeLabel }}</strong> request has been received and a support ticket has been created. A member of our team will review it and get back to you shortly.
</p>
<table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-size:14px;margin-top:15px;">
<tr style="background:#f9fafb;"><td width="35%" style="padding:10px;"><strong>Ticket #</strong></td><td style="padding:10px;">{{ $ticket->ticket_number }}</td></tr>
<tr><td style="padding:10px;"><strong>Name</strong></td><td style="padding:10px;">{{ $ticket->name }}</td></tr>
<tr style="background:#f9fafb;"><td style="padding:10px;"><strong>Email</strong></td><td style="padding:10px;">{{ $ticket->email }}</td></tr>
<tr><td style="padding:10px;"><strong>Request Type</strong></td><td style="padding:10px;">{{ $formTypeLabel }}</td></tr>
@if (!empty($formFields))
@foreach ($formFields as $field)
<tr @if ($loop->even) style="background:#f9fafb;" @endif><td style="padding:10px;"><strong>{{ $field['label'] }}</strong></td><td style="padding:10px;">{{ $field['value'] }}</td></tr>
@endforeach
@endif
<tr style="background:#f9fafb;"><td style="padding:10px;"><strong>Status</strong></td><td style="padding:10px;">{{ ucfirst($ticket->status) }}</td></tr>
<tr><td style="padding:10px;"><strong>Submitted At</strong></td><td style="padding:10px;">{{ $ticket->created_at->format('F j, Y, g:i a') }}</td></tr>
</table>
<h3 style="color:#333;margin-top:25px;margin-bottom:10px;font-size:15px;">Continue the Conversation</h3>
<p style="font-size:14px;color:#555;line-height:1.6;">
You can continue the conversation from here by clicking the link below:<br>
<a href="{{ $reengagementUrl }}" style="color:#0176d3;word-break:break-all;">{{ $reengagementUrl }}</a>
</p>
</td></tr>
@endif
<tr><td style="background:#f1f3f5;padding:20px 30px;text-align:center;font-size:12px;color:#666;">
Thank you for choosing DevXCloud.
</td></tr>
</table>
</td></tr>
</table>
</body>
</html>
