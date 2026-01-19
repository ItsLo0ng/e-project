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
        Schema::create('user_feedback', function (Blueprint $table) {
            $table->id('feedback_id');
            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();
            $table->date('feedback_date')->nullable();
            $table->foreignId('user_id')
                ->constrained('users', 'user_id')
                ->cascadeOnDelete();
            $table->foreignId('font_id')
                ->constrained('fonts', 'font_id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_feedback');
    }
};
