<!-- resources/views/admin/services/index.blade.php -->

@extends('layouts.admin')

@section('title', 'Gestion des Services')

@section('content')
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <style>
        /* Styles CSS pour la mise en page */
        .services-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .services-column {
            width: calc(50% - 10px);
            box-sizing: border-box;
            background-color: rgb(224, 231, 235);
            border-radius: 8px;
        }
        h3{
            text-align: center;
            background-color: #7aaacf;
            padding: 20px;
            border-radius: 6px;
            margin: 0;
        }
    </style>

    <div class="services">
        <h2>Gestion des Services</h2>

        <div class="services-container">
            <div class="services-column">
                <div class="service-card">
                    <h3>Services d'Hôtels</h3>
                    <p><a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Ajouter un nouvel hôtel</a>
                    </p>

                    @if ($hotels->isEmpty())
                        <p>Aucun hôtel disponible pour le moment.</p>
                    @else
                        @foreach ($hotels as $hotel)
                            <div class="service-card">
                                <h4>{{ $hotel->nom }}</h4>
                                <p>{{ $hotel->description }}</p>
                                <p>Adresse : {{ $hotel->adresse }}</p>

                                <div class="service-actions">
                                    <a href="{{ route('admin.hotels.edit', ['hotel' => $hotel->id]) }}" class="btn btn-sm btn-warning">Modifier</a>

                                    <form action="{{ route('admin.hotels.destroy', ['hotel' => $hotel->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="services-column">
                <div class="service-card">
                    <h3>Services de Location de Voitures</h3>
                    <p><a href="{{ route('admin.locations.create') }}" class="btn btn-primary">Ajouter une nouvelle location de voiture</a></p>

                    @if ($locations->isEmpty())
                        <p>Aucune location de voiture disponible pour le moment.</p>
                    @else
                        @foreach ($locations as $location)
                            <div class="service-card">
                                <h4>{{ $location->nom }}</h4>
                                <p>{{ $location->description }}</p>
                                <p>Adresse : {{ $location->adresse }}</p>

                                <div class="service-actions">
                                    <a href="{{ route('admin.locations.edit', ['location' => $location->id]) }}" class="btn btn-sm btn-warning">Modifier</a>

                                    <form action="{{ route('admin.locations.destroy', ['location' => $location->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection