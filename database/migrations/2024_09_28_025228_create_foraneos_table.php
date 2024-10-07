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
        Schema::create('foraneos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('foraneo_operador_id')->index('foraneos_foraneo_operador_id_foreign');
            $table->unsignedInteger('unidad_id');
            $table->date('fecha');
            $table->string('concepto', 250);
            $table->string('tipo', 250);
            $table->double('monto');
            $table->string('tp', 8);
            $table->double('saldo');
            $table->softDeletes();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foraneos');
    }
};
