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
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .back-button {
            display: inline-block;
            margin: 20px 0;
            color: #007bff;
            text-decoration: none;
            font-size: 18px;
            cursor: pointer;
        }
        .back-button:hover {
            text-decoration: underline;
        }
        .search-form {
            margin-bottom: 20px;
            text-align: center;
        }
        .search-form form {
            display: flex;
            justify-content: center;
            align-items: center; /* Align items vertically center */
            flex-wrap: wrap;
        }
        .search-form input[type="text"] {
            width: 200px;
            height: 30px;
            margin: 10px;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .consult {
            background-color: rgba(22, 51, 83, 0.377); 
            border: 2px solid rgba(143, 132, 132, 0.5); 
            color: white; 
            padding: 10px 25px;
            font-size: 16px;
            border-radius: 10px; 
            backdrop-filter: blur(5px); 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
            cursor: pointer; 
            transition: background-color 0.3s ease, color 0.3s ease;
            width: auto;
            height: 40px;
            margin: 10px; /* Add margin to align with input fields */
        }
        .consult:hover{
            background-color: rgba(0, 0, 0, 0.4); 
            color: black;
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        .vols {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #3a6586;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .reserve-btn {
            background-color: #6aa3cf;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .reserve-btn:hover {
            background-color: #598cb3;
            color: white;
        }
    </style>
</head>
<body>
    @include('partials.header')
    
    <div class="container">
        <a class="back-button" onclick="history.back()">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
        <!-- Search Form -->
        <div class="search-form">
            <form action="{{ route('rechercher.vols') }}" method="GET">
                <input type="text" id="ville_depart" name="ville_depart" placeholder="Ville de départ" required>
                <input type="text" id="ville_arrivee" name="ville_arrivee" placeholder="Ville d'arrivée" required>
                <button type="submit" class="consult">Rechercher</button>
            </form>
        </div>

        <!-- Table of Flights -->
        <h1>Liste des vols disponibles</h1>
        <div class="vols">
            <table>
                <thead>
                    <tr>
                        <th>Ville de départ</th>
                        <th>Ville d'arrivée</th>
                        <th>Heure de départ</th>
                        <th>Heure d'arrivée</th>
                        <th>Compagnie</th>
                        <th>Action</th>
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
    </div>
</body>
</html>