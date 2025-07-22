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
        Schema::create('inscripcion_tutorias', function (Blueprint $table) {
            $table->id();
            $table->string('idest'); // VARCHAR, igual que en estudiantes
            $table->string('idtut'); // VARCHAR, igual que en tutorias
            $table->timestamps();

            // Claves foráneas
            $table->foreign('idest')->references('idest')->on('estudiantes');
            $table->foreign('idtut')->references('idtut')->on('tutorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripcion_tutorias');
    }
};
