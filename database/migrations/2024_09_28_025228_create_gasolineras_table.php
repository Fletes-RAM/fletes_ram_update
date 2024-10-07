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
        Schema::create('gasolineras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('gasolinera', 200);
            $table->string('estacion');
            $table->string('contacto', 200);
            $table->string('email', 200);
            $table->string('telefono', 15);
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
        Schema::dropIfExists('gasolineras');
    }
};
