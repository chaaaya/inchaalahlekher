<!DOCTYPE html>
<html>
<head>
    <title>Offres</title>
    <!-- Ajouter le lien vers Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa; /* Couleur de fond pour tout le corps */
            padding-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd; /* Bordure légère autour de chaque carte */
            border-radius: 8px; /* Coins arrondis pour les cartes */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre légère pour les cartes */
            transition: transform 0.3s ease-in-out; /* Animation de transition */
        }

        .card:hover {
            transform: translateY(-5px); /* Animation de léger déplacement vers le haut au survol */
        }

        .card-img-top {
            max-height: 200px;
            object-fit: cover; /* Recadrage de l'image pour s'adapter à la zone */
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem; /* Taille de police plus grande pour le titre */
            margin-bottom: 10px;
            color: #333; /* Couleur du texte du titre */
        }

        .card-text {
            font-size: 1rem;
            color: #666; /* Couleur du texte du contenu */
            margin-bottom: 15px;
        }

        .card-text.reduction {
            font-weight: bold;
            color: #28a745; /* Couleur verte pour les réductions */
        }

        .card-text.price {
            font-weight: bold;
            color: #dc3545; /* Couleur rouge pour le prix */
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40; /* Couleur foncée pour le titre principal */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nos Offres</h1>
        <div class="row">
            @foreach($offres as $offre)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top img-fluid" src="{{ asset('images/' . $offre->image) }}" alt="{{ $offre->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $offre->title }}</h5>
                            <p class="card-text">{{ $offre->description }}</p>
                            @if($offre->percentage_discount)
                                <p class="card-text reduction">Réduction : {{ $offre->percentage_discount }}%</p>
                            @endif
                            @if($offre->amount_discount)
                                <p class="card-text reduction">Réduction : {{ $offre->amount_discount }}€</p>
                            @endif
                            <p class="card-text price">Prix : {{ $offre->price }}€</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
