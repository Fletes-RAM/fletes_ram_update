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
        Schema::table('unidades', function (Blueprint $table) {
            $table->foreign(['tipo_de_unidad_id'], 'unidades_tipo_de_unidad_id_foreign')->references(['id'])->on('tipos_de_unidades')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('unidades', function (Blueprint $table) {
            $table->dropForeign('unidades_tipo_de_unidad_id_foreign');
        });
    }
};
