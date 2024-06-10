<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<body>
    <header>
        <div class="logo">
            <a href="{{ route('accueil') }}">Voyage<span> KCS</span></a>
        </div>
        <nav>
            <button class="btn" onclick="redirectToRegister('client')"><i class="fa fa-user-plus"></i> S'inscrire</button>
            <div class="dropdown">
                <button class="dropbtn"><i class="fa fa-sign-in"></i> Se connecter</button>
                <div class="dropdown-content">
                    <a href="javascript:void(0)" onclick="redirectToLogin('admin')">Admin</a>
                    <a href="javascript:void(0)" onclick="redirectToLogin('respo')">Responsable</a>
                    <a href="javascript:void(0)" onclick="redirectToLogin('client')">Client</a>
                </div>
            </div>
            <button class="btn about" onclick="location.href='{{ route('about') }}'"><i class="fa fa-info-circle"></i> A propos de nous</button>
        </nav>
        <img src="{{asset('images/logo.png')}}" alt="logo" class="logoImage">
    </header>
    <div class="meteo">
        {{-- <h2>Météo</h2> --}}
        <a class="weatherwidget-io" href="https://forecast7.com/fr/32d34n6d38/beni-mellal/" data-label_1="BENI-MELLAL" data-label_2="METEO" data-days="7" data-theme="pure">BENI-MELLAL WEATHER</a>
        <script>
            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
        </script>
    </div>
    <section>
        {{-- <div class="bg-video-wrap">
            <video id="bgVideo" autoplay muted>
                <source src="{{ asset('videos/Bleu_logo_S.mp4') }}" type="video/mp4">
                Votre navigateur ne supporte pas la balise vidéo.
            </video>
        </div> --}}
        <div class="bg-gif-wrap">
            <img src="{{ asset('videos/Bleu_logo.gif') }}" alt="GIF animé" class="bg-gif">
        </div>
        {{-- <div class="content">
            <h1>Bienvenue sur notre site avec un logo animé en arrière-plan !</h1>
        </div> --}}

    </section>
    <article>
        <button class="consult" onclick="location.href='{{ url('/consulter-vols') }}'">Consulter Vols</button>
    </article>
    <div class="right"></div>
    <footer>
        <div class="legal">
            <a href="#">Mentions légales</a>
        </div>
        <div class="contact">
            <a href="#">Contact</a>
        </div>
        <div class="social-media">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>
</body>
</html>