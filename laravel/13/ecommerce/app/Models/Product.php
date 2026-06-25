<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    // Mengizinkan semua kolom diisi secara massal
    protected $guarded = []; 

    // Relasi: Setiap produk berkiblat pada satu kategori
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}