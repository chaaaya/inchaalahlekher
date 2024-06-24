@extends('layouts.abonne')

@section('content-abonne')
<style>
    .container {
        margin-top: 20px;
    }
    h1 {
        margin-bottom: 20px;
        font-size: 2em;
        text-align: center;
        color: #333;
    }
    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        background-color: #fff;
        border-collapse: collapse;
        border: 1px solid #dee2e6;
    }
    .table th, .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
        text-align: center;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background-color: #f8f9fa;
        color: #495057;
    }
    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }
    .table-hover tbody tr:hover {
        color: #212529;
        background-color: rgba(0, 0, 0, 0.075);
    }
    .btn {
        margin-right: 5px;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
</style>

<div class="container">
   

    @if($reservations->isEmpty())
        <p>Vous n'avez aucune réservation pour le moment.</p>
    @else
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Sexe</th>
                    <th>Nationalité</th>
                    <th>Date de Départ</th>
                    <th>Date de Retour</th>
                    <th>Ville de Départ</th>
                    <th>Ville d'Arrivée</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->nom }}</td>
                        <td>{{ $reservation->prenom }}</td>
                        <td>{{ $reservation->date_naissance }}</td>
                        <td>{{ $reservation->sexe }}</td>
                        <td>{{ $reservation->nationalite }}</td>
                        <td>{{ $reservation->date_depart }}</td>
                        <td>{{ $reservation->date_retour }}</td>
                        <td>{{ $reservation->ville_depart }}</td>
                        <td>{{ $reservation->ville_arrivee }}</td>
                        <td>{{ ucfirst($reservation->status) }}</td>
                        <td>
                            <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection