<a href="{{ route('dashboard') }}"
   class="sidebar-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
    <i class="bi bi-grid-fill"></i>
    <span>Dashboard</span>
</a>

<a href="{{ route('tablas') }}"
   class="sidebar-menu-link {{ request()->routeIs('tablas') ? 'active' : '' }}">
    <i class="bi bi-table"></i>
    <span>Tablas</span>
</a>
