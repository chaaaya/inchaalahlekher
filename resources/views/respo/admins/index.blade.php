@extends('layouts.respo')

@section('title', 'Liste des Administrateurs')

@section('styles')
    <style>
        /* Styles spécifiques pour la page Liste des Administrateurs */
        .admin-list-container {
            width: 80%; /* Ajustez la largeur selon vos besoins */
            margin: auto;
            padding: 20px;
        }

        .admin-list-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .admin-list-table {
            width: 100%;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            overflow-x: auto; /* Permet le défilement horizontal si nécessaire */
        }

        .admin-list-table th,
        .admin-list-table td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: center; /* Centre le texte dans les cellules */
        }

        .admin-list-table thead {
            background-color: #f8f9fa; /* Couleur de fond de l'en-tête */
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
                        <th scope="col">Numéro de téléphone</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($admins as $admin)
                    <tr>
                        <td>{{ $admin->id }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->numero_telephone }}</td> <!-- Affichage du numéro de téléphone -->
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
                        <td colspan="5" class="text-center">Aucun administrateur trouvé.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
