<!-- resources/views/client/nonabonne/consulter_offres.blade.php -->
@extends('layouts.non_abonne')

@section('content')
    <h1>Nos Offres</h1>

    @if($offers->isEmpty())
        <p>Aucune offre disponible pour le moment.</p>
    @else
        <div class="offers">
            @foreach($offers as $offer)
                <div class="offer">
                    <h2>{{ $offer->title }}</h2>
                    <p>{{ $offer->description }}</p>
                    <p><strong>Prix :</strong> {{ $offer->price }} €</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection
