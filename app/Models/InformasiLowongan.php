<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiLowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemberi_informasi_id',
        'judul_lowongan',
        'perusahaan',
        'salary',
        'kategori_lowongan',
        'jenis_lowongan',
        'pendidikan',
        'pengalaman',
        'keterampilan',
        'deskripsi',
        'verifikasi',
        'lokasi',
        'foto_lowongan',
    ];
}
