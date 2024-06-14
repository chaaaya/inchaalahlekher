@extends('layouts.abonne')

@section('content')
    <h1>Services Supplémentaires</h1>

    <div>
        <h2>Hôtels</h2>
        <ul>
            @foreach($hotels as $hotel)
                <li>{{ $hotel->nom }} - {{ $hotel->adresse }}</li>
            @endforeach
        </ul>
    </div>

    <div>
        <h2>Locations </h2>
        <ul>
            @foreach($locations as $location)
                <li>{{ $location->nom }} - {{ $location->adresse }}</li>
            @endforeach
        </ul>
    </div>
@endsection
