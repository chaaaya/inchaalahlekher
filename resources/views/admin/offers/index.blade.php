@extends('layouts.admin')

@section('title', 'Gestion des Offres')

@section('content-admin')
    <h1>Gestion des Offres</h1>
    <a href="{{ route('admin.offers.create') }}" class="btn btn-primary">Créer une nouvelle offre</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            Liste des offres
        </div>
        <div class="card-body">
            @if ($offers->isEmpty())
                <p>Aucune offre disponible pour le moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->id }}</td>
                                <td>{{ $offer->title }}</td>
                                <td>{{ $offer->description }}</td>
                                <td>{{ $offer->price }}</td>
                                <td>{{ $offer->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('admin.offers.edit', $offer->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
