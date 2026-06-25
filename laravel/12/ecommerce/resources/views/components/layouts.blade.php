<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Toko Online E-Commerce' }}</title>
    <style>
        /* Desain dasar sederhana */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; display: flex; flex-direction: column; min-height: 100vh; background-color: #f4f6f9; }
        main { flex: 1; padding: 40px 20px; max-width: 1200px; margin: 0 auto; width: 100%; box-sizing: border-box; }
        
        /* Gaya Navbar */
        nav { background-color: #333; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        nav a { color: white; text-decoration: none; margin-left: 20px; font-weight: 500; }
        nav a:hover { color: #4CAF50; }
        .logo { font-size: 20px; font-weight: bold; color: #4CAF50; }

        /* Gaya Footer */
        footer { background-color: #222; color: #aaa; text-align: center; padding: 15px; font-size: 14px; margin-top: auto; }
        
        /* Gaya Kartu Produk & Tabel */
        .grid-produk { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
        .card { background: white; border-radius: 8px; padding: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); border: 1px solid #eee; text-align: center; }
        .btn { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn:hover { background-color: #45a049; }
        table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        th, td { padding: 15px; border-bottom: 1px solid #eee; text-align: left; }
        th { background-color: #eee; color: #333; }
    </style>
</head>
<body>

<nav>
    <div class="logo" style="color: #4CAF50; font-weight: bold; font-size: 20px;">PasarOnline</div>
    <div style="display: flex; align-items: center;">
        <a href="{{ url('/') }}" style="color: white; text-decoration: none; margin-right: 15px;">Home</a>
        <a href="{{ url('/products') }}" style="color: white; text-decoration: none; margin-right: 15px;">Produk</a>
        <a href="{{ url('/cart') }}" style="color: white; text-decoration: none; margin-right: 25px;">Keranjang</a>

        @if (Route::has('login'))
            @auth
                <span style="color: #ff750f; font-weight: 600; margin-right: 15px;">👋 Halo, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}" style="display: inline; margin: 0;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #706f6c; cursor: pointer; font-weight: 600; font-size: 14px;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" style="color: white; text-decoration: none; margin-right: 15px;">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn" style="padding: 6px 12px; font-size: 13px; border-radius: 20px;">Register</a>
                @endif
            @endauth
        @endif
    </div>
</nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        &copy; {{ date('Y') }} PasarOnline E-Commerce. Hak Cipta Dilindungi.
    </footer>

</body>
</html>