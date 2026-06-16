<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Overview
        </h2>
    </x-slot>

    <div class="py-12" style="font-family: sans-serif;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800">Selamat Datang Kembali, {{ Auth::user()->name }}!</h3>
                <p class="text-sm text-gray-600">Berikut adalah ringkasan performa toko PasarOnline Anda saat ini.</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                
                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-left: 5px solid #4CAF50; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-size: 14px; color: #777; font-weight: 600; margin: 0;">Jumlah Produk</p>
                        <h4 style="font-size: 28px; font-weight: bold; color: #1b1b18; margin: 5px 0 0 0;">{{ $total_products }}</h4>
                    </div>
                    <div style="font-size: 36px; background: #e8f5e9; padding: 10px; border-radius: 50px; line-height: 1; color: #4CAF50;">📦</div>
                </div>

                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-left: 5px solid #1b1b18; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-size: 14px; color: #777; font-weight: 600; margin: 0;">Kategori Produk</p>
                        <h4 style="font-size: 28px; font-weight: bold; color: #1b1b18; margin: 5px 0 0 0;">{{ $total_categories }}</h4>
                    </div>
                    <div style="font-size: 36px; background: #f5f5f5; padding: 10px; border-radius: 50px; line-height: 1; color: #1b1b18;">🗂️</div>
                </div>

                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-left: 5px solid #ff750f; display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-size: 14px; color: #777; font-weight: 600; margin: 0;">Total Klik Produk</p>
                        <h4 style="font-size: 28px; font-weight: bold; color: #1b1b18; margin: 5px 0 0 0;">{{ $total_clicks }} <span style="font-size: 14px; font-weight: normal; color: #888;">kali</span></h4>
                    </div>
                    <div style="font-size: 36px; background: #fff3e0; padding: 10px; border-radius: 50px; line-height: 1; color: #ff750f;">👆</div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>