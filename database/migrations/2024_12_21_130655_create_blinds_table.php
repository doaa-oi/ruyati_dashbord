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
        Schema::create('blinds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('age');
            $table->string('city');
            $table->string('phone');
            $table->string('gender');
            $table->string('user_type')->default('blind');
            $table->tinyInteger('status')->default(1); // تغيير نوع العمود إلى tinyInteger مع قيمة افتراضية 0
            $table->timestamps();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade')   // عند حذف المستخدم، سيتم حذف السجل المقابل في blinds
            ->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blinds');
    }
};
