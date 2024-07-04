@extends('layouts.admin')

@section('title', 'Gestion des Offres')

@section('content')
    <h1>Gestion des Offres</h1>
    <a href="{{ route('admin.offers.create') }}" class="btn btn-primary">Créer une nouvelle offre</a>
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            Liste des offres
        </div>
        <div class="card-body">
            @if ($offers->isEmpty())
                <p>Aucune offre disponible pour le moment.</p>
            @else
                <table class="table" style="text-align: center; width:100%;">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Réduction</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($offers as $offer)
                            <tr>
                                <td>{{ $offer->title }}</td>
                                <td>{{ $offer->description }}</td>
                                <td>{{ $offer->percentage_discount }} %</td>
                                {{-- <td>
                                    @if ($offer->vols)
                                        @foreach ($offer->vols as $vol)
                                            <span>{{ $vol->numero_vol }} - {{ $vol->ville_depart }} à {{ $vol->ville_arrivee }}</span><br>
                                        @endforeach
                                    @else
                                        <span>Aucun vol associé</span>
                                    @endif
                                </td> --}}
                                <td>
                                    <a href="{{ route('admin.offers.edit', $offer->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                                    <form action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection