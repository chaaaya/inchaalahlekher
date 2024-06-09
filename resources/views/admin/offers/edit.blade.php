@extends('layouts.admin')

@section('title', 'Modifier une offre')

@section('content')
    <h1>Modifier une offre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.offers.update', $offer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $offer->title) }}">
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $offer->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price', $offer->price) }}">
        </div>

        <button type="submit" class="btn btn-primary">Modifier l'offre</button>
    </form>
@endsection
