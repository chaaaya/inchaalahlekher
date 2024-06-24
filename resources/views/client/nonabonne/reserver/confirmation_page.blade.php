@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Détails de la Réservation</h1>

    <div class="reservation-details">
        <p><strong>Nom :</strong> {{ $reservation->nom }}</p>
        <p><strong>Prénom :</strong> {{ $reservation->prenom }}</p>
        <p><strong>Date de Naissance :</strong> {{ $reservation->date_naissance }}</p>
        <p><strong>Sexe :</strong> {{ $reservation->sexe }}</p>
        <p><strong>Nationalité :</strong> {{ $reservation->nationalite }}</p>
        <p><strong>Numéro d'Identité :</strong> {{ $reservation->num_identite }}</p>
        <p><strong>Date d'Expiration de l'Identité :</strong> {{ $reservation->date_expiration_identite }}</p>
        <p><strong>Pays de Délivrance de l'Identité :</strong> {{ $reservation->pays_delivrance_identite }}</p>
        <p><strong>Date de Départ :</strong> {{ $reservation->date_depart }}</p>
        <p><strong>Date de Retour :</strong> {{ $reservation->date_retour }}</p>
        <p><strong>Email :</strong> {{ $reservation->email }}</p>
        <p><strong>Téléphone :</strong> {{ $reservation->telephone }}</p>
        <p><strong>Numéro de Carte :</strong> {{ $reservation->num_carte }}</p>
        <p><strong>Date d'Expiration de la Carte :</strong> {{ $reservation->date_expiration_carte }}</p>
        <p><strong>CVV :</strong> {{ $reservation->cvv }}</p>
        <p><strong>Nom du Titulaire de la Carte :</strong> {{ $reservation->nom_titulaire_carte }}</p>
        <p><strong>Ville de Départ :</strong> {{ $reservation->ville_depart }}</p>
        <p><strong>Ville d'Arrivée :</strong> {{ $reservation->ville_arrivee }}</p>
        <p><strong>Vol :</strong> {{ $reservation->vol->id }}</p>
    </div>

    <style>
        .reservation-details {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .reservation-details p {
            margin: 10px 0;
        }
        .reservation-details strong {
            color: #333;
        }
    </style>
@endsection
