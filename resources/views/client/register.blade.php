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
            <div class="form-group">
                <input type="text" id="name" name="name" placeholder="nom" required>
            </div>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <div class="form-group">
                <input type="text" id="prenom" name="prenom" placeholder="prenom" required>
            </div>
            @error('prenom')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <div class="form-group">
                <input type="text" id="numero_telephone" name="numero_telephone" placeholder="numéro de téléphone" required>
            </div>
            @error('numero_telephone')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="email" required>
                <span id="emailError" class="error" style="display:none;">L'email existe déjà.</span>
            </div>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="mot de passe" required>
            </div>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <div class="form-group">
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="confirmer le mot de passe" required>
                <div id="passwordConfirmationMessage"></div>
            </div>
            @error('password_confirmation')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <button type="submit" id="submitButton">S'inscrire</button>
        </form>
        
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