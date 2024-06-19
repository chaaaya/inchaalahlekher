<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Consulter les vols</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .vols {
            margin: 20px auto;
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label{
            font-weight: bold;
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
        .back-button {
            display: inline-block;
            margin: 20px;
            color: white;
            text-decoration: none;
            font-size: 20px;
            cursor: pointer;
        }
        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }
        .search-form form {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .search-form label,
        .search-form input,
        .search-form button {
            margin-right: 10px;
        }
        .search-form input[type="text"], [type="date"] {
            width: 200px;
            height: 25px;
            border-radius: 2px;
            border-color: white;
        }
        .consult{
            background-color: rgba(255, 255, 255, 0.2); 
            border: 2px solid rgba(255, 255, 255, 0.5);
            color: white; 
            padding: 10px 25px; 
            font-size: 16px; 
            border-radius: 20px;
            backdrop-filter: blur(5px);  
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            cursor: pointer; 
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .consult:hover{
            background-color: rgba(255, 255, 255, 0.4); 
            color: black;
        }
        .reserve-btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .reserve-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    @include('partials.header')
    <a class="back-button" onclick="history.back()">
        <i class="fas fa-arrow-left"></i> Retour
    </a>

    <!-- Search Form -->
    <div class="search-form">
        <form action="{{ route('rechercher.vols') }}" method="GET">
            <label for="ville_depart">Ville de départ:</label>
            <input type="text" id="ville_depart" name="ville_depart" required>

            <label for="ville_arrivee">Ville d'arrivée:</label>
            <input type="text" id="ville_arrivee" name="ville_arrivee" required>

            <button type="submit" class="consult">Rechercher</button>
        </form>
    </div>

    <!-- Table of Flights -->
    <div class="vols">
        <h1>Liste des vols disponibles</h1>
        <table>
            <thead>
                <tr>
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
                            <td>{{ $vol->ville_depart }}</td>
                            <td>{{ $vol->ville_arrivee }}</td>
                            <td>{{ $vol->heure_depart }}</td>
                            <td>{{ $vol->heure_arrivee }}</td>
                            <td>{{ $vol->compagnie->nom }}</td>
                            <td>
                                <a href="{{ route('client.login') }}" class="reserve-btn">Réserver</a>
                            </td>
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
