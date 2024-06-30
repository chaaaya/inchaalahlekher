@extends('layouts.nonabonne')

@section('content-nonabonne')
<div class="services-container">
    <div class="intro">
        <h1>Nos Services Supplémentaires</h1>
        <p>Nous offrons les meilleurs services pour nos clients, y compris des hôtels de luxe et des locations de voitures premium. Notre objectif est de rendre votre séjour aussi confortable et agréable que possible.</p>
    </div>

    <div class="services-list">
        <div class="service">
            <div class="service-image">
                <img src="{{ asset('images/hotel1.jpg') }}" alt="Hôtel de luxe">
            </div>
            <div class="service-content">
                <h2>Hôtels</h2>
                <p>Découvrez notre sélection d'hôtels de luxe pour un séjour inoubliable.</p>
                <a href="{{ route('nonabonne.hotels') }}" class="btn">Voir les Hôtels</a>

            </div>
        </div>
        
        <div class="service">
            <div class="service-image">
                <img src="{{ asset('images/location1.jpg') }}" alt="Location de voiture">
            </div>
            <div class="service-content">
                <h2>Locations de Voiture</h2>
                <p>Louez une voiture de qualité pour explorer la région à votre rythme.</p>
                <a href="{{ route('nonabonne.car_rentals') }}" class="btn">Voir les Locations de Voiture</a>
            </div>
        </div>
    </div>
    </div>

    <div class="description">
        <p>Plongez dans une expérience de voyage sans pareille avec notre application innovante. Que vous planifiiez une escapade rapide en ville ou une aventure prolongée, notre application combine la facilité de la location de voitures et la commodité de la réservation d'hôtels. Explorez une gamme diversifiée de véhicules, des économiques aux luxueux, et trouvez l'hébergement idéal adapté à votre style et budget. Avec des options de réservation flexibles et un service client dévoué, nous vous offrons le pouvoir de personnaliser chaque étape de votre voyage.</p>
        <img src="{{ asset('images/hotel1.jpg') }}" >
    </div>


</div>

<style>
    .services-container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 30px;
    }

    .intro {
        text-align: center;
        margin-bottom: 30px;
    }

    .intro h1 {
        color: #333;
        font-size: 36px;
        margin-bottom: 10px;
    }

    .intro p {
        font-size: 18px;
        color: #555;
        line-height: 1.6;
    }

    .services-list {
        display: flex;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 20px;
    }

    .service {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        flex: 1;
        transition: transform 0.3s ease;
    }

    .service:hover {
        transform: translateY(-5px);
    }

    .service-image img {
        width: 100%;
        display: block;
        border-radius: 8px 8px 0 0;
    }

    .service-content {
        padding: 20px;
    }

    .service-content h2 {
        font-size: 24px;
        color: #333;
        margin-bottom: 10px;
    }

    .service-content p {
        font-size: 16px;
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
    }

    .btn {
        display: inline-block;
        padding: 10px 20px;
        background-color: #0056b3;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #004499;
    }

    .description {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-top: 20px;
    }

    .description p {
        font-size: 16px;
        color: #666;
        line-height: 1.6;
    }
</style>

@endsection
