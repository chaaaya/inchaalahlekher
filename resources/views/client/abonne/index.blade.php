<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Abonné</title>
    <link rel="stylesheet" href="{{ asset('css/abonne.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <button class="btn" onclick="location.href='{{ route('services.supplementaires') }}'"><i class="fa fa-gift"></i> Services Supplémentaires</button>
        <button class="btn" onclick="loadSubscriptionForm()"><i class="fa fa-user-plus"></i> S'abonner</button>
    </header>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <a href="#">Voyage<span> KCS</span></a>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('reserver.vol') }}" class="btn"><i class="fa fa-plane"></i> Réserver un vol</a></li>
                    <li><a href="{{ route('historique.vols') }}" class="btn"><i class="fa fa-history"></i> Historique des vols</a></li>
                    <li><a href="{{ route('consulter.offres') }}" class="btn"><i class="fa fa-briefcase"></i> Consulter nos offres</a></li>
                    <li><a href="{{ route('suivre.vols') }}" class="btn"><i class="fa fa-binoculars"></i> Suivre les vols</a></li>
                    <li><a href="#" id="logout-btn"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a></li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <section id="main-content">
                <!-- Contenu spécifique à la page d'abonné à charger ici -->
                <h1>Bienvenue, Abonné!</h1>
                <p>Contenu spécifique à la page d'abonné.</p>
                
                <!-- Conteneur pour le formulaire d'abonnement -->
                <div id="subscription-form-container">
                    <!-- Le formulaire sera chargé ici -->
                </div>
            </section>
        </main>
    </div>

    <!-- Script JavaScript pour charger le formulaire -->
    <script>
        function loadSubscriptionForm() {
            // Exemple d'utilisation de fetch API pour charger le contenu
            fetch('{{ route("s_abonner") }}')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('subscription-form-container').innerHTML = html;
                })
                .catch(error => console.error('Erreur lors du chargement du formulaire :', error));
        }
    </script>
</body>
</html>
