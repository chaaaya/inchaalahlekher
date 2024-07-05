@extends('layouts.admin')

@section('title', 'Bienvenue Admin')

@section('content')
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Bienvenue dans l'Administration KCS</h1>
                <p>Gérez facilement les utilisateurs, réservations, offres et plus encore.</p>
            </div>
            <div class="hero-buttons">
                <a href="{{ route('admin.users.manage-users') }}" class="btn btn-secondary">Gérer les Utilisateurs</a>
                <a href="{{ route('admin.reservation.manage-reservations') }}" class="btn btn-info">Gérer les Réservations</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="features-section">
            <h2>Fonctionnalités d'Administration</h2>
            <div class="features-row">
                <div class="feature">
                    <img src="{{ asset('images/hotel1.jpg') }}" alt="Gérer les Utilisateurs" class="img-fluid">
                    <h3>Gérer les Utilisateurs</h3>
                    <p>Supervisez et administrez les utilisateurs de la plateforme.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('images/hotel2.jpg') }}" alt="Gérer les Réservations" class="img-fluid">
                    <h3>Gérer les Réservations</h3>
                    <p>Contrôlez et gérez les réservations de vols.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('images/hotel3.jpg') }}" alt="Gérer les Offres" class="img-fluid">
                    <h3>Gérer les Offres</h3>
                    <p>Créez et mettez à jour les offres pour les clients.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('images/hotel1.jpg') }}" alt="Gérer les Services" class="img-fluid">
                    <h3>Gérer les Services</h3>
                    <p>Administrez les services disponibles pour les clients.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('images/hotel4.jpg') }}" alt="Gérer les Vols" class="img-fluid">
                    <h3>Gérer les Vols</h3>
                    <p>Ajoutez et modifiez les informations sur les vols.</p>
                </div>
                <div class="feature">
                    <img src="{{ asset('images/hotel2.jpg') }}" alt="Gérer les Rapports" class="img-fluid">
                    <h3>Gérer les Rapports</h3>
                    <p>Consultez et générez des rapports d'activité.</p>
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
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/admin_background.jpg') }}');
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
            margin-top: 5px; 
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

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: 1px solid #6c757d;
        }

        .btn-info {
            background-color: #17a2b8;
            color: #fff;
            border: 1px solid #17a2b8;
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
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            width: 25%;
            box-sizing: border-box;
        }

        .feature img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .feature h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .feature p {
            font-size: 1rem;
            line-height: 1.4;
        }
    </style>
@endsection
