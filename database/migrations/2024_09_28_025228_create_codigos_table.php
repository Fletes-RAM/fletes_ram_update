<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('codigos', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('idEstado');
            $table->string('estado', 35);
            $table->smallInteger('idMunicipio');
            $table->string('municipio', 60);
            $table->string('ciudad', 60);
            $table->string('zona', 15);
            $table->mediumInteger('cp');
            $table->string('asentamiento', 70);
            $table->string('tipo', 200);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos');
    }
};
