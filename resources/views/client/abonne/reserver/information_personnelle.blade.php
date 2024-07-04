@extends('layouts.abonne')

@section('content-abonne')
<div class="conteneur">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('abonne.process.information_personnelle') }}" method="POST" class="information-personnelle-form">
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
                            <label for="date_naissance">Date de naissance :</label>
                            <input type="text" id="date_naissance" name="date_naissance" class="form-control" placeholder="YYYY-MM-DD" required>
                        </div>

                        <div class="form-group">
                            <label for="sexe">Sexe :</label>
                            <select id="sexe" name="sexe" class="form-control" required>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nationalite">Nationalité :</label>
                            <input type="text" id="nationalite" name="nationalite" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="num_identite">Numéro d'identité :</label>
                            <input type="text" id="num_identite" name="num_identite" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="date_expiration_identite">Date d'expiration de l'identité :</label>
                            <input type="text" id="date_expiration_identite" name="date_expiration_identite" class="form-control" placeholder="YYYY-MM-DD" required>
                        </div>

                        <div class="form-group">
                            <label for="pays_delivrance_identite">Pays de délivrance de l'identité :</label>
                            <input type="text" id="pays_delivrance_identite" name="pays_delivrance_identite" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Téléphone :</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Suivant</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
