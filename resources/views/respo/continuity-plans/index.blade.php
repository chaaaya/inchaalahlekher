<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Liste des Plans de Continuité')

@section('content-respo')

        <h1>Liste des Plans de Continuité</h1>

        <a href="{{ route('respo.continuity-plans.create') }}" class="btn btn-primary mb-3">Ajouter un Plan</a>

        <div class="card mt-4">
            <div class="card-header">
                Liste des rapports
            </div>
            <div class="card-body">
                @if ($plans->isEmpty())
                    <p>Aucune plan de continuité trouvé.</p>
               @else
                 <table class="table" style="text-align: center;">
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