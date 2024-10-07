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
        Schema::table('controles_vehiculares', function (Blueprint $table) {
            $table->foreign(['user_id'], 'controles_vehiculares_user_id_foreign')->references(['id'])->on('users')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('controles_vehiculares', function (Blueprint $table) {
            $table->dropForeign('controles_vehiculares_user_id_foreign');
        });
    }
};
