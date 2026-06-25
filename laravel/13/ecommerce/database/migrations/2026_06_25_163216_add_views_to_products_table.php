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
        Schema::table('products', function (Table $table) {
            // Menambahkan kolom views tipe integer, bawaan nilainya 0, ditaruh setelah kolom stock
            $table->integer('views')->default(0)->after('stock');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Table $table) {
            $table->dropColumn('views');
        });
    }
};
