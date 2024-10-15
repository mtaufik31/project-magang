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
            $table->string('title'); // Ganti varchar dengan string
            $table->text('description')->nullable();
            $table->enum('status', ['ongoing', 'complete']);
            $table->year('release_year');
            $table->string('author'); // Ganti varchar dengan string
            $table->string('publisher')->nullable(); // Ganti varchar dengan string
            $table->unsignedBigInteger('posted_by');
            $table->date('posted_on');
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
