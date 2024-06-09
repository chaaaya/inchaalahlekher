<!-- resources/views/admin/locations/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Liste des Locations de Voitures')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Liste des Locations de Voitures</h2>

    @if ($locations->isEmpty())
        <p>Aucune location de voiture disponible pour le moment.</p>
    @else
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.locations.create') }}" class="btn btn-primary">Ajouter une nouvelle location de voiture</a>
            </div>
        </div>

        <div class="table-responsive mt-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Adresse</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $location->nom }}</td>
                            <td>{{ $location->description }}</td>
                            <td>{{ $location->adresse }}</td>
                            <td>
                                <a href="{{ route('admin.locations.edit', ['location' => $location->id]) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('admin.locations.destroy', ['location' => $location->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
