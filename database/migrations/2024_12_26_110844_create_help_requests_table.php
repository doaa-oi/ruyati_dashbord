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
        Schema::create('help_requests', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // أو text إذا كان العنوان طويلًا
            $table->text('description');
            $table->string('status')->default('معلق');
            $table->string('location_url')->nullable();
            $table->foreignId('user_id')
            ->constrained('blinds')
            ->onDelete('cascade')   // عند حذف المستخدم، سيتم حذف السجل المقابل في blinds
            ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('help_requests');
    }
};
