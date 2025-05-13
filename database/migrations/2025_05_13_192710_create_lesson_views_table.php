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

    $table->foreignId('user_id')->constrained()->onDelete('cascade');   // الطالب
    $table->foreignId('lesson_id')->constrained()->onDelete('cascade'); // الدرس

    $table->timestamps();

    $table->unique(['user_id', 'lesson_id']); // كل طالب يشاهد الدرس مرة واحدة فقط
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
