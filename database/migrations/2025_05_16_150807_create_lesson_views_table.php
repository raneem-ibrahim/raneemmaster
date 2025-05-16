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
       // في ملف migration
Schema::create('lesson_views', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained();
    $table->foreignId('lesson_id')->constrained();
    $table->boolean('is_completed')->default(false);
    $table->integer('progress')->default(0); // النسبة المئوية
    $table->timestamps();
    
    $table->unique(['user_id', 'lesson_id']); // لمنع التكرار
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_views');
    }
};
