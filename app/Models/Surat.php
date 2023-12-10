<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'kd_datasurat',
        'kode_surat',
        'tujuan',
        'surat_untuk',
        'nama_pengirim',
        'isi_surat'
    ];
}
