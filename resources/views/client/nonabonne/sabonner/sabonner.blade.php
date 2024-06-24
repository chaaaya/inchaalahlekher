@extends('layouts.nonabonne')

@section('content-nonabonne')
    <h1>Inscription Abonné</h1>

    <form action="{{ route('nonabonne.inscription.submit') }}" method="POST">
        @csrf

        <!-- Informations Personnelles -->
        <div>
            <label for="nom">Nom complet :</label>
            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>

        <div>
            <label for="date_naissance">Date de Naissance (JJ/MM/AAAA) :</label>
            <input type="text" id="date_naissance" name="date_naissance" value="{{ old('date_naissance') }}" required>
        </div>

        <div>
            <label>Sexe :</label><br>
            <input type="radio" id="homme" name="sexe" value="homme" {{ old('sexe') == 'homme' ? 'checked' : '' }} required>
            <label for="homme">Homme</label><br>
            <input type="radio" id="femme" name="sexe" value="femme" {{ old('sexe') == 'femme' ? 'checked' : '' }} required>
            <label for="femme">Femme</label><br>
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

        <!-- Informations de Contact -->
        <div>
            <label for="email">Adresse Email :</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="numero_telephone">Numéro de Téléphone :</label>
            <input type="tel" id="numero_telephone" name="numero_telephone" value="{{ old('numero_telephone') }}" required>
        </div>

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
            <label for="titulaire_carte">Nom du titulaire de la carte de crédit :</label>
            <input type="text" id="titulaire_carte" name="titulaire_carte" value="{{ old('titulaire_carte') }}" required>
        </div>

        <!-- Accord et Politique -->
        <div>
            <input type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} required>
            <label for="terms">J'accepte les termes et conditions</label>
        </div>

        <div>
            <input type="checkbox" id="communications" name="communications" {{ old('communications') ? 'checked' : '' }}>
            <label for="communications">Je souhaite recevoir des communications et des offres</label>
        </div>

        <!-- Soumettre -->
        <div>
            <button type="submit">S'inscrire</button>
        </div>
    </form>
@endsection
