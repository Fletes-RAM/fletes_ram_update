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
        Schema::create('asignaciones_combustibles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('asignacion_id')->index('asignaciones_combustibles_asignacion_id_foreign');
            $table->date('fecha');
            $table->unsignedInteger('gasolinera_id')->index('asignaciones_combustibles_gasolinera_id_foreign');
            $table->string('ticket', 150);
            $table->double('litros')->unsigned();
            $table->double('precio')->unsigned();
            $table->double('total')->unsigned();
            $table->double('kilometraje')->unsigned();
            $table->double('rendimiento')->unsigned();
            $table->string('foto_ticket', 250);
            $table->string('foto_tablero_antes', 250);
            $table->string('foto_tablero_despues', 250);
            $table->string('foto_tablero_km', 250);
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaciones_combustibles');
    }
};
