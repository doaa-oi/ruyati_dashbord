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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_id')->constrained('volunteers')->onDelete('cascade');
            $table->foreignId('blind_id')->constrained('blinds')->onDelete('cascade'); // معرف الكفيف
            $table->text('message'); // رسالة البلاغ
            $table->boolean('status')->default(0); // حقل للاشارة إن كان مفعل أو لا (0 لغير مفعل و1 لمفعل).
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
