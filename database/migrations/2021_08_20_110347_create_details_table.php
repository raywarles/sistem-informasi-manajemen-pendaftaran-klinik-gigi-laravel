<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekam_id');
            $table->foreign('rekam_id')->references('id')->on('rekams');
            $table->unsignedBigInteger('obat_id');
            $table->foreign('obat_id')->references('id')->on('obats');
            $table->unsignedBigInteger('layanan_id');
            $table->foreign('layanan_id')->references('id')->on('layanans');
            $table->string('diagnosa');
            $table->string('tindakan');
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
        Schema::dropIfExists('details');
    }
}
