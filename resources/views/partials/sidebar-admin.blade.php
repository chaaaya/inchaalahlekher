<!-- resources/views/partials/sidebar-admin.blade.php -->
<div class="logo">
    <a href="#">Voyage<span> KCS</span></a>
</div>
<nav>
    <ul>
        <li><a href="{{ route('manage-users') }}" class="nav-link"><i class="fa fa-users"></i> Gestion des utilisateurs</a></li>
        <li><a href="{{ route('manage-reservations') }}" class="nav-link"><i class="fa fa-bookmark"></i> Gestion des réservations</a></li>
        <li><a href="{{ route('manage-offers') }}" class="nav-link"><i class="fa fa-gift"></i> Gestion des Offres</a></li>
        <li><a href="{{ route('manage-services') }}" class="nav-link"><i class="fa fa-concierge-bell"></i> Gestion des services supplémentaires</a></li>
        <li><a href="{{ route('manage-vols') }}" class="nav-link"><i class="fa fa-plane"></i> Gestion des Vols</a></li>
        <li><a href="{{ route('manage-rapports') }}" class="nav-link"><i class="fa fa-file-text"></i> Génération des Rapports</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="nav-link logout-button" style="background: none; border: none;">
                    <i class="fas fa-sign-out-alt"></i> Se déconnecter
                </button>
            </form>
        </li>
    </ul>
</nav>