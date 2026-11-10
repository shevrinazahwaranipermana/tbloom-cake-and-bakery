<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tbloom Cake & Bakery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-[#F7E3DF] min-h-screen flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-md rounded-3xl p-8 shadow-xl border border-[#C3B59C]/30 space-y-6">
        <div class="text-center space-y-2">
            <a href="{{ route('home') }}" class="inline-block">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Logo" class="h-12 mx-auto">
            </a>
            <h2 class="text-xl font-bold text-[#251306]">Selamat Datang Kembali</h2>
            <p class="text-xs text-gray-500">Masuk untuk melanjutkan pesanan Anda</p>
        </div>

        <!-- Pesan Error Validasi -->
        <div id="errorAlert" class="hidden bg-red-50 border border-red-200 text-red-700 text-xs p-3 rounded-xl"></div>

        <form id="loginForm" autocomplete="off" onsubmit="handleLogin(event)" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold text-[#512323] mb-1">Username / Email</label>
                <div class="relative">
                    <input type="text" id="loginUser" required autocomplete="off" placeholder="Masukkan username atau email" class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/50 rounded-xl py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                    <i class="fa-solid fa-user absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#512323] mb-1">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="loginPass" required autocomplete="new-password" placeholder="••••••••" class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/50 rounded-xl py-2.5 pl-10 pr-10 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                    <i class="fa-solid fa-lock absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                    <!-- Tombol Toggle Icon Mata -->
                    <button type="button" onclick="toggleLoginPassword()" class="absolute right-3.5 top-3 text-gray-400 hover:text-[#CD3281] transition cursor-pointer">
                        <i id="loginEyeIcon" class="fa-solid fa-eye text-xs"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white font-bold text-xs py-3 rounded-xl transition shadow-md cursor-pointer">
                Masuk Sekarang
            </button>
        </form>

        <div class="text-center text-xs text-gray-500 pt-2 border-t border-gray-100">
            Belum punya akun customer? <a href="{{ route('register') }}" class="text-[#CD3281] font-bold hover:underline">Daftar di sini</a>
        </div>
    </div>

    <script>
        // Fungsi Toggle Show/Hide Password Login
        function toggleLoginPassword() {
            const passInput = document.getElementById('loginPass');
            const eyeIcon = document.getElementById('loginEyeIcon');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                eyeIcon.className = 'fa-solid fa-eye-slash text-xs';
            } else {
                passInput.type = 'password';
                eyeIcon.className = 'fa-solid fa-eye text-xs';
            }
        }

        // Inisialisasi atau Pembaruan Otomatis Akun Bawaan Owner & Admin
        function initDefaultAccounts() {
            let users = JSON.parse(localStorage.getItem('tbloom_users')) || [];
            
            let ownerExist = users.find(u => u.email === 'owner@tbloom.com');
            let adminExist = users.find(u => u.email === 'admin@tbloom.com');

            if (!ownerExist) {
                users.push({ name: 'Ibu Owner Tbloom', email: 'owner@tbloom.com', password: 'owner123', role: 'owner' });
            } else {
                ownerExist.password = 'owner123';
                ownerExist.role = 'owner';
            }

            if (!adminExist) {
                users.push({ name: 'Admin Shevrina', email: 'admin@tbloom.com', password: 'admin123', role: 'admin' });
            } else {
                adminExist.password = 'admin123';
                adminExist.role = 'admin';
            }

            localStorage.setItem('tbloom_users', JSON.stringify(users));
        }

        window.onload = function() {
            initDefaultAccounts();
        }

        function handleLogin(event) {
            event.preventDefault();
            const inputUser = document.getElementById('loginUser').value.trim().toLowerCase();
            const inputPass = document.getElementById('loginPass').value.trim();
            const errorAlert = document.getElementById('errorAlert');

            let users = JSON.parse(localStorage.getItem('tbloom_users')) || [];

            // Pastikan akun default selalu ter-check / ter-update
            initDefaultAccounts();
            users = JSON.parse(localStorage.getItem('tbloom_users')) || [];

            // Cari user berdasarkan pencocokan email atau nama (tidak case-sensitive) serta password
            let foundUser = users.find(u => 
                (u.email.toLowerCase() === inputUser || u.name.toLowerCase() === inputUser) && 
                u.password === inputPass
            );

            if (!foundUser) {
                errorAlert.classList.remove('hidden');
                errorAlert.innerText = '⚠️ Gagal Login: Username/Email atau Kata Sandi salah!';
                return;
            }

            // Simpan sesi login aktif ke localStorage
            localStorage.setItem('tbloom_is_logged_in', 'true');
            localStorage.setItem('tbloom_customer_name', foundUser.name);
            localStorage.setItem('tbloom_customer_phone', foundUser.phone || '-'); 
            localStorage.setItem('tbloom_customer_password', foundUser.password); 
            localStorage.setItem('tbloom_user_role', foundUser.role);

            // Arahkan berdasarkan role masing-masing
            if (foundUser.role === 'owner') {
                alert('Login Berhasil sebagai Owner!');
                window.location.href = "{{ route('admin.dashboard') }}"; 
            } else if (foundUser.role === 'admin') {
                alert('Login Berhasil sebagai Admin!');
                window.location.href = "{{ route('admin.dashboard') }}"; 
            } else {
                alert('Selamat datang kembali, ' + foundUser.name + '!');
                window.location.href = "{{ route('home') }}"; 
            }
        }
    </script>
</body>
</html>