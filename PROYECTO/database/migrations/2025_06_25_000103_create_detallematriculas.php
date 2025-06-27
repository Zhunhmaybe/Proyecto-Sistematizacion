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
        Schema::create('detallematriculas', function (Blueprint $table) {
            $table->string('iddet', 10)->primary();
            $table->string('idasi', 10);
            $table->string('idmat', 10);
            $table->string('detalledet', 100);
            $table->foreign('idasi')->references('idasi')->on('asignaturas')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('idmat')->references('idmat')->on('matriculas')
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
        Schema::dropIfExists('detallematriculas');
    }
};
