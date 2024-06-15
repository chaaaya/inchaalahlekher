<!-- resources/views/admin/welcome.blade.php -->
@extends('layouts.admin')

@section('title', 'Bienvenue Admin')

@section('content')
    <style>
        .jumbotron-custom {
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 2rem 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            margin: 0.5rem 0;
        }
        .welcome-title {
            color: #343a40;
            font-weight: bold;
        }
        .welcome-text {
            color: #6c757d;
        }
        .btn-group-custom a {
            display: block;
            margin-bottom: 0.5rem;
        }
        .btn-group-custom {
            display: flex;
            flex-direction: column;
            align-items: start;
        }
        /* Styles pour le conteneur des boutons */
.btn-group-custom {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 10px; /* Espacement entre les boutons */
    margin-top: 1.5rem; /* Ajout d'une marge supérieure */
}

/* Styles généraux pour les boutons */
.btn-custom {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    text-align: center;
    transition: background-color 0.3s, color 0.3s;
}

/* Bouton secondaire (Gérer les Utilisateurs) */
.btn-secondary {
    background-color: #6c757d;
    color: #fff;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
    color: #fff;
}

/* Bouton info (Gérer les Réservations) */
.btn-info {
    background-color: #17a2b8;
    color: #fff;
    border: none;
}

.btn-info:hover {
    background-color: #138496;
    color: #fff;
}

/* Bouton warning (Gérer les Offres) */
.btn-warning {
    background-color: #ffc107;
    color: #212529;
    border: none;
}

.btn-warning:hover {
    background-color: #e0a800;
    color: #212529;
}

/* Bouton danger (Gérer les Services) */
.btn-danger {
    background-color: #dc3545;
    color: #fff;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
    color: #fff;
}

/* Bouton success (Gérer les Vols) */
.btn-success {
    background-color: #28a745;
    color: #fff;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
    color: #fff;
}

/* Bouton dark (Gérer les Rapports) */
.btn-dark {
    background-color: #343a40;
    color: #fff;
    border: none;
}

.btn-dark:hover {
    background-color: #23272b;
    color: #fff;
}

    </style>

    <div class="container mt-5">
        <div class="jumbotron jumbotron-custom">
            <h1 class="display-4 welcome-title">Bienvenue, {{ Auth::user()->name }} !</h1>
            {{-- <p class="lead welcome-text">Ceci est la page de bienvenue de l'administrateur.</p> --}}
            <hr class="my-4">
            <p class="welcome-text">Utilisez les liens ci-dessous pour gérer les différentes sections de l'administration.</p>
            <div class="btn-group-custom mt-4">
               
                <a class="btn btn-secondary btn-lg btn-custom" href="{{ route('admin.users.manage-users') }}" role="button">Gérer les Utilisateurs</a>
                <a class="btn btn-info btn-lg btn-custom" href="{{ route('admin.reservation.manage-reservations') }}" role="button">Gérer les Réservations</a>
                <a class="btn btn-warning btn-lg btn-custom" href="{{ route('admin.offers.index') }}" role="button">Gérer les Offres</a>
                <a class="btn btn-danger btn-lg btn-custom" href="{{ route('admin.services.index') }}" role="button">Gérer les Services</a>
                <a class="btn btn-success btn-lg btn-custom" href="{{ route('admin.vols.index') }}" role="button">Gérer les Vols</a>
                <a class="btn btn-dark btn-lg btn-custom" href="{{ route('admin.rapports.index') }}" role="button">Gérer les Rapports</a>
            </div>
        </div>
    </div>
@endsection