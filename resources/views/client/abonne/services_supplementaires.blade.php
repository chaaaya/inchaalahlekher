@extends('layouts.abonne')

@section('content')
    <h1>Services Supplémentaires</h1>

    <h2>Hôtels</h2>
    @if ($hotels->isEmpty())
        <p>Aucun hôtel disponible pour le moment.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->nom }}</td>
                        <td>{{ $hotel->adresse }}</td>
                        <td>
                            <form action="{{ route('abonne.process.reservation') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="hotel">
                                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                                <button type="submit">Réserver</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <h2>Locations</h2>
    @if ($locations->isEmpty())
        <p>Aucune location disponible pour le moment.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->nom }}</td>
                        <td>{{ $location->adresse }}</td>
                        <td>
                            <form action="{{ route('abonne.process.reservation') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type" value="location">
                                <input type="hidden" name="location_id" value="{{ $location->id }}">
                                <button type="submit">Réserver</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
