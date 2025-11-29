<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <p>Hello, {{ $name }},</p>
    <p>You requested a password reset. Click the link below to reset your password:</p>
    <p><a href="{{ $resetLink }}">{{ $resetLink }}</a></p>
    <p>If you did not request this, just ignore this email.</p>
</body>
</html>
