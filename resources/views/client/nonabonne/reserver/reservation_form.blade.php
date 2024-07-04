@extends('layouts.nonabonne')

@section('content-nonabonne')
<div class="conteneur">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('nonabonne.process.reservation') }}" method="POST" class="reservation-form">
                    @csrf
                    <input type="hidden" name="vol_id" value="{{ $vol->id }}">
                    <h1 style="text-align: center; background-color:#ced4da;">Formulaire de réservation</h1>

                    <div class="form-row">
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
                    </div>

                    <div class="form-row">
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
                    </div>

                    <div class="form-row">
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
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="date_depart">Date de départ :</label>
                            <input type="date" id="date_depart" name="date_depart" class="form-control" value="{{ $vol->date_depart }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date_arrive">Date d'arrivée :</label>
                            <input type="date" id="date_arrive" name="date_arrive" class="form-control" value="{{ $vol->date_arrive }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse e-mail :</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-row">
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
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="cvv">CVV :</label>
                            <input type="text" id="cvv" name="cvv" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nom_titulaire_carte">Nom du titulaire de la carte de crédit :</label>
                            <input type="text" id="nom_titulaire_carte" name="nom_titulaire_carte" class="form-control" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Réserver</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    /* public/css/reservation_form.css */

.conteneur {
    margin: 20px;
}

.card {
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 20px;
}

.reservation-form {
    max-width: 100%;
    margin: auto;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    border-radius: 4px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 16px;
}

.form-check-inline {
    margin-right: 15px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 4px;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.form-row {
    display: flex;
    justify-content: space-between;
}

.form-row .form-group {
    flex: 0 0 32%;
}

@media (max-width: 768px) {
    .reservation-form {
        width: 100%;
        padding: 0 15px;
    }

    .card {
        margin: 10px;
    }

    .form-control {
        font-size: 14px;
        padding: 8px;
    }

    .btn-primary {
        font-size: 14px;
        padding: 8px 16px;
    }

    .form-row {
        flex-direction: column;
    }

    .form-row .form-group {
        flex: 0 0 100%;
    }
}

</style>