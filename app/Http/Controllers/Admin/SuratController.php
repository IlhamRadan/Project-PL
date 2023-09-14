<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Bidang;
use App\Models\Surat;
use App\Models\Pengirim;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $bidangs = Bidang::all();
        $pengirims = Pengirim::all();

        return view('pages.admin.surat.create',[
            'bidangs' => $bidangs,
            'pengirims' => $pengirims,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'tgl_diterima' => 'required',
            'perihal' => 'required',
            'id_bidang' => 'required',
            'id_pengirim' => 'required',
            'file_surat' => 'required|mimes:pdf,jpeg,png|file',
            'tipe_surat' => 'required',
        ]);

        if($request->file('file_surat')){
            $validatedData['file_surat'] = $request->file('file_surat')->store('assets/file-surat');
        }

        if ($validatedData['tipe_surat'] == 'SPM') {
            $redirect = 'surat-pm';
        } else {
            $redirect = 'surat-pp';
        }

        Surat::create($validatedData);

        return redirect()
                    ->route($redirect)
                    ->with('success', 'Data Berhasil Disimpan !');
    }

    public function surat_perintah_membayar()
    {
        if (request()->ajax()) {
            $query = Surat::with(['bidang','pengirim'])->where('tipe_surat', 'SPM')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Lihat
                        </a>
                        <a class="btn btn-success btn-xs" href="' . route('surat.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Edit
                        </a>
                        <form action="' . route('surat.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Hapus data ini ?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('post_status', function ($item) {
                   return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>':'<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action','post_status'])
                ->make();
        }

        return view('pages.admin.surat.spm');
    }

    public function surat_permintaan_pembayaran()
    {
        if (request()->ajax()) {
            $query = Surat::with(['bidang','pengirim'])->where('tipe_surat', 'SPP')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Lihat
                        </a>
                        <a class="btn btn-success btn-xs" href="' . route('surat.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Edit
                        </a>
                        <form action="' . route('surat.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Hapus data ini ?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('post_status', function ($item) {
                   return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>':'<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action','post_status'])
                ->make();
        }

        return view('pages.admin.surat.spp');
    }

    public function surat_perintah_pencairan_dana()
    {
        if (request()->ajax()) {
            $query = Surat::with(['bidang','pengirim'])->where('tipe_surat', 'SP2D')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-surat', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Lihat
                        </a>
                        <a class="btn btn-success btn-xs" href="' . route('surat.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Edit
                        </a>
                        <form action="' . route('surat.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Hapus data ini ?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('post_status', function ($item) {
                   return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>':'<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action','post_status'])
                ->make();
        }

        return view('pages.admin.surat.sp2d');
    }

    public function show($id)
    {
        $item = Surat::with(['bidang','pengirim'])->findOrFail($id);

        return view('pages.admin.surat.show',[
            'item' => $item,
        ]);
    }

    public function edit($id)
    {
        $item = Surat::findOrFail($id);

        $bidangs = Bidang::all();
        $pengirims = Pengirim::all();

        return view('pages.admin.surat.edit',[
            'bidangs' => $bidangs,
            'pengirims' => $pengirims,
            'item' => $item,
        ]);
    }

    public function download_surat($id)
    {
        $item = Surat::findOrFail($id);

        return Storage::download($item->file_surat);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'no_surat' => 'required',
            'tgl_surat' => 'required',
            'tgl_diterima' => 'required',
            'perihal' => 'required',
            'id_bidang' => 'required',
            'id_pengirim' => 'required',
            'file_surat' => 'mimes:pdf,jpeg,png|file',
            'tipe_surat' => 'required',
        ]);

        $item = Surat::findOrFail($id);

        if($request->file('file_surat')){
            $validatedData['file_surat'] = $request->file('file_surat')->store('assets/file-surat');
        }

        if ($validatedData['tipe_surat'] == 'SPM') {
            $redirect = 'surat-pm';
        } else if ($validatedData['tipe_surat'] == 'SPP'){
            $redirect = 'surat-pp';
        } else {
            $redirect = 'surat-p2d';
        }

        $item->update($validatedData);

        return redirect()
            ->route($redirect)
            ->with('success', 'Data Berhasil diperbarui !');
    }

    public function destroy($id)
    {
        $item = Surat::findorFail($id);

        if ($item->tipe_surat == 'SPM') {
            $redirect = 'surat-pm';
        } else if ($item->tipe_surat == 'SPM'){
            $redirect = 'surat-pp';
        } else {
            $redirect = 'surat-p2d';
        }

        Storage::delete($item->file_surat);

        $item->delete();

        return redirect()
            ->route($redirect)
            ->with('success', 'Data Berhasil Dihapus !');
    }
}
