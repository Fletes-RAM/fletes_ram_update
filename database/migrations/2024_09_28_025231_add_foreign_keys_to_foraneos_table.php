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
        Schema::table('foraneos', function (Blueprint $table) {
            $table->foreign(['foraneo_operador_id'], 'foraneos_foraneo_operador_id_foreign')->references(['id'])->on('foraneos_operadores')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('foraneos', function (Blueprint $table) {
            $table->dropForeign('foraneos_foraneo_operador_id_foreign');
        });
    }
};
