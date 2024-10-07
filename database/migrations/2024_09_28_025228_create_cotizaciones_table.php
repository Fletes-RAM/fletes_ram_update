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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio', 20);
            $table->unsignedInteger('cliente_id')->index('cotizaciones_cliente_id_foreign');
            $table->unsignedInteger('ruta_id')->index('cotizaciones_ruta_id_foreign');
            $table->unsignedInteger('tipo_de_unidad_id')->index('cotizaciones_tipo_de_unidad_id_foreign');
            $table->unsignedInteger('rendimiento_id')->index('cotizaciones_rendimiento_id_foreign');
            $table->string('tot_km', 10);
            $table->double('costo_combustible')->unsigned();
            $table->double('propuesta')->unsigned();
            $table->double('utilidad')->unsigned();
            $table->double('sueldo_ope')->unsigned();
            $table->double('gastos_admon')->unsigned();
            $table->double('otros_gastos')->unsigned();
            $table->double('combustible')->unsigned();
            $table->double('caseta')->unsigned();
            $table->text('observaciones');
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
        Schema::dropIfExists('cotizaciones');
    }
};
