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
        Schema::table('bancos_subcategorias', function (Blueprint $table) {
            $table->foreign(['categoria_id'], 'bancos_subcategorias_categoria_id_foreign')->references(['id'])->on('bancos_categorias')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bancos_subcategorias', function (Blueprint $table) {
            $table->dropForeign('bancos_subcategorias_categoria_id_foreign');
        });
    }
};
