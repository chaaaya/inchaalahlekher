<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Connexion - Responsable</title>
</head>
<body>
    @include('partials.header1');
    <div class="login-container">
        <h2>Connexion - Responsable</h2>
        <form action="{{ route('respo.login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
        <a href="{{ route('accueil') }}">Retour à l'accueil</a>
    </div>
</body>
</html>