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
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente', 200);
            $table->string('nombre_contacto', 200);
            $table->string('email', 200);
            $table->string('telefono', 15);
            $table->string('gasto_admon', 10);
            $table->text('observaciones');
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
        Schema::dropIfExists('clientes');
    }
};
