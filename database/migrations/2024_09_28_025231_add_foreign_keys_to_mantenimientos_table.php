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
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->foreign(['unidad_id'], 'mantenimientos_unidad_id_foreign')->references(['id'])->on('unidades')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->dropForeign('mantenimientos_unidad_id_foreign');
        });
    }
};
