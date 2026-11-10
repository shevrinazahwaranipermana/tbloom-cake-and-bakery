<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Informasi Penerima - Tbloom Cake & Bakery</title>
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
<body class="bg-[#F7E3DF] text-[#251306] font-sans-custom min-h-screen flex flex-col selection:bg-[#CD3281] selection:text-white pb-16">

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

    <!-- KONTEN UTAMA CHECKOUT -->
    <main class="flex-1 max-w-2xl w-full mx-auto px-6 py-10 space-y-8">
        
        <!-- Header Judul & Tombol Kembali -->
        <div class="flex items-center justify-between bg-white/60 backdrop-blur-md border border-[#C3B59C]/40 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <a href="{{ route('cart') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#512323] shadow-sm hover:bg-[#CD3281] hover:text-white transition cursor-pointer">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                </a>
                <h1 class="text-2xl md:text-3xl font-serif-custom font-bold text-[#251306]">Checkout</h1>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="bg-white rounded-3xl p-6 border border-[#C3B59C]/40 shadow-sm">
            <div class="flex items-center justify-between relative max-w-md mx-auto">
                <div class="absolute left-8 right-8 top-1/2 -translate-y-1/2 h-0.5 bg-gray-200 z-0"></div>

                <!-- Step 1 (Aktif) -->
                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-[#CD3281] text-white font-bold text-xs flex items-center justify-center shadow-md">1</div>
                    <span class="text-[11px] font-bold text-[#CD3281]">Data Pesanan</span>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 font-bold text-xs flex items-center justify-center">2</div>
                    <span class="text-[11px] font-medium text-gray-400">Pembayaran</span>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 font-bold text-xs flex items-center justify-center">3</div>
                    <span class="text-[11px] font-medium text-gray-400">Pengiriman</span>
                </div>
            </div>
        </div>

        <!-- Form Informasi Penerima -->
        <div class="bg-white rounded-3xl p-8 border border-[#C3B59C]/40 shadow-md space-y-6">
            <h2 class="text-lg font-serif-custom font-bold text-[#251306] border-b border-gray-100 pb-3">Informasi Penerima</h2>

            <form onsubmit="proceedToPayment(event)" class="space-y-4">
                
                <!-- Nama Lengkap -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#512323]">Nama Lengkap</label>
                    <input type="text" id="custName" placeholder="Contoh: Fitri" required class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/60 rounded-xl px-4 py-3 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition">
                </div>

                <!-- No. Telepon -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#512323]">No. Telepon / WhatsApp</label>
                    <input type="tel" id="custPhone" placeholder="Contoh: 08999111" required class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/60 rounded-xl px-4 py-3 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition">
                </div>

                <!-- Alamat Lengkap -->
                <div class="space-y-1.5">
                    <label class="block text-xs font-bold text-[#512323]">Alamat Lengkap</label>
                    <textarea id="custAddress" rows="3" placeholder="Isi alamat lengkap anda (untuk keperluan pengiriman / catatan admin)" required class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/60 rounded-xl p-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition resize-none"></textarea>
                </div>

                <!-- Tombol Lanjut ke Pembayaran -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white py-4 rounded-full text-xs font-bold shadow-lg transition transform active:scale-95 text-center cursor-pointer">
                        Lanjut ke Pembayaran
                    </button>
                </div>

            </form>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

    <!-- SCRIPT PENYIMPANAN DATA SINKRON -->
    <script>
        function updateCartCountBadge() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            let totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.innerText = totalCount;
        }

        window.onload = function() {
            updateCartCountBadge();
            
            // Auto fill kembali jika sudah ada data tersimpan di localStorage
            let savedName = localStorage.getItem('tbloom_receiver_name') || localStorage.getItem('tbloom_customer_name');
            let savedPhone = localStorage.getItem('tbloom_receiver_phone') || localStorage.getItem('tbloom_phone');
            let savedAddress = localStorage.getItem('tbloom_shipping_address') || localStorage.getItem('tbloom_address');

            if (savedName) document.getElementById('custName').value = savedName;
            if (savedPhone) document.getElementById('custPhone').value = savedPhone;
            if (savedAddress) document.getElementById('custAddress').value = savedAddress;
        }

        function proceedToPayment(event) {
            event.preventDefault();
            
            let nameVal = document.getElementById('custName').value.trim();
            let phoneVal = document.getElementById('custPhone').value.trim();
            let addressVal = document.getElementById('custAddress').value.trim();

            // Simpan secara lengkap dengan variasi key agar terbaca oleh halaman pembayaran & dashboard admin
            localStorage.setItem('tbloom_receiver_name', nameVal);
            localStorage.setItem('tbloom_receiver_phone', phoneVal);
            localStorage.setItem('tbloom_shipping_address', addressVal);

            localStorage.setItem('tbloom_customer_name', nameVal);
            localStorage.setItem('tbloom_phone', phoneVal);
            localStorage.setItem('tbloom_address', addressVal);
            localStorage.setItem('tbloom_is_logged_in', 'true');

            // Normalisasi data keranjang
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            let normalizedCart = cart.map(item => ({
                name: item.name || 'Kue Tbloom',
                category: item.category || 'bento',
                price: item.price || 0,
                qty: item.qty || 1,
                image: item.image || 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80',
                size: item.size || '12cm',
                flavor: item.flavor || '-',
                filling: item.filling || '-',
                color: item.color || 'Pink & White',
                note: item.note || 'Tanpa Catatan'
            }));

            localStorage.setItem('tbloom_cart', JSON.stringify(normalizedCart));

            // Arahkan ke halaman pembayaran berikutnya
            window.location.href = "{{ route('checkout.payment') }}";
        }
    </script>
</body>
</html>