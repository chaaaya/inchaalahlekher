@extends('layouts.admin')

@section('title', 'Création d\'un Vol')

@section('content')
    <h1>Création d'un Vol</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.vols.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="numero_vol">Numéro de Vol :</label>
            <input type="text" id="numero_vol" name="numero_vol" class="form-control" value="{{ old('numero_vol') }}" required>
        </div>

        <div class="form-group">
            <label for="ville_depart">Ville de Départ :</label>
            <input type="text" id="ville_depart" name="ville_depart" class="form-control" value="{{ old('ville_depart') }}" required>
        </div>

        <div class="form-group">
            <label for="ville_arrivee">Ville d'Arrivée :</label>
            <input type="text" id="ville_arrivee" name="ville_arrivee" class="form-control" value="{{ old('ville_arrivee') }}" required>
        </div>

        <div class="form-group">
            <label for="heure_depart">Heure de Départ :</label>
            <input type="datetime-local" id="heure_depart" name="heure_depart" class="form-control" value="{{ old('heure_depart') }}" required>
        </div>

        <div class="form-group">
            <label for="heure_arrivee">Heure d'Arrivée :</label>
            <input type="datetime-local" id="heure_arrivee" name="heure_arrivee" class="form-control" value="{{ old('heure_arrivee') }}" required>
        </div>

        <div class="form-group">
            <label for="compagnie">Compagnie :</label>
            <input type="text" id="compagnie" name="compagnie" class="form-control" value="{{ old('compagnie') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer le Vol</button>
    </form>
@endsection
