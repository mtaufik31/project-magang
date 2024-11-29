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
        Schema::create('manga', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('alternative');
            $table->string('image');
            $table->enum('status', ['ongoing', 'complete']);
            $table->integer('rating');
            $table->text('description')->nullable();
            $table->year('released_year');
            $table->string('author');
            $table->string('artist');
            $table->string('publisher')->nullable();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');

            $table->text('genre');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manga');
    }
};
