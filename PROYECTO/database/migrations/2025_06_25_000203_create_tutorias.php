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
        Schema::create('tutorias', function (Blueprint $table) {
            $table->string('idtut', 10)->primary();
            $table->string('iddet', 10);
            $table->string('idhor', 10);
            $table->string('detalletut', 100);
            $table->foreign('iddet')->references('iddet')->on('detallematriculas')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('idhor')->references('idhor')->on('horarios')
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
        Schema::dropIfExists('tutorias');
    }
};
