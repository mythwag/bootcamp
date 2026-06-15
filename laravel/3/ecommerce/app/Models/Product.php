<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tambahkan baris ini agar semua kolom (name, price, stock, image, dll) boleh diisi oleh Seeder
    protected $guarded = [];
}