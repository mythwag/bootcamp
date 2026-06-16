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
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // Kolom ID otomatis (Sudah ada dari Laravel)
        
        // --- TAMBAHKAN KODE DI BAWAH INI ---
        $table->string('name');                  // Kolom untuk nama produk
        $table->text('description')->nullable(); // Kolom deskripsi (boleh kosong)
        $table->decimal('price', 10, 2);         // Kolom harga (contoh: 150000.00)
        $table->integer('stock')->default(0);    // Kolom stok barang (default mulai dari angka 0)
        // ----------------------------------

        $table->timestamps(); // Kolom waktu dibuat & diupdate (Sudah ada dari Laravel)
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
