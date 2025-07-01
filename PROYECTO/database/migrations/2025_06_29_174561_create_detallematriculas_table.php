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
            $table->char('iddet', 10)->primary();
            $table->char('idasi', 10);
            $table->char('idmat', 10);            
            $table->integer('detalledet');
            $table->foreign('idmat')->references('idmat')->on('matriculas')->onDelete('cascade');
            $table->foreign('idasi')->references('idasi')->on('asignaturas')->onDelete('cascade');            
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
