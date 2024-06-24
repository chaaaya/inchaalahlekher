<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>À propos de nous</title>
    <link rel="stylesheet" href="{{ asset('css/propos.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
        <a href="{{ route('accueil') }}">  
            <button class="btn"><i class="fa fa-home"></i> Home</button>
        </a>
    </nav>

    <section class="about-section">
        <div class="about-image">
            <img src="{{ asset('images/im.jpg.jpeg') }}" alt="Une image représentative de notre entreprise">
        </div>
        <div class="about-text">
            <h1>Bienvenue chez KCS VOYAGE,<br>
                votre partenaire fiable pour une expérience de voyage inoubliable.</h1>
            <br>
            <br>
            <p>
                KCS VOYAGE a été conçue avec une vision claire : simplifier la planification de vos voyages tout en offrant une expérience utilisateur exceptionnelle.
                Notre équipe, composée de passionnés du voyage et d'experts en technologie, travaille sans relâche pour vous apporter des solutions innovantes qui répondent à vos besoins en matière de voyage, que ce soit pour le loisir ou pour le travail.
            </p>
        </div>
    </section>

    <section class="content-section">
        <div class="text-content">
            <h1>NOTRE MISSION</h1>
            <br>
            <p>
                Est de rendre l'organisation de vos voyages aussi fluide et agréable que possible.
                Nous nous engageons à fournir une plateforme sécurisée, facile à utiliser, et riche en fonctionnalités qui vous aide à planifier,
                réserver et gérer vos voyages avec une facilité déconcertante.
            </p>
        </div>
        <div class="image-content">
            <img src="{{ asset('images/valise.jpg') }}" alt="Descriptive Image">
        </div>
    </section>

    <section class="about-section">
        <div class="about-image">
            <img src="{{ asset('images/full-shot-travel-concept-with-landmarks.jpg') }}" alt="Une image représentative de notre entreprise">
        </div>
        <div class="about-text">
            <h1>  Pourquoi Choisir KCS VOYAGE</h1>
            <br>
            <br>
            <p>
                <h4>Facilité d'utilisation :</h4> Notre interface intuitive vous permet de trouver rapidement ce que vous cherchez, que ce soit de réserver un vol, un hôtel, ou de rechercher des informations de voyage.
                <br>
                <h4>Personnalisation :</h4> Nous offrons des recommandations personnalisées basées sur vos préférences et votre historique de voyage.
                <br>
                <h4>Support Client :</h4> Notre équipe de support est disponible 24/7 pour répondre à toutes vos questions et vous assister en cas de besoin.
                <br>
                <h4>Innovation :</h4> Nous nous efforçons constamment d'intégrer les dernières technologies pour améliorer votre expérience de voyage.