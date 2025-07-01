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
            $table->char('idasi', 10)->primary();
            $table->char('idtit',10)->nullable();
            $table->char('idniv', 10);
            $table->string('nombreasi', 50);
            $table->integer('teoricosasi')->default(123);
            $table->integer('practicosasi')->default(123);
            $table->foreign('idniv')->references('idniv')->on('niveles')->onDelete('cascade');
            $table->foreign('idtit')->references('idtit')->on('titulaciones')->onDelete('cascade');

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
