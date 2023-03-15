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
            $table->id('id_karyawan');
            $table->string('nik');
            $table->string('nama');
            $table->string('jenkel');
            $table->string('tgl_lahir');
            $table->bigInteger('id_agama')->unsigned();
            $table->bigInteger('id_jabatan')->unsigned();
            $table->string('alamat');
            $table->string('telp');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('level');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_agama')->references('id_agama')->on('agamas');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatans');
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
