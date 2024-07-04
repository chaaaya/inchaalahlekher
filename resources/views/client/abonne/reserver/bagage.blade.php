@extends('layouts.abonne')

@section('content-abonne')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Informations sur les Bagages</h2>
        </div>
    </div>

    <form id="bagageForm" action="{{ route('abonne.process.bagage') }}" method="POST">
        @csrf
        <input type="hidden" name="vol_id" value="{{ $vol->id }}">
        <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="type_bagage">Type de bagage :</label>
                    <select id="type_bagage" name="type_bagage" class="form-control">
                        <option value="">Sélectionnez une option</option>
                        <option value="bagage_enregistre">Bagage enregistré</option>
                        <option value="bagage_cabine">Bagage cabine</option>
                        <option value="bagage_special">Bagage spécial (ex. instrument de musique, équipement sportif)</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre_bagages">Nombre de bagages :</label>
                    <input type="number" id="nombre_bagages" name="nombre_bagages" class="form-control" min="1" max="10">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="poids_bagage">Poids du bagage (kg) :</label>
                    <input type="number" id="poids_bagage" name="poids_bagage" class="form-control" min="0" max="50">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="longueur_bagage">Longueur du bagage (cm) :</label>
                    <input type="number" id="longueur_bagage" name="longueur_bagage" class="form-control" min="0" max="200">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="largeur_bagage">Largeur du bagage (cm) :</label>
                    <input type="number" id="largeur_bagage" name="largeur_bagage" class="form-control" min="0" max="100">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="hauteur_bagage">Hauteur du bagage (cm) :</label>
                    <input type="number" id="hauteur_bagage" name="hauteur_bagage" class="form-control" min="0" max="100">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="contenu_bagage">Contenu du bagage :</label>
                    <textarea id="contenu_bagage" name="contenu_bagage" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Options de bagages spéciaux</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="equipement_sportif">Équipement sportif :</label>
                    <input type="checkbox" id="equipement_sportif" name="equipement_sportif" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="instrument_musique">Instrument de musique :</label>
                    <input type="checkbox" id="instrument_musique" name="instrument_musique" class="form-control">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h3>Tarifs et Frais</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="tarif_calculé">Tarif calculé :</label>
                    <input type="number" id="tarif_calculé" name="tarif_calculé" class="form-control" readonly>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="button" id="calculate" class="btn btn-primary">Calculer le tarif</button>
                <button type="button" id="saveTarif" class="btn btn-primary">Enregistrer le Tarif et Payer</button>
            </div>
        </div>
    </form>
</div>

<script>
const calculateButton = document.getElementById('calculate');
const saveTarifButton = document.getElementById('saveTarif');
const tarifCalculeInput = document.getElementById('tarif_calculé');
const poidsBagageInput = document.getElementById('poids_bagage');
const longueurBagageInput = document.getElementById('longueur_bagage');
const largeurBagageInput = document.getElementById('largeur_bagage');
const hauteurBagageInput = document.getElementById('hauteur_bagage');
const typeBagageSelect = document.getElementById('type_bagage');

calculateButton.addEventListener('click', function() {
    // Obtenir le type de bagage sélectionné
    let typeBagage = typeBagageSelect.value;

    // Logique de calcul du tarif en fonction du type de bagage
    let tarif;

    switch (typeBagage) {
        case 'bagage_enregistre':
            tarif = calculateTarifBagageEnregistre();
            break;
        case 'bagage_cabine':
            tarif = calculateTarifBagageCabine();
            break;
        case 'bagage_special':
            tarif = calculateTarifBagageSpecial();
            break;
        default:
            tarif = 0;
            break;
    }

    // Afficher le tarif calculé dans l'input
    tarifCalculeInput.value = tarif.toFixed(2); // Exemple de formatage du tarif à deux décimales
});

saveTarifButton.addEventListener('click', function() {
    const form = document.getElementById('bagageForm');
    form.action = `{{ route('abonne.process.paiement') }}`;
    form.submit();
});

function calculateTarifBagageEnregistre() {
    // Logique de calcul pour un bagage enregistré
    let poids = parseFloat(poidsBagageInput.value);
    let longueur = parseFloat(longueurBagageInput.value);
    let largeur = parseFloat(largeurBagageInput.value);
    let hauteur = parseFloat(hauteurBagageInput.value);

    // Calcul fictif basé sur une formule arbitraire pour un bagage enregistré
    let tarif = poids * 10 + longueur * largeur * hauteur / 1000;

    return tarif;
}

function calculateTarifBagageCabine() {
    // Logique de calcul pour un bagage cabine
    let poids = parseFloat(poidsBagageInput.value);
    let hauteur = parseFloat(hauteurBagageInput.value);

    // Calcul fictif basé sur une formule arbitraire pour un bagage cabine
    let tarif = poids * 5 + hauteur * 2;

    return tarif;
}

function calculateTarifBagageSpecial() {
    // Logique de calcul pour un bagage spécial
    let poids = parseFloat(poidsBagageInput.value);
    let longueur = parseFloat(longueurBagageInput.value);
    let largeur = parseFloat(largeurBagageInput.value);
    let hauteur = parseFloat(hauteurBagageInput.value);

    // Calcul fictif basé sur une formule arbitraire pour un bagage spécial
    let tarif = poids * 15 + (longueur * largeur * hauteur) / 500;

    return tarif;
}
</script>
@endsection
