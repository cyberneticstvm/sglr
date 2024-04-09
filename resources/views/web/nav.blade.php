<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">MENU ITEMS</li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('form.survey') }}">
                <i class="menu-icon mdi mdi-floor-plan"></i>
                <span class="menu-title">Survey</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.register') }}">
                <i class="menu-icon mdi mdi-account-multiple"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
    </ul>
</nav>