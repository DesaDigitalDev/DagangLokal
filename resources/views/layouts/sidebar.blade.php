<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon">
                <x-application-logo/>
            </div>
            <div class="sidebar-brand-text mx-3">Dagang Lokal </div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item {{ Request::is('dashboard') ? 'active': '' }}">
            <a class="nav-link" href="dashboard">
                <i class="fas fa-fw fa-home"></i>
                <span>Beranda</span></a>
        </li>

        <li class="nav-item {{ Request::is('barang') ? 'active': '' }}">
            <a class="nav-link" href="barang" >
                <i class="fas fa-fw fa-boxes"></i>
                <span>Barang</span>
            </a>
        </li>

        <li class="nav-item {{ Request::is('keuangan') ? 'active' : '' }}">
            <a class="nav-link" href="keuangan" >
                <i class="fas fa-fw fa-coins"></i>
                <span>Keuangan</span>
            </a>
        </li>

</ul>