<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.admin')

@section('title', 'Créer un Rapport')

@section('content')
    <h2>Créer un Nouveau Rapport</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.rapports.store') }}" method="POST" class="rapport-form">
        @csrf

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="button-group">
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('admin.rapports.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
@endsection
