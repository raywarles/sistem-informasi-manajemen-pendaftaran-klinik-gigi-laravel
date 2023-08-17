<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens');
            $table->string('nama_pasien');
            $table->string('berat_badan');
            $table->string('tinggi_badan');
            $table->string('tensi');
            $table->date('tgl_rekam');
            $table->unsignedInteger('total_biaya');
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
        Schema::dropIfExists('rekams');
    }
}
