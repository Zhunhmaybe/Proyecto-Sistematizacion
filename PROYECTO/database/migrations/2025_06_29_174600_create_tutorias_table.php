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
            $table->char('idtut', 10)->primary();
            $table->char('idhor', 10);
            $table->char('iddet', 10);
            $table->string('detalletut', 100);
            $table->foreign('idhor')->references('idhor')->on('horarios')->onDelete('cascade');
            $table->foreign('iddet')->references('iddet')->on('detallematriculas')->onDelete(('cascade'));
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
