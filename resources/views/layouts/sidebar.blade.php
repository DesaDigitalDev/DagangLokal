{{-- logo --}}
<div class="sidebar-brand">
    <h2>Desa Digital</h2>
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
        <a href="{{ route('keuanganAdmin.index') }}">
            <i class="fa fa-coins"></i>
            <span>Keuangan</span>
        </a>
    </li>
</ul>
