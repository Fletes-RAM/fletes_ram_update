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
        Schema::create('facturas_controles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('control_id');
            $table->unsignedInteger('cliente_id');
            $table->double('subtotal')->unsigned();
            $table->double('maniobras')->unsigned();
            $table->double('otros')->unsigned();
            $table->double('iva')->unsigned();
            $table->double('retencion')->unsigned();
            $table->string('factura');
            $table->double('total')->unsigned();
            $table->text('observaciones');
            $table->boolean('pagada');
            $table->date('fecha_pago')->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas_controles');
    }
};
