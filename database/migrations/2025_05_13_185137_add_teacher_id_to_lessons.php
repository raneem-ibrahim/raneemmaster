<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 
  public function up()
{
    Schema::table('lessons', function (Blueprint $table) {
        // إضافة العمود teacher_id بعد العمود id
        $table->unsignedBigInteger('teacher_id')->nullable()->after('id');

        // إضافة المفتاح الخارجي
        $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    // حذف العمود teacher_id في حال التراجع عن التعديل
    Schema::table('lessons', function (Blueprint $table) {
        $table->dropForeign(['teacher_id']);  // حذف المفتاح الخارجي
        $table->dropColumn('teacher_id');    // حذف العمود
    });
}


};
