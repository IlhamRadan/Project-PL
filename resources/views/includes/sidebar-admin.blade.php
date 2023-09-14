<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Core)-->
            <div class="sidenav-menu-heading">Menu</div>
            <!-- Sidenav Link (Dashboard)-->
            <a class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" href="{{ route('admin-dashboard') }}">
                <div class="nav-link-icon"><i data-feather="home"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ (request()->is('admin/bidang*')) ? 'active' : '' }}" href="{{ route('bidang.index') }}">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Bidang/SKPD
            </a>
            <a class="nav-link {{ (request()->is('admin/pengirim*')) ? 'active' : '' }}" href="{{ route('pengirim.index') }}">
                <div class="nav-link-icon"><i data-feather="users"></i></div>
                Pengirim Surat
            </a>
            <a class="nav-link {{ (request()->is('admin/surat/create')) ? 'active' : '' }}" href="{{ route('surat.create') }}">
                <div class="nav-link-icon"><i data-feather="plus"></i></div>
                Tambah Surat
            </a>
            <a class="nav-link {{ (request()->is('admin/surat/surat-pm')) ? 'active' : '' }}" href="{{ route('surat-pm') }}">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SPM
            </a>
            <a class="nav-link {{ (request()->is('admin/surat/surat-pp')) ? 'active' : '' }}" href="{{ route('surat-pp') }}">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SPP
            </a>
            <a class="nav-link {{ (request()->is('admin/surat/surat-p2d')) ? 'active' : '' }}" href="{{ route('surat-p2d') }}">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SP2D
            </a>
            @if (auth()->user()->level == "superAdmin")
            <a class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}" href="{{ route('user.index') }}">
                <div class="nav-link-icon"><i data-feather="user"></i></div>
                Daftar Pengguna
            </a>
            @endif
            <a class="nav-link {{ (request()->is('admin/setting*')) ? 'active' : '' }}" href="{{ route('setting.index') }}">
                <div class="nav-link-icon"><i data-feather="settings"></i></div>
               Pengaturan Akun
            </a>
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Masuk sebagai :</div>
            <div class="sidenav-footer-title">{{ Auth::user()->nama }}</div>
        </div>
    </div>
</nav>
