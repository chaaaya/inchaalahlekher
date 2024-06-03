<div class="logo">
    <a href="#">Voyage<span> KCS</span></a>
</div>
<nav>
    <ul>
       <li><a href="{{ route('respo.admins.index') }}" class="nav-link"><i class="fa fa-users"></i> Gérer les administrateurs</a></li>
       <li><a href="{{ route('respo.reports.index') }}" class="nav-link"><i class="fa fa-bar-chart"></i> Analyser les rapports des administrateurs <span class="badge">5</span></a></li>
       <li><a href="{{ route('respo.communicate.index') }}" class="nav-link"><i class="fa fa-comments"></i> Communiquer avec les parties prenantes</a></li>
       <li><a href="{{ route('respo.continuity-plans.index') }}" class="nav-link"><i class="fa fa-clipboard"></i> Élaborer des plans de continuité</a></li>
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
