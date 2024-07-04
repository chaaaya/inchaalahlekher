@extends('layouts.abonne')

@section('content-abonne')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card mb-4">
                    <div class="card-body">
                        <h2>Programme de Fidélité</h2>
                        <!-- Contenu du programme de fidélité -->
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        Récompenses
                    </div>
                    <div class="card-body">
                        <p>Utilisez vos points pour obtenir des réductions sur des vols futurs, des surclassements, ou d'autres avantages.</p>
                        <ul>
                            <li>Réduction de 10% sur les vols futurs</li>
                            <li>Surclassement gratuit sur les vols</li>
                            <li>Accès à des offres spéciales et exclusives</li>
                        </ul>
                        <a href="{{ route('abonne.consulter.offres') }}" class="btn btn-primary">Consulter les offres</a>
                    </div>
                </div>


                <div class="card mb-4">
                    <div class="card-header">
                        Statut Élite
                    </div>
                    <div class="card-body">
                        <p>Atteignez un certain niveau d'activité ou de dépenses pour accéder à notre statut élite.</p>
                        <ul>
                            <li>Embarquement prioritaire</li>
                            <li>Accès aux salons VIP</li>
                            <li>Assistance personnalisée</li>
                        </ul>
                        <a href="{{ route('abonne.programme_fidelite.telecharger_attestation') }}" class="btn btn-primary">Télécharger l'attestation pour les salons VIP</a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        Feedback et Participation
                    </div>
                    <div class="card-body">
                        <p>Aidez-nous à améliorer constamment nos services et nos avantages en nous fournissant vos commentaires.</p>
                        <form method="POST" action="{{ route('abonne.programme_fidelite.commentaires.store') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="commentaire" placeholder="Vos commentaires..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            margin-bottom: 20px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
        }
        .card-body ul {
            list-style-type: none;
            padding-left: 0;
        }
        .card-body ul li {
            margin-bottom: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
@endsection
