<!-- resources/views/abonne/reserver_vol.blade.php -->

@extends('layouts.abonne')

@section('content')
    <h1>Réserver un vol</h1>
    <!-- Formulaire de réservation de vol -->
    <form action="{{ route('process.reservation') }}" method="POST">
        @csrf
        <!-- Champs du formulaire -->
        <div>
            <label for="departure_location">Lieu de départ :</label>
            <select id="departure_location" name="departure_location" required>
                <option value="" disabled selected>Choisir un lieu de départ</option>
                <!-- Options dynamiques à ajouter ici -->
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="arrival_location">Lieu d'arrivée :</label>
            <select id="arrival_location" name="arrival_location" required>
                <option value="" disabled selected>Choisir un lieu d'arrivée</option>
                <!-- Options dynamiques à ajouter ici -->
                @foreach($locations as $location)
                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="departure_date">Date de départ :</label>
            <input type="date" id="departure_date" name="departure_date" required>
        </div>

        <button type="submit">Réserver</button>
    </form>
@endsection
