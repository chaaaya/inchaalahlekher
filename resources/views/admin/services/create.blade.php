<!-- resources/views/admin/services/create.blade.php -->

@extends('layouts.admin')

@section('title', 'Ajouter un Service')

@section('content')
    <h2>Ajouter un Service</h2>

    <form action="{{ route('admin.services.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nom">Nom du Service</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection
