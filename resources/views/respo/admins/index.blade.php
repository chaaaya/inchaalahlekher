@extends('layouts.respo')

@section('title', 'Liste des Administrateurs')

@section('content-respo')
    <div class="container">
        <h1 class="page-title">Liste des Administrateurs</h1>
        <a href="{{ route('respo.admins.create') }}" class="btn btn-primary mb-3">Ajouter un administrateur</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('respo.admins.show', $admin->id) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('respo.admins.edit', $admin->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('respo.admins.destroy', $admin->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
