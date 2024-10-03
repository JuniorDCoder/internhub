<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Application Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header h1 {
            margin: 0;
            color: #333333;
        }
        .content {
            padding: 20px 0;
        }
        .content p {
            line-height: 1.6;
            color: #666666;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            text-align: center;
            padding: 20px 0;
            color: #999999;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Internship Application Status</h1>
    </div>
    <div class="content">
        <p>Dear {{ $data['name'] }},</p>
        @if ($data['status'] === 'accepted')
            <p>Congratulations! We are pleased to inform you that your internship application has been accepted. We are excited to have you join our team.</p>
            <p>Please join our WhatsApp group for interns to get more details and stay updated:</p>
            <a href="{{ $data['whatsapp_link'] }}" class="button">Join WhatsApp Group</a>
        @else
            <p>We regret to inform you that your internship application has not been accepted at this time. We appreciate your interest and encourage you to apply again in the future.</p>
        @endif
        <p>Best regards,<br>The Internship Team</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Internship Program. All rights reserved.</p>
    </div>
</div>
</body>
</html>
