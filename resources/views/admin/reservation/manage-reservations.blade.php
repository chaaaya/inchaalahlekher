@extends('layouts.admin')

@section('title', 'Gestion des Réservations')

@section('content')
    <h1>Gestion des Réservations</h1>
    <a href="{{ route('admin.reservation.create') }}" class="btn btn-primary">Créer une nouvelle réservation</a>
    
    @if (session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            Liste des réservations
        </div>
        <div class="card-body">
            @if ($reservations->isEmpty())
                <p>Aucune réservation disponible pour le moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de Naissance</th>
                            <th>Sexe</th>
                            <th>Nationalité</th>
                            <th>Numéro d'Identité</th>
                            <th>Date d'Expiration Identité</th>
                            <th>Pays de Délivrance Identité</th>
                            <th>Date de Départ</th>
                            <th>Date de Retour</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Numéro de Carte</th>
                            <th>Date d'Expiration Carte</th>
                            <th>CVV</th>
                            <th>Nom du Titulaire de Carte</th>
                            <th>Date de Création</th>
                            <th>Date de Mise à Jour</th>
                            <th>Ville de Départ</th>
                            <th>Ville d'Arrivée</th>
                            <th>Client ID</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->nom }}</td>
                                <td>{{ $reservation->prenom }}</td>
                                <td>{{ $reservation->date_naissance }}</td>
                                <td>{{ $reservation->sexe }}</td>
                                <td>{{ $reservation->nationalite }}</td>
                                <td>{{ $reservation->num_identite }}</td>
                                <td>{{ $reservation->date_expiration_identite }}</td>
                                <td>{{ $reservation->pays_delivrance_identite }}</td>
                                <td>{{ $reservation->date_depart }}</td>
                                <td>{{ $reservation->date_retour }}</td>
                                <td>{{ $reservation->email }}</td>
                                <td>{{ $reservation->telephone }}</td>
                                <td>{{ $reservation->num_carte }}</td>
                                <td>{{ $reservation->date_expiration_carte }}</td>
                                <td>{{ $reservation->cvv }}</td>
                                <td>{{ $reservation->nom_titulaire_carte }}</td>
                                <td>{{ $reservation->created_at }}</td>
                                <td>{{ $reservation->updated_at }}</td>
                                <td>{{ $reservation->ville_depart }}</td>
                                <td>{{ $reservation->ville_arrivee }}</td>
                                <td>{{ $reservation->client_id }}</td>
                                <td>{{ ucfirst($reservation->status) }}</td>
                                <td>
                                    <a href="{{ route('admin.reservation.edit', $reservation->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('admin.reservation.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                    </form>
                                    <form action="{{ route('reservation.accept', $reservation->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Êtes-vous sûr de vouloir accepter cette réservation ?')">Accepter</button>
                                    </form>
                                    <form action="{{ route('reservation.reject', $reservation->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-secondary" onclick="return confirm('Êtes-vous sûr de vouloir refuser cette réservation ?')">Refuser</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .mt-3 {
            margin-top: 1rem;
        }
        .mt-4 {
            margin-top: 1.5rem;
        }
        .card {
            margin-top: 2rem;
        }
        .btn-warning {
            color: #ffffff;
            background-color: #f0ad4e;
            border-color: #f0ad4e;
        }
        .btn-warning:hover {
            background-color: #ec971f;
            border-color: #d58512;
        }
        .btn-danger {
            color: #ffffff;
            background-color: #d9534f;
            border-color: #d9534f;
        }
        .btn-danger:hover {
            background-color: #c9302c;
            border-color: #ac2925;
        }
        .btn-success {
            color: #ffffff;
            background-color: #5cb85c;
            border-color: #5cb85c;
        }
        .btn-success:hover {
            background-color: #4cae4c;
            border-color: #398439;
        }
        .btn-secondary {
            color: #ffffff;
            background-color: #5bc0de;
            border-color: #5bc0de;
        }
        .btn-secondary:hover {
            background-color: #46b8da;
            border-color: #31b0d5;
        }
    </style>
@endsection
