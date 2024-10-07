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
        Schema::table('asignaciones', function (Blueprint $table) {
            $table->foreign(['cotizacion_id'], 'asignaciones_cotizacion_id_foreign')->references(['id'])->on('cotizaciones')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['unidad_id'], 'asignaciones_unidad_id_foreign')->references(['id'])->on('unidades')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'], 'asignaciones_user_id_foreign')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asignaciones', function (Blueprint $table) {
            $table->dropForeign('asignaciones_cotizacion_id_foreign');
            $table->dropForeign('asignaciones_unidad_id_foreign');
            $table->dropForeign('asignaciones_user_id_foreign');
        });
    }
};
