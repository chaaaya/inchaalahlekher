<!-- resources/views/client/nonabonne/offres/show.blade.php -->
@extends('layouts.nonabonne')

@section('title', 'Détails de l\'offre')

@section('content')
    <h1>Détails de l'offre : {{ $offer->title }}</h1>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $offer->title }}</h5>
            <p class="card-text">{{ $offer->description }}</p>
            @if($offer->percentage_discount)
                <p class="card-text reduction">Réduction : {{ $offer->percentage_discount }}%</p>
            @endif
            @if($offer->amount_discount)
                <p class="card-text reduction">Réduction : {{ $offer->amount_discount }}€</p>
            @endif
            <p class="card-text price">Prix : {{ $offer->price }}€</p>
        </div>
    </div>

    <h2>Réservations associées à cette offre :</h2>

    @if($reservations->isEmpty())
        <p>Aucune réservation trouvée pour cette offre.</p>
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Réservation</th>
                        <th>Date Départ</th>
                        <th>Date Retour</th>
                        <th>Ville Départ</th>
                        <th>Ville Arrivée</th>
                        <th>Prix Final</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->date_depart }}</td>
                            <td>{{ $reservation->date_retour }}</td>
                            <td>{{ $reservation->ville_depart }}</td>
                            <td>{{ $reservation->ville_arrivee }}</td>
                            <td>{{ $reservation->final_price }}€</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
