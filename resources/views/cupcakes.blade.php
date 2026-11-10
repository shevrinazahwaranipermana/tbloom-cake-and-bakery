<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cup Cakes Custom - Tbloom Cake & Bakery</title>
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
            
            <!-- Logo Tbloom Asli -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Cake & Bakery Logo" class="h-10 md:h-12 object-contain">
            </a>

            <!-- Search Input -->
            <div class="flex-1 max-w-sm mx-4">
                <div class="relative">
                    <input type="text" placeholder="Cari cupcake favoritmu..." class="w-full bg-[#F7E3DF]/40 border border-[#C3B59C]/50 rounded-full py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition placeholder:text-gray-400">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>

            <!-- Navigasi Menu -->
            <nav class="flex items-center gap-6 text-xs font-semibold text-[#512323]">
                <a href="{{ route('home') }}" class="hover:text-[#CD3281] transition">Beranda</a>
                <a href="{{ route('home') }}#kategori" class="text-[#CD3281] transition">Kategori</a>
                <a href="{{ route('home') }}#produk-terlaris" class="hover:text-[#CD3281] transition">Produk Terlaris</a>
                <a href="{{ route('home') }}#lacak-pesanan" class="hover:text-[#CD3281] transition">Lacak Pesanan</a>
            </nav>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="#" class="relative p-2.5 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] rounded-full text-[#CD3281] transition">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span class="absolute -top-1 -right-1 bg-[#CD3281] text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
                <a href="#" class="bg-[#CD3281] hover:bg-[#b0256c] text-white font-semibold text-xs py-2.5 px-5 rounded-full shadow-md shadow-pink-900/10 transition transform hover:-translate-y-0.5">
                    Login / Register
                </a>
            </div>

        </div>
    </header>

    <!-- KONTEN UTAMA CUPCAKES -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-6 py-10 space-y-12">

        <!-- HEADER / BREADCRUMB & JUDUL -->
        <div class="text-center space-y-3 bg-white/60 backdrop-blur-md border border-[#C3B59C]/40 rounded-3xl p-8 shadow-sm">
            <div class="flex items-center justify-center gap-2 text-xs text-[#512323]/70">
                <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                <span>/</span>
                <span class="text-[#CD3281] font-semibold">Cup Cakes & Custom</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-serif-custom font-bold text-[#251306]">Cup cake's Custom</h1>
            <p class="text-xs text-[#CD3281] font-semibold bg-[#CD3281]/10 py-1.5 px-4 rounded-full inline-block">
                ✨ *Klik gambar atau tombol "Lihat Detail" untuk melihat variasi isi & pemesanan request!*
            </p>
        </div>

        <!-- SEKSI 1: Cupcake Character Fondant Custom -->
        <section class="space-y-6">
            <div class="flex items-center gap-3 border-l-4 border-[#CD3281] pl-3">
                <h2 class="text-xl font-serif-custom font-bold text-[#251306]">&gt; Cupcake Character Fondant Custom</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 1; $i <= 4; $i++)
                <div class="bg-white rounded-3xl p-5 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div>
                        <!-- Gambar Bisa Diklik Menuju Halaman Detail -->
                        <a href="{{ route('cupcakes.detail') }}" class="block h-48 rounded-2xl overflow-hidden bg-[#F7E3DF]/50 mb-4 relative">
                            <img src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?auto=format&fit=crop&w=400&q=80" alt="Cupcake Fondant" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-3 left-3 bg-[#CD3281] text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow-sm">
                                Fondant Box
                            </span>
                        </a>
                        <h3 class="font-bold text-sm text-[#251306] mb-1">Cupcake Character Isi 6</h3>
                        <p class="text-[11px] text-gray-400 mb-3">Custom Karakter / Tema Bebas</p>
                    </div>

                    <!-- Tombol Lihat Detail -->
                    <a href="{{ route('cupcakes.detail') }}" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white py-2.5 rounded-xl text-xs font-semibold flex items-center justify-center gap-2 shadow-sm transition-all duration-300 transform hover:-translate-y-0.5">
                        <span>Lihat Detail</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
                @endfor
            </div>
        </section>

        <!-- SEKSI 2: Cupcake Custom Lainnya -->
        <section class="space-y-6 pt-4">
            <div class="flex items-center gap-3 border-l-4 border-[#512323] pl-3">
                <h2 class="text-xl font-serif-custom font-bold text-[#251306]">&gt; Cupcake Custom lainnya!</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @for ($i = 1; $i <= 8; $i++)
                <div class="bg-white rounded-3xl p-5 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                    <div>
                        <!-- Gambar Bisa Diklik Menuju Halaman Detail -->
                        <a href="{{ route('cupcakes.detail') }}" class="block h-48 rounded-2xl overflow-hidden bg-[#F7E3DF]/50 mb-4 relative">
                            <img src="https://images.unsplash.com/photo-1555507036-ab1f4038808a?auto=format&fit=crop&w=400&q=80" alt="Cupcake Custom" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            <span class="absolute top-3 left-3 bg-[#512323] text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow-sm">
                                Premium Cream
                            </span>
                        </a>
                        <h3 class="font-bold text-sm text-[#251306] mb-1">Floral & Aesthetic Cupcake</h3>
                        <p class="text-[11px] text-gray-400 mb-3">Pilihan Warna & Topper Elegant</p>
                    </div>

                    <!-- Tombol Lihat Detail -->
                    <a href="{{ route('cupcakes.detail') }}" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white py-2.5 rounded-xl text-xs font-semibold flex items-center justify-center gap-2 shadow-sm transition-all duration-300 transform hover:-translate-y-0.5">
                        <span>Lihat Detail</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </a>
                </div>
                @endfor
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

</body>
</html>