@extends('layouts.respo')

@section('title', 'Liste des Stakeholders')

@section('content-respo')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Liste des Stakeholders</h1>
            <a href="{{ route('respo.stakeholders.create') }}" class="btn btn-primary">Ajouter un Stakeholder</a>
        </div>

        @if ($stakeholders->isEmpty())
            <div class="alert alert-info">
                Aucun stakeholder trouvé.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
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
                                    <a href="{{ route('respo.stakeholders.show', $stakeholder->id) }}" class="btn btn-info">Voir</a>
                                    <a href="{{ route('respo.stakeholders.edit', $stakeholder->id) }}" class="btn btn-primary">Modifier</a>

                                    <form action="{{ route('respo.stakeholders.destroy', $stakeholder->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
