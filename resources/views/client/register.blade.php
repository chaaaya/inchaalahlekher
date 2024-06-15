<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <title>Inscription</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    @include('partials.header1')
    <div class="container">
        <h2>Inscription</h2>
        <form id="registerForm" action="{{ route('register.post') }}" method="POST">
            @csrf
        
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="numero_telephone">Numéro de téléphone</label>
            <input type="text" id="numero_telephone" name="numero_telephone" required>
            @error('numero_telephone')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <span id="emailError" class="error" style="display:none;">L'email existe déjà.</span>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            <div id="passwordConfirmationMessage"></div>
            @error('password_confirmation')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <button type="submit" id="submitButton">S'inscrire</button>
        </form>
        
        <p>Vous avez déjà un compte? <a href="{{ route('client.login') }}">Connectez-vous ici</a></p>
    </div>

    <script>
        $(document).ready(function() {
            $('#email').on('blur', function() {
                var email = $(this).val();
                $.ajax({
                    url: '{{ route('check-email') }}',
                    type: 'GET',
                    data: { email: email },
                    success: function(data) {
                        if(data.exists) {
                            $('#emailError').show();
                        } else {
                            $('#emailError').hide();
                        }
                    }
                });
            });

            $('#registerForm').on('submit', function(event) {
                if ($('#emailError').is(':visible')) {
                    event.preventDefault();
                    alert('Veuillez utiliser une adresse email différente.');
                }
            });

            $('#password_confirmation').on('keyup', function() {
                var password = $('#password').val();
                var confirmPassword = $(this).val();

                if (password === confirmPassword) {
                    $('#passwordConfirmationMessage').removeClass('error').addClass('success').html('Les mots de passe correspondent.');
                    $('#submitButton').prop('disabled', false);
                } else {
                    $('#passwordConfirmationMessage').removeClass('success').addClass('error').html('Les mots de passe ne correspondent pas.');
                    $('#submitButton').prop('disabled', true);
                }
            });
        });
    </script>
</body>
</html>