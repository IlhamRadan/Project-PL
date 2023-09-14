<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Core)-->
            <div class="sidenav-menu-heading">Menu</div>
            <!-- Sidenav Link (Dashboard)-->
            <a class="nav-link <?php echo e((request()->is('admin/dashboard')) ? 'active' : ''); ?>" href="<?php echo e(route('admin-dashboard')); ?>">
                <div class="nav-link-icon"><i data-feather="home"></i></div>
                Dashboard
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/bidang*')) ? 'active' : ''); ?>" href="<?php echo e(route('bidang.index')); ?>">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Bidang/SKPD
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/pengirim*')) ? 'active' : ''); ?>" href="<?php echo e(route('pengirim.index')); ?>">
                <div class="nav-link-icon"><i data-feather="users"></i></div>
                Pengirim Surat
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/surat/create')) ? 'active' : ''); ?>" href="<?php echo e(route('surat.create')); ?>">
                <div class="nav-link-icon"><i data-feather="plus"></i></div>
                Tambah Surat
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/surat/surat-pm')) ? 'active' : ''); ?>" href="<?php echo e(route('surat-pm')); ?>">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SPM
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/surat/surat-pp')) ? 'active' : ''); ?>" href="<?php echo e(route('surat-pp')); ?>">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SPP
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/surat/surat-p2d')) ? 'active' : ''); ?>" href="<?php echo e(route('surat-p2d')); ?>">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SP2D
            </a>
            <?php if(auth()->user()->level == "superAdmin"): ?>
            <a class="nav-link <?php echo e((request()->is('user*')) ? 'active' : ''); ?>" href="<?php echo e(route('user.index')); ?>">
                <div class="nav-link-icon"><i data-feather="user"></i></div>
                Daftar Pengguna
            </a>
            <?php endif; ?>
            <a class="nav-link <?php echo e((request()->is('admin/setting*')) ? 'active' : ''); ?>" href="<?php echo e(route('setting.index')); ?>">
                <div class="nav-link-icon"><i data-feather="settings"></i></div>
               Pengaturan Akun
            </a>
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Masuk sebagai :</div>
            <div class="sidenav-footer-title"><?php echo e(Auth::user()->nama); ?></div>
        </div>
    </div>
</nav>
<?php /**PATH C:\xampp\htdocs\e-arsip.bpkad\resources\views/includes/sidebar-admin.blade.php ENDPATH**/ ?>