<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Offres</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 15px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #666;
            margin-bottom: 15px;
        }

        .card-text.reduction {
            font-weight: bold;
            color: #28a745;
        }

        .card-text.price {
            font-weight: bold;
            color: #dc3545;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #343a40;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nos Offres</h1>
        <div class="row">
           @if(isset($offers) && $offers->isNotEmpty())
                @foreach($offers as $offer)
                    @if($offer->title != 'Offre Aller-Retour' && $offer->title != 'Offre Étudiants')
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="{{ route('abonne.offres.show', ['id' => $offer->id]) }}">
                                    <img class="card-img-top" src="{{ asset('images/' . $offer->image) }}" alt="{{ $offer->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $offer->title }}</h5>
                                        <p class="card-text">{{ $offer->description }}</p>
                                        @if($offer->percentage_discount)
                                            <p class="card-text reduction">Réduction : {{ $offer->percentage_discount }}%</p>
                                        @endif
                                        @if($offer->amount_discount)
                                            <p class="card-text reduction">Réduction : {{ $offer->amount_discount }}€</p>
                                        @endif
                                        <p class="card-text price">Prix : {{ $offer->price }}€</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            @else
                <p>Aucune offre n'est disponible pour le moment.</p>
            @endif
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html>
