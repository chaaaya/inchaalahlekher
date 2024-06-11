@extends('layouts.admin')

@section('title', 'Modification de Client')

@section('content')
    <h1>Modification de Client</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', ['user' => $client->id]) }}" method="POST">
        {{ $client->id }} <!-- Affiche l'ID du client pour débogage -->
        @csrf
        @method('PUT')<!-- Utilisation de la méthode PUT pour la mise à jour -->

        <div class="form-group">
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $client->name) }}">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $client->email) }}">
        </div>

        <div class="form-group">
            <label for="numero_telephone">Numéro de téléphone :</label>
            <input type="text" id="numero_telephone" name="numero_telephone" class="form-control" value="{{ old('numero_telephone', $client->numero_telephone) }}">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmation du mot de passe :</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
