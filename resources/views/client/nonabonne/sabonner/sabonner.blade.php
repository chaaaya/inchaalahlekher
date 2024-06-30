@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Inscription Abonné</h1>

    <form action="{{ route('nonabonne.inscription.submit') }}" method="POST">
        @csrf

        <!-- Informations Personnelles -->
        <div>
            <label for="name">Nom complet :</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Adresse Email :</label>
            <input type="email" id="email" name="email" value="{{ $client->email }}" readonly>
        </div>

        <!-- Vous pouvez afficher le mot de passe s'il est stocké de manière sécurisée -->
        <!-- Cependant, afficher le mot de passe dans un formulaire n'est généralement pas recommandé -->

        <div>
            <label for="numero_telephone">Numéro de Téléphone :</label>
            <input type="tel" id="numero_telephone" name="numero_telephone" value="{{ old('numero_telephone') }}" required>
        </div>

        <!-- Informations Personnelles -->
        <div>
            <label for="date_naissance">Date de Naissance (JJ/MM/AAAA) :</label>
            <input type="text" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" required>
        </div>

        <div>
            <label>Sexe :</label><br>
            <input type="radio" id="sexe_homme" name="sexe" value="homme" {{ old('sexe') == 'homme' ? 'checked' : '' }} required>
            <label for="sexe_homme">Homme</label><br>
            <input type="radio" id="sexe_femme" name="sexe" value="femme" {{ old('sexe') == 'femme' ? 'checked' : '' }} required>
            <label for="sexe_femme">Femme</label><br>
            <input type="radio" id="sexe_autre" name="sexe" value="autre" {{ old('sexe') == 'autre' ? 'checked' : '' }} required>
            <label for="sexe_autre">Autre</label><br>
        </div>

        <div>
            <label for="nationalite">Nationalité :</label>
            <input type="text" id="nationalite" name="nationalite" value="{{ old('nationalite') }}" required>
        </div>

        <div>
            <label for="numero_identite">Numéro de passeport ou carte d'identité :</label>
            <input type="text" id="numero_identite" name="numero_identite" value="{{ old('numero_identite') }}" required>
        </div>

        <div>
            <label for="expiration_identite">Date d'expiration du passeport ou de la carte d'identité (JJ/MM/AAAA) :</label>
            <input type="text" id="expiration_identite" name="expiration_identite" value="{{ old('expiration_identite') }}" required>
        </div>

        <div>
            <label for="pays_delivrance_identite">Pays de délivrance de l'identité :</label>
            <input type="text" id="pays_delivrance_identite" name="pays_delivrance_identite" value="{{ old('pays_delivrance_identite') }}" required>
        </div>

        <div>
            <label for="adresse">Adresse :</label>
            <textarea id="adresse" name="adresse" required>{{ old('adresse') }}</textarea>
        </div>

        <!-- Informations de Carte de Crédit -->
        <div>
            <label for="numero_carte_credit">Numéro de carte de crédit :</label>
            <input type="text" id="numero_carte_credit" name="numero_carte_credit" value="{{ old('numero_carte_credit') }}" required>
        </div>

        <div>
            <label for="expiration_carte_credit">Date d'expiration de la carte de crédit (JJ/MM/AAAA) :</label>
            <input type="text" id="expiration_carte_credit" name="expiration_carte_credit" value="{{ old('expiration_carte_credit') }}" required>
        </div>

        <div>
            <label for="cvv">CVV :</label>
            <input type="text" id="cvv" name="cvv" value="{{ old('cvv') }}" required>
        </div>

        <div>
            <label for="titulaire_carte">Titulaire de la carte :</label>
            <input type="text" id="titulaire_carte" name="titulaire_carte" value="{{ old('titulaire_carte') }}" required>
        </div>

        <div>
            <label for="subscription_status">Abonnement :</label>
            <input type="checkbox" id="subscription_status" name="subscription_status" value="1" {{ old('subscription_status') == 1 ? 'checked' : '' }}>
        </div>

        <button type="submit">S'inscrire</button>
    </form>
@endsection