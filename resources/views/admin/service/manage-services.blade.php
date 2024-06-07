<!-- resources/views/admin/service/manage-services.blade.php -->
@extends('layouts.admin')

@section('title', 'Gestion des Services')

@section('styles')
    <style>
        /* Styles spécifiques à cette page si nécessaires */
        .services {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
@endsection

@section('content-admin')
    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <div class="services">
        <h2>Liste des services</h2>
        <a href="{{ route('admin.service.create-service') }}" class="btn btn-primary">Créer un nouveau service</a>
        
        @if ($services->isEmpty())
            <p>Aucun service disponible pour le moment.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>Nom du service</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->nom }}</td>
                            <td>{{ $service->description }}</td>
                            <td>{{ $service->prix }}</td>
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
@endsection
