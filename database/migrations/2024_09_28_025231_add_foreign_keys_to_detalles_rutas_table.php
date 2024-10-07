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
        Schema::table('detalles_rutas', function (Blueprint $table) {
            $table->foreign(['nombre_id'], 'detalles_rutas_nombre_id_foreign')->references(['id'])->on('nombres_rutas')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalles_rutas', function (Blueprint $table) {
            $table->dropForeign('detalles_rutas_nombre_id_foreign');
        });
    }
};
