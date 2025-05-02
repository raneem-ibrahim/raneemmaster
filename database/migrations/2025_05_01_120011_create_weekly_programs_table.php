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
        Schema::create('weekly_programs', function (Blueprint $table) {
            $table->id();
$table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
$table->date('week_start');
$table->enum('program_type', ['حفظ', 'مراجعة']);
$table->timestamps();

        });     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_programs');
    }
};
