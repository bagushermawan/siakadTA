<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTahunAjaransTable extends Migration
{
    public function up()
    {
        Schema::create('tahun_ajarans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tahun_ajarans');
    }
}
