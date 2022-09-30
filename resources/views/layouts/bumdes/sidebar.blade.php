<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('bumdes-home') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ URL::asset('assets/img/logo.png') }}" width="45px"></img>
        </div>
        <div class="sidebar-brand-text mx-3">Pemerintah Desa Wonoharjo</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-1">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('bumdes-home') }}">
            <i class="fas fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('inventory') }}">
            <i class="fas fa-file-alt"></i>
            <span>Inventaris</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('reservation') }}">
            <i class="fas fa-user"></i>
            <span>Penyewaan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('rental') }}">
            <i class="far fa-newspaper"></i>
            <span>Data Penyewaan</span></a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="/admin/monograph">
            <i class="fas fa-file-alt"></i>
            <span>Data Keuangan</span></a>
    </li> --}}

    @if (auth()->user()->role == 0)
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Akun
        </div>
        <!-- Nav Item - Account -->
        <li class="nav-item">
            <a class="nav-link" href="/admin/account">
                <i class="fas fa-user-circle"></i>
                <span>Akun</span></a>
        </li>
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>
        <!-- Nav Item - Account -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('beranda') }}">
                <i class="fas fa-user-circle"></i>
                <span>Admin Website Desa</span></a>
        </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
