@extends('layouts.admin')

@section('title')
    Tambah Pengguna
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-light">
                                <div class="page-header-icon text-light"><i data-feather="user-plus"></i></div>
                                Tambah Pengguna
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-6">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header text-green">Tambah Pengguna Baru</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <!-- Form Row-->
                                <div class="row gx-8 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="nama">Nama</label>
                                        <input class="form-control @error('nama') is-invalid @enderror" name="nama" type="text" value="{{ old('nama') }}"  required autofocus/>
                                        @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message; }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="email">Username</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" type="text" value="{{ old('email') }}" required/>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message; }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Group (Password)-->
                                <div class="mb-3">
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="password">Password</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" type="password"  required/>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message; }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-success" type="submit">
                                    Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

