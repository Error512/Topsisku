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
        Schema::create('persiapan_hitung', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_project');
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_db');


            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_project')->references('id')->on('project');
            $table->foreign('id_kriteria')->references('id')->on('kriteria');
            $table->foreign('id_db')->references('id')->on('database');
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
        Schema::dropIfExists('persiapan_hitung');
    }
};
