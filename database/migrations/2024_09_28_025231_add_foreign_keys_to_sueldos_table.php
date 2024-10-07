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
        Schema::table('sueldos', function (Blueprint $table) {
            $table->foreign(['operador_id'], 'ram_sueldos_ram_users_FK')->references(['id'])->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sueldos', function (Blueprint $table) {
            $table->dropForeign('ram_sueldos_ram_users_FK');
        });
    }
};
