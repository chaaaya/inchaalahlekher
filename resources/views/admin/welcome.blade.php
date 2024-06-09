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
    </style>

    <div class="container mt-5">
        <div class="jumbotron jumbotron-custom">
            <h1 class="display-4 welcome-title">Bienvenue, {{ Auth::user()->name }} !</h1>
            <p class="lead welcome-text">Ceci est la page de bienvenue de l'administrateur.</p>
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
