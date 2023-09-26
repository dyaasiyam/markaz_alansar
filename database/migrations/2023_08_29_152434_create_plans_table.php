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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // المفتاح الخارجي إلى جدول الطلاب
            $table->unsignedBigInteger('teacher_id'); // المفتاح الخارجي إلى جدول المعلمين
            //بند الحفظ to for
            $table->integer('to')->nullable();
            $table->integer('for')->nullable();
            $table->integer('count')->nullable();
            //بند المراجعة
            $table->integer('to_r')->nullable();
            $table->integer('for_r')->nullable();
            $table->integer('count_r')->nullable();
            $table->double('completionPercentage', 5, 2)->nullable();
            $table->double('completionPercentage_r', 5, 2)->nullable();
            $table->boolean('completed')->default(false);


            $table->string('month')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('plans');
    }
};
