@extends('layouts.admin')

@section('title', 'Gestion des Services')

@section('content-admin')
    <h1>Gestion des Services</h1>
    <a href="{{ route('admin.service.create-service') }}" class="btn btn-primary">Créer un nouveau service</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            Liste des services
        </div>
        <div class="card-body">
            @if ($services->isEmpty())
                <p>Aucun service disponible pour le moment.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->name }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->price }}</td>
                                <td>{{ $service->created_at->format('d/m/Y H:i:s') }}</td>
                                <td>
                                    <a href="{{ route('admin.service.edit-service', $service->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" style="display: inline;">
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
