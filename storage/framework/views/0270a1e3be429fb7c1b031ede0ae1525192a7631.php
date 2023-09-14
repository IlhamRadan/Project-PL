<?php $__env->startSection('title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <main>
        <header class="page-header page-header-dark bg-green pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-2 pb-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="home"></i></div>
                                Dashboard
                            </h1>
                            <!-- <div class="page-header-subtitle">Panel Admin</div> -->
                        </div>
                        <!-- Logo PEMKAB BOGOR -->
                        <div class="col-auto mt-4">
                            <img src="/admin/assets/img/Kabupaten Bogor.svg" width="115px" style="flex-shrink" id="logoDashboard">
                        </div>
                        <!--
                        <div class="col-12 col-xl-auto mt-4">
                            <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                <span class="input-group-text"><i class="text-green" data-feather="calendar"></i></span>
                                <input class="form-control ps-0 pointer" id="litepickerRangePlugin" placeholder="Select date range..." />
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 p-5">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-xxl-12">
                                    <div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                        <h1 class="text-green">Selamat Datang <?php echo e(Auth::user()->nama); ?> !</h1>
                                        <p class="text-gray-700 mb-0">Di Aplikasi E-Arsip BPKAD Kabupaten Bogor</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="/admin/assets/img/illustrations/undraw_hello_re_3evm.svg" style="flex-shrink"/></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example Colored Cards for Dashboard Demo-->
            <div class="row">
                <div class="col-lg-12 col-xl-4 mb-4">
                    <div class="card text-white h-100" id="cardSPM">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">SPM</div>
                                    <div class="text-lg fw-bold"><?php echo e($spm); ?></div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="mail"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-white stretched-link" href="<?php echo e(route('surat-pm')); ?>">Detail</a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 mb-4">
                    <div class="card bg-teal text-white h-100" id="cardSPP">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">SPP</div>
                                    <div class="text-lg fw-bold"><?php echo e($spp); ?></div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="mail"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-white stretched-link" href="<?php echo e(route('surat-pp')); ?>">Detail</a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-xl-4 mb-4">
                    <div class="card text-white h-100" id="cardSP2D">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="text-white-75 small">SP2D</div>
                                    <div class="text-lg fw-bold"><?php echo e($sp2d); ?></div>
                                </div>
                                <i class="feather-xl text-white-50" data-feather="mail"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="text-white stretched-link" href="<?php echo e(route('surat-p2d')); ?>">Detail</a>
                            <div class="text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-arsip_bpkad\resources\views/pages/admin/dashboard.blade.php ENDPATH**/ ?>