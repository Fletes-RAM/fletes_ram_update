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
        Schema::table('comprobantes_gastos', function (Blueprint $table) {
            $table->foreign(['user_id'], 'comprobantes_gastos_user_id_foreign')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comprobantes_gastos', function (Blueprint $table) {
            $table->dropForeign('comprobantes_gastos_user_id_foreign');
        });
    }
};
