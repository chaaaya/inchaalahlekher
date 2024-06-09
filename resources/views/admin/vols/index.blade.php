@extends('layouts.admin')

@section('title', 'Gestion des Vols')

@section('content')
    <h1>Gestion des Vols</h1>
    <a href="{{ route('admin.vols.create') }}" class="btn btn-primary mb-3">Créer un nouveau vol</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            Liste des Vols
        </div>
        <div class="card-body">
            @if ($vols->isEmpty())
                <p>Aucun vol disponible pour le moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Numéro de Vol</th>
                            <th>Heure de Départ</th>
                            <th>Heure d'Arrivée</th>
                            <th>Créé le</th>
                            <th>Modifié le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vols as $vol)
                            <tr>
                                <td>{{ $vol->id }}</td>
                                <td>{{ $vol->numero_vol }}</td>
                                <td>{{ $vol->heure_depart }}</td>
                                <td>{{ $vol->heure_arrivee }}</td>
                                <td>{{ $vol->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>{{ $vol->updated_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('admin.vols.edit', $vol->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('admin.vols.destroy', $vol->id) }}" method="POST" style="display: inline;">
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
