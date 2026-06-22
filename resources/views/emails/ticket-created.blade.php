<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Ticket Created</title></head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background-color:#f4f6f8;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
<tr><td style="background:#0176d3;color:#ffffff;padding:20px 30px;">
<h2 style="margin:0;font-size:22px;">Ticket Created</h2>
<p style="margin:5px 0 0;font-size:14px;opacity:0.9;">Your request has been received</p>
</td></tr>
<tr><td style="padding:30px;">
<p style="font-size:15px;color:#333;">Hi {{ $ticket->name }},</p>
<p style="font-size:14px;color:#555;line-height:1.6;">
Thank you for reaching out to DevXCloud. Your request has been received and a support ticket has been created.
</p>
<table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse;font-size:14px;">
<tr style="background:#f9fafb;"><td width="35%"><strong>Ticket #</strong></td><td>{{ $ticket->ticket_number }}</td></tr>
<tr><td><strong>Type</strong></td><td>{{ ucfirst($ticket->form_type) }}</td></tr>
<tr style="background:#f9fafb;"><td><strong>Status</strong></td><td>{{ ucfirst($ticket->status) }}</td></tr>
<tr><td><strong>Submitted</strong></td><td>{{ $ticket->created_at->format('F j, Y, g:i a') }}</td></tr>
</table>
<p style="font-size:14px;color:#555;line-height:1.6;margin-top:20px;">
One of our team members will review your request and get back to you as soon as possible.
</p>
<p style="font-size:14px;color:#555;line-height:1.6;">
To continue this conversation, click the link below:<br>
<a href="{{ $reengagementUrl }}" style="color:#0176d3;">{{ $reengagementUrl }}</a>
</p>
</td></tr>
<tr><td style="background:#f1f3f5;padding:20px 30px;text-align:center;font-size:12px;color:#666;">
Thank you for choosing DevXCloud.
</td></tr>
</table>
</td></tr>
</table>
</body>
</html>
