
    // 1. Data Produk (Realistis & Visual Menarik)
    // const products = [
    //     // --- Minuman ---
    //     { id: 1, nama: "Uji Matcha Ceremonial Grade", harga: 185000, deskripsi: "Bubuk matcha murni 100% dari Uji, Kyoto. Rasa umami kuat dan warna hijau cerah.", gambar: "https://images.unsplash.com/photo-1582733315328-80df22791696?q=80&w=400&auto=format&fit=crop", kategori: "Minuman" },
    //     { id: 2, nama: "Iced Matcha Gula Aren Botol", harga: 38000, deskripsi: "Perpaduan matcha premium, susu segar oat milk, dan gula aren organik siap minum.", gambar: "https://images.unsplash.com/photo-1628114406152-4752b07971d6?q=80&w=400&auto=format&fit=crop", kategori: "Minuman" },
    //     { id: 3, nama: "Japanese Hojicha Tea Loose Leaf", harga: 95000, deskripsi: "Teh hijau panggang dengan aroma smoky dan rasa karamel alami. Rendah kafein.", gambar: "https://images.unsplash.com/photo-1596706918804-92764f620803?q=80&w=400&auto=format&fit=crop", kategori: "Minuman" },
    //     { id: 4, nama: "Es Teh Kampul Solo", harga: 18000, deskripsi: "Seduhan teh pekat khas Solo disajikan dingin dengan perasan jeruk nipis segar.", gambar: "https://images.unsplash.com/photo-1556679343-c7306c1976bc?q=80&w=400&auto=format&fit=crop", kategori: "Minuman" },
    //     { id: 5, nama: "Kopi Tubruk Robusta Gayo", harga: 30000, deskripsi: "Biji kopi robusta Gayo pilihan dilingling medium, menghasilkan rasa *body* kuat.", gambar: "https://images.unsplash.com/photo-1514432324609-631035559887?q=80&w=400&auto=format&fit=crop", kategori: "Minuman" },
    //     // --- Makanan ---
    //     { id: 6, nama: "Bento Salmon Teriyaki Premium", harga: 65000, deskripsi: "Nasi pulen Jepang, grilled salmon teriyaki, tamagoyaki, salad, dan miso soup.", gambar: "https://images.unsplash.com/photo-1615888210352-ac53c5243af9?q=80&w=400&auto=format&fit=crop", kategori: "Makanan" },
    //     { id: 7, nama: "Ekkado Telur Puyuh (isi 5)", harga: 28000, deskripsi: "Cincangan ayam dan udang dibungkus kulit tahu dengan telur puyuh utuh di dalamnya.", gambar: "https://images.unsplash.com/photo-1626202157438-e6557623a9d9?q=80&w=400&auto=format&fit=crop", kategori: "Makanan" },
    //     { id: 8, nama: "Matcha Mille Crepes Slice", harga: 42000, deskripsi: "Kue lapis tipis Prancis dengan krim diplomat matcha lembut dan taburan matcha powder.", gambar: "https://images.unsplash.com/photo-1586985289906-406988974504?q=80&w=400&auto=format&fit=crop", kategori: "Makanan" },
    //     { id: 9, nama: "Onigiri Tuna Mayo & Salmon", harga: 22000, deskripsi: "Paket 2 pcs nasi kepal Jepang dengan nori renyah dan isian padat tuna mayo & salmon grill.", gambar: "https://images.unsplash.com/photo-1612929633738-8fe44f7ec841?q=80&w=400&auto=format&fit=crop", kategori: "Makanan" },
    //     { id: 10, nama: "Kue Putu Bambu Melayu", harga: 18000, deskripsi: "5 pcs kue putu tepung beras berisi gula merah cair, dikukus dalam bambu dengan parutan kelapa.", gambar: "https://images.unsplash.com/photo-1621466561491-c9183416436e?q=80&w=400&auto=format&fit=crop", kategori: "Makanan" },
    //     // --- Kesenian ---
    //     { id: 11, nama: "Set Angklung Bambu Diatonis", harga: 210000, deskripsi: "Satu set angklung bambu hitam standar nada diatonis (Do-Re-Mi), buatan artisan Jawa Barat.", gambar: "https://images.unsplash.com/photo-1634661730045-816d8d641d4c?q=80&w=400&auto=format&fit=crop", kategori: "Kesenian" },
    //     { id: 12, nama: "Suling Bambu Pelog", harga: 60000, deskripsi: "Suling bambu tunggal dengan laras Pelog untuk musik tradisional Jawa/Bali.", gambar: "https://images.unsplash.com/photo-1616781292025-1678b87a81b7?q=80&w=400&auto=format&fit=crop", kategori: "Kesenian" },
    //     { id: 13, nama: "Miniatur Gamelan Saron Bonang", harga: 550000, deskripsi: "Replika presisi instrumen Saron & Bonang berbahan kuningan tempa dan kayu ukir.", gambar: "https://images.unsplash.com/photo-1636127111815-f5b2e6a39281?q=80&w=400&auto=format&fit=crop", kategori: "Kesenian" },
    //     { id: 14, nama: "Kain Batik Tulis Motif Parang", harga: 420000, deskripsi: "Kain katun primisima dengan batik tulis asli tangan motif Parang Rusak Barong khas Jogja.", gambar: "https://images.unsplash.com/photo-1613098551608-d6b38c230e8c?q=80&w=400&auto=format&fit=crop", kategori: "Kesenian" },
    //     { id: 15, nama: "Poster Kanvas 'Ghibli Sawah'", harga: 140000, deskripsi: "Seni cetak kanvas berkualitas museum, ilustrasi pemandangan sawah estetik gaya Studio Ghibli.", gambar: "https://images.unsplash.com/photo-1578301978693-85fa9c0320b9?q=80&w=400&auto=format&fit=crop", kategori: "Kesenian" },
    //     // --- Digital ---
    //     { id: 16, nama: "Ren'Py J-RPG UI Asset Kit", harga: 110000, deskripsi: "Paket lengkap GUI untuk engine Ren'Py dengan tema modern J-RPG (Menu, Dialog, Battle).", gambar: "https://placehold.co/400x300/e0e0e0/5e17eb?text=Digital+Asset", kategori: "Digital" },
    //     { id: 17, nama: "Rural VN Background Pack 4K", harga: 175000, deskripsi: "20 gambar latar visual novel beresolusi 4K dengan tema pedesaan asri khas anime.", gambar: "https://placehold.co/400x300/e0e0e0/5e17eb?text=BG+Art+Pack", kategori: "Digital" },
    //     { id: 18, nama: "Source Code MVC E-Commerce Laravel", harga: 299000, deskripsi: "Sistem toko online siap pakai dengan Laravel 10, clean code, fitur Payment Gateway & Ongkir.", gambar: "https://placehold.co/400x300/e0e0e0/5e17eb?text=Laravel+Template", kategori: "Digital" },
    //     { id: 19, nama: "3D Model Joglo Lo-Fi Optimized", harga: 220000, deskripsi: "Aset 3D Rumah Joglo dengan tekstur Lo-Fi estetik, dioptimasi untuk game engine/VR.", gambar: "https://placehold.co/400x300/e0e0e0/5e17eb?text=3D+Joglo", kategori: "Digital" },
    //     { id: 20, nama: "Character Sprite Pack Anime Style", harga: 105000, deskripsi: "Karakter sprite 2D dengan 10 variasi pose dan 15 ekspresi wajah untuk game visual novel.", gambar: "https://placehold.co/400x300/e0e0e0/5e17eb?text=Sprite+Pack", kategori: "Digital" }
    // ];
    let products = [];

    // References
    const productGrid = document.getElementById('productGrid');
    const searchInput = document.getElementById('searchInput');
    const filterPills = document.getElementById('categoryFilterPills');
    const emptyState = document.getElementById('emptyState');

    let currentCategory = 'Semua';

    // Utilities
    const formatRupiah = (angka) => new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(angka);

    const getKategoriColor = (kategori) => {
        switch(kategori) {
            case 'Minuman': return 'bg-success-subtle text-success';
            case 'Makanan': return 'bg-danger-subtle text-danger';
            case 'Kesenian': return 'bg-warning-subtle text-warning';
            case 'Digital': return 'bg-primary-subtle text-primary';
            default: return 'bg-secondary-subtle text-secondary';
        }
    };

    // 2. Render Products function
    function renderProducts(dataToRender) {
        productGrid.innerHTML = '';

        if (dataToRender.length === 0) {
            emptyState.classList.remove('d-none');
            return;
        } else {
            emptyState.classList.add('d-none');
        }

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

    // 3 & 4. Filter and Search Logic
    function filterAndSearch() {
        const keyword = searchInput.value.toLowerCase();

        const filtered = products.filter(p => {
            const matchesCategory = (currentCategory === 'Semua') || (p.kategori === currentCategory);
            const matchesSearch = p.nama.toLowerCase().includes(keyword);
            return matchesCategory && matchesSearch;
        });

        renderProducts(filtered);
    }

    // Events
    searchInput.addEventListener('input', filterAndSearch);

    // Event for Filter Pills (Handle active state & value)
    filterPills.addEventListener('click', (e) => {
        const clickedPill = e.target;
        
        // Ensure only buttons are processed
        if (!clickedPill.matches('.filter-pill')) return;

        // Update active class
        document.querySelectorAll('.filter-pill').forEach(btn => btn.classList.remove('active'));
        clickedPill.classList.add('active');

        // Set current category and filter
        currentCategory = clickedPill.getAttribute('data-category');
        filterAndSearch();
    });

    // Initial render
    loadProducts();

async function loadProducts() {

    try {

        const response = await fetch("get_products.php");

        products = await response.json();

        renderProducts(products);

    } catch(error) {

        console.log(error);

    }

}