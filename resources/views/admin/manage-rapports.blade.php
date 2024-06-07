<!-- resources/views/admin/manage-rapports.blade.php -->

@extends('layouts.admin')

@section('title', 'Gestion des Rapports')

@section('content-admin')
    <h1>Gestion des Rapports</h1>
    <a href="{{ route('admin.rapports.create') }}" class="btn btn-primary">Créer un nouveau rapport</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            Liste des rapports
        </div>
        <div class="card-body">
            @if ($rapports->isEmpty())
                <p>Aucun rapport disponible pour le moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rapports as $rapport)
                            <tr>
                                <td>{{ $rapport->id }}</td>
                                <td>{{ $rapport->title }}</td>
                                <td>{{ $rapport->description }}</td>
                                <td>{{ $rapport->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('admin.rapports.show', $rapport->id) }}" class="btn btn-sm btn-info">Voir</a>
                                    <a href="{{ route('admin.rapports.edit', $rapport->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('admin.rapports.destroy', $rapport->id) }}" method="POST" style="display: inline;">
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
