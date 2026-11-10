<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Cake - Tbloom Cake & Bakery</title>
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
                    <input type="text" placeholder="Cari simple cake favoritmu..." class="w-full bg-[#F7E3DF]/40 border border-[#C3B59C]/50 rounded-full py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition placeholder:text-gray-400">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>
            <nav class="flex items-center gap-6 text-xs font-semibold text-[#512323]">
                <a href="{{ route('home') }}" class="hover:text-[#CD3281] transition">Beranda</a>
                <a href="{{ route('simple.cake') }}" class="text-[#CD3281] transition">Kategori</a>
                <a href="{{ route('home') }}#lacak-pesanan" class="hover:text-[#CD3281] transition">Lacak Pesanan</a>
            </nav>
            <div class="flex items-center gap-3 flex-shrink-0">
                <!-- Ikon Keranjang Terhubung ke Route Cart -->
                <a href="{{ route('cart') }}" class="relative p-2.5 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] rounded-full text-[#CD3281] transition shadow-sm">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span id="cart-counter" class="absolute -top-1 -right-1 bg-[#CD3281] text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">2</span>
                </a>
            </div>
        </div>
    </header>

    <!-- KONTEN KATALOG SIMPLE CAKE -->
    <main class="flex-1 max-w-7xl w-full mx-auto px-6 py-10 space-y-8">
        <div class="text-center space-y-2 bg-white/60 backdrop-blur-md border border-[#C3B59C]/40 rounded-3xl p-8 shadow-sm">
            <div class="flex items-center justify-center gap-2 text-xs text-[#512323]/70">
                <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
                <span>/</span>
                <span class="text-[#CD3281] font-semibold">Simple Cake</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-serif-custom font-bold text-[#251306]">Simple Cake</h1>
            <p class="text-xs text-[#512323]/80 max-w-md mx-auto">Pilih kue siap pesan favoritmu dan sesuaikan detail ukurannya!</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 pt-4">
            @for ($i = 1; $i <= 9; $i++)
            <div class="bg-white rounded-3xl p-5 border border-[#C3B59C]/40 shadow-sm hover:shadow-md transition flex flex-col justify-between group">
                <div>
                    <!-- Gambar Kue -->
                    <a href="{{ route('simple.cake.detail') }}" class="block h-56 rounded-2xl overflow-hidden bg-gray-100 mb-4 relative">
                        <img src="https://images.unsplash.com/photo-1535141192574-5d4897c13136?auto=format&fit=crop&w=500&q=80" alt="Simple Cake" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 bg-[#CD3281] text-white text-[10px] font-bold px-2.5 py-1 rounded-md shadow-sm">Siap Pesan</span>
                    </a>
                    
                    <!-- Nama & Harga Saja (Keterangan dibawah nama sudah dibersihkan) -->
                    <a href="{{ route('simple.cake.detail') }}" class="hover:text-[#CD3281] transition">
                        <h3 class="font-bold text-sm text-[#251306] mb-1">Korean Heart Bento Cake</h3>
                    </a>
                    <p class="text-sm font-bold text-[#CD3281]">Rp 85.000</p>
                </div>

                <div class="flex items-center gap-3 mt-5">
                    <a href="{{ route('simple.cake.detail') }}" class="flex-1 bg-[#CD3281] hover:bg-[#b0256c] text-white py-2.5 rounded-xl text-xs font-semibold flex items-center justify-center gap-2 shadow-sm transition">
                        Lihat Detail & Pesan
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </main>

    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>
</body>
</html>