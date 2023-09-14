<?php $__env->startSection('main'); ?>
    <main>
        <div class="container-xl px-4">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <!-- Basic login form-->
                    <h1 class="text-center fw-bolder text-light mb-3" style="margin-top: 12%; font-size: 30px;" id="loginHeader">SIARIS BPKAD</h1>
                    <div class="card shadow-lg border-0 rounded-lg" style="margin-top: 0%">

                        <!--<div class="card-header justify-content-center" id="cardHeader-color"><h1 class="fw-bolder text-center mb-0" style="color: teal">SIARIS BPKAD</h1></div>-->
                        <div class="card-body">
                            <div class="col-lg-12 col-xl-12 text-center"><img class="img-fluid flex-shrink-1 text-center" src="/admin/assets/img/illustrations/undraw_welcoming_green.svg" width="200px"/></div>
                            <div class="mt-3 mb-3 text-center" id="loginTitle">
                                <h7>Masuk untuk memulai</h7>
                            </div>
                            <?php if(session()->has('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo e(session('success')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <?php if(session()->has('loginError')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e(session('loginError')); ?>

                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php endif; ?>
                            <!-- Login form-->
                            <form action="/login" method="post">
                                <?php echo csrf_field(); ?>
                                <!-- Form Group (email address)-->
                                <div class="input-group mb-3">
                                    <!--<label class="small mb-1" for="email">Username</label>-->
                                    <input class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" type="text" value="<?php echo e(old('email')); ?>" placeholder="Username" autofocus required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <!-- Form Group (password)-->
                                <div class="input-group mb-3">
                                    <!--<label class="small mb-1" for="password">Password</label>-->
                                    <input class="form-control" id="password" name="password" type="password" placeholder="Password" required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Form Group (login box)-->
                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <a class="small" href="#">

                                    </a>
                                    <button type="submit" class="btn btn-success">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\e-arsip.bpkad\resources\views/auth/login.blade.php ENDPATH**/ ?>