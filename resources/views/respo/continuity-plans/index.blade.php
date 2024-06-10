@extends('layouts.respo')

@section('title', 'Liste des Plans de Continuité')

@section('content-respo')
    <div class="container">
        <h1>Liste des Plans de Continuité</h1>

        <a href="{{ route('respo.continuity-plans.create') }}" class="btn btn-primary mb-3">Ajouter un Plan</a>

        @if ($plans->isEmpty())
            <div class="alert alert-info">
                Aucun plan de continuité trouvé.
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped">
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
                        @foreach ($plans as $plan)
                            <tr>
                                <td>{{ $plan->id }}</td>
                                <td>{{ $plan->title }}</td>
                                <td>{{ $plan->description }}</td>
                                <td>{{ $plan->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('respo.continuity-plans.show', $plan->id) }}" class="btn btn-info">Voir</a>
                                        <a href="{{ route('respo.continuity-plans.edit', $plan->id) }}" class="btn btn-primary">Modifier</a>
                                        
                                        <form action="{{ route('respo.continuity-plans.destroy', $plan->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce plan de continuité ?')">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
