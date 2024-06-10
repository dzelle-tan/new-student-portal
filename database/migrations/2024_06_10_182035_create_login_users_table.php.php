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
        Schema::create('login_users', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('password');
            $table->integer('role_id'); // Use unsignedInteger instead of integer
            $table->string('usertype');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_users');
    }
};
