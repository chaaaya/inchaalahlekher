<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Modifier Administrateur')

@section('styles')
@section('content-respo')
        <h1>Ajouter un administrateur</h1>
        
        <form action="{{ route('respo.admins.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="numero_telephone">Numéro de téléphone</label>
                <input type="text" name="numero_telephone" id="numero_telephone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Créer administrateur</button>
                <a href="{{ route('respo.admins.store') }}" class="btn btn-secondary">Annuler</a>
            </div>
    </div>
@endsection