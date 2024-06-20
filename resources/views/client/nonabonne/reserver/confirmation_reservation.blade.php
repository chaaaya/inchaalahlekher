@extends('layouts.nonabonne')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Confirmation de réservation</div>

                    <div class="card-body">
                        <div class="alert alert-success" role="alert">
                            Votre réservation a été effectuée avec succès !
                        </div>

                        <h5>Détails de la réservation :</h5>
                        <ul>
                            <li><strong>Nom :</strong> {{ $reservation->nom }}</li>
                            <li><strong>Prénom :</strong> {{ $reservation->prenom }}</li>
                            <li><strong>Date de naissance :</strong> {{ $reservation->date_naissance }}</li>
                            <li><strong>Sexe :</strong> {{ $reservation->sexe }}</li>
                            <li><strong>Nationalité :</strong> {{ $reservation->nationalite }}</li>
                            <li><strong>Numéro de document :</strong> {{ $reservation->num_identite }}</li>
                            <li><strong>Date d'expiration du document :</strong> {{ $reservation->date_expiration_identite }}</li>
                            <li><strong>Pays de délivrance du document :</strong> {{ $reservation->pays_delivrance_identite }}</li>
                            <li><strong>Date de départ :</strong> {{ $reservation->date_depart }}</li>
                            <li><strong>Date de retour :</strong> {{ $reservation->date_retour ?? 'Non spécifiée' }}</li>
                            <li><strong>Email :</strong> {{ $reservation->email }}</li>
                            <li><strong>Numéro de téléphone :</strong> {{ $reservation->telephone }}</li>
                            <li><strong>Numéro de carte :</strong> {{ $reservation->num_carte }}</li>
                            <li><strong>Date d'expiration de la carte :</strong> {{ $reservation->date_expiration_carte }}</li>
                            <li><strong>Nom du titulaire de la carte :</strong> {{ $reservation->nom_titulaire_carte }}</li>
                            <li><strong>Ville de départ :</strong> {{ $reservation->vol->ville_depart }}</li>
                            <li><strong>Ville d'arrivée :</strong> {{ $reservation->vol->ville_arrivee }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
