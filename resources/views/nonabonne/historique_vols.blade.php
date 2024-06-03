<!-- resources/views/abonne/historique_vols.blade.php -->

@extends('layouts.non_abonne')

@section('content')
    <h1>Historique des vols</h1>
    @if($reservations->isEmpty())
        <p>Aucune réservation trouvée.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Numéro de billet</th>
                    <th>Nom du passager</th>
                    <th>Email du passager</th>
                    <th>Numéro de vol</th>
                    <th>Heure de départ</th>
                    <th>Heure d'arrivée</th>
                    <th>Date de réservation</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->numero_billet }}</td>
                        <td>{{ $reservation->nom_passager }}</td>
                        <td>{{ $reservation->email_passager }}</td>
                        @if($reservation->vol)
                            <td>{{ $reservation->vol->numero_vol }}</td>
                            <td>{{ $reservation->vol->heure_depart }}</td>
                            <td>{{ $reservation->vol->heure_arrivee }}</td>
                        @else
                            <td colspan="3">Informations de vol non disponibles</td>
                        @endif
                        <td>{{ $reservation->date_reservation }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
