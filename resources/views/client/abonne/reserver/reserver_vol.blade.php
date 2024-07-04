@extends('layouts.abonne')

@section('content-abonne')
    <h1>Réserver un vol</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Barre de recherche -->
    <div class="search-bar">
        <form action="{{ route('abonne.reserver.vol') }}" method="GET">
            <div>
                <label for="ville_depart">Ville de départ :</label>
                <input type="text" id="ville_depart" name="ville_depart" value="{{ request('ville_depart') }}">
            </div>
            <div>
                <label for="ville_arrivee">Ville d'arrivée :</label>
                <input type="text" id="ville_arrivee" name="ville_arrivee" value="{{ request('ville_arrivee') }}">
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
            @if (isset($hasSearchResults) && $hasSearchResults)
                <a href="{{ route('abonne.vols.index') }}" class="btn btn-secondary">Afficher tous les vols</a>
            @endif
        </form>
    </div>

    <!-- Liste des vols disponibles -->
    @if (!empty($vols))
        <div class="vols-list">
            <h2>Liste des vols disponibles</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ville de départ</th>
                        <th>Ville d'arrivée</th>
                        <th>Heure de départ</th>
                        <th>Heure d'arrivée</th>
                        <th>Compagnie</th>
                        @if ($fromOffer1)
                            <th>Prix</th>
                        @endif
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vols as $vol)
                        <tr>
                            <td>{{ $vol->ville_depart }}</td>
                            <td>{{ $vol->ville_arrivee }}</td>
                            <td>{{ $vol->heure_depart }}</td>
                            <td>{{ $vol->heure_arrivee }}</td>
                            <td>{{ $vol->compagnie->nom }}</td>
                            @if ($fromOffer1)
                                <td>
                                    @if ($isFirstReservation)
                                        <del class="strike-through">{{ $vol->prix }} €</del>
                                        <span class="discounted-price">{{ number_format($vol->prix * (1 - $percentage_discount/100), 2) }} €</span>
                                        <span class="discount-info"> (-{{ $percentage_discount }}%)</span>
                                    @else
                                        {{ $vol->prix }} €
                                    @endif
                                </td>
                            @else
                                <td>{{ $vol->prix }} €</td>
                            @endif
                            <td style="text-align: center;">
                                @php
                                    $reservation = Auth::guard('client')->user()->reservations()->where('vol_id', $vol->id)->first();
                                @endphp
                                @if ($reservation)
                                    <a href="{{ route('abonne.reservation.details', ['vol' => $vol->id, 'reservation' => $reservation->id]) }}" class="btn btn-info">Voir la réservation</a>
                                @else
                                    <a href="{{ route('abonne.vols.reservation', ['vol' => $vol->id]) }}" class="btn btn-success">Réserver</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Aucun vol disponible pour les critères de recherche spécifiés.</p>
    @endif
@endsection


    <!-- CSS intégré -->
    <style>
        .search-bar {
            margin-bottom: 20px;
        }

        .search-bar form {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .search-bar label {
            font-weight: bold;
        }

        .search-bar input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            background-color: #2ea1c4;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2187a7;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .btn-success {
            background-color: #2ea1c4;
            color: white;
            border: none;
        }

        .btn-success:hover {
            background-color: #2187a7;
        }

        .vols-list {
            margin-top: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table thead th {
            background-color: #3a6586;
            color: white;
            padding: 10px;
        }

        .table tbody td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .strike-through {
            text-decoration: line-through;
            color: red;
        }

        .discounted-price {
            color: green;
        }
        .discount-info {
            color: blue; /* Couleur de votre choix pour la réduction */
        }
    </style>