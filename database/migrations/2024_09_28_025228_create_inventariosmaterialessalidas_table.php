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
        Schema::create('inventariosmaterialessalidas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('inventariomaterial_id');
            $table->unsignedInteger('unidad_id');
            $table->unsignedInteger('cantidad');
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
        Schema::dropIfExists('inventariosmaterialessalidas');
    }
};
