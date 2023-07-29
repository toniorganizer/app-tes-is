<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_lowongans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemberi_informasi_id');
            $table->string('lowongan');
            $table->string('perusahaan');
            $table->string('salary');
            $table->string('kategori_lowongan');
            $table->string('jenis_lowongan');
            $table->string('pendidikan');
            $table->string('pengalaman');
            $table->string('keterampilan');
            $table->text('deskripsi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasi_lowongans');
    }
};
