@extends('layouts.admin')

@section('title', 'Gestion des Réservations')

@section('content-admin')
    <h1>Gestion des Réservations</h1>
    <a href="{{ route('admin.reservation.create-reservation') }}" class="btn btn-primary">Créer une nouvelle réservation</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
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
                            <th>Nom du Passager</th>
                            <th>Email du Passager</th>
                            <th>Numéro du Billet</th>
                            <th>Date de Réservation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>{{ $reservation->nom_passager }}</td>
                                <td>{{ $reservation->email_passager }}</td>
                                <td>{{ $reservation->numero_billet }}</td>
                                <td>{{ $reservation->date_reservation }}</td>
                                <td>
                                    <a href="{{ route('admin.reservation.edit-reservation', $reservation->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('admin.reservation.destroy-reservation', $reservation->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
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
