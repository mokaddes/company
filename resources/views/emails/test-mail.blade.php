<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .email-header {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }
        .email-body {
            padding: 20px;
        }
        .email-footer {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            color: #555;
        }
        .email-footer a {
            color: #4CAF50;
            text-decoration: none;
        }
        .email-table {
            width: 100%;
            border-collapse: collapse;
        }
        .email-table th, .email-table td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="email-header">
        New  Message from Proxima Digital
    </div>
    <div class="email-body">
       <p>This is test message</p>
    </div>
    <div class="email-footer">
        &copy; {{ date('Y') }} Proxima Digital. All Rights Reserved. <br>
        <a href="https://proximadigital.com">Visit Our Website</a>
    </div>
</div>
</body>
</html>
