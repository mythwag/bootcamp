<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
{
    protected $table = 'categories'; // Memastikan membaca tabel 'categories' Anda
    protected $guarded = [];

    // Relasi: Satu kategori punya banyak produk
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}