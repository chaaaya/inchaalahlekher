<!-- resources/views/auth/welcome.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
            text-align: center;
        }
        h1 {
            color: #007BFF;
        }
        .welcome-message {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="welcome-message">
        <h1>Bienvenue {{ Auth::user()->name }} sur notre application de gestion de voyages!</h1>
        <p>Merci de vous être inscrit.</p>
    </div>
</body>
</html>
