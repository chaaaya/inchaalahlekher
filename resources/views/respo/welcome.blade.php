<!-- resources/views/respo/welcome-respo.blade.php -->
@extends('layouts.admin')

@section('title', 'Bienvenue, Responsable')

@section('content')
    <div class="logo">
        <a href="#">Voyage<span> KCS</span></a>
    </div>
    <nav>
        <ul>
            <li>
                <a href="{{ route('respo.admins.index') }}" class="{{ request()->routeIs('respo.admins.index') ? 'nav-link active' : 'nav-link' }}">
                    <i class="fa fa-users"></i> Gérer les administrateurs
                </a>
            </li>
            <li>
                <a href="{{ route('respo.reports.index') }}" class="{{ request()->routeIs('respo.reports.index') ? 'nav-link active' : 'nav-link' }}">
                    <i class="fa fa-bar-chart"></i> Analyser les rapports des administrateurs
                </a>
            </li>
            <li>
                <a href="{{ route('respo.communicate.index') }}" class="{{ request()->routeIs('respo.communicate.index') ? 'nav-link active' : 'nav-link' }}">
                    <i class="fa fa-comments"></i> Communiquer avec les parties prenantes
                </a>
            </li>
            <li>
                <a href="{{ route('respo.continuity-plans.index') }}" class="{{ request()->routeIs('respo.continuity-plans.index') ? 'nav-link active' : 'nav-link' }}">
                    <i class="fa fa-clipboard"></i> Élaborer des plans de continuité
                </a>
            </li>
            <li>
                <form action="{{ route('respo.logout') }}" method="POST" class="logout-form" id="logout-form">
                    @csrf
                    <button type="submit" class="nav-link logout-button logout-link">
                        <i class="fas fa-sign-out-alt"></i> Se déconnecter
                    </button>
                </form>
            </li>
        </ul>
    </nav>

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
@endsection
