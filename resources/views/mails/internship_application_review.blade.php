<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Internship Application Review</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
        }
        .header img {
            width: 100px;
        }
        .content {
            padding: 20px;
        }
        .content h1 {
            color: #333333;
        }
        .content p {
            color: #666666;
            line-height: 1.6;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #999999;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <img src="{{ asset('images/traitz.jpeg') }}" alt="Company Logo">
    </div>
    <div class="content">
        <h1>Dear {{ $data['name'] }},</h1>
        <p>Thank you for applying for the internship position in the {{ $data['specialty'] }} specialty.</p>
        <p>Your application is currently under review. We will get back to you soon to confirm your application status.</p>
        <p><strong>Internship Details:</strong></p>
        <ul>
            <li><strong>Specialty:</strong> {{ $data['specialty'] }}</li>
            <li><strong>Start Date:</strong> {{ $data['start_date'] }}</li>
            <li><strong>End Date:</strong> {{ $data['end_date'] }}</li>
        </ul>
        <p>Thank you for your interest in our internship program.</p>
        <p>Best regards,</p>
        <p>The Traitz Tech Internship Team</p>
    </div>
    <div class="footer">
        &copy; {{ date('Y') }} <a href="https://internship.traitz.tech/">Traitz Tech Ltd</a>. All rights reserved.
    </div>
</div>
</body>
</html>
