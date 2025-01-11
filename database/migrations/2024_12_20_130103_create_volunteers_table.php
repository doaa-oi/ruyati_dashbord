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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('age');
            $table->string('city');
            $table->string('phone');
            $table->string('national_id');
            $table->string('gender');
            $table->string('assistance_type');
            $table->text('available_days'); // سيتم تخزين الأيام كسلسلة نصية
            $table->string('available_from');
            $table->string('available_to');
            $table->string('user_type')->default('volunteer');
            $table->enum('availability', ['متاح', 'غير متاح'])->default('متاح'); // تعيين القيمة الافتراضية
            $table->decimal('rating')->default(0);
            $table->boolean('status')->default(0); // حقل للاشارة إن كان مفعل أو لا (0 لغير مفعل و1 لمفعل).
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
        Schema::dropIfExists('volunteers');
    }
};
