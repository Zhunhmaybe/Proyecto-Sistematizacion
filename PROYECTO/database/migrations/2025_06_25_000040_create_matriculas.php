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
            $table->string('idmat', 10)->primary();
            $table->string('idper', 10);
            $table->string('idest', 10);
            $table->date('fechamat');
            $table->foreign('idper')->references('idper')->on('periodos')
                  ->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('idest')->references('idest')->on('estudiantes')
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
        Schema::dropIfExists('matriculas');
    }
};
