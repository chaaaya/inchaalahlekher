
@extends('layouts.abonne')
@section('content-abonne')
<div class="conteneur">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
            <form action="{{ route('abonne.process.reservation') }}" method="POST" class="reservation-form">
                @csrf
                        <!-- Champ caché pour vol_id -->
                        <input type="hidden" name="vol_id" value="{{ $vol->id }}">

                        <!-- Section Informations Personnelles -->
                        <div class="card mb-4">
                            <div class="card-header">
                                Informations Personnelles
                            </div>
                            <div class="card-body">
                                <!-- Other form fields -->

                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::guard('client')->user()->email }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="telephone">Téléphone :</label>
                                    <input type="text" id="telephone" name="telephone" class="form-control" value="{{ Auth::guard('client')->user()->telephone }}" readonly>
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
                            </div>
                        </div>

                        <!-- Section Informations Bagage -->
                        <div class="card mb-4">
                            <div class="card-header">
                                Informations Bagage
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="type_bagage">Type de bagage :</label>
                                    <select id="type_bagage" name="type_bagage" class="form-control" required>
                                        <option value="">Sélectionnez une option</option>
                                        <option value="bagage_enregistre">Bagage enregistré</option>
                                        <option value="bagage_cabine">Bagage cabine</option>
                                        <option value="bagage_special">Bagage spécial (ex. instrument de musique, équipement sportif)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nombre_bagages">Nombre de bagages :</label>
                                    <input type="number" id="nombre_bagages" name="nombre_bagages" class="form-control" min="1" max="10" required>
                                </div>

                                <div class="form-group">
                                    <label for="poids_bagage">Poids du bagage (kg) :</label>
                                    <input type="number" id="poids_bagage" name="poids_bagage" class="form-control" min="0" max="50" required>
                                </div>

                                <div class="form-group">
                                    <label for="longueur_bagage">Longueur du bagage (cm) :</label>
                                    <input type="number" id="longueur_bagage" name="longueur_bagage" class="form-control" min="0" max="200" required>
                                </div>

                                <div class="form-group">
                                    <label for="largeur_bagage">Largeur du bagage (cm) :</label>
                                    <input type="number" id="largeur_bagage" name="largeur_bagage" class="form-control" min="0" max="100" required>
                                </div>

                                <div class="form-group">
                                    <label for="hauteur_bagage">Hauteur du bagage (cm) :</label>
                                    <input type="number" id="hauteur_bagage" name="hauteur_bagage" class="form-control" min="0" max="100" required>
                                </div>

                                <div class="form-group">
                                    <label for="contenu_bagage">Contenu du bagage :</label>
                                    <textarea id="contenu_bagage" name="contenu_bagage" class="form-control"></textarea>
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" id="equipement_sportif" name="equipement_sportif" class="form-check-input">
                                    <label for="equipement_sportif" class="form-check-label">Équipement sportif</label>
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" id="instrument_musique" name="instrument_musique" class="form-check-input">
                                    <label for="instrument_musique" class="form-check-label">Instrument de musique</label>
                                </div>
                            </div>
                        </div>

                        <!-- Section Tarifs et Frais -->
                        <div class="card mb-4">
                            <div class="card-header">
                                Tarifs et Frais
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="tarif_calculé">Tarif calculé :</label>
                                    <input type="number" id="tarif_calculé" name="tarif_calculé" class="form-control" readonly>
                                </div>
                                <input type="hidden" name="tarif_calcule_cache" id="tarif_calcule_cache" value="">
                                <button type="button" id="calculate" class="btn btn-primary">Calculer le tarif</button>
                            </div>
                        </div>

                        <!-- Section Informations de Paiement -->
                        <div class="card mb-4">
                            <div class="card-header">
                                Informations de Paiement
                            </div>
                            <div class="card-body">
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
                            </div>
                        </div>

                        <a href="{{ route('abonne.reservation.confirmation') }}" class="btn btn-primary">eserver</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const calculateButton = document.getElementById('calculate');
    const tarifCalculeInput = document.getElementById('tarif_calculé');
    const tarifCalculeCacheInput = document.getElementById('tarif_calcule_cache');
    
    calculateButton.addEventListener('click', function() {
        const typeBagage = document.getElementById('type_bagage').value;
        const nombreBagages = parseInt(document.getElementById('nombre_bagages').value) || 0;
        const poidsBagage = parseFloat(document.getElementById('poids_bagage').value) || 0;
    
        let tarif = 0;
    
        // Calcul du tarif basé sur le type de bagage
        if (typeBagage === 'bagage_enregistre') {
            tarif += 50 * nombreBagages;
        } else if (typeBagage === 'bagage_cabine') {
            tarif += 20 * nombreBagages;
        } else if (typeBagage === 'bagage_special') {
            tarif += 100 * nombreBagages;
        }
    
        // Calcul du tarif basé sur le poids
        tarif += 5 * poidsBagage;
    
        tarifCalculeInput.value = tarif.toFixed(2); // Affiche le tarif calculé avec deux décimales
        tarifCalculeCacheInput.value = tarif.toFixed(2); // Met à jour le champ caché avec le tarif calculé
    });
    </script>
    
@endsection
