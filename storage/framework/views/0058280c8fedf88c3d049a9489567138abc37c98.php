<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Account)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <div class="sidenav-menu-heading d-sm-none">Account</div>
            <!-- Sidenav Link (Alerts)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                Alerts
                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
            </a>
            <!-- Sidenav Link (Messages)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Messages
                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
            </a>
            <!-- Sidenav Menu Heading (Core)-->
            <div class="sidenav-menu-heading">Menu</div>
            <!-- Sidenav Link (Dashboard)-->
            <a class="nav-link <?php echo e((request()->is('admin/dashboard')) ? 'active' : ''); ?>" href="<?php echo e(route('admin-dashboard')); ?>">
                <div class="nav-link-icon"><i data-feather="home"></i></div>
                Dashboard
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/department*')) ? 'active' : ''); ?>" href="<?php echo e(route('department.index')); ?>">
                <div class="nav-link-icon"><i data-feather="grid"></i></div>
                Sub Bidang
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/sender*')) ? 'active' : ''); ?>" href="<?php echo e(route('sender.index')); ?>">
                <div class="nav-link-icon"><i data-feather="users"></i></div>
                Pengirim Surat
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/letter/create')) ? 'active' : ''); ?>" href="<?php echo e(route('letter.create')); ?>">
                <div class="nav-link-icon"><i data-feather="plus"></i></div>
                Tambah Surat
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/letter/surat-pm')) ? 'active' : ''); ?>" href="<?php echo e(route('surat-pm')); ?>">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SPM
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/letter/surat-pp')) ? 'active' : ''); ?>" href="<?php echo e(route('surat-pp')); ?>">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SPP
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/letter/surat-p2d')) ? 'active' : ''); ?>" href="<?php echo e(route('surat-p2d')); ?>">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                SP2D
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/user*')) ? 'active' : ''); ?>" href="<?php echo e(route('user.index')); ?>">
                <div class="nav-link-icon"><i data-feather="user"></i></div>
                Data Pengguna
            </a>
            <a class="nav-link <?php echo e((request()->is('admin/setting*')) ? 'active' : ''); ?>" href="<?php echo e(route('setting.index')); ?>">
                <div class="nav-link-icon"><i data-feather="settings"></i></div>
                Profil
            </a>
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Masuk sebagai :</div>
            <div class="sidenav-footer-title"><?php echo e(Auth::user()->name); ?></div>
        </div>
    </div>
</nav>
<?php /**PATH C:\laragon\www\surat-app\resources\views/includes/sidebar-admin.blade.php ENDPATH**/ ?>