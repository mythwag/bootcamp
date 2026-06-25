<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek: Apakah user sudah login dan apakah perannya adalah 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Lolos, boleh masuk halaman admin
        }

        // Jika bukan admin, arahkan kembali ke halaman utama dengan pesan peringatan
        return redirect('/')->with('error', 'Akses ditolak! Anda bukan Admin.');
    }
}