<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Bento Cake - Tbloom Cake & Bakery</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap');
        .font-serif-custom { font-family: 'Playfair Display', serif; }
        .font-sans-custom { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-[#F7E3DF] text-[#251306] font-sans-custom min-h-screen flex flex-col selection:bg-[#CD3281] selection:text-white">

    <!-- NAVBAR DESKTOP -->
    <header class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-[#C3B59C]/30 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Logo" class="h-10 md:h-12 object-contain">
            </a>
            <div class="flex-1 max-w-sm mx-4">
                <div class="relative">
                    <input type="text" placeholder="Cari bento cake..." class="w-full bg-[#F7E3DF]/40 border border-[#C3B59C]/50 rounded-full py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition placeholder:text-gray-400">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>
            <nav class="flex items-center gap-6 text-xs font-semibold text-[#512323]">
                <a href="{{ route('home') }}" class="hover:text-[#CD3281] transition">Beranda</a>
                <a href="{{ route('bento.cake') }}" class="text-[#CD3281] transition">Kategori</a>
                <a href="{{ route('home') }}#riwayat-pesanan-section" class="hover:text-[#CD3281] transition">Riwayat Pesanan</a>
            </nav>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('cart') }}" class="relative p-2.5 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] rounded-full text-[#CD3281] transition shadow-sm">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-[#CD3281] text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA DETAIL BENTO CAKE -->
    <main class="flex-1 max-w-4xl w-full mx-auto px-6 py-10 space-y-8">
        <div>
            <a href="{{ route('bento.cake') }}" class="inline-flex items-center gap-2 bg-white/80 hover:bg-white text-[#512323] px-4 py-2 rounded-full text-xs font-semibold shadow-sm border border-[#C3B59C]/40 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog Bento Cake
            </a>
        </div>

        <div class="bg-white rounded-3xl p-8 md:p-12 border border-[#C3B59C]/40 shadow-lg grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            
            <!-- Sisi Kiri: Foto Kue Dinamis -->
            <div class="space-y-4">
                <div class="h-80 md:h-96 rounded-2xl overflow-hidden bg-gray-100 shadow-inner border border-[#C3B59C]/20 relative">
                    <img id="product-img" src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=800&q=80" alt="Bento Cake Detail" class="w-full h-full object-cover">
                    <span class="absolute top-3 left-3 bg-[#CD3281] text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow-sm">Ready Stock</span>
                </div>
            </div>

            <!-- Sisi Kanan: Spesifikasi Bento Dinamis -->
            <div class="space-y-6">
                
                <div class="flex items-start justify-between border-b border-gray-100 pb-4">
                    <div>
                        <h1 id="product-name" class="text-2xl font-serif-custom font-bold text-[#251306]">Bento Minimalist Heart</h1>
                        <p class="text-xs text-gray-400 mt-0.5">Desain & Dekorasi Sesuai Foto Katalog</p>
                        <p id="product-price" class="text-base font-bold text-[#CD3281] mt-1" data-price="55000">Rp 55.000</p>
                    </div>

                    <!-- Kuantitas -->
                    <div class="flex items-center bg-[#F7E3DF]/60 border border-[#C3B59C]/50 rounded-xl overflow-hidden shadow-sm">
                        <button onclick="decrementQty()" class="px-3 py-2 text-[#512323] hover:bg-[#CD3281] hover:text-white transition text-xs font-bold"><i class="fa-solid fa-minus"></i></button>
                        <span id="qtyNumber" class="px-4 py-2 text-xs font-bold text-[#251306]">1</span>
                        <button onclick="incrementQty()" class="px-3 py-2 text-[#512323] hover:bg-[#CD3281] hover:text-white transition text-xs font-bold"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>

                <!-- Tombol Deskripsi / Packaging Includes -->
                <div class="space-y-2">
                    <button onclick="toggleDescription()" class="inline-flex items-center gap-2 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] text-[#512323] border border-[#C3B59C]/60 px-4 py-2 rounded-xl text-xs font-semibold transition shadow-sm">
                        <i id="descIcon" class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"></i>
                        <span>Deskripsi & Packaging Includes</span>
                    </button>

                    <div id="descBox" class="hidden bg-[#F7E3DF]/30 border border-[#C3B59C]/40 rounded-2xl p-4 space-y-2 text-xs text-[#251306]">
                        <p class="font-bold text-[#512323] tracking-wide uppercase text-[10px]">Packaging Includes:</p>
                        <ol class="list-decimal list-inside space-y-1 text-gray-700 leading-relaxed">
                            <li><strong>Bagasse Ecofriendly Box</strong> (Box ramah lingkungan)</li>
                            <li><strong>A wooden fork / knife</strong> (Sendok kayu / pisau)</li>
                            <li><strong>Greeting Card</strong> (Kartu ucapan)</li>
                            <li><strong>Gold Candle</strong> (Lilin warna emas)</li>
                        </ol>
                    </div>
                </div>

                <!-- Pilihan Ukuran -->
                <div class="space-y-2">
                    <label class="block text-xs font-bold text-[#512323] uppercase tracking-wider">Ukuran</label>
                    <div class="flex flex-wrap gap-2">
                        <button onclick="selectOption(this, 'ukuran')" data-value="10cm" class="option-ukuran py-2 px-4 rounded-full border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white">10cm</button>
                        <button onclick="selectOption(this, 'ukuran')" data-value="12cm" class="option-ukuran py-2 px-4 rounded-full border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white">12cm</button>
                        <button onclick="selectOption(this, 'ukuran')" data-value="15cm" class="option-ukuran py-2 px-4 rounded-full border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white">15cm</button>
                        <button onclick="selectOption(this, 'ukuran')" data-value="18cm" class="option-ukuran py-2 px-4 rounded-full border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white">18cm</button>
                    </div>
                </div>

                <!-- Input Tulisan Cake -->
                <div class="space-y-3 pt-2">
                    <div>
                        <label class="block text-xs font-bold text-[#512323] mb-1">Tulisan cake (Opsional / Sesuai Keinginan) :</label>
                        <input id="input-tulisan" type="text" placeholder="Contoh: Happy Birthday Ribi" class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/60 rounded-xl px-4 py-2.5 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                    </div>
                </div>

                <!-- Tombol Tambahkan ke Keranjang -->
                <div class="pt-4">
                    <button onclick="addToCart()" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white py-3.5 rounded-2xl text-xs font-bold flex items-center justify-center gap-2 shadow-md transition transform active:scale-95 cursor-pointer">
                        <i class="fa-solid fa-cart-plus"></i> Tambahkan ke Keranjang
                    </button>
                </div>

            </div>

        </div>
    </main>

    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

    <!-- SCRIPT -->
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const paramName = urlParams.get('name');
        const paramPrice = urlParams.get('price');
        const paramImg = urlParams.get('img');

        if (paramName) {
            document.getElementById('product-name').innerText = paramName;
        }
        if (paramPrice) {
            document.getElementById('product-price').innerText = 'Rp ' + parseInt(paramPrice).toLocaleString('id-ID');
            document.getElementById('product-price').setAttribute('data-price', paramPrice);
        }
        if (paramImg) {
            document.getElementById('product-img').src = paramImg;
        }

        let quantity = 1;
        function incrementQty() {
            quantity++;
            document.getElementById('qtyNumber').innerText = quantity;
        }
        function decrementQty() {
            if (quantity > 1) {
                quantity--;
                document.getElementById('qtyNumber').innerText = quantity;
            }
        }

        function toggleDescription() {
            const box = document.getElementById('descBox');
            const icon = document.getElementById('descIcon');
            box.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function selectOption(button, groupClass) {
            document.querySelectorAll('.option-' + groupClass).forEach(btn => {
                btn.classList.remove('bg-[#CD3281]', 'text-white', 'border-[#CD3281]');
                btn.classList.add('bg-white', 'text-[#512323]');
            });
            button.classList.remove('bg-white', 'text-[#512323]');
            button.classList.add('bg-[#CD3281]', 'text-white', 'border-[#CD3281]');
            button.setAttribute('data-selected', 'true');
        }

        function updateCartCountBadge() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            let totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.innerText = totalCount;
        }

        function addToCart() {
            const selectedUkuran = document.querySelector('.option-ukuran.bg-\\[\\#CD3281\\]');
            const tulisan = document.getElementById('input-tulisan').value.trim();

            if (!selectedUkuran) {
                alert('Mohon pilih ukuran bento cake terlebih dahulu!');
                return;
            }

            const newItem = {
                category: 'bento',
                name: document.getElementById('product-name').innerText,
                price: parseInt(document.getElementById('product-price').getAttribute('data-price')),
                image: document.getElementById('product-img').src,
                size: selectedUkuran.getAttribute('data-value'),
                note: tulisan ? tulisan : 'Tanpa Request Tulisan',
                customText: tulisan ? tulisan : 'Tanpa Request Tulisan',
                qty: quantity
            };

            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            cart.push(newItem);
            localStorage.setItem('tbloom_cart', JSON.stringify(cart));

            updateCartCountBadge();
            alert('Berhasil menambahkan Bento Cake ke keranjang!');
        }

        window.onload = function() {
            updateCartCountBadge();
        }
    </script>
</body>
</html>