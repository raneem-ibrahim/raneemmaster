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
        Schema::create('daily_programs', function (Blueprint $table) {
            $table->id();
    $table->foreignId('weekly_program_id')->constrained()->onDelete('cascade');
    $table->foreignId('surah_id')->constrained()->nullable();
    $table->string('day_name'); // الأحد، الاثنين...
    $table->enum('type', ['حفظ', 'مراجعة', 'سرد']);
    $table->enum('portion_type', ['نصف صفحة', 'صفحة', 'صفحتين'])->nullable();
    $table->integer('from_verse')->nullable();
    $table->integer('to_verse')->nullable();
    $table->text('notes')->nullable();
    $table->date('date');
    $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_programs');
    }
};
