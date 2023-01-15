<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_hitung', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_hitung');
            $table->unsignedBigInteger('db');

            $table->foreign('id_hitung')->references('id')->on('persiapan_hitung');
            $table->foreign('db')->references('id_db')->on('persiapan_hitung');
            $table->string('kriteria');
            $table->string('alternatif');
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
        Schema::dropIfExists('proses_hitung');
    }
};
