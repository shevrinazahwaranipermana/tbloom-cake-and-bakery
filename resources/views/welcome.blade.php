<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tbloom Cake & Bakery - Sweet Moments for Every Occasion</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap');
        .font-serif-custom { font-family: 'Playfair Display', serif; }
        .font-sans-custom { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-[#F7E3DF] text-[#251306] font-sans-custom h-screen w-screen m-0 p-0 overflow-hidden relative flex items-center justify-center">

    <!-- Efek Cahaya / Glow Latar Belakang -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <div class="w-[500px] h-[500px] bg-[#C3B59C]/15 rounded-full blur-3xl"></div>
    </div>

    <!-- Hiasan Sudut Kiri Atas (Fixed absolute di pojok) -->
    <div class="absolute top-0 left-0 w-72 h-72 pointer-events-none opacity-90 transform -rotate-6 z-0">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 10 C 50 80, 120 40, 190 15" stroke="#512323" stroke-width="4" stroke-linecap="round" fill="none"/>
            <path d="M40 40 Q 20 20, 55 10 Q 65 30, 40 40 Z" fill="#CD3281"/>
            <path d="M100 25 Q 120 5, 90 2 Q 75 18, 100 25 Z" fill="#512323"/>
            <circle cx="70" cy="55" r="12" fill="#CD3281"/>
            <path d="M70 43 Q 75 32, 82 38" stroke="#251306" stroke-width="2.5" stroke-linecap="round" fill="none"/>
            <circle cx="140" cy="40" r="10" fill="#512323"/>
            <rect x="110" y="55" width="8" height="4" rx="2" fill="#CD3281" transform="rotate(45 110 55)"/>
            <rect x="50" y="70" width="8" height="4" rx="2" fill="#C3B59C" transform="rotate(25 50 70)"/>
        </svg>
    </div>

    <!-- Hiasan Sudut Kanan Bawah (Fixed absolute di pojok) -->
    <div class="absolute bottom-0 right-0 w-72 h-72 pointer-events-none opacity-90 transform rotate-180 z-0">
        <svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 10 C 50 80, 120 40, 190 15" stroke="#512323" stroke-width="4" stroke-linecap="round" fill="none"/>
            <path d="M40 40 Q 20 20, 55 10 Q 65 30, 40 40 Z" fill="#CD3281"/>
            <circle cx="70" cy="55" r="12" fill="#CD3281"/>
            <circle cx="140" cy="40" r="10" fill="#512323"/>
        </svg>
    </div>

    <!-- Card Utama (Benar-benar Presisi di Tengah Layar) -->
    <div class="relative z-10 w-full max-w-md bg-white/60 backdrop-blur-xl border border-[#C3B59C]/60 shadow-2xl rounded-[2.5rem] p-8 text-center">
        
        <div class="bg-white/95 rounded-3xl p-8 shadow-lg border border-[#C3B59C]/30 relative overflow-hidden">
            
            <!-- Ornamen Emoji Bakery -->
            <div class="flex justify-center items-center gap-3 mb-4">
                <span class="text-xl animate-bounce">🌸</span>
                <span class="text-xl">🎂</span>
                <span class="text-xl animate-bounce" style="animation-delay: 0.2s;">🌸</span>
            </div>

            <!-- GAMBAR LOGO ASLI -->
            <div class="mb-6 flex justify-center items-center">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" 
                     alt="Tbloom Cake & Bakery Logo" 
                     class="h-16 md:h-20 object-contain drop-shadow-sm">
            </div>

            <!-- Slogan Toko -->
            <div class="mb-8">
                <p class="font-serif-custom italic text-[#442818] text-lg font-medium tracking-wide">
                    "Sweet Moments for Every Occasion"
                </p>
            </div>

            <!-- Tombol Aksi Utama -->
            <div class="space-y-3">
                <a href="{{ route('home') }}" class="group relative inline-flex items-center justify-center w-full bg-[#CD3281] hover:bg-[#b0256c] text-white font-semibold py-4 px-8 rounded-full shadow-lg shadow-pink-900/20 transition-all duration-300 transform hover:-translate-y-1 tracking-wide overflow-hidden">
                    <span class="absolute inset-0 w-full h-full bg-white/20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></span>
                    <span class="relative flex items-center gap-2 text-base">
                        <span>Mulai Belanja</span>
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </span>
                </a>
            </div>

        </div>

        <!-- Catatan Footer Halus -->
        <p class="mt-5 text-xs text-[#512323] font-medium tracking-wider opacity-80">
            Tbloom Cake & Bakery • Indramayu
        </p>

    </div>

</body>
</html>