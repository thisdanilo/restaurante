<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Restaurante</div>
    </a>


    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ Ekko::areActiveRoutes(['tenant*'], 'active') }}">
        <a class="nav-link" href="{{ route('tenant.index') }}">
            <i class="fas fa-store-alt"></i>
            <span>Lanchonetes</span>
        </a>
    </li>

</ul>
