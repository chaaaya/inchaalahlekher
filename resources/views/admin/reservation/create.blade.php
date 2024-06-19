<!-- resources/views/admin/reservations/create.blade.php -->

@extends('layouts.admin')

@section('title', 'Créer Réservation')

@section('content')
    <h1>Créer Réservation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.reservation.store') }}" method="POST">
        @csrf

        <!-- Ajoutez tous les champs de formulaire nécessaires -->
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">
        </div>
        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}">
        </div>
        <div class="form-group">
            <label for="sexe">Sexe</label>
            <select name="sexe" class="form-control">
                <option value="Homme" {{ old('sexe') == 'Homme' ? 'selected' : '' }}>Homme</option>
                <option value="Femme" {{ old('sexe') == 'Femme' ? 'selected' : '' }}>Femme</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nationalite">Nationalité</label>
            <input type="text" name="nationalite" class="form-control" value="{{ old('nationalite') }}">
        </div>
        <div class="form-group">
            <label for="num_identite">Numéro d'Identité</label>
            <input type="text" name="num_identite" class="form-control" value="{{ old('num_identite') }}">
        </div>
        <div class="form-group">
            <label for="date_expiration_identite">Date d'Expiration Identité</label>
            <input type="date" name="date_expiration_identite" class="form-control" value="{{ old('date_expiration_identite') }}">
        </div>
        <div class="form-group">
            <label for="pays_delivrance_identite">Pays de Délivrance Identité</label>
            <input type="text" name="pays_delivrance_identite" class="form-control" value="{{ old('pays_delivrance_identite') }}">
        </div>
        <div class="form-group">
            <label for="date_depart">Date de Départ</label>
            <input type="date" name="date_depart" class="form-control" value="{{ old('date_depart') }}">
        </div>
        <div class="form-group">
            <label for="date_retour">Date de Retour</label>
            <input type="date" name="date_retour" class="form-control" value="{{ old('date_retour') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
        </div>
        <div class="form-group">
            <label for="num_carte">Numéro de Carte</label>
            <input type="text" name="num_carte" class="form-control" value="{{ old('num_carte') }}">
        </div>
        <div class="form-group">
            <label for="date_expiration_carte">Date d'Expiration Carte</label>
            <input type="date" name="date_expiration_carte" class="form-control" value="{{ old('date_expiration_carte') }}">
        </div>
        <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" name="cvv" class="form-control" value="{{ old('cvv') }}">
        </div>
        <div class="form-group">
            <label for="nom_titulaire_carte">Nom du Titulaire de Carte</label>
            <input type="text" name="nom_titulaire_carte" class="form-control" value="{{ old('nom_titulaire_carte') }}">
        </div>
        <div class="form-group">
            <label for="ville_depart">Ville de Départ</label>
            <input type="text" name="ville_depart" class="form-control" value="{{ old('ville_depart') }}">
        </div>
        <div class="form-group">
            <label for="ville_arrivee">Ville d'Arrivée</label>
            <input type="text" name="ville_arrivee" class="form-control" value="{{ old('ville_arrivee') }}">
        </div>
        <div class="form-group">
            <label for="client_id">Client ID</label>
            <input type="text" name="client_id" class="form-control" value="{{ old('client_id') }}">
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control">
                <option value="en attente" {{ old('status') == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="acceptée" {{ old('status') == 'acceptée' ? 'selected' : '' }}>Acceptée</option>
                <option value="refusée" {{ old('status') == 'refusée' ? 'selected' : '' }}>Refusée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer Réservation</button>
    </form>
@endsection
