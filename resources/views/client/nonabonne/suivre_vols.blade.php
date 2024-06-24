<!-- resources/views/client/abonne/suivre_vols.blade.php -->

@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Suivre les vols</h1>

    @foreach ($volsASuivre as $vol)
        <div>
            <!-- Affichez les détails du vol à suivre selon votre besoin -->
            <p>{{ $vol->numero_vol }} - {{ $vol->ville_depart }} à {{ $vol->ville_arrivee }} - {{ $vol->heure_depart }} à {{ $vol->heure_arrivee }}</p>
        </div>
    @endforeach
@endsection
