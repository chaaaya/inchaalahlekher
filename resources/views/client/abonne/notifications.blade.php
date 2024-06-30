@extends('layouts.abonne')

@section('content-abonne')
    <div class="container py-4">
        <h1 class="text-center mb-4">Notifications</h1>

        <div class="notification-table">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Message</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($messages as $message)
                        <tr>
                            <td>{{ $message->content }}</td>
                            <td>{{ $message->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="no-notifications">Aucun message pour le moment.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Couleurs */
        :root {
            --primary-color: #3498db; /* Bleu */
            --secondary-color: #f1c40f; /* Jaune */
            --background-color: #f7f7f7; /* Gris clair */
            --text-color: #333; /* Noir */
        }

        /* Notification table */
        .notification-table {
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden; /* Pour masquer la box-shadow qui dépasse */
        }

        .table {
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed; /* Permet de gérer la largeur des colonnes */
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            vertical-align: middle; /* Centrer verticalement le contenu */
        }

        .table th {
            background-color: var(--primary-color);
            color: #fff;
            border-bottom: 2px solid var(--secondary-color);
            white-space: nowrap; /* Éviter le retour à la ligne dans les titres */
        }

        .table td {
            background-color: var(--background-color);
            white-space: nowrap; /* Éviter le retour à la ligne dans le contenu */
            overflow: hidden;
            text-overflow: ellipsis; /* Tronquer le texte long avec des points de suspension */
        }

        .no-notifications {
            text-align: center;
            color: var(--text-color);
            font-size: 18px;
            font-weight: bold;
            padding: 20px;
        }

        /* Effet hover sur les lignes de la table */
        .table tbody tr:hover {
            background-color: var(--secondary-color);
            color: #fff;
            transition: background-color 0.3s ease;
        }
    </style>
@endsection
