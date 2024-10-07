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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique('users_email_unique');
            $table->string('username')->unique('users_username_unique');
            $table->string('password');
            $table->text('permissions')->nullable();
            $table->boolean('activated')->default(false);
            $table->string('activation_code')->nullable()->index('users_activation_code_index');
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->string('persist_code')->nullable();
            $table->string('reset_password_code')->nullable()->index('users_reset_password_code_index');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->timestamp('created_at')->default('0000-00-00 00:00:00');
            $table->timestamp('updated_at')->default('0000-00-00 00:00:00');
            $table->softDeletes();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
