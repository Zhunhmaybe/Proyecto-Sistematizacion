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
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->string('idasi', 10)->primary();
            $table->string('idtit', 10);
            $table->string('idniv', 10);
            $table->string('nombreasi', 50);
            $table->smallInteger('teoricosasi');
            $table->smallInteger('practicosasi');
            $table->foreign('idtit')->references('idtit')->on('titulaciones')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('idniv')->references('idniv')->on('niveles')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
};
