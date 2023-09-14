@extends('layouts.auth')

@section('main')
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
                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            @if (session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <!-- Login form-->
                            <form action="/login" method="post">
                                @csrf
                                <!-- Form Group (email address)-->
                                <div class="input-group mb-3">
                                    <!--<label class="small mb-1" for="email">Username</label>-->
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="text" value="{{ old('email') }}" placeholder="Username" autofocus required/>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                          <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
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
@endsection
