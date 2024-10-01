<!-- resources/views/mails/contact_form.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #ddd;
        }
        .header h1 {
            margin: 0;
            color: #333;
        }
        .content {
            padding: 20px 0;
        }
        .content p {
            margin: 10px 0;
            color: #555;
        }
        .content p span {
            font-weight: bold;
            color: #333;
        }
        .footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            color: #999;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>New Contact Form Entry</h1>
    </div>
    <div class="content">
        <p><span>Name:</span> {{ $data['name'] }}</p>
        <p><span>Email:</span> {{ $data['email'] }}</p>
        <p><span>Message:</span> {{ $data['message'] }}</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Traitz Tech. All rights reserved.</p>
    </div>
</div>
</body>
</html>
