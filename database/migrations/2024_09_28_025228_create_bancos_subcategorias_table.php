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
        Schema::create('bancos_subcategorias', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('categoria_id')->index('bancos_subcategorias_categoria_id_foreign');
            $table->string('subcategoria', 100);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancos_subcategorias');
    }
};
