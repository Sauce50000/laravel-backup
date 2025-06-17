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
        Schema::create('record_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "Act", "Regulation", "Document"
            $table->string('title_en'); // English title
            $table->string('slug')->unique(); // URL-friendly slug
            $table->foreignId('record_type_id')
                ->constrained() // Foreign key to record_types table
                ->onDelete('cascade'); // Cascade delete if record type is deleted
            $table->softDeletes(); // Soft delete support
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_categories');
    }
};
