@extends('layouts.admin')

@section('title', 'Modifier le Rapport')

@section('content')
    <h1>Modifier le Rapport</h1>

    <form action="{{ route('admin.rapports.update', $rapport->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $rapport->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $rapport->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
