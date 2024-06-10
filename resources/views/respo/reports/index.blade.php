@extends('layouts.respo')

@section('title', 'Analyser les Rapports')

@section('styles')
    <style>
        .rapports-container {
            margin-top: 20px;
        }

        .rapports-table {
            width: 100%;
            border-collapse: collapse;
        }

        .rapports-table th, .rapports-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .rapports-table th {
            background-color: #f2f2f2;
        }

        .rapports-actions a,
        .rapports-actions form {
            display: inline-block;
            margin-right: 5px;
        }

        .rapports-actions form {
            margin: 0;
        }
    </style>
@endsection

@section('content-respo')
    <div class="container rapports-container">
        <h1>Analyser les Rapports</h1>

        <table class="rapports-table table table-striped table-hover">
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
                @forelse ($rapports as $rapport)
                    <tr>
                        <td>{{ $rapport->id }}</td>
                        <td>{{ $rapport->titre }}</td>
                        <td>{{ $rapport->description }}</td>
                        <td>{{ $rapport->created_at->format('d-m-Y') }}</td>
                        <td class="rapports-actions">
                            <a href="{{ route('respo.reports.show', $rapport->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('respo.reports.edit', $rapport->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                            <form action="{{ route('respo.reports.destroy', $rapport->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Aucun rapport trouvé.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
