@extends('layouts.admin')

@section('title', 'Supprimer une Réservation')

@section('content-admin')
    <div class="card">
        <div class="card-header">
            Confirmation de Suppression
        </div>
        <div class="card-body">
            <p>Êtes-vous sûr de vouloir supprimer cette réservation ?</p>
            <p>ID : {{ $reservation->id }}</p>
            <p>Utilisateur : {{ $reservation->user->name ?? 'Utilisateur non trouvé' }}</p>
            <p>Date de départ : {{ $reservation->departure_date }}</p>
            <p>Date de retour : {{ $reservation->return_date }}</p>
            
            <form action="{{ route('admin.reservation.destroy', $reservation->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirmer la Suppression</button>
                <a href="{{ route('admin.reservation.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
@endsection
