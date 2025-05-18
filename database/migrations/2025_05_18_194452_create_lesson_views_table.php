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
       Schema::create('lesson_views', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('lesson_id')->constrained()->onDelete('cascade');
    $table->timestamp('viewed_at')->useCurrent();
    $table->timestamps();
    
    $table->unique(['user_id', 'lesson_id']); // حتى لا يتم تكرار المشاهدة لنفس الدرس
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
