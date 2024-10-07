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
        Schema::create('detalles_rutas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('nombre_id')->index('detalles_rutas_nombre_id_foreign');
            $table->string('estado', 200);
            $table->string('origen', 200);
            $table->string('estado_destino', 200);
            $table->string('destino', 200);
            $table->string('km', 10);
            $table->softDeletes();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_rutas');
    }
};
