<link rel="stylesheet" href="{{ asset('css/content.css') }}">

@extends('layouts.respo')

@section('content-respo')
        <h1>Modifier la partie prenante</h1>

        <form action="{{ route('respo.stakeholders.update', $stakeholder->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Champs du formulaire pour la modification -->
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $stakeholder->name }}">
            </div>

            <div class="form-group">
                <label for="role">Rôle</label>
                <input type="text" name="role" id="role" class="form-control" value="{{ $stakeholder->role }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $stakeholder->email }}">
            </div>
            <div class="button-group">
                 <button type="submit" class="btn btn-primary">Modifier</button>
                 <a href="{{ route('respo.stakeholders.index') }}" class="btn btn-secondary">Annuler</a>

            </div>

        </form>
@endsection