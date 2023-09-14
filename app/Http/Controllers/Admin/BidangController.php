<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BidangController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Bidang::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal'.$item->id.'">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('bidang.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Hapus Data Ini ?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action'])
                ->make();
        }
        $bidang = Bidang::all();

        return view('pages.admin.bidang.index',[
            'bidang' => $bidang
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        Bidang::create([
            'nama' => $request->nama
        ]);

        return redirect()
                    ->route('bidang.index')
                    ->with('success', 'Data Berhasil Disimpan !');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        Bidang::where('id', $id)
                ->update([
                    'nama' => $request->nama
                ]);

        return redirect()
                    ->route('bidang.index')
                    ->with('success', 'Data telah diperbarui !');
    }

    public function destroy($id)
    {
        $item = Bidang::findorFail($id);

        $item->delete();

        return redirect()
                    ->route('bidang.index')
                    ->with('success', 'Data Berhasil Dihapus !');
    }
}
