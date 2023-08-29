{{-- logo --}}
<div class="sidebar-brand">
    <a href="{{ route('home') }}" style="cursor: pointer">
        <h2>Dagang Lokal</h2>
    </a>
</div>

{{-- sidebar --}}
<ul class="sidebar-nav ">
    <li class="nav-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboardAdmin') }}">
            <i class="fa fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <li class="nav-item show {{ request()->segment(2) == 'barangAdmin' ? 'active' : '' }}" data-bs-toggle="collapse"
        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <a href="#">
            <i class="fa fa-boxes"></i>
            <span>Barang</span>
        </a>
        <div id="collapseOne" class="collapse">
            <a href="{{ route('barangAdminApproval') }}">
                <span>Approval</span>
            </a>
        </div>
        <div id="collapseOne" class="collapse">
            <a href="{{ route('barangAdminOnProcess') }}">
                <span>On Proses</span>
            </a>
        </div>
        <div id="collapseOne" class="collapse">
            <a href="{{ route('barangAdminDone') }}">
                <span>Selesai</span>
            </a>
        </div>
    </li>
    <li class="nav-item {{ request()->segment(2) == 'keuanganAdmin' ? 'active' : '' }}">
        <a href="{{ route('keuanganAdmin.index') }}">
            <i class="fa fa-coins"></i>
            <span>Keuangan</span>
        </a>
    </li>
</ul>
