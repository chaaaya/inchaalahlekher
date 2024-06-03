<!-- resources/views/abonne/suivre_vols.blade.php -->

@extends('layouts.non_abonne')

@section('content')
    <h1>Suivre les vols</h1>

    @foreach ($volsASuivre as $vol)
        <div>
            <!-- Affichez les détails du vol à suivre selon votre besoin -->
            <p>{{ $vol->numero_vol }} - {{ $vol->destination }}</p>
        </div>
    @endforeach
@endsection
