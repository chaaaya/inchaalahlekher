<!-- resources/views/admin/hotels/create.blade.php -->
@extends('layouts.admin')

@section('title', 'Créer un nouvel hôtel')

@section('content')
    <div class="container">
        <h2>Créer un nouvel hôtel</h2>

        <form action="{{ route('admin.hotels.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom de l'hôtel</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" class="form-control">
            </div>
            <!-- Ajoutez d'autres champs du formulaire ici selon vos besoins -->

            <button type="submit" class="btn btn-primary">Créer Hôtel</button>
        </form>
    </div>
@endsection
