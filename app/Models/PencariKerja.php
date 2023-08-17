<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PencariKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'email_pk',
        'alamat',
        'pendidikan',
        'keterampilan',
        'tentang',
        'no_hp',
        'foto',
    ];
}
