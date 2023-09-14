<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = User::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    /*<a class="btn btn-success btn-xs" href="' . route('user.edit', $item->id) . '">
                    <i class="fas fa-edit"></i> &nbsp; Ubah
                    </a> */
                    return '

                        <form action="' . route('user.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Anda akan menghapus item ini secara permanen dari situs anda?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->editColumn('nama', function ($item) {
                    return $item->profile ?
                                /* '<div class="d-flex align-items-center">
                                    <div class="avatar me-2"><img class="avatar-img img-fluid" src="'. Storage::url($item->profile) .'" /></div>'.
                                    $item->nama .'
                                </div>' */
                            :
                                '<div class="d-flex align-items-center">
                                    <div class="avatar me-2"><img class="avatar-img img-fluid" src="https://ui-avatars.com/api/?name='.$item->nama.'" /></div>'.
                                    $item->nama .'
                                </div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action','nama'])
                ->make();
        }
        return view('pages.admin.user.index');
    }

    public function create()
    {
        return view('pages.admin.user.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'level' => 'admin',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()
            ->route('user.index')
            ->with('success', 'Data Pengguna Berhasil Disimpan !');
    }

    public function show($id)
    {
        $user = Auth::user();

        return view('pages.admin.user.index',[
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit',[
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required',
        ]);

        $item = User::findOrFail($id);

        $item->update($validatedData);

        return redirect()
                ->route('user.index')
                ->with('success', 'Data Pengguna telah diperbarui !');
    }

    public function destroy($id)
    {
        $item = User::findorFail($id);

        Storage::delete($item->profile);

        $item->delete();

        return redirect()
                ->route('user.index')
                ->with('success', 'Data Pengguna telah dihapus !');
    }

    public function change_password()
    {
        return view('pages.admin.user.change-password');
    }


}
