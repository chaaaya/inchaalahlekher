@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Confirmation d'Inscription</h1>

    <p>Merci, votre inscription a été enregistrée avec succès. Voici les détails que vous avez fournis :</p>

    <ul>
        <li><strong>Nom :</strong> {{ $client->name }}</li>
        <li><strong>Date de Naissance :</strong> {{ \Carbon\Carbon::parse($client->date_naissance)->format('d/m/Y') }}</li>
        <li><strong>Sexe :</strong> {{ $client->sexe }}</li>
        <li><strong>Nationalité :</strong> {{ $client->nationalite }}</li>
        <li><strong>Numéro de Passeport ou Carte d'Identité :</strong> {{ $client->numero_identite }}</li>
        <li><strong>Expiration du Passeport ou de la Carte d'Identité :</strong> {{ \Carbon\Carbon::parse($client->expiration_identite)->format('d/m/Y') }}</li>
        <li><strong>Email :</strong> {{ $client->email }}</li>
        <li><strong>Numéro de Téléphone :</strong> {{ $client->numero_telephone }}</li>
        <li><strong>Numéro de Carte de Crédit :</strong> {{ $client->numero_carte_credit }}</li>
        <li><strong>Expiration de la Carte de Crédit :</strong> {{ \Carbon\Carbon::parse($client->expiration_carte_credit)->format('d/m/Y') }}</li>
        <li><strong>CVV :</strong> {{ $client->cvv }}</li>
        <li><strong>Titulaire de la Carte de Crédit :</strong> {{ $client->titulaire_carte }}</li>
    </ul>
@endsection
