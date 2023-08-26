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
        Schema::create('pencari_kerjas', function (Blueprint $table) {
            $table->id('id_pencari_kerja');
            $table->integer('bkk_id');
            $table->string('nama_lengkap');
            $table->string('email_pk')->unique();
            $table->string('alamat');
            $table->string('pendidikan');
            $table->text('keterampilan');
            $table->text('no_hp');
            $table->text('tentang');
            $table->string('foto_pencari_kerja');
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
        Schema::dropIfExists('pencari_kerjas');
    }
};
