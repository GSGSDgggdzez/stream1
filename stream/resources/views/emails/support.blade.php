<!DOCTYPE html>
<html>
<head>
    <title>Support Request</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #0F0F0F;
            color: white;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #E50000;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 20px;
        }

        h2 {
            color: #E50000;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            padding: 25px;
            margin: 20px 0;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-info {
            margin-bottom: 20px;
        }

        .user-info p {
            margin: 10px 0;
            font-size: 16px;
        }

        .message-box {
            background-color: rgba(229, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #E50000;
        }

        .message-box h3 {
            color: #E50000;
            margin-top: 0;
        }

        footer {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
            color: #999999;
        }

        strong {
            color: #E50000;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ asset('build/iii/Sub.svg') }}" alt="Logo" class="logo">
        <h2>New Support Request</h2>
    </div>

    <div class="content-box">
        <div class="user-info">
            <p><strong>From:</strong> {{ $firstName }} {{ $lastName }}</p>
            <p><strong>Email:</strong> {{ $email }}</p>
        </div>

        <div class="message-box">
            <h3>Message:</h3>
            {{-- <p>{{ $message }}</p> --}}
        </div>
    </div>

    <footer>
        <p>This is an official support request from your website</p>
        <p>© {{ date('Y') }} Your Company Name. All rights reserved.</p>
    </footer>
</body>
</html>
