<div class="sidebar-wrapper" id="sidebar">
    <!-- Brand Logo / Identity -->
    <a href="{{ route('dashboard') }}" class="sidebar-brand">
      <i class="bi bi-flower2"></i>
      <span>AGROVALLE</span>
    </a>

    <!-- Navigation Menu -->
    <div class="flex-grow-1 overflow-y-auto">
      <!-- Group: Menu -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Menú</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('dashboard') }}" class="sidebar-menu-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" id="menu-overview" title="Overview">
              <i class="bi bi-grid-fill"></i>
              <span>Dashboard</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Módulos del sistema -->
      <div class="sidebar-menu-section">
        <div class="sidebar-menu-title">Módulos</div>
        <ul class="sidebar-menu-list">
          <li class="sidebar-menu-item">
            <a href="{{ route('insumos.index') }}" class="sidebar-menu-link {{ request()->routeIs('insumos.*') ? 'active' : '' }}" id="menu-insumos" title="Insumos">
              <i class="bi bi-box-seam"></i>
              <span>Insumos</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('proveedores.index') }}" class="sidebar-menu-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}" id="menu-proveedores" title="Proveedores">
              <i class="bi bi-truck"></i>
              <span>Proveedores</span>
            </a>
          </li>
          <li class="sidebar-menu-item">
            <a href="{{ route('empleados.index') }}" class="sidebar-menu-link {{ request()->routeIs('empleados.*') ? 'active' : '' }}" id="menu-empleados" title="Empleados">
              <i class="bi bi-people"></i>
              <span>Empleados</span>
            </a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Sidebar Profile Card (Dynamic Footer) -->
    <div class="sidebar-profile">
      <img src="{{ asset('assets/images/avatar.png') }}" alt="Administrator" class="sidebar-profile-img"
        onerror="this.src='https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=256&auto=format&fit=crop'">
      <div class="sidebar-profile-info">
        <div class="sidebar-profile-name">{{ auth()->user()->name ?? 'Administrador' }}</div>
        <div class="sidebar-profile-email">{{ auth()->user()->email ?? '' }}</div>
      </div>
    </div>
  </div>
