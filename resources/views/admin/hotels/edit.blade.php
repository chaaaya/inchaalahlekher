<!-- resources/views/admin/hotels/edit.blade.php -->
<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.admin')

@section('title', 'Modifier l\'hôtel')

@section('content')
    <h2>Modifier l'hôtel : {{ $hotel->nom }}</h2>

    <form action="{{ route('admin.hotels.update', ['hotel' => $hotel->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="nom">Nom de l'hôtel</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $hotel->nom }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" class="form-control" rows="3">{{ $hotel->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $hotel->adresse }}">
        </div>
        <!-- Ajoutez d'autres champs du formulaire ici selon vos besoins -->
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('admin.hotels.store') }}" class="btn btn-secondary">Annuler</a>
        </div>

    </form>
@endsection