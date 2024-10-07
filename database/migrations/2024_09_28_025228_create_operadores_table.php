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
        Schema::create('operadores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('operadores_user_id_foreign');
            $table->string('nss', 11);
            $table->string('telefono', 15);
            $table->string('contacto', 100);
            $table->string('tel_contacto', 15);
            $table->string('licencia');
            $table->date('vigencia');
            $table->date('medica');
            $table->unsignedInteger('unidad_id');
            $table->unsignedInteger('cliente_id');
            $table->string('origen');
            $table->string('destino');
            $table->string('estatus');
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
        Schema::dropIfExists('operadores');
    }
};
