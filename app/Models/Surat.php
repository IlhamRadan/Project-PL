<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_surat',
        'tgl_surat',
        'tgl_diterima',
        'perihal',
        'id_bidang',
        'id_pengirim',
        'file_surat',
        'tipe_surat'
    ];

    protected $hidden = [

    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'id_bidang','id');
    }

    public function pengirim()
    {
        return $this->belongsTo(Pengirim::class, 'id_pengirim','id');
    }
}
