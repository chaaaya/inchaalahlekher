@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs')

@section('content')
    <h1>Gestion des Utilisateurs</h1>

    @if ($users->isEmpty())
        <p>Aucun utilisateur disponible pour le moment.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Éditer</a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="mt-4">
        <a href="{{ route('admin.users.create') }}" class="btn btn-success">Ajouter un Utilisateur</a>
    </div>
@endsection
