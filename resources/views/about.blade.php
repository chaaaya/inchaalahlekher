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
    @include('partials.header1')
    <nav>
        <a href="{{ route('accueil') }}">  
            <button class="btn"><i class="fa fa-home"></i> Home</button>
        </a>
    </nav>

    <section class="header-section">
        <h1>Bienvenue chez KCS VOYAGE, votre partenaire fiable pour une expérience de voyage inoubliable.</h1>
    </section>

    <div class="top-section">
        <section class="about-section">
            <div class="about-image">
                <img src="{{ asset('images/listeVol.jpg') }}" alt="Une image représentative de notre entreprise">
            </div>
            
            <div class="about-text">
                <br>
                <p>
                    KCS VOYAGE a été conçue avec une vision claire : simplifier la planification de vos voyages tout en offrant une expérience utilisateur exceptionnelle.
                    Notre équipe, composée de passionnés du voyage et d'experts en technologie, travaille sans relâche pour vous apporter des solutions innovantes qui répondent à vos besoins en matière de voyage, que ce soit pour le loisir ou pour le travail.
                </p>
            </div>
        </section>

        <section class="content-section">
            <div class="text-content">
                <h2>NOTRE MISSION</h2>
                <br>
                <p>
                    Est de rendre l'organisation de vos voyages aussi fluide et agréable que possible.
                    Nous nous engageons à fournir une plateforme sécurisée, facile à utiliser, et riche en fonctionnalités qui vous aide à planifier,
                    réserver et gérer vos voyages avec une facilité déconcertante.
                </p>
            </div>
            <div class="image-content">
                <img src="{{ asset('images/maroc.jpg') }}" alt="Descriptive Image">
            </div>
        </section>
    </div>

    <section class="bottom-section">
        <section class="about-section">
            <div class="about-image">
                <img src="{{ asset('images/reserverVol.jpg') }}" alt="Une image représentative de notre entreprise">
            </div>
            <div class="about-text">
                <h2>POURQUOI CHOISIR KCS VOYAGE</h2>
                <br>
                <p>
                    <h4>Facilité d'utilisation :</h4> Notre interface intuitive vous permet de trouver rapidement ce que vous cherchez, que ce soit de réserver un vol, un hôtel, ou de rechercher des informations de voyage.
                    <br>
                    <h4>Personnalisation :</h4> Nous offrons des recommandations personnalisées basées sur vos préférences et votre historique de voyage.
                    <br>
                    <h4>Support Client :</h4> Notre équipe de support est disponible 24/7 pour répondre à toutes vos questions et vous assister en cas de besoin.
                    <br>
                    <h4>Innovation :</h4> Nous nous efforçons constamment d'intégrer les dernières technologies pour améliorer votre expérience de voyage.
                </p>
            </div>
        </section>
    </section>

    <style>
        /* Reset CSS pour enlever les marges par défaut et les paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Styles pour la barre de navigation */
        nav {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav .btn {
            background-color: #555;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            cursor: pointer;
            font-size: 16px;
        }

        nav .btn:hover {
            background-color: #777;
        }

        /* Styles pour la section principale */
        .header-section {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 60px 20px;
        }

        .header-section h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }

        .top-section {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding: 20px;
        }

        .about-section, .content-section {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .about-section .about-image, .content-section .image-content {
            flex: 1;
            padding: 0 20px;
        }

        .about-section .about-text, .content-section .text-content {
            flex: 1;
            padding: 0 20px;
        }

        .about-section h2, .content-section h2 {
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .about-section p, .content-section p {
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .image-content img, .about-section .about-image img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .bottom-section {
            background-color: #fff;
            padding: 20px;
            margin-top: 6px;
        }

        /* Media query pour une disposition responsive */
        @media (max-width: 768px) {
            .top-section {
                flex-direction: column;
            }
        }
    </style>
</body>
</html>