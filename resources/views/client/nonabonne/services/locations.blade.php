<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Découvrez Nos Locations de Voiture</title>
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
        .car-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .car {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s;
        }
        .car:hover {
            transform: translateY(-5px);
        }
        .car img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
        .car-info {
            padding: 20px;
        }
        .car-info h2 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 10px;
        }
        .car-info p {
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
            <h1>Découvrez Nos Locations de Voiture</h1>
            <p>Trouvez la voiture parfaite pour votre prochain voyage.</p>
        </header>

        <section class="filters">
            <label for="cityFilter" class="form-label">Rechercher par ville :</label>
            <input type="text" id="cityFilter" class="form-control" placeholder="Entrez le nom de la ville...">
        </section>

        <section id="carList" class="car-list">
            <!-- Les locations de voiture seront affichées ici -->
            @foreach ($locations as $location)
            <div class="car" data-ville="{{ $location->ville }}">
                <img src="{{ asset('images/' . $location->image) }}" alt="{{ $location->nom }}">
                <div class="car-info">
                    <h2>{{ $location->nom }}</h2>
                    <p>{{ $location->description }}</p>
                    <p><small>Ville : {{ $location->ville }}</small></p>
                    <a href="{{ $location->lien }}" class="btn" target="_blank">Voir détails</a>
                </div>
            </div>
            @endforeach
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cityFilter = document.getElementById('cityFilter');
            const locations = @json($locations); // Encodage des données PHP en JSON

            cityFilter.addEventListener('input', function() {
                const searchText = this.value.trim().toLowerCase();
                const carList = document.getElementById('carList');

                carList.innerHTML = ''; // Efface la liste actuelle des locations de voiture

                locations.forEach(function(location) {
                    // Vérifie si le nom de la ville contient le texte recherché
                    if (location.ville.toLowerCase().includes(searchText)) {
                        const carDiv = document.createElement('div');
                        carDiv.classList.add('car');
                        carDiv.setAttribute('data-ville', location.ville);

                        const carImage = document.createElement('img');
                        carImage.src = '{{ asset('images/') }}/' + location.image;
                        carImage.alt = location.nom;
                        carImage.style.width = '100%';
                        carImage.style.height = '200px';
                        carImage.style.objectFit = 'cover';
                        carImage.style.borderRadius = '8px 8px 0 0';

                        const carInfo = document.createElement('div');
                        carInfo.classList.add('car-info');

                        const carName = document.createElement('h2');
                        carName.textContent = location.nom;

                        const carDescription = document.createElement('p');
                        carDescription.textContent = location.description;

                        const carVille = document.createElement('p');
                        carVille.innerHTML = '<small>Ville : ' + location.ville + '</small>';

                        const carBtn = document.createElement('a');
                        carBtn.href = location.lien;
                        carBtn.classList.add('btn');
                        carBtn.textContent = 'Voir détails';

                        carInfo.appendChild(carName);
                        carInfo.appendChild(carDescription);
                        carInfo.appendChild(carVille);
                        carInfo.appendChild(carBtn);

                        carDiv.appendChild(carImage);
                        carDiv.appendChild(carInfo);

                        carList.appendChild(carDiv);
                    }
                });
            });

            // Écouteur de clic pour les boutons "Voir détails"
            carList.addEventListener('click', function(event) {
                if (event.target.classList.contains('btn')) {
                    const carUrl = event.target.getAttribute('href');
                    if (carUrl) {
                        window.open(carUrl, '_blank'); // Ouvre le lien dans un nouvel onglet
                    }
                }
            });
        });
    </script>
</body>
</html>
