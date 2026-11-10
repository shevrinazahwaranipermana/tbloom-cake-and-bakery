<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akun Saya - Tbloom Cake & Bakery</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap');
        .font-serif-custom { font-family: 'Playfair Display', serif; }
        .font-sans-custom { font-family: 'Poppins', sans-serif; }

        /* Animasi Lembut & Elegan */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .animation-delay-100 { animation-delay: 0.1s; }
        .animation-delay-200 { animation-delay: 0.2s; }
    </style>
</head>
<body class="bg-[#F7E3DF]/40 text-[#251306] font-sans-custom min-h-screen flex flex-col selection:bg-[#CD3281] selection:text-white">

    <!-- NAVBAR DESKTOP ATAS -->
    <header class="bg-white/95 backdrop-blur-md border-b border-[#C3B59C]/20 sticky top-0 z-50 shadow-sm transition-all">
        <div class="max-w-7xl mx-auto px-8 h-20 flex items-center justify-between">
            <!-- Logo & Brand Sesuai Gambar Asli -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Logo" class="h-9 object-contain group-hover:scale-105 transition duration-300">
            </a>

            <!-- Menu Navigasi Header -->
            <nav class="hidden md:flex items-center gap-8 text-xs font-semibold">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#CD3281] transition py-2">Beranda</a>
                <a href="{{ route('simple.cake') }}" class="text-gray-600 hover:text-[#CD3281] transition py-2">Katalog Produk</a>
                <a href="{{ route('cart') }}" class="text-gray-600 hover:text-[#CD3281] transition py-2">Keranjang</a>
                <a href="{{ route('account') }}" class="text-[#CD3281] font-bold border-b-2 border-[#CD3281] pb-1">Akun Saya</a>
            </nav>
        </div>
    </header>

    <!-- KONTEN UTAMA LAYOUT DESKTOP -->
    <main class="flex-1 max-w-5xl w-full mx-auto px-6 py-12 space-y-8 animate-fade-in">
        
        <!-- Header Profil Customer -->
        <div class="bg-gradient-to-r from-white via-white to-[#F7E3DF]/30 p-8 rounded-[32px] shadow-lg shadow-pink-900/5 border border-[#C3B59C]/30 flex flex-col md:flex-row justify-between items-center gap-6 relative overflow-hidden">
            <!-- Hiasan Background Lembut -->
            <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#F7E3DF]/50 rounded-full blur-2xl pointer-events-none"></div>

            <div class="flex items-center gap-6 relative z-10">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-[#F7E3DF] to-white border-2 border-[#CD3281] text-[#CD3281] flex items-center justify-center text-3xl shadow-md flex-shrink-0 transform hover:scale-105 transition duration-300">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="space-y-1">
                    <span class="inline-block px-3 py-1 bg-[#F7E3DF] text-[#CD3281] text-[10px] font-bold rounded-full tracking-wider uppercase mb-1">Customer Terverifikasi</span>
                    <h1 id="customer-name" class="font-bold text-2xl text-[#251306] tracking-tight">Memuat Nama...</h1>
                    <p id="customer-phone" class="text-xs text-gray-500 font-medium flex items-center gap-2">
                        <i class="fa-solid fa-phone text-[#CD3281]"></i> <span>Memuat No. Telepon...</span>
                    </p>
                </div>
            </div>

            <button onclick="logoutCustomer()" class="relative z-10 bg-white hover:bg-red-50 text-red-600 border border-red-200 px-6 py-3.5 rounded-2xl text-xs font-bold transition-all duration-300 shadow-sm hover:shadow-md flex items-center gap-2 transform hover:-translate-y-0.5 cursor-pointer">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar Akun
            </button>
        </div>

        <!-- Grid Menu Pilihan Akun Desktop -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
            
            <!-- Riwayat Pesanan -->
            <a href="{{ route('order.history') }}" class="flex items-center justify-between p-6 rounded-[28px] bg-white border border-gray-100 hover:border-[#CD3281] shadow-md shadow-pink-900/5 transition-all duration-300 group transform hover:-translate-y-1 animate-fade-in animation-delay-100">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 bg-[#F7E3DF]/50 text-[#CD3281] rounded-2xl flex items-center justify-center text-lg group-hover:bg-[#CD3281] group-hover:text-white transition-all duration-300 shadow-sm">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-[#251306] group-hover:text-[#CD3281] transition">Riwayat Pesanan Saya</h3>
                        <p class="text-xs text-gray-400 mt-0.5">Lihat status dan riwayat pembelian kue Anda</p>
                    </div>
                </div>
                <div class="w-9 h-9 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center group-hover:bg-[#CD3281] group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </div>
            </a>

            <!-- Data Registrasi Anda -->
            <a href="{{ route('customer.data') }}" class="flex items-center justify-between p-6 rounded-[28px] bg-white border border-gray-100 hover:border-[#CD3281] shadow-md shadow-pink-900/5 transition-all duration-300 group transform hover:-translate-y-1 animate-fade-in animation-delay-200">
                <div class="flex items-center gap-5">
                    <div class="w-14 h-14 bg-[#F7E3DF]/50 text-[#CD3281] rounded-2xl flex items-center justify-center text-lg group-hover:bg-[#CD3281] group-hover:text-white transition-all duration-300 shadow-sm">
                        <i class="fa-solid fa-id-card"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-[#251306] group-hover:text-[#CD3281] transition">Data Registrasi Anda</h3>
                        <p class="text-xs text-gray-400 mt-0.5">Lihat informasi akun, email, dan kata sandi Anda</p>
                    </div>
                </div>
                <div class="w-9 h-9 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center group-hover:bg-[#CD3281] group-hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </div>
            </a>

        </div>

    </main>

    <!-- FOOTER SEDERHANA -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-xs text-gray-500 mt-12">
        <p>&copy; 2026 Tbloom Cake & Bakery Indramayu. All rights reserved.</p>
    </footer>

    <!-- MODAL KONFIRMASI LOGOUT KUSTOM -->
    <div id="logoutModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white w-full max-w-sm rounded-[32px] p-8 shadow-2xl border border-[#C3B59C]/30 text-center space-y-6 transform scale-95 transition-transform duration-300" id="logoutModalContent">
            
            <div class="w-16 h-16 bg-[#F7E3DF] text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-2xl shadow-inner">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </div>

            <div class="space-y-2">
                <h3 class="text-xl font-bold font-serif-custom text-[#251306]">Keluar Akun?</h3>
                <p class="text-xs text-gray-500 leading-relaxed">Apakah Anda yakin ingin keluar dari sesi akun Tbloom Anda saat ini?</p>
            </div>

            <div class="flex items-center gap-3 pt-2">
                <button onclick="closeLogoutModal()" class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold text-xs py-3 rounded-xl transition cursor-pointer">
                    Tidak
                </button>
                <button onclick="executeLogout()" class="flex-1 bg-[#CD3281] hover:bg-[#b0256c] text-white font-bold text-xs py-3 rounded-xl shadow-md transition cursor-pointer">
                    Ya, Keluar
                </button>
            </div>

        </div>
    </div>

    <!-- SCRIPT CEK LOGIN & RENDER DATA DINAMIS -->
    <script>
        window.onload = function() {
            let isLoggedIn = localStorage.getItem('tbloom_is_logged_in');
            
            if (!isLoggedIn || isLoggedIn !== 'true') {
                alert('Silakan login terlebih dahulu untuk mengakses halaman akun.');
                window.location.href = "{{ route('home') }}";
                return;
            }

            let customerName = localStorage.getItem('tbloom_customer_name') || 'Customer Tbloom';
            let customerPhone = localStorage.getItem('tbloom_customer_phone') || 'Belum ada nomor telepon';

            document.getElementById('customer-name').innerText = customerName;
            
            const phoneEl = document.getElementById('customer-phone').querySelector('span');
            if(phoneEl) {
                phoneEl.innerText = customerPhone;
            }
        }

        // Buka Modal Konfirmasi Logout
        function logoutCustomer() {
            const modal = document.getElementById('logoutModal');
            const modalContent = document.getElementById('logoutModalContent');
            
            if (modal && modalContent) {
                modal.classList.remove('hidden');
                setTimeout(() => {
                    modal.classList.remove('opacity-0');
                    modalContent.classList.remove('scale-95');
                    modalContent.classList.add('scale-100');
                }, 10);
            }
        }

        // Tutup Modal jika memilih Tidak
        function closeLogoutModal() {
            const modal = document.getElementById('logoutModal');
            const modalContent = document.getElementById('logoutModalContent');
            
            if (modal && modalContent) {
                modal.classList.add('opacity-0');
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
                setTimeout(() => {
                    modal.classList.add('hidden');
                }, 300);
            }
        }

        // Eksekusi Keluar Akun jika memilih Ya, Keluar
        function executeLogout() {
            localStorage.removeItem('tbloom_is_logged_in');
            localStorage.removeItem('tbloom_customer_name');
            localStorage.removeItem('tbloom_customer_phone');
            localStorage.removeItem('tbloom_user_role');
            
            window.location.href = "{{ route('home') }}";
        }
    </script>
</body>
</html>