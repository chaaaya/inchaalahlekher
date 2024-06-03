@extends('layouts.admin')

@section('title', 'Création de Service')

@section('content-admin')
    <h1>Création de Service</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.service.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}">
        </div>

        <button type="submit" class="btn btn-primary">Créer le service</button>
    </form>
@endsection
