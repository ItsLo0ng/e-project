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
        Schema::create('font_images', function (Blueprint $table) {
            $table->id('image_id');
            $table->foreignId('font_id')
                ->constrained('fonts', 'font_id')
                ->cascadeOnDelete();
            $table->string('image_url');
            $table->string('image_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('font_images');
    }
};
