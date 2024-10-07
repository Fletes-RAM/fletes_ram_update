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
        Schema::create('facturas_cotizaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cotizacion_id')->index('facturas_cotizaciones_cotizacion_id_foreign');
            $table->string('factura');
            $table->double('factura_num')->unsigned();
            $table->date('fecha_pago');
            $table->text('observaciones');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas_cotizaciones');
    }
};
