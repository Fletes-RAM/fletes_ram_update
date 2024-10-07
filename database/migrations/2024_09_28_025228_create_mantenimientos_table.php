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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('factura');
            $table->date('fecha');
            $table->string('plazo');
            $table->double('cantidad');
            $table->string('descuento')->default('0');
            $table->unsignedInteger('unidad_id')->index('mantenimientos_unidad_id_foreign');
            $table->string('status', 7);
            $table->integer('proveedor_id');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
