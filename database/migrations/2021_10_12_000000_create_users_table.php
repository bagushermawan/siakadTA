<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('alamat');
            $table->string('password');
            $table->string('role');
            // $table->date('tgl_lahir');
            // $table->unsignedBigInteger('role_id');
            $table->datetime('login_time')->nullable();
            $table->rememberToken();
            $table->string('reset_token')->nullable();
            $table->timestamps();
            $table->timestamp('last_logged_in')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
