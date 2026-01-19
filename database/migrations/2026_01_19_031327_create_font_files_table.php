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
        Schema::create('font_files', function (Blueprint $table) {
            $table->id('file_id');
            $table->foreignId('font_id')
                ->constrained('fonts', 'font_id')
                ->cascadeOnDelete();
            $table->string('file_url');
            $table->string('file_format')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('font_files');
    }
};
