<link rel="stylesheet" href="{{ asset('css/content.css') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
@extends('layouts.admin')

@section('title', 'Modification d\'un Vol')

@section('content')
<div class="conteneur">
    <h1>Modification d'un Vol</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.vols.update', $vol->id) }}" method="POST">
        @csrf
        @method('PUT')
     
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="numero_vol">Numéro de Vol :</label>
                <input type="text" id="numero_vol" name="numero_vol" class="form-control" value="{{ old('numero_vol', $vol->numero_vol) }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="compagnie">Compagnie :</label>
                <input type="text" id="compagnie" name="compagnie" class="form-control" value="{{ old('compagnie', $vol->compagnie) }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ville_depart">Ville de Départ :</label>
                <input type="text" id="ville_depart" name="ville_depart" class="form-control" value="{{ old('ville_depart', $vol->ville_depart) }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="ville_arrivee">Ville d'Arrivée :</label>
                <input type="text" id="ville_arrivee" name="ville_arrivee" class="form-control" value="{{ old('ville_arrivee', $vol->ville_arrivee) }}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="heure_depart">Date/Heure de Départ :</label>
                <input type="datetime-local" id="heure_depart" name="heure_depart" class="form-control" value="{{ old('heure_depart', $vol->heure_depart->format('Y-m-d\TH:i')) }}" required>
            </div>
            <div class="form-group col-md-6">
                <label for="heure_arrivee"> Date/Heure d'Arrivée :</label>
                <input type="datetime-local" id="heure_arrivee" name="heure_arrivee" class="form-control" value="{{ old('heure_arrivee', $vol->heure_arrivee->format('Y-m-d\TH:i')) }}" required>
            </div>
        </div>
</div>
        <button type="submit" class="btn btn-primary">Mettre à jour le Vol</button>
    </form>
@endsection
<style>
    .conteneur {
        margin-top: 30px;
    }
    h1{
        font-weight: bolder;
        font-size: 2em;
        margin-bottom: 40px;
        background-color: rgb(213, 216, 219);
        padding: 10px;
    }
</style>