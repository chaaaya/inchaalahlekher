<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrez Nos Hôtels</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
        }
        .header p {
            font-size: 1.2rem;
            color: #666;
        }
        .filters {
            text-align: center;
            margin-bottom: 20px;
        }
        .filters input {
            padding: 10px;
            font-size: 1rem;
            width: 300px; /* Ajustez la largeur selon votre design */
            max-width: 100%;
        }
        .hotel-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .hotel {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }
        .hotel:hover {
            transform: translateY(-5px);
        }
        .hotel img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        .hotel-info {
            padding: 20px;
        }
        .hotel-info h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }
        .hotel-info p {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Découvrez Nos Hôtels</h1>
            <p>Trouvez l'hôtel parfait pour votre prochaine escapade.</p>
        </header>

        <section class="filters">
            <label for="cityFilter" class="form-label">Rechercher par ville :</label>
            <input type="text" id="cityFilter" class="form-control" placeholder="Entrez le nom de la ville...">
        </section>

        <section id="hotelList" class="hotel-list">
            <!-- Les hôtels seront affichés ici -->
            @foreach ($hotels as $hotel)
            <div class="hotel" data-ville="{{ $hotel->ville }}">
                <img src="{{ asset('images/' . $hotel->image) }}" alt="{{ $hotel->nom }}">
                <div class="hotel-info">
                    <h2>{{ $hotel->nom }}</h2>
                    <p>{{ $hotel->description }}</p>
                    <p><small>Ville : {{ $hotel->ville }}</small></p>
                    <a href="{{ $hotel->lien }}" class="btn" target="_blank">Voir détails</a>
                </div>
            </div>
            @endforeach
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cityFilter = document.getElementById('cityFilter');
            const hotels = @json($hotels); // Encodage des données PHP en JSON

            cityFilter.addEventListener('input', function() {
                const searchText = this.value.trim().toLowerCase();
                const hotelList = document.getElementById('hotelList');

                hotelList.innerHTML = ''; // Efface la liste actuelle des hôtels

                hotels.forEach(function(hotel) {
                    // Vérifie si le nom de la ville contient le texte recherché
                    if (hotel.ville.toLowerCase().includes(searchText)) {
                        const hotelDiv = document.createElement('div');
                        hotelDiv.classList.add('hotel');
                        hotelDiv.setAttribute('data-ville', hotel.ville);

                        const hotelImage = document.createElement('img');
                        hotelImage.src = '{{ asset('images/') }}/' + hotel.image;
                        hotelImage.alt = hotel.nom; // Utilisation de 'nom' au lieu de 'name'
                        hotelImage.style.width = '100%';
                        hotelImage.style.height = '200px';
                        hotelImage.style.objectFit = 'cover';
                        hotelImage.style.borderRadius = '8px 8px 0 0';

                        const hotelInfo = document.createElement('div');
                        hotelInfo.classList.add('hotel-info');

                        const hotelName = document.createElement('h2');
                        hotelName.textContent = hotel.nom; // Utilisation de 'nom' au lieu de 'name'

                        const hotelDescription = document.createElement('p');
                        hotelDescription.textContent = hotel.description;

                        const hotelVille = document.createElement('p');
                        hotelVille.innerHTML = '<small>Ville : ' + hotel.ville + '</small>';

                        const hotelBtn = document.createElement('a');
                        hotelBtn.href = hotel.lien; // Lien vers le site officiel de l'hôtel
                        hotelBtn.classList.add('btn');
                        hotelBtn.textContent = 'Voir détails';

                        hotelInfo.appendChild(hotelName); // Ajout du nom de l'hôtel
                        hotelInfo.appendChild(hotelDescription);
                        hotelInfo.appendChild(hotelVille);
                        hotelInfo.appendChild(hotelBtn);

                        hotelDiv.appendChild(hotelImage);
                        hotelDiv.appendChild(hotelInfo);

                        hotelList.appendChild(hotelDiv);
                    }
                });
            });

            // Écouteur de clic pour les boutons "Voir détails"
            hotelList.addEventListener('click', function(event) {
                if (event.target.classList.contains('btn')) {
                    const hotelUrl = event.target.getAttribute('href');
                    if (hotelUrl) {
                        window.open(hotelUrl, '_blank'); // Ouvre le lien dans un nouvel onglet
                    }
                }
            });
        });
    </script>
</body>
</html>
