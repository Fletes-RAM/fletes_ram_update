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
        Schema::table('cotizaciones', function (Blueprint $table) {
            $table->foreign(['cliente_id'], 'cotizaciones_cliente_id_foreign')->references(['id'])->on('clientes')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['rendimiento_id'], 'cotizaciones_rendimiento_id_foreign')->references(['id'])->on('rendimientos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['ruta_id'], 'cotizaciones_ruta_id_foreign')->references(['id'])->on('nombres_rutas')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['tipo_de_unidad_id'], 'cotizaciones_tipo_de_unidad_id_foreign')->references(['id'])->on('tipos_de_unidades')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cotizaciones', function (Blueprint $table) {
            $table->dropForeign('cotizaciones_cliente_id_foreign');
            $table->dropForeign('cotizaciones_rendimiento_id_foreign');
            $table->dropForeign('cotizaciones_ruta_id_foreign');
            $table->dropForeign('cotizaciones_tipo_de_unidad_id_foreign');
        });
    }
};
