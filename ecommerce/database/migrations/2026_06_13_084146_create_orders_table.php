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
    Schema::create('orders', function (Blueprint $table) {
        $table->id(); // Kolom ID otomatis (Sudah ada dari Laravel)
        
        // --- TAMBAHKAN KODE DI BAWAH INI ---
        $table->string('customer_name');          // Nama lengkap pembeli
        $table->string('customer_email');         // Email pembeli untuk kirim notifikasi
        $table->decimal('total_price', 10, 2);    // Total harga yang harus dibayar
        $table->string('status')->default('pending'); // Status pesanan (contoh: pending, paid, shipped)
        // ----------------------------------

        $table->timestamps(); // Kolom waktu otomatis (Sudah ada dari Laravel)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
