<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_karyawan')->unsigned();
            $table->integer('total_masuk');
            $table->integer('gaji');
            $table->integer('total_gaji');
            $table->timestamps();
        });

        Schema::table('gaji', function (Blueprint $table) {
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
        Schema::dropIfExists('gaji');
    }
}
