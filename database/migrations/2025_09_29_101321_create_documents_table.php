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
      Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Display name for the document
            $table->string('file_path'); // Path to the file in storage (e.g., 'documents/abc.pdf')
            $table->string('file_name'); // Original file name with extension
            $table->boolean('is_published')->default(false); // To control public visibility
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Who uploaded it
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
