@extends('layouts.respo')

@section('title', 'Modifier Utilisateur')

@section('content-respo')
    <h1>Modifier Utilisateur</h1>
    
    <form action="{{ route('respo.admins.update', $admin->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $admin->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $admin->email }}" required>
        </div>
        <div class="form-group">
            <label for="numero_telephone">Numéro de téléphone</label>
            <input type="text" id="numero_telephone" name="numero_telephone" class="form-control" value="{{ $admin->numero_telephone }}" required>
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('respo.admins.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
@endsection
