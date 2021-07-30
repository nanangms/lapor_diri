<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKoperasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('koperasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik');
            $table->string('id_kecamatan');
            $table->string('nama_koperasi');
            $table->string('no_badan_hukum');
            $table->string('tgl_badan_hukum');
            $table->text('alamat');
            $table->string('sertifikat');
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
        Schema::dropIfExists('koperasi');
    }
}
