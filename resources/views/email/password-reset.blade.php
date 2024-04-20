<!DOCTYPE html>
<html>

<head>
    <title>SGL Rating Password Reset Link</title>
</head>

<body>
    Dear {{ $user->name }},<br />

    <p>Please click below link to reset your password.</p><br />

    <a href="{{ route() }}">Reset Password</a><br />

    Best Regards,<br />
    Team SGL Rating.
</body>

</html>