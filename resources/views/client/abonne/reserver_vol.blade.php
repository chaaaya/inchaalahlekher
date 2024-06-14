@extends('layouts.abonne')

@section('content')
    <h1>Réserver un vol</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('abonne.process.reservation') }}" method="POST">
        @csrf

        <div>
            <label for="departure_location">Lieu de départ :</label>
            <select id="departure_location" name="departure_location" required>
                <option value="" disabled selected>Choisir un lieu de départ</option>
                @foreach($locations as $location)
                    <option value="{{ $location->ville_depart }}">{{ $location->ville_depart }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="arrival_location">Lieu d'arrivée :</label>
            <select id="arrival_location" name="arrival_location" required>
                <option value="" disabled selected>Choisir un lieu d'arrivée</option>
                @foreach($locations as $location)
                    <option value="{{ $location->ville_arrivee }}">{{ $location->ville_arrivee }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="departure_date">Date de départ :</label>
            <input type="date" id="departure_date" name="departure_date" required>
        </div>

        <button type="submit">Réserver</button>
    </form>

    <h2>Liste des réservations</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Lieu de départ</th>
                <th>Lieu d'arrivée</th>
                <th>Date de départ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->departure_location_id }}</td>
                    <td>{{ $reservation->arrival_location_id }}</td>
                    <td>{{ $reservation->departure_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
