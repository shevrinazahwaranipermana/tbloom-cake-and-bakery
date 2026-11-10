<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail & Riwayat Pesanan Saya - Tbloom Cake & Bakery</title>
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

    <!-- KONTEN UTAMA DETAIL PESANAN -->
    <main class="flex-1 max-w-4xl w-full mx-auto px-6 py-12 space-y-6">
        <div class="bg-white p-8 rounded-[32px] shadow-lg shadow-pink-900/5 border border-[#C3B59C]/30 space-y-6">
            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                <div>
                    <h1 class="text-2xl font-bold font-serif-custom text-[#251306]">Detail Pesanan Saya</h1>
                    <p class="text-xs text-gray-500 mt-1">Rincian status dan spesifikasi kue pesanan Anda.</p>
                </div>
                <a href="{{ route('home') }}" class="text-xs font-bold text-[#CD3281] hover:underline flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>

            <div id="orderDetailContainer" class="space-y-8">
                <!-- Diisi via JavaScript -->
            </div>
        </div>
    </main>

    <!-- MODAL SPESIFIKASI KUE (SAAT GAMBAR DIKLIK) -->
    <div id="cakeDetailModal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-md w-full p-6 space-y-4 shadow-2xl relative animate-fade-in">
            <button onclick="closeModal()" class="absolute top-4 right-4 w-8 h-8 bg-gray-100 hover:bg-red-100 hover:text-red-600 rounded-full flex items-center justify-center transition cursor-pointer">
                <i class="fa-solid fa-xmark"></i>
            </button>
            <div class="text-center space-y-1">
                <span id="modalCategoryBadge" class="text-[10px] font-bold text-[#CD3281] uppercase tracking-wider bg-[#F7E3DF] px-3 py-1 rounded-full">Detail Produk</span>
                <h3 id="modalCakeName" class="font-bold text-lg text-[#251306]">Nama Kue</h3>
            </div>
            <div class="h-48 rounded-2xl overflow-hidden bg-gray-100 border border-gray-200">
                <img id="modalCakeImg" src="" alt="Detail Kue" class="w-full h-full object-cover">
            </div>

            <div id="modalSpecContainer" class="space-y-2 text-xs bg-[#F7E3DF]/30 p-4 rounded-2xl border border-[#CD3281]/20">
                <!-- Diisi otomatis -->
            </div>

            <button onclick="closeModal()" class="w-full bg-[#CD3281] text-white py-3 rounded-2xl text-xs font-bold hover:bg-[#b0256c] transition cursor-pointer">
                Tutup Detail
            </button>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-xs text-gray-500 mt-12">
        <p>&copy; 2026 Tbloom Cake & Bakery Indramayu. All rights reserved.</p>
    </footer>

    <!-- SCRIPT RENDER DETAIL & MODAL SPESIFIKASI -->
    <script>
        let currentOrderItems = [];

        window.onload = function() {
            const isLoggedIn = localStorage.getItem('tbloom_is_logged_in');
            const customerName = localStorage.getItem('tbloom_customer_name');

            if (!isLoggedIn || isLoggedIn !== 'true') {
                alert('Silakan login terlebih dahulu.');
                window.location.href = "{{ route('home') }}";
                return;
            }

            const container = document.getElementById('orderDetailContainer');
            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let myOrders = allOrders.filter(order => order.customer === customerName);

            // Menangkap parameter index dari URL secara aman
            const urlParams = new URLSearchParams(window.location.search);
            const orderIdx = urlParams.has('index') ? parseInt(urlParams.get('index')) : 0;

            if (myOrders.length === 0 || !myOrders[orderIdx]) {
                container.innerHTML = `
                    <div class="text-center py-16 space-y-4 bg-[#F7E3DF]/20 rounded-3xl border border-dashed border-[#CD3281]/30 p-8">
                        <div class="w-20 h-20 bg-white text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-3xl shadow-md">
                            <i class="fa-solid fa-cookie-bite"></i>
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-base text-[#251306]">Pesanan Tidak Ditemukan</h3>
                            <p class="text-xs text-gray-500 max-w-sm mx-auto">Data transaksi yang Anda pilih tidak tersedia.</p>
                        </div>
                        <a href="{{ route('home') }}" class="inline-block bg-[#CD3281] hover:bg-[#b0256c] text-white text-xs font-bold px-6 py-3 rounded-2xl shadow-md transition">
                            Kembali ke Beranda <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                `;
                return;
            }

            let order = myOrders[orderIdx];
            currentOrderItems = order.items || [];

            let status = order.status || 'Menunggu Konfirmasi';
            let paymentMethod = order.paymentMethod || 'Transfer Bank';
            let orderDate = order.date || 'Hari ini';
            let estDate = order.estDate || '3-4 Hari Lagi';

            let statusBadgeClass = "bg-yellow-100 text-yellow-800 border-yellow-200";
            if(status.toLowerCase().includes('diproses')) statusBadgeClass = "bg-blue-100 text-blue-800 border-blue-200";
            if(status.toLowerCase().includes('selesai')) statusBadgeClass = "bg-green-100 text-green-800 border-green-200";

            let step1Active = "bg-[#CD3281] text-white";
            let step2Active = (status.includes('Diproses') || status.includes('Selesai')) ? "bg-[#CD3281] text-white" : "bg-gray-200 text-gray-400";
            let step3Active = status.includes('Selesai') ? "bg-green-600 text-white" : "bg-gray-200 text-gray-400";

            container.innerHTML = `
                <div class="bg-gradient-to-r from-white via-white to-[#F7E3DF]/20 border border-[#C3B59C]/40 rounded-3xl p-6 space-y-6 shadow-sm">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 border-b border-gray-100 pb-4">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-bold text-[#251306]"><i class="fa-regular fa-calendar text-[#CD3281] mr-1"></i> Pesan: ${orderDate}</span>
                                <span class="text-xs text-gray-400">• Metode: ${paymentMethod}</span>
                            </div>
                            <p class="text-xs text-gray-500">Perkiraan Siap: <strong class="text-[#CD3281]">${estDate}</strong></p>
                        </div>
                        <span class="px-4 py-1.5 rounded-full text-xs font-bold border ${statusBadgeClass}">${status}</span>
                    </div>

                    <!-- Gambar Kue -->
                    <div class="flex flex-wrap items-center justify-center gap-6 py-2">
                        ${currentOrderItems.map((item, itemIdx) => `
                            <div onclick="openCakeModal(${itemIdx})" class="cursor-pointer group text-center space-y-2">
                                <div class="w-24 h-24 rounded-2xl overflow-hidden border-2 border-[#CD3281]/40 shadow-md mx-auto group-hover:scale-105 transition transform">
                                    <img src="${item.image || 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80'}" alt="${item.name}" class="w-full h-full object-cover">
                                </div>
                                <p class="text-xs font-bold text-[#251306] group-hover:text-[#CD3281] transition">${item.name}</p>
                                <span class="text-[10px] font-bold text-[#CD3281] bg-[#F7E3DF] px-2.5 py-1 rounded-full inline-block group-hover:bg-[#CD3281] group-hover:text-white transition">
                                    🔍 Klik Detail Kue
                                </span>
                            </div>
                        `).join('')}
                    </div>

                    <!-- Step Status -->
                    <div class="bg-gray-50 p-4 rounded-2xl border border-gray-200">
                        <div class="flex items-center justify-between max-w-sm mx-auto text-center relative">
                            <div class="flex flex-col items-center space-y-1 z-10">
                                <div class="w-8 h-8 rounded-full ${step1Active} font-bold text-xs flex items-center justify-center shadow">1</div>
                                <span class="text-[10px] font-bold text-gray-700">Menunggu Konfirmasi</span>
                            </div>
                            <div class="flex flex-col items-center space-y-1 z-10">
                                <div class="w-8 h-8 rounded-full ${step2Active} font-bold text-xs flex items-center justify-center shadow">2</div>
                                <span class="text-[10px] font-bold text-gray-700">Diproses</span>
                            </div>
                            <div class="flex flex-col items-center space-y-1 z-10">
                                <div class="w-8 h-8 rounded-full ${step3Active} font-bold text-xs flex items-center justify-center shadow"><i class="fa-solid fa-check"></i></div>
                                <span class="text-[10px] font-bold text-gray-700">Selesai</span>
                            </div>
                        </div>
                    </div>

                    <!-- Rincian Produk & Total -->
                    <div class="space-y-3 pt-2">
                        <h4 class="font-bold text-xs text-[#CD3281] uppercase tracking-wider">Rincian Pembelian</h4>
                        ${currentOrderItems.map(item => {
                            let isSimple = item.category === 'simple' || (item.flavor && item.flavor !== '-');
                            let sizeText = item.size || item.ukuran || '12cm';
                            let flavorText = item.flavor || item.rasa || '';
                            let fillingText = item.filling || '';
                            let colorText = item.color || item.warna || '';
                            let noteText = item.note || item.tulisan || 'Tidak ada catatan khusus';

                            return `
                                <div class="bg-[#F7E3DF]/20 p-4 rounded-2xl border border-[#CD3281]/10 flex justify-between items-center text-xs">
                                    <div>
                                        <p class="font-bold text-[#251306]">${item.name}</p>
                                        <p class="text-[11px] text-gray-500 mt-0.5">
                                            Ukuran: ${sizeText}
                                            ${isSimple && flavorText ? ' | Rasa: ' + flavorText : ''}
                                            ${isSimple && fillingText ? ' | Filling: ' + fillingText : ''}
                                            ${isSimple && colorText ? ' | Warna: ' + colorText : ''}
                                            ${noteText && noteText !== '-' && noteText !== 'Tanpa Catatan' ? ' | Catatan: ' + noteText : ''}
                                        </p>
                                    </div>
                                    <div class="text-right">
                                        <span class="font-semibold text-gray-600">${item.qty || 1}x</span>
                                        <span class="font-bold text-[#CD3281] ml-2">Rp ${((item.price || 0)).toLocaleString('id-ID')}</span>
                                    </div>
                                </div>
                            `;
                        }).join('')}
                        <div class="flex justify-between items-center pt-2 px-2 font-bold text-sm border-t border-gray-100">
                            <span>Total Pembayaran Transaksi</span>
                            <span class="text-[#CD3281] text-base">Rp ${order.totalPrice}</span>
                        </div>
                    </div>
                </div>
            `;
        }

        // Buka Pop-up Spesifikasi Kue (Membedakan Simple Cake vs Bento Cake secara akurat)
        function openCakeModal(itemIdx) {
            let item = currentOrderItems[itemIdx];

            document.getElementById('modalCakeName').innerText = item.name || 'Kue Tbloom';
            document.getElementById('modalCakeImg').src = item.image || 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80';

            let isSimple = item.category === 'simple' || (item.flavor && item.flavor !== '-');
            const specContainer = document.getElementById('modalSpecContainer');

            let cakeSize = item.size || item.ukuran || '12cm';
            let cakeFlavor = item.flavor || item.rasa || '-';
            let cakeFilling = item.filling || '-';
            let cakeColor = item.color || item.warna || '-';
            let rawNote = item.note || item.tulisan || '';
            let cakeNote = (rawNote && rawNote !== '-^' && rawNote.trim() !== '') ? rawNote : 'Tidak ada catatan khusus';

            if (!isSimple) {
                document.getElementById('modalCategoryBadge').innerText = 'Kategori: Bento Cake';
                specContainer.innerHTML = `
                    <div class="flex justify-between py-1.5 border-b border-gray-200/60">
                        <span class="text-gray-500 font-medium">Ukuran Cake:</span>
                        <span class="font-bold text-[#251306]">${cakeSize}</span>
                    </div>
                    <div class="flex flex-col gap-1 pt-1.5">
                        <span class="text-gray-500 font-medium">Catatan / Tulisan di Cake:</span>
                        <div class="bg-white p-3 rounded-xl border border-gray-200 font-semibold text-[#CD3281]">
                            "${cakeNote}"
                        </div>
                    </div>
                `;
            } else {
                document.getElementById('modalCategoryBadge').innerText = 'Kategori: Simple Cake';
                specContainer.innerHTML = `
                    <div class="flex justify-between py-1 border-b border-gray-200/60">
                        <span class="text-gray-500 font-medium">Ukuran Cake:</span>
                        <span class="font-bold text-[#251306]">${cakeSize}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-200/60">
                        <span class="text-gray-500 font-medium">Filling / Isian:</span>
                        <span class="font-bold text-[#251306]">${cakeFilling}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-200/60">
                        <span class="text-gray-500 font-medium">Flavor / Rasa Base:</span>
                        <span class="font-bold text-[#251306]">${cakeFlavor}</span>
                    </div>
                    <div class="flex justify-between py-1 border-b border-gray-200/60">
                        <span class="text-gray-500 font-medium">Warna Cake:</span>
                        <span class="font-bold text-[#251306]">${cakeColor}</span>
                    </div>
                    <div class="flex flex-col gap-1 pt-1">
                        <span class="text-gray-500 font-medium">Catatan / Tulisan di Cake:</span>
                        <div class="bg-white p-3 rounded-xl border border-gray-200 font-semibold text-[#CD3281] italic">
                            "${cakeNote}"
                        </div>
                    </div>
                `;
            }

            document.getElementById('cakeDetailModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('cakeDetailModal').classList.add('hidden');
        }
    </script>
</body>
</html>