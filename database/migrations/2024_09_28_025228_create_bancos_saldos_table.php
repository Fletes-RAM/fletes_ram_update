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
        Schema::create('bancos_saldos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bancos_id')->index('bancos_saldos_bancos_id_foreign');
            $table->string('periodo', 15);
            $table->double('saldo_inicial');
            $table->double('saldo_final');
            $table->boolean('cerrado');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bancos_saldos');
    }
};
