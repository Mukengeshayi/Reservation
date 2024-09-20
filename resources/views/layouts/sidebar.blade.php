<nav class="sidebar bg-primary sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if(auth()->user()->role =='admin')
        <li class="nav-item">
            <a class="nav-link" href="#">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Tableau de bord</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->role =='admin')
        <li class="nav-item">
            <a class="nav-link" href="{{route('salles.index')}}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Salle</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->role =='demandeur')
            <li class="nav-item">
                <a class="nav-link" href="{{route('reservations.index')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Reservation</span>
                </a>
            </li>
        @endif
        @if(auth()->user()->role =='admin')
        </li><li class="nav-item">
            <a class="nav-link" href="{{route('employés.index')}}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Employés</span>
            </a>
        </li>
        @endif
    </ul>
</nav>
