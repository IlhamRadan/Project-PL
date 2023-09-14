<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat;

class DashboardController extends Controller
{
    public function index()
    {
        $spp = Surat::where('tipe_surat', 'SPP')->get()->count();
        $spm = Surat::where('tipe_surat', 'SPM')->get()->count();
        $sp2d = Surat::where('tipe_surat', 'SP2D')->get()->count();

        return view('pages.admin.dashboard',[
            'spm' => $spm,
            'spp' => $spp,
            'sp2d' => $sp2d
        ]);
    }
}
