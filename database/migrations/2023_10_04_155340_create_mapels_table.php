<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapelsTable extends Migration
{
    public function up()
    {
        Schema::create('mapels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('kelompok')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mapels');
    }
}
