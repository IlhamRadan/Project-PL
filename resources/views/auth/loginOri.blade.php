@extends('layouts.auth')

@section('main')
    <main>
        <div class="container-lg px-15" style="padding-left: 100px">
            <div class="flex-row" style="padding-left: 300px">
                <!-- login form-->
                <div class="card shadow-lg border-0 rounded-lg mt-5 mt-10" id="loginCard">
                    <div class="card-header justify-content-center" style="text-align: center">
                        <h3 class="fw-bold my-1" style="font-family: Verdana, Geneva, Tahoma, sans-serif">E-Arsip Surat BPKAD
                            Kabupaten Bogor</h3>
                    </div>
                    <div class="card-body" id="loginCard">
                        <div class="row justify-content-center">
                            <!-- <div class="col-lg-12 col-xl-6 justify-content-center text-center align-text-bottom" style="top: 50%; bottom: 50%;">
                                <div class="center" >
                                    <img class="pl-lg-5 text-center" src="/admin/assets/img/Kabupaten Bogor.svg" width="80%"
                                        style="">
                                </div>
                            </div> -->
                            <div class="col-lg-12 col-xl-12 justify-content-center">
                                <div class="mb-3 pt-1 text-center fw-bolder" id="loginTitle">
                                    <h1>Login</h1>
                                </div>
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session()->has('loginError'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('loginError') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <!-- Login form-->
                                <form action="/login" method="post">
                                    @csrf
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="email">Username</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" type="text" value="{{ old('email') }}"
                                            placeholder="Masukkan Username" autofocus required />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Form Group (password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="password">Password</label>
                                        <input class="form-control" id="password" name="password" type="password"
                                            placeholder="Masukkan Password" required />
                                    </div>
                                    <!-- Form Group (remember password checkbox)-->
                                    <!-- <div class="mb-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="" />
                                                                <label class="form-check-label" for="rememberPasswordCheck">Ingat Kata Sandi</label>
                                                            </div>
                                                        </div> -->
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
                    <div class="card-footer text-center">
                        <div class="small">
                            {{-- <a href="/">
                                        <i class="fas fa-arrow-left"></i> Pergi ke Texno.id
                                    </a> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
