<?php $__env->startSection('title'); ?>
    Bidang/SKPD
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-light">
                                <div class="page-header-icon text-light"><i data-feather="grid"></i></div>
                                Bidang/SKPD
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
                            List Bidang/SKPD
                            <a class="btn btn-sm btn-green" href="<?php echo e(route('bidang.create')); ?>" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i data-feather="plus"></i> &nbsp;
                                Tambah Data
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
                            
                            <table class="table table-striped table-hover table-sm" id="crudTable">
                                <thead>
                                    <tr>
                                        <th width="10">No.</th>
                                        <th>Nama Bidang/SKPD</th>
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
    </main>
    
    <div class="modal fade" id="createModal" role="dialog" aria-labelledby="createModal" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Tambah Data Bidang/SKPD</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('bidang.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="post_id">Nama Bidang/SKPD</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Bidang/SKPD..." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-success" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <?php $__currentLoopData = $bidang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $id = $item->id;
            $nama = $item->nama;
        ?>
        <div class="modal fade" id="updateModal<?php echo e($id); ?>" role="dialog" aria-labelledby="createModal" aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModal<?php echo e($id); ?>">Ubah Data</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('bidang.update', $item->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="post_id">Nama Bidang/Sub Bidang</label>
                                    <input type="text" name="nama" value="<?php echo e($nama); ?>" class="form-control" placeholder="Masukkan Nama Bidang/Sub Bidang.." required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-success" type="submit">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
          { data: 'nama', name: 'nama' },
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



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\e-arsip.bpkad\resources\views/pages/admin/bidang/index.blade.php ENDPATH**/ ?>