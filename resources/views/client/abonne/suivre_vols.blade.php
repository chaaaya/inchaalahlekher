<!-- resources/views/client/nonabonne/suivre_vols.blade.php -->
@extends('layouts.abonne')

@section('content')
    <h1>Suivre les vols</h1>

    @if($vols->isEmpty())
        <p>Aucun vol disponible pour le moment.</p>
    @else
        <div class="vols">
            @foreach($vols as $vol)
                <div class="vol">
                    <h2>Vol n° {{ $vol->id }}</h2>
                    <p><strong>Départ :</strong> {{ $vol->ville_depart }}</p>
                    <p><strong>Arrivée :</strong> {{ $vol->ville_arrivee }}</p>
                    <p><strong>Date de départ :</strong> {{ $vol->date_depart }}</p>
                    <p><strong>Statut :</strong> {{ $vol->statut }}</p>
                </div>
            @endforeach
        </div>
    @endif
@endsection
