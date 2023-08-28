{{-- logo --}}
<div class="sidebar-brand">
    <a href="{{ route('home') }}" style="cursor: pointer"><h2>Dagang Lokal</h2></a>
</div>

{{-- sidebar --}}
<ul class="sidebar-nav">
    <li class="nav-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboardAdmin') }}">
            <i class="fa fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <li class="nav-item {{ request()->segment(2) == 'barang' ? 'active' : '' }}">
        <a href="{{ route('barangAdmin.index') }}">
            <i class="fa fa-boxes"></i>
            <span>Barang</span>
        </a>
    </li>

    <li class="nav-item {{ request()->segment(2) == 'keuangan' ? 'active' : '' }}">
        <a href="{{ route('keuangan.index') }}">
            <i class="fa fa-coins"></i>
            <span>Keuangan</span>
        </a>
    </li>
</ul>
