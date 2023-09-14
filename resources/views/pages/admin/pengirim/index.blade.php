@extends('layouts.admin')

@section('title')
    Pengirim Surat
@endsection

@section('container')
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
                            <a class="btn btn-sm btn-success" href="{{ route('pengirim.create') }}" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i data-feather="user-plus"></i> &nbsp;
                                Tambah Data
                            </a>
                        </div>
                        <div class="card-body">
                            {{-- Alert --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
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
                            {{-- List Data --}}
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
    {{-- Modal Add --}}
    <div class="modal fade" id="createModal" role="dialog" aria-labelledby="createModal" aria-hidden="true" style="overflow:hidden;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Tambah Data Pengirim Surat</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengirim.store') }}" method="post">
                    @csrf
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
    {{-- Modal Update --}}
    @foreach ($pengirim as $item)
        @php
            $id = $item->id;
            $nama = $item->nama;
            $alamat = $item->alamat;
            $telp = $item->telp;
            $email = $item->email;
        @endphp
        <div class="modal fade" id="updateModal{{ $id }}" role="dialog" aria-labelledby="createModal" aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModal{{ $id }}">Ubah Data</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('pengirim.update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="nama">Nama Pengirim</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $nama; }}" placeholder="Masukkan Nama Pengirim..." required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="alamat">Alamat (Opsional)</label>
                                    <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat...">{{ $alamat; }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="telp">Kontak (Opsional)</label>
                                    <input type="text" name="telp" value="{{ $telp; }}" class="form-control" placeholder="Masukkan Kontak...">
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-12">
                                    <label for="email">E-Mail (Opsional)</label>
                                    <input type="email" name="email" value="{{ $email; }}" class="form-control" placeholder="Masukkan E-Mail...">
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
    @endforeach
@endsection

@push('addon-script')
  <script>
    var datatable = $('#crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
          url: '{!! url()->current() !!}',
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
@endpush


