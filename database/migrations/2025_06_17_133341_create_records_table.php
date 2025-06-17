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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title of the record
            $table->string('title_en'); // English title of the record
            $table->string('slug')->unique(); // URL-friendly slug for the record
            $table->string('file_path'); // Path to the file associated with the record
            $table->foreignId('record_type_id')->constrained()->onDelete('cascade');
            $table->foreignId('record_category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); // Soft delete support
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
