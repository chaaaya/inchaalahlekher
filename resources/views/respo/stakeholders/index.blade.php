<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Liste des Stakeholders')

@section('content-respo')

       <h1>Liste des planes de continuité</h1>

        <a href="{{ route('respo.stakeholders.create') }}" class="btn btn-primary">Ajouter une partie prenante</a>

        <div class="card mt-4">
            <div class="card-header">
                Liste des rapports
            </div>
            <div class="card-body">

            @if ($stakeholders->isEmpty())
                <div class="alert alert-info">
                    Aucun stakeholder trouvé.
                </div>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Rôle</th>
                            <th>Email</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stakeholders as $stakeholder)
                            <tr>
                                <td>{{ $stakeholder->id }}</td>
                                <td>{{ $stakeholder->name }}</td>
                                <td>{{ $stakeholder->role }}</td>
                                <td>{{ $stakeholder->email }}</td>
                                <td>{{ $stakeholder->created_at->format('d-m-Y') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('respo.stakeholders.show', $stakeholder->id) }}" class="btn btn-info">Voir</a>
                                        <a href="{{ route('respo.stakeholders.edit', $stakeholder->id) }}" class="btn btn-primary">Modifier</a>

                                        <form action="{{ route('respo.stakeholders.destroy', $stakeholder->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette partie de continuité?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('respo.communicate.index') }}" class="btn btn-secondary">Retour</a>

            </div>
        @endif
    </div>
@endsection