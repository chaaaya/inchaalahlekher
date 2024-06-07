@extends('layouts.respo')

@section('title', 'Liste des Administrateurs')

@section('styles')
    <style>
        /* Styles spécifiques pour la page Liste des Administrateurs */
        .admin-list-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .admin-list-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .admin-list-table {
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
        }

        .admin-list-table th,
        .admin-list-table td {
            border-top: 1px solid #dee2e6;
            padding: 12px;
            vertical-align: middle;
        }

        .admin-list-table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .admin-list-table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .admin-list-actions {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .admin-list-actions .btn {
            margin-right: 5px;
        }
    </style>
@endsection

@section('content-respo')
    <div class="admin-list-container">
        <h1 class="admin-list-title">Liste des Administrateurs</h1>
        
        <a href="{{ route('respo.admins.create') }}" class="btn btn-primary mb-3">Ajouter un administrateur</a>
        
        <div class="table-responsive">
            <table class="admin-list-table table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="admin-list-actions">
                            <a href="{{ route('respo.admins.show', $admin->id) }}" class="btn btn-info">Voir</a>
                            <a href="{{ route('respo.admins.edit', $admin->id) }}" class="btn btn-primary">Modifier</a>
                            <form action="{{ route('respo.admins.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">Aucun administrateur trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
