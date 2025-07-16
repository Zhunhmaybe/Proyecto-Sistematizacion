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
        Schema::create('pro_asi', function (Blueprint $table) {
            $table->char('idpro_asi', 10)->primary();
            $table->char('idasi', 10);
            $table->char('idpro', 10);
            $table->foreign('idasi')->references('idasi')->on('asignaturas')->onDelete('cascade');
            $table->foreign('idpro')->references('idpro')->on('profesores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pro_asi');
    }
};
