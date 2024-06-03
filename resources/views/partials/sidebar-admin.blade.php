<div class="logo">
    <a href="#">Voyage<span> KCS</span></a>
</div>
<nav>
    <ul>
        <li><a href="{{ route('admin.users.index') }}" class="nav-link"><i class="fa fa-users"></i> Gestion des utilisateurs</a></li>
        <li><a href="{{ route('admin.reservation.manage-reservations') }}" class="nav-link"><i class="fa fa-calendar"></i> Gestion des Réservations</a></li>
        <!-- Autres liens pour d'autres fonctionnalités d'administration -->
        
        <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.offers.index') }}">
        <i class="fas fa-gift"></i>
        <span>Gestion des Offres</span>
    </a>
</li>   <li><a href="{{ route('admin.service.manage-services') }}" class="nav-link"><i class="fa fa-concierge-bell"></i> Gestion des services supplémentaires</a></li>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.vols.index') }}">Gestion des Vols</a>
    </li>
    <!-- Autres liens de navigation -->
</ul>
 <li><a href="{{ route('manage-rapports') }}" class="nav-link"><i class="fa fa-file"></i> Gestion des Rapports</a></li>
        
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
