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
        Schema::create('controles_vehiculares', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('controles_vehiculares_user_id_foreign');
            $table->integer('factura_id')->nullable();
            $table->unsignedInteger('porcentaje');
            $table->date('fecha');
            $table->string('control_vehicular');
            $table->string('origen');
            $table->string('toneladas');
            $table->string('tarifa');
            $table->string('cantidad');
            $table->string('iva');
            $table->string('pagado', 6);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controles_vehiculares');
    }
};
