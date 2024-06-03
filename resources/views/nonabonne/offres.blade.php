<!-- resources/views/abonne/offres.blade.php -->

@extends('layouts.abonne')

@section('content')
    <h1>Nos Offres</h1>
    @if($offres->isEmpty())
        <p>Aucune offre disponible pour le moment.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Titre de l'offre</th>
                    <th>Description</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
                @foreach($offres as $offre)
                    <tr>
                        <td>{{ $offre->title }}</td>
                        <td>{{ $offre->description }}</td>
                        <td>{{ $offre->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
