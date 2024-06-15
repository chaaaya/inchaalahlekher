<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('title', 'Modifier le Rapport')

@section('content-respo')

   <h1>Modifier le Rapport</h1>
        <form action="{{ route('respo.reports.update', $rapport->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{ $rapport->titre }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required>{{ $rapport->description }}</textarea>
            </div>
            <div class="button-group">
               <button type="submit" class="btn btn-primary">Mettre à jour</button>
               <a href="{{ route('respo.reports.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
        </form>
@endsection