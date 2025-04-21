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
                    $table->id();
                    $table->string('first_name');
                    $table->string('last_name');
                    $table->string('email')->unique();
                    $table->timestamp('email_verified_at')->nullable();
                    $table->string('password');
                    $table->integer('age');
                    $table->string('image')->nullable();
                    $table->enum('gender', ['male', 'female']);
                    $table->json('desired_study')->nullable(); // لتخزين المواد الدراسية المختارة
                    $table->enum('role', ['student', 'teacher', 'admin'])->default('student');
                    // الأعمدة المضافة للمعلمين فقط:
                    $table->tinyInteger('min_age')->nullable(); // الحد الأدنى لعمر الطالب الذي يدرّسه المعلم
                    $table->tinyInteger('max_age')->nullable(); // الحد الأعلى لعمر الطالب
                    $table->enum('teaching_type', ['hifz', 'tajweed', 'both'])->nullable(); // نوع التعليم
                    $table->rememberToken();
                    $table->timestamps();
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
