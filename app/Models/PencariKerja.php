<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencariKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'bkk_id',
        'email_pk',
        'alamat',
        'pendidikan_terakhir',
        'keterampilan',
        'tentang',
        'no_hp',
        'foto_pencari_kerja'
    ];

    public function lamars()
    {
        return $this->hasMany(Lamar::class);
    }

    public function hasLamarLowongan($informasiId)
    {
        return $this->lamars()
            ->where('id_informasi', $informasiId)
            ->exists();
    }
}
