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
        Schema::create('pemberi_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('jenis_pemberi');
            $table->string('bidang_perusahaan');
            $table->string('alamat');
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
        Schema::dropIfExists('pemberi_informasis');
    }
};
