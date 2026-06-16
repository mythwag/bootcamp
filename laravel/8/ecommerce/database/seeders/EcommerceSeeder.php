<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcommerceSeeder extends Seeder
{
    public function run(): void
    {
        // Kosongkan tabel lama terlebih dahulu agar tidak bentrok atau duplikat
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('categories')->truncate();
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Masukkan Data Kategori
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Makanan & Minuman', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Pakaian', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Elektronik', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // 2. Masukkan Data Produk
        DB::table('products')->insert([
            [
                'name' => 'Premium Matcha Latte',
                'description' => 'Bubuk matcha murni berkualitas tinggi dengan susu segar creamy.',
                'price' => 45000.00,
                'stock' => 50,
                'image' => 'matcha.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kopi Susu Kampung',
                'description' => 'Kopi lokal pilihan dengan racikan gula aren manis alami.',
                'price' => 25000.00,
                'stock' => 100,
                'image' => 'kopi.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kaos Polos Premium',
                'description' => 'Bahan katun combed 30s dingin dan nyaman dipakai harian.',
                'price' => 85000.00,
                'stock' => 30,
                'image' => 'kaos.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}