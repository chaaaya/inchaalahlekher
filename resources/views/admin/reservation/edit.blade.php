<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>@extends('layouts.admin')

@section('title', 'Modifier Réservation')

@section('content')
 <div class="conteneur">
    <h1>Modifier Réservation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.reservation.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom', $reservation->nom) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom', $reservation->prenom) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="date_naissance">Date de Naissance</label>
                <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance', $reservation->date_naissance) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="sexe">Sexe</label>
                <select name="sexe" class="form-control">
                    <option value="Homme" {{ old('sexe', $reservation->sexe) == 'Homme' ? 'selected' : '' }}>Homme</option>
                    <option value="Femme" {{ old('sexe', $reservation->sexe) == 'Femme' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="nationalite">Nationalité</label>
                <input type="text" name="nationalite" class="form-control" value="{{ old('nationalite', $reservation->nationalite) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="num_identite">Numéro d'Identité</label>
                <input type="text" name="num_identite" class="form-control" value="{{ old('num_identite', $reservation->num_identite) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="date_expiration_identite">Date d'Expiration Identité</label>
                <input type="date" name="date_expiration_identite" class="form-control" value="{{ old('date_expiration_identite', $reservation->date_expiration_identite) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="pays_delivrance_identite">Pays de Délivrance Identité</label>
                <input type="text" name="pays_delivrance_identite" class="form-control" value="{{ old('pays_delivrance_identite', $reservation->pays_delivrance_identite) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="date_depart">Date de Départ</label>
                <input type="date" name="date_depart" class="form-control" value="{{ old('date_depart', $reservation->date_depart) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="date_retour">Date de Retour</label>
                <input type="date" name="date_retour" class="form-control" value="{{ old('date_retour', $reservation->date_retour) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $reservation->email) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ old('telephone', $reservation->telephone) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="num_carte">Numéro de Carte</label>
                <input type="text" name="num_carte" class="form-control" value="{{ old('num_carte', $reservation->num_carte) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="date_expiration_carte">Date d'Expiration Carte</label>
                <input type="date" name="date_expiration_carte" class="form-control" value="{{ old('date_expiration_carte', $reservation->date_expiration_carte) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" class="form-control" value="{{ old('cvv', $reservation->cvv) }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="nom_titulaire_carte">Nom du Titulaire de Carte</label>
                <input type="text" name="nom_titulaire_carte" class="form-control" value="{{ old('nom_titulaire_carte', $reservation->nom_titulaire_carte) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="ville_depart">Ville de Départ</label>
                <input type="text" name="ville_depart" class="form-control" value="{{ old('ville_depart', $reservation->ville_depart) }}">
            </div>
            <div class="form-group col-md-4">
                <label for="ville_arrivee">Ville d'Arrivée</label>
                <input type="text" name="ville_arrivee" class="form-control" value="{{ old('ville_arrivee', $reservation->ville_arrivee) }}">
            </div>
        </div>
    </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
@endsection


    <style>
        /* Global Styles */
        .conteneur {
            margin-top: 30px;
        }

    h1 {
        font-weight: bolder;
        font-size: 2em;
        margin-bottom: 40px;
        background-color: rgb(213, 216, 219);
        padding: 10px;
        text-align: center;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        margin-bottom: 40px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    </style>