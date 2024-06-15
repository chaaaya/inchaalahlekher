<!-- resources/views/partials/sidebar-admin.blade.php -->
<div class="logo">
    <a href="#">Voyage<span> KCS</span></a>
</div>
<nav>
    <ul>
        <li><a href="{{ route('admin.users.manage-users') }}" class="{{ request()->routeIs('admin.users.manage-users') ? 'nav-link active' : 'nav-link' }}">
            <i class="fa fa-users"></i> Gestion des Utilisateurs</a></li>
       
            <li><a href="{{ route('admin.reservation.manage-reservations') }}"  class="{{ request()->routeIs('admin.reservation.manage-reservations') ? 'nav-link active' : 'nav-link' }}">
            <i class="fa fa-calendar"></i> Gestion des Réservations</a></li>
        
            <li><a href="{{ route('admin.offers.index') }}" class="{{ request()->routeIs('admin.offers.index') ? 'nav-link active' : 'nav-link' }}">
            <i class="fas fa-gift"></i> Gestion des Offres</a></li>
       
            <li><a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.index') ? 'nav-link active' : 'nav-link' }}">
            <i class="fa fa-concierge-bell"></i> Gestion des Services</a></li>
        
            <li><a href="{{ route('admin.vols.index') }}" class="{{ request()->routeIs('admin.vols.index') ? 'nav-link active' : 'nav-link' }}">
            <i class="fa fa-plane"></i> Gestion des Vols</a></li>
        
            <li><a href="{{ route('admin.rapports.index') }}" class="{{ request()->routeIs('admin.rapports.index') ? 'nav-link active' : 'nav-link' }}">
            <i class="fa fa-file"></i> Gestion des Rapports</a></li>
       
            <li>
            <form action="{{ route('admin.logout') }}" method="POST" class="logout-form"id="logout-form">
                @csrf
                <button type="submit" class="nav-link logout-button logout-link" >
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
});

</script>
<script>
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
    