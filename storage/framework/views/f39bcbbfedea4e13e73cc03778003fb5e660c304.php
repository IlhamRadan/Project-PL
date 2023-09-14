<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/svg+xml" href="/admin/assets/img/Kabupaten Bogor.svg"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cetak Laporan SP2D - E-Arsip BPKAD</title>
  </head>
  <body>

    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-1 justify-content-center">
                    <img src="/admin/assets/img/Kabupaten Bogor.svg" alt="" style="width: 100px">
                </div>
                <div class="col-xl-12 col-11">
                    <h4 class="text-center fw-bolder mb-2" style="font-family: 'Times New Roman', Times, serif;font-size: 20px;font-stretch: ultra-expanded">PEMERINTAH KABUPATEN BOGOR</h4>
                    <h4 class="text-center fw-bolder" style="font-family: 'Times New Roman', Times, serif;font-size: 20px">BADAN PENGELOLAAN KEUANGAN DAN ASET DAERAH</h4>
                    <h6 class="text-center fw-bold" style="font-family: 'Times New Roman', Times, serif; font-size: 13px">Jl. Aman No.1, Tengah, Kec. Cibinong, Kabupaten Bogor, Jawa Barat 16914</h6>
                    <h6 class="text-center fw-bold" style="font-family: 'Times New Roman', Times, serif; font-size: 10px">Telp. (021) 8763710, Web : bpkad.bogorkab.go.id</h6>
                    <!-- <h6 class="text-center" style="font-family: 'Times New Roman', Times, serif">Laporan Arsip Surat
                        Permintaan Pembayaran</h6> -->
                </div>
                <hr>
                <hr>
                <div>
                    <h6 class="fw-bold text-center" style="font-family: 'Times New Roman', Times, serif">Laporan Arsip Surat
                        Perintah Pencairan Dana</h6>
                    <table class="table">
                        <thead>
                            <th style="font-family: 'Times New Roman', Times, serif">No.</th>
                            <th style="font-family: 'Times New Roman', Times, serif">No. Surat</th>
                            <th style="font-family: 'Times New Roman', Times, serif">Pengirim</th>
                            <th style="text-align: center; font-family: 'Times New Roman', Times, serif">Tanggal</th>
                            <th style="text-align: center; font-family: 'Times New Roman', Times, serif">Diterima</th>
                        </thead>
                        <tbody>
                            <?php
                                $no=1;
                            ?>
                            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td style="font-family: 'Times New Roman', Times, serif"><?php echo e($no++); ?></td>
                                <td style="font-family: 'Times New Roman', Times, serif"><?php echo e($surat->no_surat); ?></td>
                                <td style="font-family: 'Times New Roman', Times, serif"><?php echo e($surat->pengirim->nama); ?></td>
                                <td style="text-align: center; font-family: 'Times New Roman', Times, serif"><?php echo e(date('d-m-Y', strtotime($surat->tgl_surat))); ?>

                                </td>
                                <td style="text-align: center; font-family: 'Times New Roman', Times, serif"><?php echo e(date('d-m-Y', strtotime($surat->tgl_diterima))); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
<?php /**PATH C:\laragon\www\e-arsip_bpkad\resources\views/pages/admin/surat/print-sp2d.blade.php ENDPATH**/ ?>