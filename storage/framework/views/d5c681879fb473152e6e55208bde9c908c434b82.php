<?php $__env->startSection('title'); ?>
    SP2D
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-light">
                                <div class="page-header-icon text-light"><i data-feather="mail"></i></div>
                                Surat Perintah Pencairan Dana
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header-actions mb-4">
                        <div class="card-header text-green">
                            List SP2D
                            <a class="btn btn-sm btn-success" href="<?php echo e(route('print-surat-p2d')); ?>" target="_blank">
                                <i data-feather="printer"></i> &nbsp;
                                Cetak Laporan
                            </a>
                        </div>
                        <div class="card-body">
                            
                            <?php if(session()->has('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo e(session('success')); ?>

                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                            
                            <div style="overflow-x:auto;">
                                <table class="table table-striped table-hover table-sm" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th width="10">No.</th>
                                            <th>No. Surat</th>
                                            <th>Tanggal</th>
                                            <th>Sub Bidang</th>
                                            <th>Pengirim</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('addon-script'); ?>
  <script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url: '<?php echo url()->current(); ?>',
        },
        columns: [
          {
            "data": 'DT_RowIndex',
            orderable: false,
            searchable: false
          },
          { data: 'no_surat', name: 'no_surat' },
          { data: 'tgl_surat', name: 'tgl_surat' },
          { data: 'bidang.nama', name: 'bidang.nama' },
          { data: 'pengirim.nama', name: 'pengirim.nama' },
          {
            data: 'action',
            name: 'action',
            orderable: false,
            searcable: false,
            width: '15%'
          },
        ]
    });
  </script>
<?php $__env->stopPush(); ?>



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-arsip_bpkad\resources\views/pages/admin/surat/sp2d.blade.php ENDPATH**/ ?>