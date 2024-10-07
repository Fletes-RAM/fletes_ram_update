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
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unidad', 15);
            $table->unsignedInteger('tipo_de_unidad_id')->index('unidades_tipo_de_unidad_id_foreign');
            $table->string('placas', 20);
            $table->string('serie', 30);
            $table->string('poliza', 30);
            $table->string('aseguradora', 50);
            $table->date('vigencia');
            $table->double('km_inicial')->unsigned();
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
        Schema::dropIfExists('unidades');
    }
};