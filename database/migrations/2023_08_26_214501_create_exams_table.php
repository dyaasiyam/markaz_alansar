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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // المفتاح الخارجي إلى جدول الطلاب
            $table->unsignedBigInteger('teacher_id'); // المفتاح الخارجي إلى جدول المعلمين
            $table->string('exam_name'); // اسم الاختبار
            $table->string('status'); // الدرجة
            $table->integer('score'); // الدرجة
            $table->timestamps();

            // إضافة العلاقة مع جدول الطلاب
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // إضافة العلاقة مع جدول المعلمين
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
