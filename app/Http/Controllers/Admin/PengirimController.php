<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengirim;
use Yajra\DataTables\Facades\DataTables;

class PengirimController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Pengirim::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal'.$item->id.'">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('pengirim.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Hapus Data Ini ?'".')">
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
        $pengirim = Pengirim::all();

        return view('pages.admin.pengirim.index',[
            'pengirim' => $pengirim
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'telp' => 'nullable',
            'email' => 'nullable',
        ]);

        Pengirim::create($validatedData);

        return redirect()
            ->route('pengirim.index')
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
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'telp' => 'nullable',
            'email' => 'nullable',
        ]);

        Pengirim::where('id', $id)
                ->update($validatedData);

        return redirect()
                    ->route('pengirim.index')
                    ->with('success', 'Data Berhasil diperbarui !');
    }

    public function destroy($id)
    {
        $item = Pengirim::findorFail($id);

        $item->delete();

        return redirect()
                    ->route('pengirim.index')
                    ->with('success', 'Data Berhasil Dihapus !');
    }
}
