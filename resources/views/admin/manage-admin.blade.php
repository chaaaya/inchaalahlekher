<!-- resources/views/admin/manage-admin.blade.php -->
@extends('layouts.admin')

@section('content')
    <style>
        .welcome-banner {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .welcome-banner h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .welcome-banner p {
            font-size: 1.2rem;
            color: #555;
        }
        .card {
            margin: 20px auto; /* Center the card horizontally */
            max-width: 800px; /* Set a max width for the card */
        }
    </style>
    
        <div class="welcome-banner">
            <h1>Bienvenue sur le tableau de bord de l'admin</h1>
            <p>Gérez les utilisateurs, les réservations, les rapports, et plus encore avec facilité.</p>
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h2>Gestion des Administrateurs</h2>
            </div>
            <div class="card-body">
                <p class="card-text">Ici, vous pouvez gérer toutes les tâches administratives, y compris la gestion des utilisateurs, le traitement des réservations et la génération de rapports. Utilisez la barre de navigation pour accéder aux différentes sections.</p>
                <li><a href="{{ route('admin.users.manage-users') }}">Gestion des utilisateurs</a></li>

                <a href="{{ route('admin.reservation.manage-reservations') }}" class="btn btn-secondary"><i class="fa fa-calendar"></i> Gérer les réservations</a>
                <a href="{{ route('admin.services.index') }}" class="nav-link"><i class="fa fa-concierge-bell"></i> Gestion des services supplémentaires</a>

                <a href="{{ route('admin.rapports.index') }}" class="btn btn-info"><i class="fa fa-file"></i> Gérer les rapports</a>
            </div>
        </div>
    @endsection
    