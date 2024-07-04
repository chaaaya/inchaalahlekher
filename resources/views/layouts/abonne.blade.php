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
        <div class="logo">
            <a href="#">Voyage<span> KCS</span></a>
        </div>
        <button class="btn" onclick="location.href='{{ route('abonne.programme_fidelite.index') }}'"><i class="fa fa-star"></i> Programme de fidélité</button>
        <button class="btn" onclick="location.href='{{ route('abonne.services.supplementaires') }}'"><i class="fa fa-gift"></i> Services Supplémentaires</button>
        <button class="btn" onclick="location.href='{{ route('abonne.notifications') }}'"><i class="fa fa-bell"></i> Notifications</button>
    </header>

    <div class="container">
        <aside class="sidebar">
            <nav>
                <ul>
                    <li><a href="{{ route('abonne.reserver.vol') }}" class="{{ request()->routeIs('abonne.reserver.vol') ? 'nav-link active' : 'nav-link' }}">
                        <i class="fa fa-plane"></i> Réserver un vol</a></li>
                    <li><a href="{{ route('abonne.mes.reservations') }}" class="{{ request()->routeIs('abonne.mes.reservations') ? 'nav-link active' : 'nav-link' }}">
                        <i class="fas fa-sync-alt"></i> Mettre à jour mes réservations</a></li>
                    <li><a href="{{ route('abonne.historique.vols') }}" class="{{ request()->routeIs('abonne.historique.vols') ? 'nav-link active' : 'nav-link' }}">
                        <i class="fa fa-history"></i> Historique des vols</a></li>
                    <li><a href="{{ route('abonne.consulter.offres') }}" class="{{ request()->routeIs('abonne.consulter.offres') ? 'nav-link active' : 'nav-link' }}">
                        <i class="fa fa-briefcase"></i> Consulter nos offres</a></li>
                    <li><a href="{{ route('abonne.suivre.vols') }}" class="{{ request()->routeIs('abonne.suivre.vols') ? 'nav-link active' : 'nav-link' }}">
                        <i class="fa fa-binoculars"></i> Suivre les vols</a></li>
                    <li><a href="{{ route('abonne.profil') }}" class="{{ request()->routeIs('abonne.profil') ? 'nav-link active' : 'nav-link' }}">
                        <i class="fa fa-user"></i> Profil</a></li>
                        <li>
                            <a href="{{ route('abonne.checkin.form', ['reservationId' => $reservation->id ?? 0]) }}" class="{{ request()->routeIs('abonne.checkin.form') ? 'nav-link active' : 'nav-link' }}">
                                <i class="fa fa-check"></i> Check-in
                            </a>
                        </li>
                           <li>
                        <form action="{{ route('client.logout') }}" method="POST" class="logout-form" id="logout-form">
                            @csrf
                            <button type="submit" class="nav-link logout-button logout-link">
                                <i class="fas fa-sign-out-alt"></i> Se déconnecter
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="content">
            @yield('content-abonne')
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const logoutLink = document.querySelector('.logout-link');

            if (logoutLink) {
                logoutLink.addEventListener('click', function (event) {
                    event.preventDefault();
                    const confirmation = confirm('Êtes-vous sûr de vouloir vous déconnecter ?');
                    if (confirmation) {
                        document.getElementById('logout-form').submit();
                    }
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.nav-link');
            links.forEach(link => {
                link.addEventListener('click', function () {
                    links.forEach(lnk => lnk.classList.remove('active')); // Enlever la classe 'active' des autres liens
                    this.classList.add('active'); // Ajouter la classe 'active' au lien cliqué
                });
            });
        });
    </script>

    <style>
        .active {
            background-color: #7aaace;
            font-weight: bold;
        }
    </style>
</body>
</html>
