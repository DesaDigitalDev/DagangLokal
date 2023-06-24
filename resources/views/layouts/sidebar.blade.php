{{-- logo --}}
<div class="sidebar-brand">
    <h2>Desa Digital</h2>
</div>

{{-- sidebar --}}
<ul class="sidebar-nav">
    <li class="nav-item {{ request()->segment(2) == "dashboard" ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
            <i class="fa fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <li class="nav-item {{ request()->segment(2) == "barang" ? 'active' : '' }}">
        <a href="{{ url('/producer/barang') }}">
            <i class="fa fa-boxes"></i>
            <span>Barang</span>
        </a>
    </li>

    <li class="nav-item {{ request()->segment(2) == "keuangan" ? 'active' : '' }}">
        <a href="{{ route('showKeuangan') }}">
            <i class="fa fa-coins"></i>
            <span>Keuangan</span>
        </a>
    </li>
</ul>
