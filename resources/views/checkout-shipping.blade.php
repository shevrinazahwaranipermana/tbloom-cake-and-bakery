<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metode Pengiriman - Tbloom Cake & Bakery</title>
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
                <a href="{{ route('home') }}#lacak-pesanan" class="hover:text-[#CD3281] transition">Lacak Pesanan</a>
            </nav>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('cart') }}" class="relative p-2.5 bg-[#CD3281] text-white rounded-full transition shadow-sm">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-white text-[#CD3281] text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA PENGIRIMAN -->
    <main class="flex-1 max-w-2xl w-full mx-auto px-6 py-10 space-y-8">
        
        <!-- Header Judul & Tombol Kembali -->
        <div class="flex items-center justify-between bg-white/60 backdrop-blur-md border border-[#C3B59C]/40 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <a href="{{ route('checkout.detail') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#512323] shadow-sm hover:bg-[#CD3281] hover:text-white transition cursor-pointer">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                </a>
                <h1 class="text-2xl md:text-3xl font-serif-custom font-bold text-[#251306]">Pengiriman</h1>
            </div>
            <button onclick="alert('Hubungi admin via WhatsApp untuk bantuan pengiriman.')" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#CD3281] shadow-sm hover:bg-[#CD3281] hover:text-white transition cursor-pointer">
                <i class="fa-regular fa-comment-dots text-sm"></i>
            </button>
        </div>

        <!-- Progress Steps -->
        <div class="bg-white rounded-3xl p-6 border border-[#C3B59C]/40 shadow-sm">
            <div class="flex items-center justify-between relative max-w-md mx-auto">
                <div class="absolute left-8 right-8 top-1/2 -translate-y-1/2 h-0.5 bg-green-600 z-0"></div>

                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white font-bold text-xs flex items-center justify-center shadow-md"><i class="fa-solid fa-check"></i></div>
                    <span class="text-[11px] font-bold text-green-700">Data Pesanan</span>
                </div>

                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white font-bold text-xs flex items-center justify-center shadow-md"><i class="fa-solid fa-check"></i></div>
                    <span class="text-[11px] font-bold text-green-700">Pembayaran</span>
                </div>

                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-[#CD3281] text-white font-bold text-xs flex items-center justify-center shadow-md">3</div>
                    <span class="text-[11px] font-bold text-[#CD3281]">Pengiriman</span>
                </div>
            </div>
        </div>

        <!-- Section Utama Pilihan Pengiriman -->
        <div class="bg-white rounded-3xl p-8 border border-[#C3B59C]/40 shadow-md space-y-6">
            <div class="border-b border-gray-100 pb-3">
                <h2 class="text-lg font-serif-custom font-bold text-[#251306]">Pilih Metode Pengiriman</h2>
                <p class="text-xs text-gray-500">Silakan pilih metode pengambilan atau pengiriman kue Anda</p>
            </div>

            <!-- OPSI 1: AMBIL DI TEMPAT -->
            <div class="p-6 rounded-3xl border-2 border-[#CD3281] bg-[#F7E3DF]/20 hover:bg-[#F7E3DF]/30 transition shadow-sm space-y-4">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#CD3281] text-white rounded-2xl flex items-center justify-center text-lg shadow-md flex-shrink-0">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-sm text-[#251306]">Ambil di tempat (Self Pick-up)</h3>
                            <p class="text-[11px] text-gray-500 leading-snug">Ambil kue Anda secara langsung di outlet resmi Tbloom Cake & Bakery.</p>
                        </div>
                    </div>
                </div>

                <button onclick="selectShippingMethod('Ambil di Toko')" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white py-3.5 rounded-full text-xs font-bold shadow-md transition transform active:scale-95 flex items-center justify-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-store"></i> Pilih Ambil di Toko & Buka Maps
                </button>
            </div>

            <!-- OPSI 2: GOSEND INSTANT -->
            <div class="p-6 rounded-3xl border-2 border-emerald-500 bg-emerald-50/20 hover:bg-emerald-50/40 transition shadow-sm space-y-4">
                <div class="flex items-start justify-between gap-3">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-emerald-600 text-white rounded-2xl flex items-center justify-center text-lg shadow-md flex-shrink-0">
                            <i class="fa-solid fa-motorcycle"></i>
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-bold text-sm text-[#251306]">GoSend Instant</h3>
                                <span class="bg-emerald-100 text-emerald-800 text-[9px] font-bold px-2 py-0.5 rounded-full">Otomatis</span>
                            </div>
                            <p class="text-[11px] text-gray-500 leading-snug">Diantarkan langsung oleh driver GoSend. Penentuan titik antar dan ongkir diatur otomatis oleh Gojek.</p>
                        </div>
                    </div>
                </div>

                <button onclick="selectShippingMethod('GoSend (Gojek)')" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white py-3.5 rounded-full text-xs font-bold shadow-md transition transform active:scale-95 flex items-center justify-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-paper-plane"></i> Pilih GoSend Instant & Pesan Driver
                </button>
            </div>

            <!-- INFORMASI ALAMAT TOKO -->
            <div class="border border-[#C3B59C]/40 bg-[#F7E3DF]/30 rounded-2xl p-5 text-center space-y-1 shadow-inner">
                <p class="text-[11px] font-bold text-[#CD3281] uppercase tracking-wider">Informasi Alamat Tbloom Cake and Bakery</p>
                <p class="text-xs text-[#251306] font-semibold">
                    Jalan Mayor Sastra Atmaja No.2, Margadadi, Indramayu.
                </p>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

    <!-- SCRIPT PENYIMPANAN PENGIRIMAN -->
    <script>
        function selectShippingMethod(method) {
            // 1. Simpan metode pengiriman ke localStorage
            localStorage.setItem('tbloom_shipping_method', method);

            // 2. Update pesanan aktif terakhir di `tbloom_orders` agar langsung sinkron dengan dashboard admin
            let orders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            if (orders.length > 0) {
                orders[0].shippingMethod = method;
                localStorage.setItem('tbloom_orders', JSON.stringify(orders));
            }

            if (method.includes('Toko')) {
                window.open('https://maps.google.com/?q=Jalan+Mayor+Sastra+Atmaja+No.2+Margadadi+Indramayu', '_blank');
            } else {
                window.open('https://www.gojek.com/gosend/', '_blank');
            }

            alert('Metode pengiriman berhasil dipilih: ' + method + '. Status pesanan telah diperbarui!');
        }

        window.onload = function() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            let totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.innerText = totalCount;
        }
    </script>
</body>
</html>