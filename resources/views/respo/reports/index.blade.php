<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Analyser les Rapports')

@section('content-respo')
    <h1>Analyser les Rapports</h1>

    <div class="card mt-4">
       <div class="card-header">
           Liste des rapports
       </div>
       <div class="card-body">
           @if ($rapports->isEmpty())
               <p>Aucune offre disponible pour le moment.</p>
          @else
            <table class="table">
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
                    @foreach ($rapports as $rapport)
                        <tr>
                            <td>{{ $rapport->id }}</td>
                            <td>{{ $rapport->titre }}</td>
                            <td>{{ $rapport->description }}</td>
                            <td>{{ $rapport->created_at->format('d-m-Y') }}</td>
                            <td class="rapports-actions">
                                <a href="{{ route('respo.reports.show', $rapport->id) }}" class="btn btn-info btn-sm">Voir</a>
                                <a href="{{ route('respo.reports.edit', $rapport->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('respo.reports.destroy', $rapport->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
  </div>
@endsection