<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi Anda - Tbloom Cake & Bakery</title>
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
<body class="bg-[#F7E3DF]/40 text-[#251306] font-sans-custom min-h-screen flex flex-col selection:bg-[#CD3281] selection:text-white">

    <!-- NAVBAR DESKTOP ATAS -->
    <header class="bg-white/95 backdrop-blur-md border-b border-[#C3B59C]/20 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-8 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Logo" class="h-9 object-contain group-hover:scale-105 transition duration-300">
            </a>
            <nav class="hidden md:flex items-center gap-8 text-xs font-semibold">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#CD3281] transition py-2">Beranda</a>
                <a href="{{ route('simple.cake') }}" class="text-gray-600 hover:text-[#CD3281] transition py-2">Katalog Produk</a>
                <a href="{{ route('cart') }}" class="text-gray-600 hover:text-[#CD3281] transition py-2">Keranjang</a>
                <a href="{{ route('account') }}" class="text-[#CD3281] font-bold border-b-2 border-[#CD3281] pb-1">Akun Saya</a>
            </nav>
        </div>
    </header>

    <!-- KONTEN UTAMA DATA REGISTRASI -->
    <main class="flex-1 max-w-2xl w-full mx-auto px-6 py-12 space-y-6">
        
        <div class="bg-white p-8 rounded-[32px] shadow-lg shadow-pink-900/5 border border-[#C3B59C]/30 space-y-6">
            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                <div>
                    <h1 class="text-2xl font-bold font-serif-custom text-[#251306]">Data Registrasi Anda</h1>
                    <p class="text-xs text-gray-500 mt-1">Informasi akun pribadi yang Anda gunakan untuk masuk ke Tbloom.</p>
                </div>
                <a href="{{ route('account') }}" class="text-xs font-bold text-[#CD3281] hover:underline flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Akun
                </a>
            </div>

            <!-- Card Informasi Data Akun -->
            <div id="registrationDataContent" class="space-y-4">
                <!-- Diisi otomatis via JavaScript -->
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-4 text-xs text-yellow-800 flex items-start gap-3">
                <i class="fa-solid fa-circle-info text-yellow-600 mt-0.5 text-sm"></i>
                <p>Data ini bersifat privat dan tersimpan secara lokal di perangkat Anda. Data registrasi ini tidak dikirimkan ke sistem admin atau owner.</p>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-xs text-gray-500 mt-12">
        <p>&copy; 2026 Tbloom Cake & Bakery Indramayu. All rights reserved.</p>
    </footer>

    <!-- SCRIPT AMBIL DATA REGISTRASI LOCALSTORAGE & SINKRONISASI PASSWORD -->
    <script>
        let rawPassword = "-";

        window.onload = function() {
            const isLoggedIn = localStorage.getItem('tbloom_is_logged_in');
            const container = document.getElementById('registrationDataContent');

            if (!isLoggedIn || isLoggedIn !== 'true') {
                container.innerHTML = `
                    <div class="text-center py-12 space-y-4 bg-[#F7E3DF]/20 rounded-2xl border border-dashed border-[#CD3281]/30 p-6">
                        <div class="w-16 h-16 bg-white text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-2xl shadow-sm">
                            <i class="fa-solid fa-user-slash"></i>
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-sm text-[#251306]">Data Masih Kosong</h3>
                            <p class="text-xs text-gray-500 max-w-sm mx-auto">Anda belum mendaftar atau belum melakukan login ke dalam sistem.</p>
                        </div>
                        <a href="{{ route('login') }}" class="inline-block bg-[#CD3281] hover:bg-[#b0256c] text-white text-xs font-bold px-6 py-3 rounded-xl shadow-md transition">
                            Login / Register Sekarang <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                `;
                return;
            }

            // Ambil data customer yang sedang aktif dari localStorage
            let customerName = localStorage.getItem('tbloom_customer_name') || 'Customer Tbloom';
            let customerPhone = localStorage.getItem('tbloom_customer_phone') || '-';
            let customerEmail = localStorage.getItem('tbloom_customer_email') || (customerName.toLowerCase().replace(/\s+/g, '') + '@gmail.com');
            
            // Cek password asli dari localStorage (sinkron dengan inputan saat register/login)
            rawPassword = localStorage.getItem('tbloom_customer_password') || 'fitri123';

            // Render Tampilan Data Registrasi
            container.innerHTML = `
                <div class="bg-[#F7E3DF]/20 p-4 rounded-2xl border border-[#CD3281]/10 space-y-1">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Nama / Username</span>
                    <p class="font-bold text-sm text-[#251306]">${customerName}</p>
                </div>

                <div class="bg-[#F7E3DF]/20 p-4 rounded-2xl border border-[#CD3281]/10 space-y-1">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Email Terdaftar</span>
                    <p class="font-bold text-sm text-[#251306]">${customerEmail}</p>
                </div>

                <div class="bg-[#F7E3DF]/20 p-4 rounded-2xl border border-[#CD3281]/10 space-y-1">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Nomor Telepon / WhatsApp</span>
                    <p class="font-bold text-sm text-[#251306]">${customerPhone}</p>
                </div>

                <div class="bg-[#F7E3DF]/20 p-4 rounded-2xl border border-[#CD3281]/10 space-y-1">
                    <span class="text-[10px] font-bold text-gray-400 uppercase tracking-wider block">Kata Sandi (Password)</span>
                    <div class="flex items-center justify-between">
                        <p id="reg-password" class="font-bold text-sm text-[#251306] tracking-widest">••••••••</p>
                        <button onclick="togglePasswordVisibility()" class="text-xs font-bold text-[#CD3281] hover:underline cursor-pointer">
                            <i id="eye-icon" class="fa-solid fa-eye mr-1"></i> <span id="eye-text">Tampilkan</span>
                        </button>
                    </div>
                </div>
            `;
        }

        // Fungsi Toggle untuk Melihat / Menyembunyikan Kata Sandi Asli
        let isPasswordVisible = false;
        function togglePasswordVisibility() {
            const passEl = document.getElementById('reg-password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeText = document.getElementById('eye-text');

            if (!passEl) return;

            isPasswordVisible = !isPasswordVisible;
            if (isPasswordVisible) {
                passEl.innerText = rawPassword;
                passEl.classList.remove('tracking-widest');
                eyeIcon.className = "fa-solid fa-eye-slash mr-1";
                eyeText.innerText = "Sembunyikan";
            } else {
                passEl.innerText = "••••••••";
                passEl.classList.add('tracking-widest');
                eyeIcon.className = "fa-solid fa-eye mr-1";
                eyeText.innerText = "Tampilkan";
            }
        }
    </script>
</body>
</html>