<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Carte d'abonnement</title>
    <style>
        /* Vos styles CSS pour le PDF */
    </style>
</head>
<body>
    <h1>Carte d'abonnement</h1>
    <p>Nom : {{ $nom }}</p>
    <p>Prénom : {{ $prenom }}</p>
    <p>Numéro de téléphone : {{ $numero_telephone }}</p>
    <p>Carte bancaire : {{ $carte_bancaire }}</p>
    <p>Date d'expiration : {{ $expiration_carte }}</p>
    <p>Adresse de facturation : {{ $adresse_facturation }}</p>
    @if ($email)
        <p>Email : {{ $email }}</p>
    @endif
</body>
</html>
