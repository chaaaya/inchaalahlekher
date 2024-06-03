<!-- resources/views/respo/admins/edit.blade.php -->

@extends('layouts.app') <!-- Assurez-vous d'avoir votre layout principal -->

@section('content')
    <div class="container">
        <h1>Modifier l'administrateur {{ $admin->name }}</h1>
        <form action="{{ route('respo.admins.update', $admin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}" required>
            </div>
            <div class="form-group">
                <label for="numero_telephone">Numéro de téléphone</label>
                <input type="text" name="numero_telephone" id="numero_telephone" class="form-control" value="{{ $admin->numero_telephone }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour administrateur</button>
        </form>
    </div>
@endsection
