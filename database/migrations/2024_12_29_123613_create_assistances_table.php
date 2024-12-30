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
        Schema::create('assistances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_id')->constrained('volunteers')->onDelete('cascade');
            $table->foreignId('blind_id')->constrained('blinds')->onDelete('cascade');
            $table->foreignId('help_request_id')->nullable()->constrained('help_requests')->onDelete('cascade');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('completed_at')->nullable(); // لتخزين وقت اكتمال المساعدة
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistances');
    }
};
