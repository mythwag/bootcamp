<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Tambahkan fungsi create ini
    public function create()
    {
        return 'Menampilkan halaman formulir checkout pembayaran (OrderController)';
    }
}