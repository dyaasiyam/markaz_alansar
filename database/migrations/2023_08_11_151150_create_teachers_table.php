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
            Schema::create('teachers', function (Blueprint $table) {
                $table->id();
                $table->string('name'); // اسم المعلم
                $table->integer('number')->unique();//الايميل
                $table->string('password');//كلمة المرور
                $table->string('email');//كلمة المرور
                $table->string('image')->nullable();//صورة المعلم
                $table->string('phone')->nullable();//رقم الجوال
                $table->string('id_number')->unique()->nullable();//رقم الهوية
                $table->unsignedBigInteger('stage_id');
                $table->unsignedBigInteger('circle_id');
                $table->foreign('stage_id')->references('id')->on('stages')->onDelete('cascade');
                $table->foreign('circle_id')->references('id')->on('circles')->onDelete('cascade');

                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
