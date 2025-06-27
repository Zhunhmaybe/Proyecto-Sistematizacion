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
            $table->string('idpro', 10);
            $table->string('idasi', 10);
            $table->primary(['idpro', 'idasi']);
            $table->foreign('idpro')->references('idpro')->on('profesores')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('idasi')->references('idasi')->on('asignaturas')
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
        Schema::dropIfExists('pro_asi');
    }
};
