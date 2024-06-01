<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('professors', function (Blueprint $table) {
            // $table->increments('id');
            $table->integer('professor_id')->unique()->primary();
            $table->string('last_name', 45)->nullable();
            $table->string('first_name', 45)->nullable();
            $table->string('middle_name', 45)->nullable();
            $table->string('pronouns', 45)->nullable();
            $table->string('plm_email', 255)->nullable();
            $table->timestamps(); // Created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
