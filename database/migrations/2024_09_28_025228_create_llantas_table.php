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
        Schema::create('llantas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('clave', 100);
            $table->string('marca', 100);
            $table->string('medida', 100);
            $table->string('tipo', 100);
            $table->unsignedInteger('existencia');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('llantas');
    }
};
