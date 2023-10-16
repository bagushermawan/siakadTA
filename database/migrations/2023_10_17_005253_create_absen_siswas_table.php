<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenSiswasTable extends Migration
{
    public function up()
    {
        Schema::create('absen_siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('guru_id');
            $table->string('siswa_id');
            $table->date('tanggal');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absen_siswas');
    }
}
