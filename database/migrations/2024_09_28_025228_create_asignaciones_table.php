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
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cotizacion_id')->index('asignaciones_cotizacion_id_foreign');
            $table->unsignedInteger('user_id')->index('asignaciones_user_id_foreign');
            $table->unsignedInteger('unidad_id')->index('asignaciones_unidad_id_foreign');
            $table->string('terminado', 15);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones');
    }
};
