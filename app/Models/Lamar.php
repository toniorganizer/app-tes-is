<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamar extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_pelamar',
        'id_informasi',
        'status',
        'status_info',
        'pesan'
    ];
}
