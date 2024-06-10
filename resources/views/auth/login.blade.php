<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Connexion</title>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">
        
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <button type="submit">Se connecter</button>
        </form>
        
        <p>Vous n'avez pas de compte? <a href="{{ route('register', ['role' => $role]) }}">Inscrivez-vous ici</a></p>
    </div>
</body>
</html>
