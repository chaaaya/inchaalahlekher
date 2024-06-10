<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Pending</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <h2>Registration Pending</h2>
        <p>Your registration is currently pending approval by our administrators. You will receive an email once your account has been approved. Thank you for your patience.</p>
        <a href="{{ route('accueil') }}">Return to Home</a>
    </div>
</body>
</html>
