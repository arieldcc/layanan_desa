<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fa-solid fa-building-user fa-bounce"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sistem Pelayanan Desa</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $menu=='dashboard'? 'active':'' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item {{ $menu=='riwayat-pengajuan'? 'active':'' }}">
        <a class="nav-link" href="/riwayat-pengajuan">
            <i class="fa-solid fa-boxes-packing"></i>
            <span>Data Ajuan</span></a>
    </li>

    <div class="sidebar-heading">
        Layanan Desa
    </div>

    <li class="nav-item {{ $menu=='pengajuan-pelayanan'? 'active':'' }}">
        <a class="nav-link" href="/pengajuan-pelayanan">
            <i class="fa-solid fa-business-time fa-beat-fade"></i>
            <span>Pengajuan Pelayanan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
