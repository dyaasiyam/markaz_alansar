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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // اسم الأب
            $table->string('id_number')->unique()->nullable();//رقم الهوية
            $table->string('phone')->nullable();//رقم جوال الأب
            $table->string('jobs')->nullable();//مهنة ولي الامر
            $table->string('live')->nullable();//السكن
            $table->string('bio')->nullable();//المال
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
