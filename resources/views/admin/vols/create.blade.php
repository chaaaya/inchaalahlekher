<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
    @extends('layouts.admin')

    @section('title', 'Création d\'un Vol')

    @section('content')
    <div class="conteneur">
        <h1>Création d'un Vol</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.vols.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="numero_vol">Numéro de Vol :</label>
                    <input type="text" id="numero_vol" name="numero_vol" class="form-control" value="{{ old('numero_vol') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="compagnie">Compagnie :</label>
                    <input type="text" id="compagnie" name="compagnie" class="form-control" value="{{ old('compagnie') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ville_depart">Ville de Départ :</label>
                    <input type="text" id="ville_depart" name="ville_depart" class="form-control" value="{{ old('ville_depart') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="ville_arrivee">Ville d'Arrivée :</label>
                    <input type="text" id="ville_arrivee" name="ville_arrivee" class="form-control" value="{{ old('ville_arrivee') }}" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="heure_depart">Heure de Départ :</label>
                    <input type="datetime-local" id="heure_depart" name="heure_depart" class="form-control" value="{{ old('heure_depart') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="heure_arrivee">Heure d'Arrivée :</label>
                    <input type="datetime-local" id="heure_arrivee" name="heure_arrivee" class="form-control" value="{{ old('heure_arrivee') }}" required>
                </div>
            </div>
            <div class="button-group">
                <button type="submit" class="btn btn-primary">Créer le Vol</button>
                <a href="{{ route('admin.vols.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
    @endsection

    <style>
        .conteneur {
            margin-top: 30px;
        }
        h1 {
            font-weight: bolder;
            font-size: 2em;
            margin-bottom: 40px;
            background-color: rgb(213, 216, 219);
            padding: 10px;
        }
    </style>
</body>
</html>