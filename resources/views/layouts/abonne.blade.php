<!-- resources/views/layouts/abonne.blade.php -->

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
        <button class="btn" onclick="location.href='{{ route('s_abonner') }}'"><i class="fa fa-bell"></i> S'abonner</button>
        <button class="btn" onclick="location.href='{{ route('services.supplementaires') }}'"><i class="fa fa-gift"></i> Services Supplémentaires</button>
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
                    <li>
                        <form method="POST" action="{{ route('client.logout') }}">
                            @csrf
                            <button type="submit" class="btn" ><i class="fas fa-sign-out-alt"></i> Se déconnecter</button>
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
