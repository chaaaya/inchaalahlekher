@extends('layouts.respo')

@section('title', 'Modifier un Plan de Continuité')

@section('content-respo')
        <h1>Modifier le Plan de Continuité</h1>

        <form action="{{ route('respo.continuity-plans.update', $plan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" class="form-control" value="{{ $plan->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control">{{ $plan->description }}</textarea>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <a href="{{ route('respo.continuity-plans.index') }}" class="btn btn-secondary">Annuler</a> <!-- Correction ici -->
            </div>

        </form>
@endsection
