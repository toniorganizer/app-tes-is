<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class InformasiLowongan extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    protected $fillable = [
        'pemberi_informasi_id',
        'judul_lowongan',
        'perusahaan',
        'salary',
        'jenis_lowongan',
        'pendidikan',
        'pengalaman',
        'keterampilan',
        'bidang',
        'jurusan',
        'deskripsi',
        'verifikasi',
        'tgl_buka',
        'tgl_tutup',
        'lokasi',
        'foto_lowongan',
    ];

    public function lamars()
    {
        return $this->hasMany(Lamar::class);
    }

    public function toSearchableArray()
    {
        return [
            'judul_lowongan'     => $this->judul_lowongan,
        ];
    }
}
