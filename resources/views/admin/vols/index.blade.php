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
                            <th>Ville de Départ</th>
                            <th>Ville d'Arrivée</th>
                            <th>Heure de Départ</th>
                            <th>Heure d'Arrivée</th>
                            <th>Compagnie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vols as $vol)
                            <tr>
                                <td>{{ $vol->id }}</td>
                                <td>{{ $vol->numero_vol }}</td>
                                <td>{{ $vol->ville_depart }}</td>
                                <td>{{ $vol->ville_arrivee }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($vol->heure_depart)->format('d/m/Y H:i') }}</td>
                                <td>{{ \Illuminate\Support\Carbon::parse($vol->heure_arrivee)->format('d/m/Y H:i') }}</td>
                                <td>{{ $vol->compagnie }}</td>
                                <td>
                                    <a href="{{ route('admin.vols.edit', $vol->id) }}" class="btnI btn-p">
                                        <i class="fas fa-edit edit-icon"></i>
                                    </a>
                                    <form action="{{ route('admin.vols.destroy', $vol->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btnI btn-d" onclick="return confirm('Êtes-vous sûr ?')">
                                            <i class="fas fa-trash-alt delete-icon"></i>
                                        </button>
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
<style>
    .btnI i {
        margin-right: 5px; 
    }
    .btnI {
        margin-right: 5px;
    }
    .edit-icon {
        color: #007bff; 
    }

    .delete-icon {
        color: #dc3545;
    }

    .btnI i {
        margin-right: 5px; 
    }
    .btnI:hover .edit-icon {
        color: #0056b3;
    }

    .btnI:hover .delete-icon {
        color: #c82333; 
    }
</style>