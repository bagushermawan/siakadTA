<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsksTable extends Migration
{
    public function up()
    {
        Schema::create('asks', function (Blueprint $table) {
            $table->id();
            $table->text('judul');
            $table->longText('isi');
            $table->timestamp('tanggal_tanya');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('asks');
    }
}
