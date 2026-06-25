<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // PANGGIL SAKELAR INI AGAR ECOMMERCESEEDER ANDA JALAN AUTOMATIS
        $this->call(EcommerceSeeder::class);
    }
}