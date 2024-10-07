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
        Schema::table('bancos_saldos', function (Blueprint $table) {
            $table->foreign(['bancos_id'], 'bancos_saldos_bancos_id_foreign')->references(['id'])->on('bancos')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bancos_saldos', function (Blueprint $table) {
            $table->dropForeign('bancos_saldos_bancos_id_foreign');
        });
    }
};
