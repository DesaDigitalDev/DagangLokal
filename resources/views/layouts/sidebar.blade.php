<div class="ms-3">
    <!-- Logo -->
    <div class="shrink-0 flex items-center py-2">
        <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
        </a>
    </div>
</div>

<ul class="navbar-nav sidebar accordion ms-4 mt-3" id="accordionSidebar">
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('Producer') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <li class="nav-item {{ Request::is('barang') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/producer/barang') }}">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Barang</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('keuangan') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('showKeuangan') }}">
            <i class="fas fa-fw fa-coins"></i>
            <span>Keuangan</span>
        </a>
    </li>
</ul>
