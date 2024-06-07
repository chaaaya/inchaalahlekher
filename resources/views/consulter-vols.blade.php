<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter les vols</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            color: #007BFF;
        }
        .vols {
            margin: 20px auto;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Liste des vols disponibles</h1>

    <!-- Search Form -->
    <div class="search-form">
        <form action="{{ route('rechercher.vols') }}" method="GET">
            <label for="ville_depart">Ville de départ:</label>
            <input type="text" id="ville_depart" name="ville_depart" required>
            <label for="ville_arrivee">Ville d'arrivée:</label>
            <input type="text" id="ville_arrivee" name="ville_arrivee" required>
            <button type="submit">Rechercher</button>
        </form>
    </div>

    <!-- Table of Flights -->
    <div class="vols">
        <table>
            <thead>
                <tr>
                    <th>Numéro de vol</th>
                    <th>Ville de départ</th>
                    <th>Ville d'arrivée</th>
                    <th>Heure de départ</th>
                    <th>Heure d'arrivée</th>
                    <th>Compagnie</th>
                </tr>
            </thead>
            <tbody>
                @if ($vols->count() > 0)
                    @foreach ($vols as $vol)
                        <tr>
                            <td>{{ $vol->numero_vol }}</td>
                            <td>{{ $vol->ville_depart }}</td>
                            <td>{{ $vol->ville_arrivee }}</td>
                            <td>{{ $vol->heure_depart }}</td>
                            <td>{{ $vol->heure_arrivee }}</td>
                            <td>{{ $vol->compagnie }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" style="text-align: center;">Aucun vol trouvé</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
