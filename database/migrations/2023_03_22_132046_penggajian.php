<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penggajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_karyawan')->unsigned();
            $table->integer('total_masuk');
            $table->integer('total_gaji');
            $table->timestamps();
        });

        Schema::table('penggajian', function (Blueprint $table) {
            $table->foreign('id_karyawan')->references('id_karyawan')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
