<!-- resources/views/client/nonabonne/sabonner/download.blade.php -->

@extends('layouts.nonabonne')

@section('content-nonabonne')
    <style>
        .confirmation-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .confirmation-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .confirmation-container ul {
            list-style: none;
            padding: 0;
        }
        .confirmation-container li {
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }
        .confirmation-container li strong {
            font-weight: bold;
            color: #333;
        }
    </style>

    <div class="confirmation-container">
        <h1>Confirmation d'Inscription</h1>

        <p>Merci, votre inscription a été enregistrée avec succès. Voici les détails que vous avez fournis :</p>

        <ul>
            <li><strong>Nom :</strong> {{ $client->name }}</li>
            <li><strong>Date de Naissance :</strong> {{ \Carbon\Carbon::parse($client->date_naissance)->format('d/m/Y') }}</li>
            <li><strong>Sexe :</strong> {{ $client->sexe }}</li>
            <li><strong>Nationalité :</strong> {{ $client->nationalite }}</li>
            <li><strong>Email :</strong> {{ $client->email }}</li>
            <li><strong>Numéro de Téléphone :</strong> {{ $client->numero_telephone }}</li>
            <li><strong>Adresse :</strong> {{ $client->adresse }}</li>
            <li><strong>Numéro d'identité :</strong> {{ $client->numero_identite }}</li>
            <li><strong>Date d'expiration de l'identité :</strong> {{ \Carbon\Carbon::parse($client->expiration_identite)->format('d/m/Y') }}</li>
            <li><strong>Pays de délivrance de l'identité :</strong> {{ $client->pays_delivrance_identite }}</li>
            <li><strong>Numéro de Carte de Crédit :</strong> {{ $client->numero_carte_credit }}</li>
            <li><strong>Date d'expiration de la Carte de Crédit :</strong> {{ \Carbon\Carbon::parse($client->expiration_carte_credit)->format('d/m/Y') }}</li>
            <li><strong>CVV :</strong> {{ $client->cvv }}</li>
            <li><strong>Titulaire de la Carte :</strong> {{ $client->titulaire_carte }}</li>
        </ul>

        <a href="{{ route('nonabonne.inscription.download', ['client' => $client->id]) }}" class="download-button">Télécharger les informations</a>
    </div>
@endsection
