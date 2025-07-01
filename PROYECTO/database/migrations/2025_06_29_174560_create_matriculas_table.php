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
        Schema::create('matriculas', function (Blueprint $table) {
            $table->char('idmat', 10)->primary();
            $table->char('idper', 10);
            $table->char('idusu', 10);
            $table->date('fechamat');
            $table->foreign('idper')->references('idper')->on('periodos')->onDelete('cascade');
            $table->foreign('idusu')->references('idusu')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
};
