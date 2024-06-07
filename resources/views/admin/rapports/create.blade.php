<!-- resources/views/admin/create-rapport.blade.php -->

@extends('layouts.admin')

@section('title', 'Créer un Rapport')

@section('content-admin')
    <h1>Créer un nouveau Rapport</h1>

    <form action="{{ route('rapports.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
@endsection
