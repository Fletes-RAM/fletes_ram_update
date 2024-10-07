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
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('unidad_id');
            $table->date('fecha');
            $table->string('kilometraje');
            $table->string('titulo');
            $table->unsignedInteger('proveedor_id');
            $table->double('costo');
            $table->text('observaciones');
            $table->string('llantas_marca');
            $table->boolean('llanta_eje_direccion_der');
            $table->boolean('llanta_eje_inter_der');
            $table->boolean('llanta_eje_matriz_der');
            $table->boolean('llanta_eje_direccion_izq');
            $table->boolean('llanta_eje_inter_izq');
            $table->boolean('llanta_eje_matriz_izq');
            $table->boolean('balata_eje_direccion_der');
            $table->boolean('balata_eje_inter_der');
            $table->boolean('balata_eje_matriz_der');
            $table->boolean('balata_eje_direccion_izq');
            $table->boolean('balata_eje_inter_izq');
            $table->boolean('balata_eje_matriz_izq');
            $table->boolean('filtro_aire');
            $table->boolean('filtro_aceite');
            $table->boolean('filtro_diesel');
            $table->boolean('filtro_agua');
            $table->boolean('filtro_aceite_hidraulico');
            $table->boolean('filtro_diesel_separador_agua');
            $table->boolean('filtro_diesel_separador_condimentos');
            $table->boolean('filtro_adblue');
            $table->tinyInteger('filtro_secador_aire')->default(0);
            $table->boolean('aceite_motor');
            $table->boolean('aceite_caja_diferencial');
            $table->boolean('aceite_caja');
            $table->boolean('aceite_hidraulico');
            $table->boolean('aceite_liquido_frenos');
            $table->boolean('anticongelante');
            $table->text('reparacion_especial');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
