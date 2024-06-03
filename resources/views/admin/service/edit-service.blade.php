@extends('layouts.admin')

@section('title', 'Modification de Service')

@section('content-admin')
    <h1>Modification de Service</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.service.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $service->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea id="description" name="description" class="form-control">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Prix :</label>
            <input type="text" id="price" name="price" class="form-control" value="{{ old('price', $service->price) }}">
        </div>

        <button type="submit" class="btn btn-primary">Modifier le service</button>
    </form>
@endsection
