<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
    <h3>Hello,</h3>
    <p>You requested a password reset. Click the link below to reset your password:</p>
    <p>
        <a href="{{ $resetUrl }}" style="display: inline-block; padding: 10px 20px; background-color: #007BFF; color: #fff; text-decoration: none; border-radius: 5px;">
            Reset Password
        </a>
    </p>
    <p>If you didn't request this, please ignore this email.</p>
</body>
</html>
