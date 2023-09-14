@extends('layouts.admin')

@section('title')
    Profile Pengguna
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-light">
                                <div class="page-header-icon text-light"><i data-feather="user"></i></div>
                                Pengguna - Informasi Akun
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <nav class="nav nav-borders">
                <a class="nav-link {{ request()->is('admin/setting') ? 'active ms-0' : '' }}"
                    href="{{ route('setting.index') }}">Informasi akun</a>
                <a class="nav-link {{ request()->is('admin/setting/change-password') ? 'active ms-0' : '' }}"
                    href="{{ route('change-password') }}">Ubah Password</a>
            </nav>
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col">
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
                </div>
            </div>
            <div class="row">

                <div class="col-xl-6">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header text-green">Informasi Akun</div>
                        <div class="card-body">
                            {{-- Alert --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('user.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="nama">Nama</label>
                                    <input class="form-control" name="nama" type="text" value="{{ $user->nama }}"
                                        required />
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Username</label>
                                    <input class="form-control" name="email" type="text" placeholder="name@example.com"
                                        value="{{ $user->email }}" required />
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-success" type="submit">Perbarui Profil</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('addon-script')
    <script>
        function thisFileUpload() {
            document.getElementById("profile").click();
        }
    </script>
@endpush
