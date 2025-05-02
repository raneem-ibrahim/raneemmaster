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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // معرف المرسل
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // معرف المستقبل
            $table->text('message'); // نص الرسالة
            $table->unsignedBigInteger('in_reply_to')->nullable(); // لربط الرد برسالة سابقة
            $table->timestamps(); // تاريخ ووقت الرسالة
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
