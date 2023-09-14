<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat;

class PrintController extends Controller
{
    public function index()
    {
        $item = Surat::with(['bidang','pengirim'])->where('tipe_surat', 'SPM')->latest()->get();

        return view('pages.admin.surat.print-spm',[
            'item' => $item
        ]);
    }

    public function print_spp()
    {
        $item = Surat::with(['bidang','pengirim'])->where('tipe_surat', 'SPP')->latest()->get();

        return view('pages.admin.surat.print-spp',[
            'item' => $item
        ]);
    }

    public function print_sp2d()
    {
        $item = Surat::with(['bidang','pengirim'])->where('tipe_surat', 'SP2D')->latest()->get();

        return view('pages.admin.surat.print-sp2d',[
            'item' => $item
        ]);
    }
}
