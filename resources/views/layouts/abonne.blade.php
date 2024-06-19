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
        <button class="btn" onclick="location.href='{{ route('abonne.services.supplementaires') }}'"><i class="fa fa-gift"></i> Services Supplémentaires</button>
        <button class="btn" onclick="location.href='{{ route('abonne.sabonner') }}'"><i class="fa fa-user-plus"></i> S'abonner</button>
    </header>
    <div class="container">
        <aside class="sidebar">
            <div class="logo">
                <a href="#">Voyage<span> KCS</span></a>
            </div>
            <nav>
                <ul>
                    <li><a href="{{ route('abonne.reserver.vol') }}" class="btn"><i class="fa fa-plane"></i> Réserver un vol</a></li>
                  
                   <li> <a href="{{ route('mes.reservations') }}" class="btn btn-primary">
                        Mettre à jour mes réservations
                    </a> </li>   
                    <li><a href="{{ route('abonne.historique.vols') }}" class="btn"><i class="fa fa-history"></i> Historique des vols</a></li>
                    <li><a href="{{ route('abonne.consulter.offres') }}" class="btn"><i class="fa fa-briefcase"></i> Consulter nos offres</a></li>
                    <li><a href="{{ route('abonne.suivre.vols') }}" class="btn"><i class="fa fa-binoculars"></i> Suivre les vols</a></li>
                    <li>
                        <form method="POST" action="{{ route('client.logout') }}">
                            @csrf
                            <button type="submit" class="btn"><i class="fas fa-sign-out-alt"></i> Se déconnecter</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>
