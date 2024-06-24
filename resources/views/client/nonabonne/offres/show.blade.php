@extends('layouts.nonabonne') <!-- Assurez-vous d'avoir un layout de base défini pour votre application -->

@section('content-nonabonne')
    <div class="container">
        <h1>Détails de l'offre {{ $offer->title }}</h1>
        <div class="card mb-3">
            <img class="card-img-top" src="{{ asset('images/' . $offer->image) }}" alt="{{ $offer->title }}">
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

        <h2>Vols associés à cette offre :</h2>
        @if($reservations->isNotEmpty())
            <ul>
                @foreach($reservations as $reservation)
                    <li>
                        Vol numéro {{ $reservation->vol->numero_vol }}
                        <br>
                        Ville de départ : {{ $reservation->vol->ville_depart }}
                        <br>
                        Ville d'arrivée : {{ $reservation->vol->ville_arrivee }}
                        <br>
                        Heure de départ : {{ $reservation->vol->heure_depart }}
                        <br>
                        Heure d'arrivée : {{ $reservation->vol->heure_arrivee }}
                    </li>
                    <hr>
                @endforeach
            </ul>
        @else
            <p>Aucun vol réservé pour cette offre.</p>
        @endif

        <div id="calculatePrice">
            <!-- Formulaire ou déclencheur pour calculer le nouveau prix -->
            <!-- Par exemple, un formulaire avec un bouton ou une action AJAX -->
        </div>
    </div>
@endsection
