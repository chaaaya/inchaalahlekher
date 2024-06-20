<!-- resources/views/client/nonabonne/historique_vols.blade.php -->
@extends('layouts.abonne')

@section('content')
    <h1>Historique des vols</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($vols->isEmpty())
        <p>Aucun vol trouvé.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Lieu de départ</th>
                    <th>Lieu d'arrivée</th>
                    <th>Date de départ</th>
                    <th>Date d'arrivée</th>
                    <th>Numéro de vol</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vols as $vol)
                    <tr>
                        <td>{{ $vol->ville_depart }}</td>
                        <td>{{ $vol->ville_arrivee }}</td>
                        <td>{{ $vol->date_depart }}</td>
                        <td>{{ $vol->date_arrivee }}</td>
                        <td>{{ $vol->numero_vol }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
