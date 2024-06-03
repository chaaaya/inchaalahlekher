@extends('layouts.admin')

@section('title', 'Modification d\'un Vol')

@section('content-admin')
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

        <div class="form-group">
            <label for="numero_vol">Numéro de Vol :</label>
            <input type="text" id="numero_vol" name="numero_vol" class="form-control" value="{{ old('numero_vol', $vol->numero_vol) }}">
        </div>

        <div class="form-group">
            <label for="heure_depart">Heure de Départ :</label>
            <input type="datetime-local" id="heure_depart" name="heure_depart" class="form-control" value="{{ old('heure_depart', \Carbon\Carbon::parse($vol->heure_depart)->format('Y-m-d\TH:i')) }}">
        </div>

        <div class="form-group">
            <label for="heure_arrivee">Heure d'Arrivée :</label>
            <input
