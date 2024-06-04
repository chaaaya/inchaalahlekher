<!-- resources/views/admin/users/manage-users.blade.php -->

@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs')

@section('content-admin')
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
                        <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                        <td>
                            <!-- Ajoutez ici les actions comme modifier et supprimer -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
