<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to our website</title>
</head>
<body>
    <h1>Welcome to our website, {{ $username }}!</h1>
    <p>We're glad to have you on board. Here's your account information:</p>
    <ul>
        <li>Name: {{ $username }}</li>
        <li>Email: {{ $email }}</li>
    </ul>
    <p>Thank you for joining us!</p>
</body>
</html>
