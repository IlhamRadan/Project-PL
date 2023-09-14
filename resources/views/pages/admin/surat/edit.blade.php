@extends('layouts.admin')

@section('title')
   Ubah Surat
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-fluid px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title text-light">
                                <div class="page-header-icon text-light"><i data-feather="file-text"></i></div>
                                Edit Surat
                            </h1>
                        </div>
                        <!-- <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali Ke Semua Surat
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-fluid px-4">
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
            <form action="{{ route('surat.update', $item->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header text-success">Form Surat</div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="tipe_surat" class="col-sm-3 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-9">
                                        <select name="tipe_surat" class="form-control" required>
                                            <option value="">Pilih..</option>
                                            <option value="SPM" {{ ($item->tipe_surat == 'SPM')? 'selected':''; }}>SPM</option>
                                            <option value="SPP" {{ ($item->tipe_surat == 'SPP')? 'selected':''; }}>SPP</option>
                                            <option value="SP2D" {{ ($item->tipe_surat == 'SP2D')? 'selected':''; }}>SP2D</option>
                                        </select>
                                    </div>
                                    @error('tipe_surat')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="no_surat" class="col-sm-3 col-form-label">No. Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('no_surat') is-invalid @enderror" value="{{ $item->no_surat }}" name="no_surat" placeholder="Nomor Surat.." required>
                                    </div>
                                    @error('no_surat')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgl_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tgl_surat') is-invalid @enderror" value="{{ $item->tgl_surat }}" name="tgl_surat" required>
                                    </div>
                                    @error('tgl_surat')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgl_diterima" class="col-sm-3 col-form-label">Tanggal Diterima</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control @error('tgl_diterima') is-invalid @enderror" value="{{ $item->tgl_diterima }}" name="tgl_diterima" required>
                                    </div>
                                    @error('tgl_diterima')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('perihal') is-invalid @enderror" value="{{ $item->perihal }}" name="perihal" placeholder="Perihal.." required>
                                    </div>
                                    @error('perihal')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="id_bidang" class="col-sm-3 col-form-label">Bidang/Sub Bidang</label>
                                    <div class="col-sm-9">
                                        <select name="id_bidang" class="form-control selectx" required>
                                            <option value="">Pilih..</option>
                                            @foreach ($bidangs as $bidang)
                                                <option value="{{ $bidang->id }}" {{ ($item->id_bidang == $bidang->id)? 'selected':''; }}>{{ $bidang->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department_id')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="id_pengirim" class="col-sm-3 col-form-label">Pengirim</label>
                                    <div class="col-sm-9">
                                        <select name="id_pengirim" class="form-control selectx" required>
                                            <option value="">Pilih..</option>
                                            @foreach ($pengirims as $pengirim)
                                                <option value="{{ $pengirim->id }}" {{ ($item->id_pengirim == $pengirim->id)? 'selected':''; }}>{{ $pengirim->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_pengirim')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="file_surat" class="col-sm-3 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control @error('file_surat') is-invalid @enderror" value="{{ old('file_surat') }}" name="file_surat">
                                        <div id="file_surat" class="form-text">Tipe file .pdf, .jpeg, .jpg, atau .png (Kosongkan jika file tidak diubah)</div>
                                    </div>
                                    @error('file_surat')
                                        <div class="invalid-feedback">
                                            {{ $message; }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="file_surat" class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9" id="button-crud">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection

@push('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endpush

@push('addon-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(".selectx").select2({
            theme: "bootstrap-5"
        });
    </script>
@endpush

