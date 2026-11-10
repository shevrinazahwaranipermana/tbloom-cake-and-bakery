<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tbloom Cake & Bakery - Beranda</title>
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

    <!-- ANNOUNCEMENT BAR TOP -->
    <div class="bg-[#CD3281] text-white text-xs font-medium py-2 px-4 text-center tracking-wide flex items-center justify-center gap-2">
        <span>🎉 Promo Spesial Launching! Diskon 15% untuk pemesanan Bento & Custom Cake Pertama Anda dengan kode: <strong class="underline">TBLOOM15</strong></span>
    </div>

    <!-- MAIN NAVBAR DESKTOP -->
    <header class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-[#C3B59C]/30 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">
            
            <!-- Logo Tbloom Asli -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Cake & Bakery Logo" class="h-10 md:h-12 object-contain">
            </a>

            <!-- Search Input dengan Fitur Pencarian Real-time -->
            <div class="flex-1 max-w-sm mx-4">
                <div class="relative">
                    <input type="text" id="searchInput" oninput="handleSearch()" placeholder="Cari cake favoritmu..." class="w-full bg-[#F7E3DF]/40 border border-[#C3B59C]/50 rounded-full py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition placeholder:text-gray-400">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>

            <!-- Navigasi Menu -->
            <nav class="flex items-center gap-6 text-xs font-semibold text-[#512323]">
                <a href="{{ route('home') }}" class="hover:text-[#CD3281] transition">Beranda</a>
                <a href="#kategori" class="hover:text-[#CD3281] transition">Kategori</a>
                <a href="#produk-terlaris" class="hover:text-[#CD3281] transition">Produk Terlaris</a>
                <a href="{{ route('order.history') }}" class="hover:text-[#CD3281] transition">History Pesanan</a>
            </nav>

            <!-- Action Buttons (Notification, Cart, Account & Login/Register) -->
            <div class="flex items-center gap-3 flex-shrink-0 relative">
                
                <!-- Icon Notifikasi Pesanan -->
                <div class="relative">
                    <button onclick="toggleNotificationDropdown(event)" class="relative p-2.5 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] rounded-full text-[#CD3281] transition cursor-pointer" title="Notifikasi Pesanan">
                        <i class="fa-solid fa-bell text-sm"></i>
                        <span id="nav-notif-count" class="absolute -top-1 -right-1 bg-[#CD3281] text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold hidden">0</span>
                    </button>

                    <!-- Dropdown Box Daftar Notifikasi -->
                    <div id="notifDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-[#C3B59C]/30 py-3 z-50">
                        <div class="px-4 pb-2 border-b border-gray-100 flex justify-between items-center">
                            <h4 class="font-bold text-xs text-[#251306]">Notifikasi Pesanan</h4>
                            <button onclick="markAllNotificationsAsRead()" class="text-[10px] text-[#CD3281] hover:underline font-semibold cursor-pointer">Tandai dibaca</button>
                        </div>
                        <div id="notifListContainer" class="max-h-64 overflow-y-auto divide-y divide-gray-50 text-xs">
                            <!-- Diisi via JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Icon Keranjang -->
                <a href="{{ route('cart') }}" class="relative p-2.5 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] rounded-full text-[#CD3281] transition">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-[#CD3281] text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>

                <!-- Icon Akun Customer -->
                <a href="#" onclick="checkAccountAccess(event)" class="p-2.5 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] rounded-full text-[#CD3281] transition" title="Akun Saya">
                    <i class="fa-solid fa-user text-sm"></i>
                </a>

                <!-- Tombol Login / Nama Customer Dinamis -->
                <div id="auth-button-container">
                    <a href="{{ route('login') }}" class="bg-[#CD3281] hover:bg-[#b0256c] text-white font-semibold text-xs py-2.5 px-5 rounded-full shadow-md shadow-pink-900/10 transition transform hover:-translate-y-0.5">
                        Login / Register
                    </a>
                </div>
            </div>

        </div>
    </header>

    <!-- KONTEN UTAMA -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-6 py-8 space-y-12">

        <!-- BANNER HERO SECTION -->
        <section class="bg-[#F7E3DF] border border-[#C3B59C]/40 rounded-3xl p-8 md:p-12 shadow-sm relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-xl z-10 space-y-4">
                <span class="text-[11px] font-bold text-[#CD3281] tracking-[0.2em] uppercase bg-white/80 px-3 py-1 rounded-full shadow-sm">
                    SWEET MOMENTS FOR EVERY OCCASION
                </span>
                <h1 class="text-4xl md:text-5xl font-serif-custom font-bold text-[#251306] leading-tight">
                    Cake Manis untuk Setiap Momen Spesial
                </h1>
                <p class="text-xs text-[#512323]/80 leading-relaxed max-w-md">
                    Dibuat dengan bahan-bahan premium berkualitas tinggi, rasa manis lezat yang seimbang, dan desain estetis buatan tangan untuk perayaan ulang tahun, wisuda, hingga momen berkesan Anda.
                </p>
            </div>

            <!-- Gambar Highlight Hero -->
            <div class="grid grid-cols-2 gap-4 z-10 max-w-md w-full">
                <div class="bg-white p-2 rounded-2xl shadow-md border border-[#C3B59C]/30 transform -rotate-2">
                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80" alt="Cake Spec" class="w-full h-40 object-cover rounded-xl">
                    <p class="text-[11px] font-bold text-[#251306] mt-2 px-1">Simple Cake</p>
                </div>
                <div class="bg-white p-2 rounded-2xl shadow-md border border-[#C3B59C]/30 transform rotate-2 mt-4">
                    <img src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?auto=format&fit=crop&w=400&q=80" alt="Cupcake Spec" class="w-full h-40 object-cover rounded-xl">
                    <p class="text-[11px] font-bold text-[#251306] mt-2 px-1">Cupcakes</p>
                </div>
            </div>
        </section>

        <!-- KATEGORI PILIHAN -->
        <section id="kategori" class="space-y-6">
            <div class="text-center md:text-left">
                <span class="text-[10px] font-bold text-[#CD3281] tracking-[0.25em] uppercase">KATEGORI PILIHAN</span>
                <h2 class="text-2xl font-serif-custom font-bold text-[#251306] mt-1">Jelajahi Berbagai Pilihan Cake</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- 1. Simple Cake -->
                <div class="bg-white rounded-2xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="h-44 rounded-xl overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1535141192574-5d4897c13136?auto=format&fit=crop&w=400&q=80" alt="Simple Cake" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306]">Simple Cake</h3>
                        <p class="text-xs text-gray-500 leading-relaxed">Cake siap pesan dengan desain Korean minimalis cantik.</p>
                    </div>
                    <a href="{{ route('simple.cake') }}" class="mt-4 inline-flex items-center text-xs font-semibold text-[#CD3281] hover:underline gap-1">
                        Lihat Katalog <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- 2. Custom Cake -->
                <div class="bg-white rounded-2xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="h-44 rounded-xl overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?auto=format&fit=crop&w=400&q=80" alt="Custom Cake" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306]">Custom Cake</h3>
                        <p class="text-xs text-gray-500 leading-relaxed">Bebas pilih tema, warna, dan karakter sesuai keinginan.</p>
                    </div>
                    <a href="https://wa.me/6281395439751" target="_blank" class="mt-4 inline-flex items-center text-xs font-semibold text-[#CD3281] hover:underline gap-1">
                        Ajukan Custom <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- 3. Cup Cakes -->
                <div class="bg-white rounded-2xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="h-44 rounded-xl overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?auto=format&fit=crop&w=400&q=80" alt="Cup Cakes" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306]">Cup Cakes</h3>
                        <p class="text-xs text-gray-500 leading-relaxed">Mini cake character imut isi 4, 6, 9 hingga 12 pcs.</p>
                    </div>
                    <a href="{{ route('cupcakes') }}" class="mt-4 inline-flex items-center text-xs font-semibold text-[#CD3281] hover:underline gap-1">
                        Lihat Pilihan <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>

                <!-- 4. Bento Cake -->
                <div class="bg-white rounded-2xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div class="space-y-3">
                        <div class="h-44 rounded-xl overflow-hidden bg-gray-100">
                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=400&q=80" alt="Bento Cake" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306]">Bento Cake</h3>
                        <p class="text-xs text-gray-500 leading-relaxed">Bento cake lucu kemasan eco-box lengkap lilin & sendok.</p>
                    </div>
                    <a href="{{ route('bento.cake') }}" class="mt-4 inline-flex items-center text-xs font-semibold text-[#CD3281] hover:underline gap-1">
                        Lihat Pilihan <i class="fa-solid fa-chevron-right text-[10px]"></i>
                    </a>
                </div>
            </div>
        </section>

        <!-- PRODUK TERLARIS MINGGU INI -->
        <section id="produk-terlaris" class="space-y-6">
            <div class="flex items-end justify-between border-b border-[#C3B59C]/30 pb-3">
                <div>
                    <span class="text-[10px] font-bold text-[#CD3281] tracking-[0.25em] uppercase">PALING POPULER</span>
                    <h2 class="text-2xl font-serif-custom font-bold text-[#251306]">Produk Terlaris Minggu Ini</h2>
                </div>
                <a href="#kategori" class="text-xs font-semibold text-[#CD3281] hover:underline flex items-center gap-1">
                    Lihat Semua Produk <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Card Produk 1 -->
                <div class="bg-white rounded-3xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition relative flex flex-col justify-between group">
                    <span class="absolute top-6 left-6 bg-[#CD3281] text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow-sm z-10">Top Seller</span>
                    <div>
                        <div class="h-48 rounded-2xl overflow-hidden bg-gray-100 mb-3 relative">
                            <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=400&q=80" alt="Simple Strawberry Korean" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306] mb-1">Simple Strawberry Korean</h3>
                        <p class="text-[11px] text-gray-400">Ukuran 12cm | Flavor Strawberry</p>
                    </div>
                </div>

                <!-- Card Produk 2 -->
                <div class="bg-white rounded-3xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div>
                        <div class="h-48 rounded-2xl overflow-hidden bg-gray-100 mb-3 relative">
                            <img src="https://images.unsplash.com/photo-1535141192574-5d4897c13136?auto=format&fit=crop&w=400&q=80" alt="Bento Cake Pentol Cute" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306] mb-1">Bento Cake Pentol Cute</h3>
                        <p class="text-[11px] text-gray-400">Ukuran 10cm | Free Sendok & Lilin</p>
                    </div>
                </div>

                <!-- Card Produk 3 -->
                <div class="bg-white rounded-3xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div>
                        <div class="h-48 rounded-2xl overflow-hidden bg-gray-100 mb-3 relative">
                            <img src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?auto=format&fit=crop&w=400&q=80" alt="Custom Fondant Cupcake" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306] mb-1">Custom Fondant Cupcake (Isi 6)</h3>
                        <p class="text-[11px] text-gray-400">Character Theme Request</p>
                    </div>
                </div>

                <!-- Card Produk 4 -->
                <div class="bg-white rounded-3xl p-4 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div>
                        <div class="h-48 rounded-2xl overflow-hidden bg-gray-100 mb-3 relative">
                            <img src="https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?auto=format&fit=crop&w=400&q=80" alt="Floral Elegant Cust 15cm" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>
                        <h3 class="font-bold text-sm text-[#251306] mb-1">Floral Elegant Cust 15cm</h3>
                        <p class="text-[11px] text-gray-400">Ukuran 15cm | Double Layer</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- FITUR STATUS & RIWAYAT PESANAN OTOMATIS & BANNER CUSTOM WA -->
        <section id="riwayat-pesanan-section" class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-stretch">
            
            <!-- Box Status Pesanan Dinamis (Kiri) -->
            <div class="lg:col-span-7 bg-white rounded-3xl p-8 border border-[#C3B59C]/40 shadow-sm flex flex-col justify-between space-y-4">
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-xl font-serif-custom font-bold text-[#251306]">Status pada History Pesanan Anda~</h3>
                        <a href="{{ route('order.history') }}" class="text-xs font-bold text-[#CD3281] hover:underline flex items-center gap-1">
                            Lihat Semua <i class="fa-solid fa-chevron-right text-[10px]"></i>
                        </a>
                    </div>
                    <p class="text-xs text-gray-500">Daftar kue manis yang sedang atau telah Anda pesan akan otomatis terpantau di bawah ini.</p>
                </div>

                <!-- Container Dinamis Riwayat Pesanan -->
                <div id="homeOrderHistoryContainer" class="pt-2">
                    <!-- Diisi otomatis lewat JavaScript -->
                </div>
            </div>

            <!-- Banner Custom WhatsApp (Kanan) -->
            <div class="lg:col-span-5 bg-[#512323] text-white rounded-3xl p-8 shadow-sm flex flex-col justify-between space-y-6 relative overflow-hidden">
                <div class="space-y-2 z-10">
                    <span class="text-[10px] font-bold text-[#F7E3DF] tracking-[0.2em] uppercase bg-white/10 px-2.5 py-1 rounded-md">Layanan Khusus</span>
                    <h3 class="text-xl font-serif-custom font-bold text-white leading-snug">Ingin Custom Cake & Cupcake Impian?</h3>
                    <p class="text-xs text-[#F7E3DF]/80 leading-relaxed">Kirim referensi foto cake, warna, dan tulisan yang Anda inginkan langsung ke Admin via WhatsApp. Kami siap mewujudkan kreasi terbaik!</p>
                </div>

                <a href="https://wa.me/6281395439751" target="_blank" class="inline-flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white font-semibold text-xs py-3 px-6 rounded-xl shadow-md transition z-10">
                    <i class="fa-brands fa-whatsapp text-sm"></i> Hubungi Admin via WhatsApp
                </a>

                <!-- Background Ornament -->
                <div class="absolute -right-10 -bottom-10 w-48 h-48 bg-white/5 rounded-full blur-2xl pointer-events-none"></div>
            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 pt-12 pb-6 text-xs">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 pb-8 border-b border-white/10">
            
            <!-- Col 1: Brand Info -->
            <div class="space-y-3">
                <h4 class="text-lg font-serif-custom font-bold text-white">Tbloom</h4>
                <p class="text-[11px] text-[#F7E3DF]/70 uppercase tracking-widest font-semibold">CAKE & BAKERY</p>
                <p class="text-xs text-[#F7E3DF]/80 leading-relaxed pt-1">
                    Maniskan setiap momen spesial Anda bersama pilihan kue berkualitas premium buatan Tbloom.
                </p>
            </div>

            <!-- Col 2: Navigasi Cepat -->
            <div class="space-y-3">
                <h5 class="font-bold text-white uppercase tracking-wider text-[11px]">Navigasi Cepat</h5>
                <ul class="space-y-2 text-[#F7E3DF]/80">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><a href="#kategori" class="hover:text-white transition">Kategori Cake</a></li>
                    <li><a href="#produk-terlaris" class="hover:text-white transition">Produk Terlaris</a></li>
                    <li><a href="{{ route('order.history') }}" class="hover:text-white transition">Riwayat Pesanan</a></li>
                </ul>
            </div>

            <!-- Col 3: Kontak & Lokasi -->
            <div class="space-y-3">
                <h5 class="font-bold text-white uppercase tracking-wider text-[11px]">Kontak & Lokasi</h5>
                <ul class="space-y-2 text-[#F7E3DF]/80">
                    <li class="flex items-start gap-2"><i class="fa-solid fa-location-dot text-[#CD3281] mt-0.5"></i> Jl. Mayor Sastra Atmaja No.2, Margadadi, Indramayu, West Java 45211</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-phone text-[#CD3281]"></i> +62 813-9543-9751</li>
                    <li class="flex items-center gap-2"><i class="fa-solid fa-clock text-[#CD3281]"></i> Buka Setiap Hari (08:00 - 20:00)</li>
                </ul>
            </div>

            <!-- Col 4: Pembayaran Dukungan -->
            <div class="space-y-3">
                <h5 class="font-bold text-white uppercase tracking-wider text-[11px]">Pembayaran Dukungan</h5>
                <div class="flex flex-wrap gap-2 pt-1 text-[11px]">
                    <span class="bg-white/10 px-3 py-1.5 rounded-md text-white border border-white/10 flex items-center gap-1.5"><i class="fa-solid fa-building-columns text-[#CD3281]"></i> Transfer Bank</span>
                    <span class="bg-white/10 px-3 py-1.5 rounded-md text-white border border-white/10 flex items-center gap-1.5"><i class="fa-solid fa-qrcode text-[#CD3281]"></i> QRIS</span>
                    <span class="bg-white/10 px-3 py-1.5 rounded-md text-white border border-white/10 flex items-center gap-1.5"><i class="fa-solid fa-landmark text-[#CD3281]"></i> BJB</span>
                    <span class="bg-white/10 px-3 py-1.5 rounded-md text-white border border-white/10 flex items-center gap-1.5"><i class="fa-solid fa-wallet text-[#CD3281]"></i> Shopeepay</span>
                </div>
            </div>

        </div>

        <div class="max-w-7xl mx-auto px-6 pt-6 text-center text-[#F7E3DF]/50 text-[11px]">
            <p>&copy; 2026 Tbloom Cake & Bakery. All Rights Reserved. Prototype UI Design Wireframe.</p>
        </div>
    </footer>

    <!-- MODAL KONFIRMASI LOGOUT KUSTOM DI HALAMAN HOME -->
    <div id="homeLogoutModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white w-full max-w-sm rounded-[32px] p-8 shadow-2xl border border-[#C3B59C]/30 text-center space-y-6 transform scale-95 transition-transform duration-300" id="homeLogoutModalContent">
            
            <div class="w-16 h-16 bg-[#F7E3DF] text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-2xl shadow-inner">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </div>

            <div class="space-y-2">
                <h3 class="text-xl font-bold font-serif-custom text-[#251306]">Keluar Akun?</h3>
                <p class="text-xs text-gray-500 leading-relaxed">Apakah Anda yakin ingin keluar dari sesi akun Tbloom Anda saat ini?</p>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button onclick="closeHomeLogoutModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs py-3 rounded-xl transition cursor-pointer">
                    Tidak
                </button>
                <button onclick="executeHomeLogout()" class="flex-1 bg-[#CD3281] hover:bg-[#b0256c] text-white font-bold text-xs py-3 rounded-xl shadow-md transition cursor-pointer">
                    Ya, Keluar
                </button>
            </div>

        </div>
    </div>

    <!-- SCRIPT UTAMA -->
    <script>
        // Fungsi PENCARIAN REAL-TIME
        function handleSearch() {
            const query = document.getElementById('searchInput').value.toLowerCase().trim();
            
            // Filter Kartu Kategori
            const categoryCards = document.querySelectorAll('#kategori .grid > div');
            categoryCards.forEach(card => {
                const title = card.querySelector('h3')?.innerText.toLowerCase() || '';
                const desc = card.querySelector('p')?.innerText.toLowerCase() || '';
                if (title.includes(query) || desc.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });

            // Filter Kartu Produk Terlaris
            const productCards = document.querySelectorAll('#produk-terlaris .grid > div');
            productCards.forEach(card => {
                const title = card.querySelector('h3')?.innerText.toLowerCase() || '';
                const desc = card.querySelector('p')?.innerText.toLowerCase() || '';
                if (title.includes(query) || desc.includes(query)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });

            // Scroll otomatis ke section katalog jika user mengetik sesuatu
            if (query.length > 0) {
                const targetSection = document.getElementById('kategori');
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            }
        }

        // Fungsi Global untuk Smooth Scroll ke Bagian Kategori
        function scrollToCategory(event) {
            event.preventDefault();
            const targetSection = document.getElementById('kategori');
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        }

        // Sinkronisasi badge keranjang dari localStorage
        function updateCartCountBadge() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            let totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('nav-cart-count');
            if (badge) {
                badge.innerText = totalCount;
            }
        }

        // Cek Akses Halaman Akun Berdasarkan Status Login
        function checkAccountAccess(event) {
            event.preventDefault();
            let isLoggedIn = localStorage.getItem('tbloom_is_logged_in');

            if (isLoggedIn === 'true') {
                window.location.href = "{{ route('account') }}";
            } else {
                alert('Anda belum mendaftar / login. Silakan daftar atau login terlebih dahulu untuk mengakses halaman akun.');
                window.location.href = "{{ route('login') }}";
            }
        }

        // Render Tombol Auth di Navbar (Login/Register atau Sapaan Nama)
        function renderAuthButton() {
            let isLoggedIn = localStorage.getItem('tbloom_is_logged_in');
            let customerName = localStorage.getItem('tbloom_customer_name') || 'Customer';
            const container = document.getElementById('auth-button-container');

            if (container) {
                if (isLoggedIn === 'true') {
                    container.innerHTML = `
                        <div class="flex items-center gap-2 bg-[#F7E3DF] border border-[#CD3281]/30 py-1.5 px-4 rounded-full">
                            <span class="text-xs font-bold text-[#CD3281]">Hai, ${customerName}</span>
                            <button onclick="handleLogout()" title="Logout" class="text-xs text-gray-400 hover:text-red-500 ml-1 cursor-pointer">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </div>
                    `;
                } else {
                    container.innerHTML = `
                        <a href="{{ route('login') }}" class="bg-[#CD3281] hover:bg-[#b0256c] text-white font-semibold text-xs py-2.5 px-5 rounded-full shadow-md shadow-pink-900/10 transition transform hover:-translate-y-0.5">
                            Login / Register
                        </a>
                    `;
                }
            }
        }

        // Buka Modal Logout Home
        function handleLogout() {
            const modal = document.getElementById('homeLogoutModal');
            const modalContent = document.getElementById('homeLogoutModalContent');
            
            if (modal && modalContent) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('scale-95');
                    modalContent.classList.add('scale-100');
                }, 10);
            }
        }

        // Tutup Modal Logout Home
        function closeHomeLogoutModal() {
            const modal = document.getElementById('homeLogoutModal');
            const modalContent = document.getElementById('homeLogoutModalContent');
            
            if (modal && modalContent) {
                modal.classList.add('opacity-0');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // Eksekusi Keluar Akun dari Home
        function executeHomeLogout() {
            localStorage.removeItem('tbloom_is_logged_in');
            localStorage.removeItem('tbloom_customer_name');
            localStorage.removeItem('tbloom_customer_phone');
            localStorage.removeItem('tbloom_user_role');
            window.location.reload();
        }

        // Render Widget Status Pesanan Otomatis di Beranda dengan Indeks Unik
        function renderHomeOrderHistory() {
            const isLoggedIn = localStorage.getItem('tbloom_is_logged_in');
            const customerName = localStorage.getItem('tbloom_customer_name');
            const container = document.getElementById('homeOrderHistoryContainer');

            if (!container) return;

            if (!isLoggedIn || isLoggedIn !== 'true') {
                container.innerHTML = `
                    <div class="text-center py-8 space-y-3 bg-[#F7E3DF]/20 rounded-2xl border border-dashed border-[#CD3281]/30 p-6">
                        <div class="w-12 h-12 bg-white text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-lg shadow-sm">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <p class="text-xs text-gray-600 font-medium">Silakan <a href="{{ route('login') }}" class="text-[#CD3281] font-bold underline">login terlebih dahulu</a> untuk melihat status pesananmu.</p>
                    </div>
                `;
                return;
            }

            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let myOrders = allOrders.filter(order => order.customer === customerName);

            if (myOrders.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-10 space-y-3 bg-[#F7E3DF]/20 rounded-2xl border border-dashed border-[#CD3281]/30 p-6">
                        <div class="w-14 h-14 bg-white text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-xl shadow-md">
                            <i class="fa-solid fa-cookie-bite"></i>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-sm text-[#251306]">Belum Ada Pesanan Aktif</h4>
                            <p class="text-xs text-gray-500 max-w-md mx-auto">Yuk, wujudkan momen spesialmu bersama kelezatan kue Tbloom! Pesanan yang kamu buat akan otomatis terpantau di sini.</p>
                        </div>
                        <button onclick="scrollToCategory(event)" class="inline-block bg-[#CD3281] hover:bg-[#b0256c] text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-md transition transform hover:-translate-y-0.5 cursor-pointer">
                            Jelajahi Katalog Kue <i class="fa-solid fa-arrow-right ml-1"></i>
                        </button>
                    </div>
                `;
                return;
            }

            // KARTU PESANAN DIARAHKAN KE DETAIL DENGAN MEMBAWA INDEX PESANAN (?index=idx)
            container.innerHTML = myOrders.map((order, idx) => `
                <div onclick="window.location.href='{{ route('checkout.detail') }}?index=${idx}'" class="bg-gradient-to-r from-white via-white to-[#F7E3DF]/20 border border-[#C3B59C]/40 rounded-2xl p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 shadow-sm hover:shadow-md transition cursor-pointer group mb-3">
                    <div class="space-y-1">
                        <div class="flex items-center gap-2">
                            <span class="bg-yellow-100 text-yellow-800 text-[10px] font-bold px-3 py-0.5 rounded-full border border-yellow-200">
                                ${order.status || 'Menunggu Konfirmasi'}
                            </span>
                        </div>
                        <h4 class="font-bold text-xs text-[#251306] group-hover:text-[#CD3281] transition">${order.productName || 'Kue Tbloom'}</h4>
                        <p class="text-[11px] text-gray-500">Jumlah: <span class="font-semibold text-[#251306]">${order.quantity || 1} Pcs</span> | Total: <span class="font-bold text-[#CD3281]">Rp ${order.totalPrice || '0'}</span></p>
                    </div>
                    <div class="text-left sm:text-right space-y-1">
                        <span class="text-[10px] text-gray-400 block"><i class="fa-regular fa-calendar text-[#CD3281] mr-1"></i> Pesan: ${order.date || 'Hari ini'}</span>
                        <span class="text-[11px] font-semibold text-[#512323] bg-white px-3 py-1.5 rounded-xl border border-gray-200 inline-block shadow-sm">
                            <i class="fa-solid fa-clock text-[#CD3281] mr-1"></i> Perkiraan Siap: ${order.estDate || '3-4 Hari Lagi'}
                        </span>
                    </div>
                </div>
            `).join('');
        }

        // ==========================================
        // FITUR NOTIFIKASI PESANAN DI NAVBAR
        // ==========================================
        function toggleNotificationDropdown(event) {
            event.stopPropagation();
            const dropdown = document.getElementById('notifDropdown');
            if (dropdown) {
                dropdown.classList.toggle('hidden');
            }
        }

        window.addEventListener('click', function() {
            const dropdown = document.getElementById('notifDropdown');
            if (dropdown && !dropdown.classList.contains('hidden')) {
                dropdown.classList.add('hidden');
            }
        });

        function renderNotifications() {
            const isLoggedIn = localStorage.getItem('tbloom_is_logged_in');
            const badge = document.getElementById('nav-notif-count');
            const container = document.getElementById('notifListContainer');

            if (!container) return;

            // Jika customer belum login / belum masuk akun
            if (!isLoggedIn || isLoggedIn !== 'true') {
                container.innerHTML = `
                    <div class="p-6 text-center space-y-3">
                        <div class="w-10 h-10 bg-[#F7E3DF] text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-sm shadow-sm">
                            <i class="fa-solid fa-lock"></i>
                        </div>
                        <p class="text-[11px] text-gray-600 leading-relaxed">
                            Belum ada pesanan karena anda belum memiliki akun. 
                            <a href="{{ route('login') }}" class="text-[#CD3281] font-bold underline block mt-1 hover:text-[#b0256c]">Login / Register sekarang</a>
                        </p>
                    </div>
                `;
                if (badge) badge.classList.add('hidden');
                return;
            }

            const customerName = localStorage.getItem('tbloom_customer_name');
            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let myOrders = allOrders.filter(order => order.customer === customerName);

            if (myOrders.length === 0) {
                container.innerHTML = `<div class="p-4 text-center text-gray-400 text-xs">Belum ada notifikasi pesanan.</div>`;
                if (badge) badge.classList.add('hidden');
                return;
            }

            let readNotifs = JSON.parse(localStorage.getItem('tbloom_read_notifs_' + customerName)) || [];
            let unreadCount = 0;

            container.innerHTML = myOrders.slice().reverse().map((order, idx) => {
                let orderId = order.id || idx;
                let isRead = readNotifs.includes(orderId);
                if (!isRead) unreadCount++;

                return `
                    <div onclick="window.location.href='{{ route('order.history') }}'" class="p-3 hover:bg-[#F7E3DF]/20 transition cursor-pointer ${!isRead ? 'bg-pink-50/50 font-semibold' : ''}">
                        <div class="flex items-start gap-2">
                            <div class="w-7 h-7 rounded-full bg-[#CD3281]/10 text-[#CD3281] flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fa-solid fa-box-open text-[10px]"></i>
                            </div>
                            <div class="space-y-0.5 flex-1">
                                <p class="text-[#251306] text-[11px]">Status pesanan <strong>${order.productName || 'Kue Tbloom'}</strong> diperbarui:</p>
                                <span class="inline-block bg-yellow-100 text-yellow-800 text-[9px] font-bold px-2 py-0.5 rounded-full border border-yellow-200">
                                    ${order.status || 'Menunggu Konfirmasi'}
                                </span>
                                <span class="text-[9px] text-gray-400 block mt-1">${order.date || 'Hari ini'}</span>
                            </div>
                        </div>
                    </div>
                `;
            }).join('');

            if (badge) {
                if (unreadCount > 0) {
                    badge.innerText = unreadCount;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            }
        }

        function markAllNotificationsAsRead() {
            const customerName = localStorage.getItem('tbloom_customer_name');
            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let myOrders = allOrders.filter(order => order.customer === customerName);
            let allIds = myOrders.map((order, idx) => order.id || idx);

            localStorage.setItem('tbloom_read_notifs_' + customerName, JSON.stringify(allIds));
            renderNotifications();
        }

        // Jalankan semua fungsi saat halaman selesai dimuat
        window.onload = function() {
            updateCartCountBadge();
            renderAuthButton();
            renderHomeOrderHistory();
            renderNotifications();
        }
    </script>
</body>
</html>