<!-- resources/views/admin/locations/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Modifier la location')

@section('content')
    <h2>Modifier la location : {{ $location->nom }}</h2>

    <form action="{{ route('admin.locations.update', ['location' => $location->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nom">Nom de la location</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $location->nom }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ $location->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $location->adresse }}">
        </div>
        <!-- Ajoutez d'autres champs du formulaire ici selon vos besoins -->

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
@endsection
