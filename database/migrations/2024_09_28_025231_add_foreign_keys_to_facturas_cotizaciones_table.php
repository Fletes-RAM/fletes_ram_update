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
        Schema::table('facturas_cotizaciones', function (Blueprint $table) {
            $table->foreign(['cotizacion_id'], 'facturas_cotizaciones_cotizacion_id_foreign')->references(['id'])->on('cotizaciones')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facturas_cotizaciones', function (Blueprint $table) {
            $table->dropForeign('facturas_cotizaciones_cotizacion_id_foreign');
        });
    }
};
