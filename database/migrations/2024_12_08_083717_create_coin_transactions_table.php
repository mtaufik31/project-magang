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
        Schema::create('coin_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('amount'); // Jumlah coin yang ditransaksikan
            $table->enum('type', ['topup', 'purchase', 'refund']); // Jenis transaksi
            $table->decimal('price', 10, 2)->nullable(); // Harga aktual dalam rupiah
            $table->string('payment_method')->nullable(); // Metode pembayaran
            $table->string('transaction_id')->nullable(); // ID transaksi eksternal
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coin_transactions');
    }
};
