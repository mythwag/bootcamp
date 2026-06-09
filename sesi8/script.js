// 1. Variabel Global & Data Cadangan jika Request Database Bermasalah
let products = [];
let currentCategory = 'Semua';

const fallbackProducts = [
    { id: 1, nama: "Uji Matcha Ceremonial Grade", harga: 185000, deskripsi: "Bubuk matcha murni 100% dari Uji, Kyoto. Rasa umami kuat dan warna hijau cerah.", gambar: "https://images.unsplash.com/photo-1582733315328-80df22791696?q=80&w=400&auto=format&fit=crop", kategori: "Minuman" },
    { id: 2, nama: "Iced Matcha Gula Aren Botol", harga: 38000, deskripsi: "Perpaduan matcha premium, susu segar oat milk, dan gula aren organik siap minum.", gambar: "https://images.unsplash.com/photo-1628114406152-4752b07971d6?q=80&w=400&auto=format&fit=crop", kategori: "Minuman" },
    { id: 6, nama: "Bento Salmon Teriyaki Premium", harga: 65000, deskripsi: "Nasi pulen Jepang, grilled salmon teriyaki, tamagoyaki, salad, dan miso soup.", gambar: "https://images.unsplash.com/photo-1615888210352-ac53c5243af9?q=80&w=400&auto=format&fit=crop", kategori: "Makanan" },
    { id: 14, nama: "Kain Batik Tulis Motif Parang", harga: 420000, deskripsi: "Kain katun primisima dengan batik tulis asli tangan motif Parang Rusak Barong.", gambar: "https://images.unsplash.com/photo-1613098551608-d6b38c230e8c?q=80&w=400&auto=format&fit=crop", kategori: "Kesenian" },
    { id: 16, nama: "Ren'Py J-RPG UI Asset Kit", harga: 110000, deskripsi: "Paket lengkap GUI untuk engine Ren'Py dengan tema modern J-RPG (Menu, Dialog).", gambar: "https://placehold.co/400x300/5e17eb/ffffff?text=Digital+Asset", kategori: "Digital" }
];

// 2. Referensi Elemen DOM
const productGrid = document.getElementById('productGrid');
const searchInput = document.getElementById('searchInput');
const categorySelect = document.getElementById('categorySelect');
const emptyState = document.getElementById('emptyState');

// 3. Fungsi Utility Format Rupiah
const formatRupiah = (angka) => new Intl.NumberFormat('id-ID', { 
    style: 'currency', 
    currency: 'IDR', 
    minimumFractionDigits: 0 
}).format(angka);

// 4. Pengaturan Warna Badge Kategori
const getKategoriColor = (kategori) => {
    switch(kategori) {
        case 'Minuman': return 'bg-success-subtle text-success';
        case 'Makanan': return 'bg-danger-subtle text-danger';
        case 'Kesenian': return 'bg-warning-subtle text-warning';
        case 'Digital': return 'bg-primary-subtle text-primary';
        default: return 'bg-secondary-subtle text-secondary';
    }
};

// 5. Fungsi Render Elemen HTML Kartu Produk
function renderProducts(dataToRender) {
    if (!productGrid) return;
    productGrid.innerHTML = '';

    // Deteksi jika data kosong
    if (!dataToRender || dataToRender.length === 0) {
        if (emptyState) emptyState.classList.remove('d-none');
        return;
    } else {
        if (emptyState) emptyState.classList.add('d-none');
    }

    // Perulangan membuat kartu produk
    dataToRender.forEach(p => {
        const card = `
            <div class="col">
                <div class="product-card card">
                    <div class="card-img-container">
                        <span class="kategori-badge ${getKategoriColor(p.kategori)}">${p.kategori}</span>
                        <img src="${p.gambar}" class="card-img-top" alt="${p.nama}">
                        <div class="price-badge">${formatRupiah(p.harga)}</div>
                        <div class="img-overlay">
                            <i class="fa fa-eye"></i>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">${p.nama}</h5>
                        <p class="deskripsi-produk flex-grow-1">${p.deskripsi}</p>
                        <button class="btn btn-detail w-100">Lihat Karya</button>
                    </div>
                </div>
            </div>
        `;
        productGrid.innerHTML += card;
    });
}

// 6. Logika Filter Kategori dan Input Pencarian
function filterAndSearch() {
    const keyword = searchInput ? searchInput.value.toLowerCase() : '';

    const filtered = products.filter(p => {
        const matchesCategory = (currentCategory === 'Semua') || (p.kategori === currentCategory);
        const matchesSearch = p.nama.toLowerCase().includes(keyword);
        return matchesCategory && matchesSearch;
    });

    renderProducts(filtered);
}

// 7. Ambil Data dari API (Dengan Auto-Fallback Sistem Pengaman)
async function loadProducts() {
    try {
        const response = await fetch("get_products.php");
        if (!response.ok) throw new Error("Koneksi PHP gagal");
        
        products = await response.json();
        console.log("Data berhasil diambil dari get_products.php!");
    } catch(error) {
        console.warn("get_products.php bermasalah. Mengaktifkan data darurat...", error);
        // Menggunakan data cadangan lokal jika PHP/XAMPP mati
        products = fallbackProducts;
    } finally {
        renderProducts(products);
    }
}

// 8. Menghubungkan Event Listener ke Input Kontrol
if (searchInput) {
    searchInput.addEventListener('input', filterAndSearch);
}

if (categorySelect) {
    categorySelect.addEventListener('change', () => {
        currentCategory = categorySelect.value;
        filterAndSearch();
    });
}

// Menjalankan kode saat halaman web telah dimuat sepenuhnya
document.addEventListener("DOMContentLoaded", loadProducts);