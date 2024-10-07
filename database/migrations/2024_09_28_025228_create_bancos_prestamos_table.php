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
        Schema::create('bancos_prestamos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bancos_id')->index('bancos_prestamos_bancos_id_foreign');
            $table->string('periodo', 15);
            $table->unsignedInteger('categoria_id');
            $table->string('subcategoria_id');
            $table->string('movimiento', 50);
            $table->string('folio', 50);
            $table->date('fecha');
            $table->unsignedInteger('user_id')->index('bancos_prestamos_user_id_foreign');
            $table->string('tipo', 8);
            $table->double('cantidad');
            $table->text('observaciones');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancos_prestamos');
    }
};
