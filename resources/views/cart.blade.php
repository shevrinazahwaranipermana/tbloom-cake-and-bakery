<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja - Tbloom Cake & Bakery</title>
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
                    <input type="text" placeholder="Cari cake favoritmu..." class="w-full bg-[#F7E3DF]/40 border border-[#C3B59C]/50 rounded-full py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition placeholder:text-gray-400">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>
            <nav class="flex items-center gap-6 text-xs font-semibold text-[#512323]">
                <a href="{{ route('home') }}" class="hover:text-[#CD3281] transition">Beranda</a>
                <a href="{{ route('simple.cake') }}" class="hover:text-[#CD3281] transition">Kategori</a>
                <a href="{{ route('home') }}#riwayat-pesanan-section" class="hover:text-[#CD3281] transition">Riwayat Pesanan</a>
            </nav>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('cart') }}" class="relative p-2.5 bg-[#CD3281] text-white rounded-full transition shadow-sm">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-white text-[#CD3281] text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA KERANJANG -->
    <main class="flex-1 max-w-3xl w-full mx-auto px-6 py-10 space-y-8">
        
        <!-- Header Judul & Tombol Hapus Semua -->
        <div class="flex items-center justify-between bg-white/60 backdrop-blur-md border border-[#C3B59C]/40 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#512323] shadow-sm hover:bg-[#CD3281] hover:text-white transition">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                </a>
                <h1 class="text-2xl md:text-3xl font-serif-custom font-bold text-[#251306]">Keranjang</h1>
            </div>
            <button onclick="clearCart()" id="clear-btn" class="text-xs font-semibold text-[#CD3281] hover:underline transition cursor-pointer">
                Hapus Semua
            </button>
        </div>

        <!-- CONTAINER ITEM KERANJANG -->
        <div id="cart-container" class="space-y-6">
            <!-- Render via JavaScript -->
        </div>

        <!-- KONDISI KERANJANG KOSONG -->
        <div id="empty-cart" class="hidden bg-white rounded-3xl p-12 border border-[#C3B59C]/40 shadow-sm text-center space-y-4">
            <div class="w-20 h-20 bg-[#F7E3DF] text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-3xl shadow-inner">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <h3 class="text-xl font-serif-custom font-bold text-[#251306]">Keranjang Kosong</h3>
            <p class="text-xs text-gray-500 max-w-sm mx-auto">Belum ada kue yang ditambahkan ke keranjang belanja Anda.</p>
            <div class="pt-2 flex justify-center gap-3">
                <a href="{{ route('simple.cake') }}" class="bg-[#CD3281] hover:bg-[#b0256c] text-white font-semibold text-xs py-3 px-6 rounded-full shadow-md transition">
                    Belanja Simple Cake
                </a>
                <a href="{{ route('bento.cake') }}" class="bg-[#512323] hover:bg-[#381717] text-white font-semibold text-xs py-3 px-6 rounded-full shadow-md transition">
                    Belanja Bento Cake
                </a>
            </div>
        </div>

        <!-- BAGIAN TOTAL & CHECKOUT -->
        <div id="checkout-section" class="bg-white rounded-3xl p-8 border border-[#C3B59C]/40 shadow-md space-y-6">
            <div class="flex items-center justify-between border-b border-gray-100 pb-4">
                <span class="text-lg font-serif-custom font-bold text-[#251306]">Total</span>
                <span id="grand-total" class="text-xl font-bold text-[#CD3281]">Rp 0</span>
            </div>

            <button onclick="checkoutAction()" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white py-4 rounded-full text-sm font-bold shadow-lg transition transform active:scale-95 text-center cursor-pointer">
                Checkout
            </button>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

    <!-- SCRIPT RENDER KERANJANG AMAN DARI UNDEFINED -->
    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            const container = document.getElementById('cart-container');
            const emptyState = document.getElementById('empty-cart');
            const checkoutSection = document.getElementById('checkout-section');
            const clearBtn = document.getElementById('clear-btn');

            container.innerHTML = '';

            if (cart.length === 0) {
                container.classList.add('hidden');
                emptyState.classList.remove('hidden');
                checkoutSection.classList.add('hidden');
                clearBtn.classList.add('hidden');
                const badge = document.getElementById('nav-cart-count');
                if (badge) badge.innerText = '0';
                return;
            }

            container.classList.remove('hidden');
            emptyState.classList.add('hidden');
            checkoutSection.classList.remove('hidden');
            clearBtn.classList.remove('hidden');

            let grandTotal = 0;
            let totalItemsCount = 0;

            let simpleItems = cart.filter(item => item.category === 'simple');
            let bentoItems = cart.filter(item => item.category !== 'simple');

            function renderItemCard(item, originalIndex) {
                let sizeText = item.size || item.ukuran || '12cm';
                let flavorText = item.flavor || '';
                let fillingText = item.filling || '';
                let warnaText = item.color || item.warna || '';
                let tulisanText = item.note || item.tulisan || item.customText || '';

                let detailSpesifikasi = '';
                if (item.category === 'simple' || (!item.category && flavorText !== '')) {
                    detailSpesifikasi = `
                        <p class="text-[11px] text-gray-500">Flavor: ${flavorText} | Filling: ${fillingText}</p>
                        ${warnaText ? `<p class="text-[11px] text-gray-500">Warna: ${warnaText}</p>` : ''}
                    `;
                }

                let tulisanBadge = tulisanText ? `
                    <div class="inline-block bg-white border border-[#CD3281]/40 px-3 py-1 rounded-full text-[11px] font-semibold text-[#251306] shadow-sm mt-1">
                        Catatan/Tulisan: "${tulisanText}"
                    </div>
                ` : '';

                return `
                    <div class="cart-item bg-white rounded-3xl p-6 border border-[#C3B59C]/40 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-6 transition-all mb-4">
                        <div class="flex items-start gap-4 w-full sm:w-auto">
                            <div class="w-24 h-24 rounded-2xl overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="${item.image || 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80'}" alt="${item.name}" class="w-full h-full object-cover">
                            </div>
                            <div class="space-y-1 flex-1">
                                <h3 class="font-bold text-sm text-[#251306] leading-snug">${item.name || 'Kue Tbloom'}<br>Ukr : ${sizeText}</h3>
                                ${detailSpesifikasi}
                                <p class="text-xs font-bold text-[#CD3281]">Rp ${(item.price || 0).toLocaleString('id-ID')}</p>
                                ${tulisanBadge}
                            </div>
                        </div>

                        <div class="flex items-center justify-between sm:justify-end gap-6 w-full sm:w-auto pt-4 sm:pt-0 border-t sm:border-t-0 border-gray-100">
                            <div class="flex items-center bg-[#CD3281] rounded-xl overflow-hidden shadow-sm text-white">
                                <button onclick="changeQty(${originalIndex}, -1)" class="px-3.5 py-2 hover:bg-[#b0256c] transition text-xs font-bold cursor-pointer"><i class="fa-solid fa-minus"></i></button>
                                <span class="px-4 py-2 text-xs font-bold bg-white text-[#251306]">${item.qty || 1}</span>
                                <button onclick="changeQty(${originalIndex}, 1)" class="px-3.5 py-2 hover:bg-[#b0256c] transition text-xs font-bold cursor-pointer"><i class="fa-solid fa-plus"></i></button>
                            </div>

                            <button onclick="deleteItem(${originalIndex})" class="text-[#CD3281] hover:text-[#9e2463] p-2 transition cursor-pointer">
                                <i class="fa-solid fa-trash-can text-base"></i>
                            </button>
                        </div>
                    </div>
                `;
            }

            if (simpleItems.length > 0) {
                let sectionHTML = `
                    <div class="space-y-3">
                        <div class="flex items-center gap-2 border-l-4 border-[#CD3281] pl-3">
                            <h2 class="text-sm font-bold text-[#512323] uppercase tracking-wider">Keranjang Simple Cake</h2>
                        </div>
                `;
                simpleItems.forEach((item) => {
                    let realIndex = cart.indexOf(item);
                    sectionHTML += renderItemCard(item, realIndex);
                    grandTotal += (item.price || 0) * (item.qty || 1);
                    totalItemsCount += (item.qty || 1);
                });
                sectionHTML += `</div>`;
                container.innerHTML += sectionHTML;
            }

            if (bentoItems.length > 0) {
                let sectionHTML = `
                    <div class="space-y-3 mt-6">
                        <div class="flex items-center gap-2 border-l-4 border-[#512323] pl-3">
                            <h2 class="text-sm font-bold text-[#512323] uppercase tracking-wider">Keranjang Bento Cake</h2>
                        </div>
                `;
                bentoItems.forEach((item) => {
                    let realIndex = cart.indexOf(item);
                    sectionHTML += renderItemCard(item, realIndex);
                    grandTotal += (item.price || 0) * (item.qty || 1);
                    totalItemsCount += (item.qty || 1);
                });
                sectionHTML += `</div>`;
                container.innerHTML += sectionHTML;
            }

            document.getElementById('grand-total').innerText = 'Rp ' + grandTotal.toLocaleString('id-ID');
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.innerText = totalItemsCount;
        }

        function changeQty(index, amount) {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            cart[index].qty = (cart[index].qty || 1) + amount;
            if (cart[index].qty < 1) cart[index].qty = 1;
            localStorage.setItem('tbloom_cart', JSON.stringify(cart));
            loadCart();
        }

        function deleteItem(index) {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            cart.splice(index, 1);
            localStorage.setItem('tbloom_cart', JSON.stringify(cart));
            loadCart();
        }

        function clearCart() {
            localStorage.removeItem('tbloom_cart');
            loadCart();
        }

        function checkoutAction() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            if (cart.length === 0) {
                alert('Keranjang belanja Anda masih kosong!');
                return;
            }

            // Normalisasi data sebelum checkout agar semua properti konsisten
            let normalizedCart = cart.map(item => ({
                name: item.name || 'Kue Tbloom',
                category: item.category || (item.name && item.name.toLowerCase().includes('bento') ? 'bento' : 'simple'),
                price: item.price || 0,
                qty: item.qty || 1,
                image: item.image || 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80',
                size: item.size || item.ukuran || '12cm',
                flavor: item.flavor || '-',
                filling: item.filling || '-',
                color: item.color || item.warna || 'Pink & White',
                note: item.note || item.tulisan || item.customText || 'Tanpa Catatan'
            }));
            localStorage.setItem('tbloom_cart', JSON.stringify(normalizedCart));

            let isLoggedIn = localStorage.getItem('tbloom_is_logged_in');

            if (!isLoggedIn || isLoggedIn !== 'true') {
                alert('Silakan Login atau Daftar akun terlebih dahulu untuk melanjutkan proses checkout.');
                window.location.href = "{{ route('login') }}";
            } else {
                window.location.href = "{{ route('checkout.customer') }}";
            }
        }

        window.onload = function() {
            loadCart();
        }
    </script>
</body>
</html>