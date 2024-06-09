@extends('layouts.admin')

@section('title', 'Modifier une Location')

@section('content')
    <h2>Modifier une Location</h2>

    <form action="{{ route('admin.locations.update', ['location' => $location->id]) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom de la Location</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $location->nom }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $location->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $location->adresse }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
