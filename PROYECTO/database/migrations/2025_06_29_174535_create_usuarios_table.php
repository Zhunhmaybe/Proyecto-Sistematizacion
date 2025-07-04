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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->char('idusu', 10)->primary();
            $table->string('nombredusu', 50);
            $table->string('apellidousu', 50);
            $table->string('contrasena', 100);
            $table->string('email', 100);
            $table->date('fechanacimiento');
            $table->char('idare', 10)->nullable();
            $table->char('idrol', 10);
            $table->foreign('idrol')->references('idrol')->on('roles')->onDelete('cascade');
            $table->foreign('idare')->references('idare')->on('areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
