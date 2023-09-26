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
            $table->string('name');//اسم الطالب
            $table->integer('number')->unique();//الايميل
            $table->string('password');//كلمة المرور
            $table->date('date')->nullable();//عمر
            $table->integer('exams');//اختبارات مجتمة
            $table->integer('exam');//اختبارات منفردة
            $table->integer('parts');//عدد أجزاء الحفظ
            $table->foreignId('stage_id'); // مفتاح خارجي يشير إلى المرحلة
            $table->foreignId('circle_id'); // مفتاح خارجي يشير إلى الحلقة
            $table->foreignId('parent_id')->nullable(); // مفتاح خارجي يشير إلى الأب
            $table->string('image')->nullable();//صورة الطالب
            $table->unsignedBigInteger('teacher_id'); // مفتاح خارجي


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
