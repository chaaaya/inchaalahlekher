<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <title>Accueil</title>
    <script>
        function redirectToLogin(role) {
            window.location.href = `/login/${role}`;
        }
        function redirectToRegister(role) {
            window.location.href = `/register/${role}`;
        }
    </script>
</head>
<header>
    <div class="logo">
        <a href="{{route('accueil')}}">Voyage<span> KCS</span></a>
    </div>
    <img src="{{asset('images/logo.png')}}" alt="logo" class="logoImage">
</header>