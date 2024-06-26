@extends('layouts.abonne')

@section('content-abonne')
<div class="container">
    <style>
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
    </style>

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $reservation->nom) }}">
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $reservation->prenom) }}">
        </div>

        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance', $reservation->date_naissance) }}">
        </div>

        <div class="form-group">
            <label for="sexe">Sexe</label>
            <select name="sexe" class="form-control">
                <option value="Homme" @if(old('sexe', $reservation->sexe) == 'Homme') selected @endif>Homme</option>
                <option value="Femme" @if(old('sexe', $reservation->sexe) == 'Femme') selected @endif>Femme</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nationalite">Nationalité</label>
            <input type="text" name="nationalite" class="form-control" value="{{ old('nationalite', $reservation->nationalite) }}">
        </div>

        <div class="form-group">
            <label for="num_identite">Numéro d'Identité</label>
            <input type="text" name="num_identite" class="form-control" value="{{ old('num_identite', $reservation->num_identite) }}">
        </div>

        <div class="form-group">
            <label for="date_expiration_identite">Date d'Expiration de l'Identité</label>
            <input type="date" name="date_expiration_identite" class="form-control" value="{{ old('date_expiration_identite', $reservation->date_expiration_identite) }}">
        </div>

        <div class="form-group">
            <label for="pays_delivrance_identite">Pays de Délivrance de l'Identité</label>
            <input type="text" name="pays_delivrance_identite" class="form-control" value="{{ old('pays_delivrance_identite', $reservation->pays_delivrance_identite) }}">
        </div>

        <div class="form-group">
            <label for="date_depart">Date de Départ</label>
            <input type="date" name="date_depart" class="form-control" value="{{ old('date_depart', $reservation->date_depart) }}">
        </div>

        <div class="form-group">
            <label for="date_retour">Date de Retour</label>
            <input type="date" name="date_retour" class="form-control" value="{{ old('date_retour', $reservation->date_retour) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $reservation->email) }}">
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $reservation->telephone) }}">
        </div>

        <div class="form-group">
            <label for="num_carte">Numéro de Carte</label>
            <input type="text" name="num_carte" class="form-control" value="{{ old('num_carte', $reservation->num_carte) }}">
        </div>

        <div class="form-group">
            <label for="date_expiration_carte">Date d'Expiration de la Carte</label>
            <input type="date" name="date_expiration_carte" class="form-control" value="{{ old('date_expiration_carte', $reservation->date_expiration_carte) }}">
        </div>

        <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" name="cvv" class="form-control" value="{{ old('cvv', $reservation->cvv) }}">
        </div>

        <div class="form-group">
            <label for="nom_titulaire_carte">Nom du Titulaire de la Carte</label>
            <input type="text" name="nom_titulaire_carte" class="form-control" value="{{ old('nom_titulaire_carte', $reservation->nom_titulaire_carte) }}">
        </div>

        <div class="form-group">
            <label for="ville_depart">Ville de Départ</label>
            <input type="text" name="ville_depart" class="form-control" value="{{ old('ville_depart', $reservation->ville_depart) }}">
        </div>

        <div class="form-group">
            <label for="ville_arrivee">Ville d'Arrivée</label>
            <input type="text" name="ville_arrivee" class="form-control" value="{{ old('ville_arrivee', $reservation->ville_arrivee) }}">
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <select name="status" class="form-control">
                <option value="en attente" {{ $reservation->status == 'en attente' ? 'selected' : '' }}>En attente</option>
                <option value="accepte" {{ $reservation->status == 'accepte' ? 'selected' : '' }}>Accepté</option>
                <option value="refuse" {{ $reservation->status == 'refuse' ? 'selected' : '' }}>Refusé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>
@endsection