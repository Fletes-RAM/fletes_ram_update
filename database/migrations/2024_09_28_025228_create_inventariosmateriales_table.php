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
        Schema::create('inventariosmateriales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre', 100);
            $table->text('descripcion');
            $table->double('precio');
            $table->unsignedInteger('existencia');
            $table->double('valor');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventariosmateriales');
    }
};
