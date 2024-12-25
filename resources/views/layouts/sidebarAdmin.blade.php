<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Cuci Pesanan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Nav Item -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pesanan.tampil') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pesanan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('layanan.tampil') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Layanan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('jenisBarang.tampil') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Jenis Barang</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('jadwalPesanan.tampil') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Jadwal Pesanan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('transaksi.tampil') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('laporanKeuangan.tampil') }}">
            <i class="fas fa-fw fa-table"></i>
            <span>Laporan Keuangan</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>