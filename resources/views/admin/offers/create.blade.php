<link rel="stylesheet" href="{{ asset('css/content.css') }}">
@extends('layouts.admin')

@section('title', 'Créer une nouvelle offre')

@section('content')
    <h1>Créer une nouvelle offre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.offers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="percentage_discount">Réduction</label>
            <input type="number" name="percentage_discount" id="percentage_discount" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        {{-- <div class="form-group">
            <label for="vols">Vols associés</label>
            <select name="vols[]" id="vols" class="form-control" multiple>
                @foreach ($vols as $vol)
                    <option value="{{ $vol->id }}">{{ $vol->numero_vol }} - {{ $vol->ville_depart }} à {{ $vol->ville_arrivee }}</option>
                @endforeach
            </select>
        </div> --}}
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection