@extends('layouts.admin')

@section('title', 'Modifier une Réservation')

@section('content-admin')
    <h1>Modifier une Réservation</h1>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.reservation.update-reservation', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom_passager">Nom du Passager :</label>
            <input type="text" id="nom_passager" name="nom_passager" class="form-control" value="{{ old('nom_passager', $reservation->nom_passager) }}">
        </div>

        <div class="form-group">
            <label for="email_passager">Email du Passager :</label>
            <input type="email" id="email_passager" name="email_passager" class="form-control" value="{{ old('email_passager', $reservation->email_passager) }}">
        </div>

        <div class="form-group">
            <label for="numero_billet">Numéro du Billet :</label>
            <input type="text" id="numero_billet" name="numero_billet" class="form-control" value="{{ old('numero_billet', $reservation->numero_billet) }}">
        </div>

        <div class="form-group">
            <label for="date_reservation">Date de Réservation :</label>
            <input type="date" id="date_reservation" name="date_reservation" class="form-control" value="{{ old('date_reservation', $reservation->date_reservation) }}">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour la Réservation</button>
        <a href="{{ route('admin.reservation.manage-reservations') }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection
