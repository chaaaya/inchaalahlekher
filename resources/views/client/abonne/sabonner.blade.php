<!-- resources/views/sabonner.blade.php -->
@extends('layouts.abonne')

@section('content')
<h2>Formulaire d'abonnement</h2>

<form action="{{ route('process.subscription') }}" method="POST">
    @csrf

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required>

    <label for="telephone">Téléphone :</label>
    <input type="text" id="telephone" name="telephone" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="numero_carte">Numéro de carte :</label>
    <input type="text" id="numero_carte" name="numero_carte" required>

    <button type="submit">S'abonner</button>
</form>
@endsection