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
        <button class="btn" onclick="location.href='{{ route('programme.fidelite') }}'"><i class="fa fa-bell"></i> Programme de fidélité</button>
        <button class="btn" onclick="location.href='{{ route('nonabonne.services_supplementaires') }}'"><i class="fa fa-gift"></i> Services Supplémentaires</button>
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
            </section>
        </main>
    </div>
</body>
</html>
