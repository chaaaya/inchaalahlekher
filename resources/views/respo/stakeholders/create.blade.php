<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('content-respo')
        <h1>Ajouter une partie de continuité</h1>

        <form action="{{ route('respo.stakeholders.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="role">Rôle:</label>
                <input type="text" id="role" name="role" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{ route('respo.stakeholders.store') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
@endsection