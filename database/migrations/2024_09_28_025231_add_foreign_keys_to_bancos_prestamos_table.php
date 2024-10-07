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
        Schema::table('bancos_prestamos', function (Blueprint $table) {
            $table->foreign(['bancos_id'], 'bancos_prestamos_bancos_id_foreign')->references(['id'])->on('bancos')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['user_id'], 'bancos_prestamos_user_id_foreign')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bancos_prestamos', function (Blueprint $table) {
            $table->dropForeign('bancos_prestamos_bancos_id_foreign');
            $table->dropForeign('bancos_prestamos_user_id_foreign');
        });
    }
};
