<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard.index') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Restaurantes</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ Ekko::areActiveRoutes(['dashboard.index'], 'active') }}">
        <a class="nav-link" href="{{ route('dashboard.index') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    @can('tenant_show')

        @if (auth()->user()->role->id == 1)
            <li class="nav-item {{ Ekko::areActiveRoutes(['tenant*'], 'active') }}">
                <a class="nav-link" href="{{ route('tenant.index') }}">
                    <i class="fas fa-store-alt"></i>
                    <span>Restaurantes</span>
                </a>
            </li>
        @else
            <li class="nav-item {{ Ekko::areActiveRoutes(['tenant*'], 'active') }}">
                <a class="nav-link" href="{{ route('tenant.index') }}">
                    <i class="fas fa-store-alt"></i>
                    <span>Restaurante</span>
                </a>
            </li>
        @endif

    @endcan

    @can('category_show')
        <li class="nav-item {{ Ekko::areActiveRoutes(['category*'], 'active') }}">
            <a class="nav-link" href="{{ route('category.index') }}">
                <i class="fas fa-folder"></i>
                <span>Categorias</span>
            </a>
        </li>
    @endcan

    @can('product_show')
        <li class="nav-item {{ Ekko::areActiveRoutes(['product*'], 'active') }}">
            <a class="nav-link" href="{{ route('product.index') }}">
                <i class="fas fa-hamburger"></i>
                <span>Produtos</span>
            </a>
        </li>
    @endcan

    @can('role_show')
        <li class="nav-item {{ Ekko::areActiveRoutes(['role*'], 'active') }}">
            <a class="nav-link" href="{{ route('role.index') }}">
                <i class="fas fa-lock"></i>
                <span>Funções</span>
            </a>
        </li>
    @endcan

    @can('user_show')
        <li class="nav-item {{ Ekko::areActiveRoutes(['user*'], 'active') }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-users"></i>
                <span>Usuários</span>
            </a>
        </li>
    @endcan

</ul>
