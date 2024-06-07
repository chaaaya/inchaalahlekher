<!-- resources/views/partials/sidebar-admin.blade.php -->
<div class="logo">
    <a href="#">Voyage<span> KCS</span></a>
</div>
<nav>
    <ul>
        <li><a href="{{ route('admin.users.manage-users') }}">Gestion des utilisateurs</a></li>
        <li><a href="{{ route('admin.reservation.manage-reservations') }}" class="nav-link"><i class="fa fa-calendar"></i> Gestion des Réservations</a></li>
        <li><a href="{{ route('admin.offers.index') }}" class="nav-link"><i class="fas fa-gift"></i> Gestion des Offres</a></li>
        <li><a href="{{ route('admin.services.index') }}" class="nav-link"><i class="fa fa-concierge-bell"></i> Gestion des Services</a></li>
        <li><a href="{{ route('admin.vols.index') }}" class="nav-link"><i class="fa fa-plane"></i> Gestion des Vols</a></li>
        <li><a href="{{ route('admin.rapports.index') }}" class="nav-link"><i class="fa fa-file"></i> Gestion des Rapports</a></li>
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
