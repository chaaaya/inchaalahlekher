<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.admin')

@section('title', 'Créer une Offre')

@section('content')
    <h1>Créer une Offre</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="button-group">
            <button type="submit" class="btn btn-primary btn-small">Créer Offre</button>
            <a href="{{ route('admin.offers.index') }}" class="btn btn-secondary btn-small">Annuler</a>
        </div>

       </form>
@endsection