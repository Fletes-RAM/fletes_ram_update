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
        Schema::create('comprobantes_gastos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->index('comprobantes_gastos_user_id_foreign');
            $table->date('fecha');
            $table->string('descripcion');
            $table->string('factura');
            $table->double('total')->unsigned();
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
        Schema::dropIfExists('comprobantes_gastos');
    }
};
