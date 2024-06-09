<!-- resources/views/admin/rapports/create.blade.php -->

@extends('layouts.admin')

@section('title', 'Créer un Rapport')

@section('content')
    <h2>Créer un Nouveau Rapport</h2>

    <form action="{{ route('admin.rapports.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
