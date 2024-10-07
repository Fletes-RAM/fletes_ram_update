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
        Schema::create('rendimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tipo_de_unidad_id')->index('rendimientos_tipo_de_unidad_id_foreign');
            $table->string('rendimiento', 10);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rendimientos');
    }
};
