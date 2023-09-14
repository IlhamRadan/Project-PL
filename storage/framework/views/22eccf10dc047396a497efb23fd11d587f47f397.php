<?php $__env->startSection('title'); ?>
    Pengirim Surat
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-light">
                                <div class="page-header-icon text-light"><i data-feather="users"></i></div>
                                Pengirim Surat
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
                            List Pengirim Surat
                            <a class="btn btn-sm btn-success" href="<?php echo e(route('pengirim.create')); ?>" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i data-feather="user-plus"></i> &nbsp;
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
                            
                            <div style="overflow-x:auto;">
                                <table class="table table-striped table-hover table-sm" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th width="10">No.</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>E-Mail</th>
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
    
    <div class="modal fade" id="createModal" role="dialog" aria-labelledby="createModal" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Tambah Data Pengirim Surat</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('pengirim.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="nama">Nama Pengirim *</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Pengirim..." required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat..."></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="telp">Kontak</label>
                                <input type="text" name="telp" class="form-control" placeholder="Masukkan Kontak...">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="col-md-12">
                                <label for="email">E-Mail</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan E-Mail...">
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
    
    <?php $__currentLoopData = $pengirim; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $id = $item->id;
            $nama = $item->nama;
            $alamat = $item->alamat;
            $telp = $item->telp;
            $email = $item->email;
        ?>
        <div class="modal fade" id="updateModal<?php echo e($id); ?>" role="dialog" aria-labelledby="createModal" aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModal<?php echo e($id); ?>">Ubah Data</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo e(route('pengirim.update', $item->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="nama">Nama Pengirim</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo e($nama); ?>" placeholder="Masukkan Nama Pengirim..." required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="alamat">Alamat (Opsional)</label>
                                    <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat..."><?php echo e($alamat); ?></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="telp">Kontak (Opsional)</label>
                                    <input type="text" name="telp" value="<?php echo e($telp); ?>" class="form-control" placeholder="Masukkan Kontak...">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="email">E-Mail (Opsional)</label>
                                    <input type="email" name="email" value="<?php echo e($email); ?>" class="form-control" placeholder="Masukkan E-Mail...">
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
          { data: 'alamat', name: 'alamat' },
          { data: 'telp', name: 'telp' },
          { data: 'email', name: 'email' },
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



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-arsip.bpkad\resources\views/pages/admin/pengirim/index.blade.php ENDPATH**/ ?>