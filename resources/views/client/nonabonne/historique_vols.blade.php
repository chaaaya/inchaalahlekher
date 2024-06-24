@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Historique des vols</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($reservations->isEmpty())
        <p>Aucune réservation de vol trouvée.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Lieu de départ</th>
                    <th>Lieu d'arrivée</th>
                    <th>Date de départ</th>
                    <th>Nom du passager</th>
                    <th>Email du passager</th>
                    <th>Numéro de billet</th>
                    <th>Date de réservation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->departure_location }}</td>
                        <td>{{ $reservation->arrival_location }}</td>
                        <td>{{ $reservation->departure_date }}</td>
                        <td>{{ $reservation->nom_passager }}</td>
                        <td>{{ $reservation->email_passager }}</td>
                        <td>{{ $reservation->numero_billet }}</td>
                        <td>{{ $reservation->date_reservation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
