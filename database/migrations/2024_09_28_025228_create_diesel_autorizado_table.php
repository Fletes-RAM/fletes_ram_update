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
        Schema::create('diesel_autorizado', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tipo_de_unidad_id');
            $table->string('origen');
            $table->string('destino');
            $table->string('lts_aut');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diesel_autorizado');
    }
};
