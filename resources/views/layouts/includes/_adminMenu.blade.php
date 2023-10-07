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

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ $menu=='data_penduduk'? 'active':'' }}">
        <a class="nav-link" href="/data_penduduk">
            <i class="fa-solid fa-building-user"></i>
            <span>Data Penduduk</span></a>
    </li>
    <li class="nav-item {{ $menu=='data-layanan'? 'active':'' }}">
        <a class="nav-link" href="/data-layanan">
            <i class="fas fa-concierge-bell"></i>
            <span>Data Layanan</span></a>
    </li>
    <li class="nav-item {{ $menu=='data-syarat'? 'active':'' }}">
        <a class="nav-link" href="/data-syarat">
            <i class="fas fa-solid fa-list-ol"></i>
            <span>Data Persyaratan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Layanan
    </div>

    <li class="nav-item {{ $menu=='syarat-pelayanan'? 'active':'' }}">
        <a class="nav-link" href="/syarat-pelayanan">
            {{-- <i class="fas fa-solid fa-list-ol"></i> --}}
            <i class="fas fa-solid fa-folder-plus"></i>
            <span>Pelayanan Desa</span></a>
    </li>

    <li class="nav-item {{ $menu=='data-pengajuan'? 'active':'' }}">
        <a class="nav-link" href="/data-pengajuan">
            <i class="fa-solid fa-boxes-packing"></i>
            <span>Data Pengajuan Pelayanan Desa</span></a>
    </li>

    <div class="sidebar-heading">
        Layanan Desa
    </div>

    <li class="nav-item {{ $menu=='pengajuan-pelayanan'? 'active':'' }}">
        <a class="nav-link" href="/pengajuan-pelayanan">
            <i class="fa-solid fa-business-time fa-beat-fade"></i>
            <span>Pengajuan Pelayanan Desa</span></a>
    </li>


    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Tools
    </div>

    <li class="nav-item {{ $menu=='data-user'? 'active':'' }}">
        <a class="nav-link" href="/data-user">
            {{-- <i class="fas fa-solid fa-server"></i> --}}
            <i class="fas fa-solid fa-users"></i>
            <span>Data User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
