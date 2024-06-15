<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.admin')

@section('title', 'Créer une Réservation')

@section('content')
    <h1>Créer une Réservation</h1>

    @if (session('success'))
    <div class="alert alert-success" style="background-color: lightgreen; color: black;">
        {{ session('success') }}
    </div>
@endif


    <form action="{{ route('admin.reservation.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nom_passager">Nom du Passager :</label>
            <input type="text" id="nom_passager" name="nom_passager" class="form-control" value="{{ old('nom_passager') }}">
        </div>

        <div class="form-group">
            <label for="email_passager">Email du Passager :</label>
            <input type="email" id="email_passager" name="email_passager" class="form-control" value="{{ old('email_passager') }}">
        </div>

        <div class="form-group">
            <label for="numero_billet">Numéro du Billet :</label>
            <input type="text" id="numero_billet" name="numero_billet" class="form-control" value="{{ old('numero_billet') }}">
        </div>

        <div class="form-group">
            <label for="date_reservation">Date de Réservation :</label>
            <input type="date" id="date_reservation" name="date_reservation" class="form-control" value="{{ old('date_reservation') }}">
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Créer la Réservation</button>
            <a href="{{ route('admin.reservation.manage-reservations') }}" class="btn btn-secondary">Annuler</a>
        </div>

       </form>
@endsection