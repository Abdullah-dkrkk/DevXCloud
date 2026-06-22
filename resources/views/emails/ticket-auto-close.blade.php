<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><title>Ticket Auto-Close Notice</title></head>
<body style="margin:0;padding:0;background-color:#f4f6f8;font-family:Arial,Helvetica,sans-serif;">
<table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background-color:#f4f6f8;">
<tr><td align="center">
<table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.05);">
<tr><td style="background:#e65100;color:#ffffff;padding:20px 30px;">
<h2 style="margin:0;font-size:22px;">Ticket Closing Soon</h2>
<p style="margin:5px 0 0;font-size:14px;opacity:0.9;">{{ $ticket->ticket_number }} will close in 30 minutes</p>
</td></tr>
<tr><td style="padding:30px;">
<p style="font-size:15px;color:#333;">Hi {{ $ticket->name }},</p>
<p style="font-size:14px;color:#555;line-height:1.6;">
Your ticket <strong>{{ $ticket->ticket_number }}</strong> has been inactive for a while.
If no reply is received within 30 minutes, this ticket will be automatically closed.
</p>
<p style="font-size:14px;color:#555;line-height:1.6;">
If you still need assistance, please reply to continue the conversation.
</p>
<a href="{{ $reengagementUrl }}" style="display:inline-block;background:#0176d3;color:#fff;padding:10px 24px;border-radius:6px;text-decoration:none;font-size:14px;font-weight:bold;">Reply to Ticket</a>
</td></tr>
<tr><td style="background:#f1f3f5;padding:20px 30px;text-align:center;font-size:12px;color:#666;">
If you no longer need assistance, no action is required.
</td></tr>
</table>
</td></tr>
</table>
</body>
</html>
