<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
            font-size: 16px;
            color: #555;
        }
        li strong {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
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
    </div>
</body>
</html>
