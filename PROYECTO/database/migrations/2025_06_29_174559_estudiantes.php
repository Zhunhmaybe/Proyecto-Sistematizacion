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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->char('idest', 10)->primary();
            $nombrest = 'nombrest';
            $apellidost = 'apellidost';
            $direccionest = 'direccionest';
            $mailest = 'mailest';
            $nacimientoest = 'nacimientoest';
            $table->string($nombrest, 50);
            $table->string($apellidost, 50);
            $table->string($direccionest, 100);
            $table->string($mailest, 100);
            $table->date($nacimientoest);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
};
