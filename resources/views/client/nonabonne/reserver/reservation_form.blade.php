<!-- resources/views/client/nonabonne/reserver/reservation_form.blade.php -->
@extends('layouts.nonabonne')

@section('content-nonabonne')
<div class="conteneur">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('nonabonne.process.reservation') }}" method="POST" class="reservation-form">
                        @csrf
                        <!-- Champ caché pour vol_id -->
                        <input type="hidden" name="vol_id" value="{{ $vol->id }}">

                        <div class="form-group">
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date_naissance">Date de naissance (JJ/MM/AAAA) :</label>
                            <input type="text" id="date_naissance" name="date_naissance" class="form-control" placeholder="JJ/MM/AAAA" pattern="\d{2}/\d{2}/\d{4}" title="Format: JJ/MM/AAAA" required>
                        </div>

                        <div class="form-group">
                            <label>Sexe :</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="sexe_homme" value="Homme" required>
                                <label class="form-check-label" for="sexe_homme">Homme</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="sexe_femme" value="Femme" required>
                                <label class="form-check-label" for="sexe_femme">Femme</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nationalite">Nationalité :</label>
                            <input type="text" id="nationalite" name="nationalite" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="num_identite">Numéro de passeport ou carte d'identité :</label>
                            <input type="text" id="num_identite" name="num_identite" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date_expiration_identite">Date d'expiration du passeport ou de la carte d'identité :</label>
                            <input type="date" id="date_expiration_identite" name="date_expiration_identite" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="pays_delivrance_identite">Pays de délivrance du passeport ou de la carte d'identité :</label>
                            <input type="text" id="pays_delivrance_identite" name="pays_delivrance_identite" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="ville_depart">Ville de départ :</label>
                            <input type="text" id="ville_depart" name="ville_depart" class="form-control" value="{{ $vol->ville_depart }}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="ville_arrivee">Ville d'arrivée :</label>
                            <input type="text" id="ville_arrivee" name="ville_arrivee" class="form-control" value="{{ $vol->ville_arrivee }}" readonly>
                        </div>
                        
                        <div class="form-group">
                            <label for="date_depart">Date de départ :</label>
                            <input type="date" id="date_depart" name="date_depart" class="form-control" value="{{ $vol->date_depart }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="date_retour">Date de retour :</label>
                            <input type="date" id="date_retour" name="date_retour" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Adresse e-mail :</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Numéro de téléphone :</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="num_carte">Numéro de carte de crédit :</label>
                            <input type="text" id="num_carte" name="num_carte" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date_expiration_carte">Date d'expiration de la carte de crédit :</label>
                            <input type="date" id="date_expiration_carte" name="date_expiration_carte" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="cvv">CVV :</label>
                            <input type="text" id="cvv" name="cvv" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nom_titulaire_carte">Nom du titulaire de la carte de crédit :</label>
                            <input type="text" id="nom_titulaire_carte" name="nom_titulaire_carte" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Réserver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
