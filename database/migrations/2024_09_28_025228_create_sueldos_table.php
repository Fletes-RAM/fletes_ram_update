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
        Schema::create('sueldos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('operador_id')->index('ram_sueldos_ram_users_fk');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sueldos');
    }
};
