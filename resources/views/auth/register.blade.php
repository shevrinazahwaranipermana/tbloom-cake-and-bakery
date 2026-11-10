<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Tbloom Cake & Bakery</title>
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
            <h2 class="text-xl font-bold text-[#251306]">Buat Akun Customer</h2>
            <p class="text-xs text-gray-500">Daftar untuk mempermudah pemesanan kue favoritmu</p>
        </div>

        <form id="registerForm" autocomplete="off" onsubmit="handleRegister(event)" class="space-y-4">
            <div>
                <label class="block text-xs font-semibold text-[#512323] mb-1">Username / Nama</label>
                <div class="relative">
                    <input type="text" id="regName" required autocomplete="off" placeholder="Contoh: ucup" class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/50 rounded-xl py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                    <i class="fa-solid fa-user absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#512323] mb-1">Email</label>
                <div class="relative">
                    <input type="email" id="regEmail" required autocomplete="off" placeholder="ucup@gmail.com" class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/50 rounded-xl py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                    <i class="fa-solid fa-envelope absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>

            <!-- INPUT NOMOR TELEPON -->
            <div>
                <label class="block text-xs font-semibold text-[#512323] mb-1">Nomor Telepon / WhatsApp</label>
                <div class="relative">
                    <input type="tel" id="regPhone" required autocomplete="off" placeholder="089553647382" class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/50 rounded-xl py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                    <i class="fa-solid fa-phone absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-[#512323] mb-1">Kata Sandi</label>
                <div class="relative">
                    <input type="password" id="regPass" required autocomplete="new-password" placeholder="Buat kata sandi" class="w-full bg-[#F7E3DF]/30 border border-[#C3B59C]/50 rounded-xl py-2.5 pl-10 pr-10 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                    <i class="fa-solid fa-lock absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                    <!-- Tombol Toggle Icon Mata -->
                    <button type="button" onclick="toggleRegPassword()" class="absolute right-3.5 top-3 text-gray-400 hover:text-[#CD3281] transition cursor-pointer">
                        <i id="regEyeIcon" class="fa-solid fa-eye text-xs"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white font-bold text-xs py-3 rounded-xl transition shadow-md cursor-pointer">
                Daftar Akun
            </button>
        </form>

        <div class="text-center text-xs text-gray-500 pt-2 border-t border-gray-100">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-[#CD3281] font-bold hover:underline">Login di sini</a>
        </div>
    </div>

    <script>
        // Fungsi Toggle Show/Hide Password Register
        function toggleRegPassword() {
            const passInput = document.getElementById('regPass');
            const eyeIcon = document.getElementById('regEyeIcon');
            if (passInput.type === 'password') {
                passInput.type = 'text';
                eyeIcon.className = 'fa-solid fa-eye-slash text-xs';
            } else {
                passInput.type = 'password';
                eyeIcon.className = 'fa-solid fa-eye text-xs';
            }
        }

        function handleRegister(event) {
            event.preventDefault();
            const name = document.getElementById('regName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const phone = document.getElementById('regPhone').value.trim();
            const password = document.getElementById('regPass').value.trim();

            let users = JSON.parse(localStorage.getItem('tbloom_users')) || [];

            let existing = users.find(u => u.email === email || u.name === name);
            if (existing) {
                alert('Username atau Email sudah terdaftar! Silakan langsung login.');
                return;
            }

            // Simpan data lengkap beserta phone, password, dan role customer
            users.push({ name, email, phone, password, role: 'customer' });
            localStorage.setItem('tbloom_users', JSON.stringify(users));

            alert('Pendaftaran berhasil! Silakan login menggunakan akun yang baru dibuat.');
            window.location.href = "{{ route('login') }}";
        }
    </script>
</body>
</html>