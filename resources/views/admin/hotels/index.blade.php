<!-- resources/views/admin/hotels/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Liste des Hôtels')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Liste des Hôtels</h2>

    @if ($hotels->isEmpty())
        <p>Aucun hôtel disponible pour le moment.</p>
    @else
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary">Ajouter un nouvel hôtel</a>
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
                    @foreach ($hotels as $hotel)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $hotel->nom }}</td>
                            <td>{{ $hotel->description }}</td>
                            <td>{{ $hotel->adresse }}</td>
                            <td>
                                <a href="{{ route('admin.hotels.edit', ['hotel' => $hotel->id]) }}" class="btn btn-sm btn-warning">Modifier</a>
                                <form action="{{ route('admin.hotels.destroy', ['hotel' => $hotel->id]) }}" method="POST" style="display: inline;">
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
