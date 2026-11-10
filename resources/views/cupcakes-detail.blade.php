<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk Cupcake - Tbloom Cake & Bakery</title>
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
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Logo" class="h-10 md:h-12 object-contain">
            </a>

            <!-- Search Input -->
            <div class="flex-1 max-w-sm mx-4">
                <div class="relative">
                    <input type="text" placeholder="Cari cake favoritmu..." class="w-full bg-[#F7E3DF]/40 border border-[#C3B59C]/50 rounded-full py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition placeholder:text-gray-400">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>

            <!-- Navigasi Menu -->
            <nav class="flex items-center gap-6 text-xs font-semibold text-[#512323]">
                <a href="{{ route('home') }}" class="hover:text-[#CD3281] transition">Beranda</a>
                <a href="{{ route('cupcakes') }}" class="text-[#CD3281] transition">Kategori</a>
                <a href="{{ route('home') }}#lacak-pesanan" class="hover:text-[#CD3281] transition">Lacak Pesanan</a>
            </nav>

            <!-- Action Buttons -->
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="#" class="relative p-2.5 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] rounded-full text-[#CD3281] transition">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span class="absolute -top-1 -right-1 bg-[#CD3281] text-white text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
                <a href="#" class="bg-[#CD3281] hover:bg-[#b0256c] text-white font-semibold text-xs py-2.5 px-5 rounded-full shadow-md transition transform hover:-translate-y-0.5">
                    Login / Register
                </a>
            </div>

        </div>
    </header>

    <!-- KONTEN UTAMA DETAIL PRODUK -->
    <main class="flex-1 max-w-4xl w-full mx-auto px-6 py-10 space-y-8">

        <!-- Tombol Kembali -->
        <div>
            <a href="{{ route('cupcakes') }}" class="inline-flex items-center gap-2 bg-white/80 hover:bg-white text-[#512323] px-4 py-2 rounded-full text-xs font-semibold shadow-sm border border-[#C3B59C]/40 transition">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog
            </a>
        </div>

        <!-- Card Box Utama Detail Kue -->
        <div class="bg-white rounded-3xl p-8 md:p-12 border border-[#C3B59C]/40 shadow-lg space-y-8">

            <!-- Gambar Utama Kue -->
            <div class="space-y-2">
                <span class="text-xs font-semibold text-[#CD3281]">&gt; Cupcake custom Fondant/Custom lainnya!</span>
                <div class="h-80 md:h-[450px] rounded-2xl overflow-hidden bg-gray-100 shadow-inner border border-[#C3B59C]/20">
                    <img src="https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?auto=format&fit=crop&w=1000&q=80" alt="Cupcake Custom Detail" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Nama Kue -->
            <div>
                <h1 class="text-2xl md:text-3xl font-serif-custom font-bold text-[#251306]">Cupcake Character Fondant Theme</h1>
                <p class="text-xs text-[#CD3281] font-semibold mt-1">Kustomisasi Karakter & Warna Sesuai Permintaan</p>
            </div>

            <!-- Tombol Deskripsi Interaktif (Dropdown) -->
            <div class="space-y-4">
                <button onclick="toggleDescription()" class="inline-flex items-center gap-2 bg-[#F7E3DF]/60 hover:bg-[#F7E3DF] text-[#512323] border border-[#C3B59C]/60 px-5 py-2.5 rounded-xl text-xs font-semibold transition shadow-sm">
                    <i id="descIcon" class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"></i>
                    <span>Deskripsi & Packaging Includes</span>
                </button>

                <!-- Box Keterangan Deskripsi (Default Tersembunyi, Muncul Saat Diklik) -->
                <div id="descBox" class="hidden bg-[#F7E3DF]/30 border border-[#C3B59C]/40 rounded-2xl p-6 space-y-3 text-xs text-[#251306] animate-fadeIn">
                    <p class="font-bold text-[#512323] tracking-wide uppercase text-[11px]">Packaging Includes:</p>
                    <ol class="list-decimal list-inside space-y-1.5 text-gray-700 leading-relaxed pl-1">
                        <li><strong>Bagasse Ecofriendly Box</strong> (Box kue ramah lingkungan berkualitas tinggi)</li>
                        <li><strong>A wooden fork / knife</strong> (Sendok kayu / pisau kue higienis)</li>
                        <li><strong>Greeting Card</strong> (Kartu ucapan elegan untuk momen spesial)</li>
                        <li><strong>Gold Candle</strong> (Lilin warna emas eksklusif)</li>
                    </ol>
                </div>
            </div>

            <!-- Pilihan Isi Cake -->
            <div class="space-y-4 pt-2">
                <h3 class="font-serif-custom font-bold text-lg text-[#251306]">Pilih Varian Isi Cake:</h3>
                
                <div class="grid grid-cols-3 sm:grid-cols-6 gap-3">
                    <button onclick="selectVariant(this, 'Isi 1')" class="variant-btn py-3 px-4 rounded-xl border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white text-center">Isi 1</button>
                    <button onclick="selectVariant(this, 'Isi 2')" class="variant-btn py-3 px-4 rounded-xl border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white text-center">Isi 2</button>
                    <button onclick="selectVariant(this, 'Isi 4')" class="variant-btn py-3 px-4 rounded-xl border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white text-center">Isi 4</button>
                    <button onclick="selectVariant(this, 'Isi 6')" class="variant-btn py-3 px-4 rounded-xl border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white text-center">Isi 6</button>
                    <button onclick="selectVariant(this, 'Isi 9')" class="variant-btn py-3 px-4 rounded-xl border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white text-center">Isi 9</button>
                    <button onclick="selectVariant(this, 'Isi 12')" class="variant-btn py-3 px-4 rounded-xl border border-[#C3B59C]/60 text-xs font-semibold text-[#512323] hover:border-[#CD3281] hover:text-[#CD3281] transition bg-white text-center">Isi 12</button>
                </div>
            </div>

            <!-- Tombol Hubungi Admin via WhatsApp -->
            <div class="pt-4">
                <a href="https://wa.me/6281395439751?text=Halo%20Admin%20Tbloom%20Cake,%20saya%20ingin%20memesan%20Cupcake%20Custom%20dengan%20varian%20terpilih." target="_blank" class="w-full bg-[#25D366] hover:bg-[#20bd5a] text-white py-4 rounded-2xl text-sm font-bold flex items-center justify-center gap-3 shadow-md transition-all duration-300 transform hover:-translate-y-0.5">
                    <i class="fa-brands fa-whatsapp text-lg"></i> Hubungi admin via WhatsApp
                </a>
            </div>

        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

    <!-- SCRIPT INTERAKTIF DESKRIPSI & VARIAN -->
    <script>
        function toggleDescription() {
            const box = document.getElementById('descBox');
            const icon = document.getElementById('descIcon');
            box.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        function selectVariant(button, variantName) {
            // Hapus style aktif dari semua tombol varian
            document.querySelectorAll('.variant-btn').forEach(btn => {
                btn.classList.remove('bg-[#CD3281]', 'text-white', 'border-[#CD3281]');
                btn.classList.add('bg-white', 'text-[#512323]');
            });
            // Berikan style aktif pada tombol yang dipilih
            button.classList.remove('bg-white', 'text-[#512323]');
            button.classList.add('bg-[#CD3281]', 'text-white', 'border-[#CD3281]');
        }
    </script>

</body>
</html>