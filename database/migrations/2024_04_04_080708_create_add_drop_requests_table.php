<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('add_drop_requests', function (Blueprint $table) {
            $table->id();
            $table->date('date_of_request');
            $table->string('status');
            $table->text('study_plan')->nullable();
            $table->text('add_drop_form')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_drop_requests');
    }
};