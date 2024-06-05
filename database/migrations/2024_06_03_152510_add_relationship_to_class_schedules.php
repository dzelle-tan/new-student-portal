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
        Schema::table('class_schedules', function (Blueprint $table) {
            $table->foreignId('class_id')
                    ->constrained('classes', 'id')
                    ->cascadeOnDelete();
            $table->foreignId('class_mode_id')
                    ->constrained();
            $table->foreignId('room_id')
                    ->nullable()
                    ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class_schedules', function (Blueprint $table) {
            $table->dropForeign(['classes_id']);
            $table->dropForeign(['class_mode_id']);
            $table->dropForeign(['room_id']);
        });
    }
};
