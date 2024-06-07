<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Register</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form id="registerForm" action="{{ route('register', ['role' => $role]) }}" method="POST">
            @csrf
            <input type="hidden" name="role" value="{{ $role }}">
        
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <span id="emailError" class="error" style="display:none;">Email already exists.</span>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            <div id="passwordConfirmationMessage"></div> <!-- Message de vérification -->
            @error('password_confirmation')
                <div class="error">{{ $message }}</div>
            @enderror
        
            <button type="submit" id="submitButton">Register</button>
        </form>
        
        
        <p>Already have an account? <a href="{{ route('login', ['role' => $role]) }}">Login here</a></p>
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
                    alert('Please use a different email address.');
                }
            });
        });
        
    $(document).ready(function() {
        $('#password_confirmation').on('keyup', function() {
            var password = $('#password').val();
            var confirmPassword = $(this).val();

            if (password === confirmPassword) {
                $('#passwordConfirmationMessage').removeClass('error').addClass('success').html('Passwords match.');
                $('#submitButton').prop('disabled', false); // Activer le bouton submit si les mots de passe correspondent
            } else {
                $('#passwordConfirmationMessage').removeClass('success').addClass('error').html('Passwords do not match.');
                $('#submitButton').prop('disabled', true); // Désactiver le bouton submit si les mots de passe ne correspondent pas
            }
        });
    });


    </script>
</body>
</html>
