@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Profil de {{ $client->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-details">
        <div class="profile-photo">
            @if($client->profile_photo)
                <img src="{{ asset('storage/' . $client->profile_photo) }}" alt="Photo de profil">
            @else
                <p>Aucune photo de profil</p>
            @endif
        </div>
        <div class="profile-info">
            <p><strong>Nom:</strong> {{ $client->name }}</p>
            <p><strong>Date de naissance:</strong> {{ $client->date_naissance }}</p>
            <p><strong>Sexe:</strong> {{ $client->sexe }}</p>
            <p><strong>Nationalité:</strong> {{ $client->nationalite }}</p>
            <p><strong>Email:</strong> {{ $client->email }}</p>
            <p><strong>Numéro de téléphone:</strong> {{ $client->numero_telephone }}</p>
            <p><strong>Adresse:</strong> {{ $client->adresse }}</p>
            <!-- Ajoutez d'autres informations du profil ici -->
        </div>
    </div>

    <hr>

    <h2>Modifier le profil</h2>

    <form action="{{ route('nonabonne.updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="profile_photo">Photo de profil</label>
            <input type="file" class="form-control" id="profile_photo" name="profile_photo">
        </div>
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $client->name) }}">
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $client->date_naissance) }}">
        </div>
        <div class="form-group">
            <label for="sexe">Sexe</label>
            <select class="form-control" id="sexe" name="sexe">
                <option value="homme" {{ $client->sexe === 'homme' ? 'selected' : '' }}>Homme</option>
                <option value="femme" {{ $client->sexe === 'femme' ? 'selected' : '' }}>Femme</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nationalite">Nationalité</label>
            <input type="text" class="form-control" id="nationalite" name="nationalite" value="{{ old('nationalite', $client->nationalite) }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $client->email) }}">
        </div>
        <div class="form-group">
            <label for="numero_telephone">Numéro de téléphone</label>
            <input type="text" class="form-control" id="numero_telephone" name="numero_telephone" value="{{ old('numero_telephone', $client->numero_telephone) }}">
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ old('adresse', $client->adresse) }}">
        </div>
        <!-- Ajoutez d'autres champs ici selon votre structure de base de données -->

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
