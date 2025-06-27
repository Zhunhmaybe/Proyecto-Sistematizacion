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
        Schema::create('profesores', function (Blueprint $table) {
            $table->string('idpro', 10)->primary();
            $table->string('idare', 10);
            $table->string('nombrespro', 50);
            $table->string('apellidospro', 50);
            $table->string('telefonopro', 10);
            $table->string('correopro', 50);
            $table->foreign('idare')->references('idare')->on('areas')
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
        Schema::dropIfExists('profesores');
    }
};
