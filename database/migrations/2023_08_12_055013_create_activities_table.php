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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('teacher_id'); // إضافة مفتاح خارجي للمعلم
            $table->timestamps();
            $table->enum('status', ['مقبول', 'مرفوض'])->default('مرفوض'); // إضافة حقل الحالة


            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
