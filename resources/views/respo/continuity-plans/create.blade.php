<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Créer un Plan de Continuité')

@section('content-respo')
        <h1>Créer un Plan de Continuité</h1>

        <form action="{{ route('respo.continuity-plans.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <div class="button-group">
               <button type="submit" class="btn btn-primary">Créer</button>
               <a href="{{ route('respo.continuity-plans.store') }}" class="btn btn-secondary">Annuler</a>

            </div>
        </form>
@endsection