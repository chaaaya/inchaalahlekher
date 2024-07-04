@extends('layouts.nonabonne')

@section('content-nonabonne')
    <div class="container">
        <h1>Détails de l'offre</h1>
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h2>{{ $offer->title }}</h2>
                @if($offer->image)
                    <img class="card-img-top" src="{{ asset('images/' . $offer->image) }}" alt="{{ $offer->title }}">
                @else
                    <img class="card-img-top" src="path/to/default-image.jpg" alt="Default Image">
                @endif
                <p>{{ $offer->description }}</p>
                @if($offer->percentage_discount)
                    <p>Réduction : <span class="reduction-color">{{ $offer->percentage_discount }}%</span></p>
                @elseif($offer->amount_discount)
                    <p>Réduction : <span class="reduction-color">{{ $offer->amount_discount }} €</span></p>
                @endif
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

@endsection

<style>
    .old-price-color {
        color: red;
        text-decoration: line-through;
    }
    .new-price-color {
        color: green;
        font-weight: bold;
    }
    .reduction-color {
        color: blue;
        font-weight: bold;
    }
    .container {
        margin-top: 20px;
    }
    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: box-shadow 0.3s;
    }
    .card:hover {
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card-body {
        padding: 20px;
    }
    h1, h2, h5.card-title {
        color: #333;
        font-family: 'Arial', sans-serif;
    }
    h1 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    h2 {
        font-size: 2rem;
        margin-bottom: 15px;
    }
    h5.card-title {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    p {
        color: #555;
        font-family: 'Arial', sans-serif;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
        transition: background-color 0.3s, border-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    @media (max-width: 768px) {
        .card {
            margin-bottom: 20px;
        }
        .card-body {
            padding: 15px;
        }
        h1 {
            font-size: 2rem;
        }
        h2 {
            font-size: 1.5rem;
        }
        h5.card-title {
            font-size: 1.25rem;
        }
    }
</style>