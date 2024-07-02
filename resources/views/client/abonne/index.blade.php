@extends('layouts.abonne')

@section('content-abonne')
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Bienvenue dans l'Expérience Voyage KCS</h1>
                <p>Découvrez notre application pour une gestion facile de vos voyages.</p>
            </div>
            <div class="hero-buttons">
                <a href="{{ route('abonne.reserver.vol') }}" class="btn btn-primary">Réserver un Vol</a>
                <a href="{{ route('abonne.consulter.offres') }}" class="btn btn-secondary">Découvrir nos Offres</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="features-section">
            <h2>Nos Fonctionnalités</h2>
            <div class="features-row">
                <div class="feature">
                    <img src="/images/reserverVol.jpg" alt="Réserver un Vol" class="img-fluid">
                    <h3>Réserver un Vol</h3>
                    <p>Explorez notre large sélection de vols et réservez facilement.</p>
                </div>
                <div class="feature">
                    <img src="/images/suivreVol.jpg" alt="Suivre les Vols" class="img-fluid">
                    <h3>Suivre les Vols</h3>
                    <p>Restez informé sur les vols en temps réel avec notre suivi des vols.</p>
                </div>
                <div class="feature">
                    <img src="/images/historiqueVol.jpg" alt="Historique des Vols" class="img-fluid">
                    <h3>Historique des Vols</h3>
                    <p>Consultez facilement votre historique de voyages passés.</p>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Styles spécifiques pour cette page */
        body {
            background-color: #f1f1f1;
            color: #333;
            line-height: 1.6;
        }

        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('/images/background.jpg');
            background-size: cover;
            height: 30vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: #fff;
            padding: 20px;
            margin-top: 2px;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .hero-text {
            text-align: center;
            max-width: 600px;
        }

        .hero-text h1 {
            font-size: 2rem;
            margin-bottom: 15px;
            margin-top:5px; 
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 14px;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            margin-top: 6px;
            margin-bottom: 6px;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 30px;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-right: 15px;
        }

        .btn-primary {
            background-color: #3498db;
            color: #fff;
            border: 1px solid #3498db;
        }

        .btn-secondary {
            background-color: #2ecc71;
            color: #fff;
            border: 1px solid #2ecc71;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .features-section {
            padding: 5px 0;
            text-align: center;
        }

        .features-section h2 {
            margin-bottom: 10px;
            font-size: 2.5rem;
        }

        .features-row {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .feature {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            width: 30%;
            box-sizing: border-box;
        }

        .feature img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .feature h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
        }

        .feature p {
            font-size: 1.1rem;
            line-height: 1.6;
        }
    </style>
@endsection