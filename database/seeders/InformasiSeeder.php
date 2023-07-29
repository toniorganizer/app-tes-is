<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\InformasiLowongan;

class InformasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [

            [
                'pemberi_informasi_id' => 1,
                'lowongan' => 'Back End Developer',
                'perusahaan' => 'Tech Tecnology',
                'salary' => '1.200.000',
                'kategori_lowongan' => 'Programmer',
                'jenis_lowongan' => 'Full time',
                'pendidikan' => 'SMK - S1',
                'pengalaman' => '0-1 Tahun',
                'keterampilan' => 'PHP, MySQL, Framework (Laravel/Codeiginter)',
                'deskripsi' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad illum aperiam cum quasi impedit dolorum reiciendis suscipit obcaecati, ex temporibus est dicta totam, cumque sint fuga, ratione ullam. Laboriosam, recusandae.',
                'foto' => 'image.jpg',
            ]
        ];

        foreach ($user as $key => $value) {
        InformasiLowongan::create($value);
        }
    }
}
