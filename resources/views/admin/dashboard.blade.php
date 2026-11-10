<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Management - Tbloom Cake & Bakery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-[#251306] text-white flex flex-col justify-between p-5 min-h-screen shadow-lg">
        <div class="space-y-6">
            <!-- Logo & Brand -->
            <div class="flex items-center gap-3 pb-4 border-b border-white/10">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Logo" class="h-10 bg-white rounded-lg p-1">
                <div>
                    <h1 class="font-bold text-sm tracking-wide text-[#F7E3DF]">Tbloom Bakery</h1>
                    <p id="sidebarRoleBadge" class="text-[10px] text-[#CD3281] font-semibold tracking-wider uppercase">Loading Role...</p>
                </div>
            </div>

            <!-- Menu Navigation -->
            <nav class="space-y-1.5 text-xs font-medium">
                <a href="#" onclick="switchTab('overview')" id="nav-overview" class="tab-btn flex items-center gap-3 py-3 px-4 rounded-xl bg-[#CD3281] text-white transition">
                    <i class="fa-solid fa-chart-pie text-sm"></i> Ringkasan Utama
                </a>
                <a href="#" onclick="switchTab('orders')" id="nav-orders" class="tab-btn flex items-center gap-3 py-3 px-4 rounded-xl text-gray-300 hover:bg-white/10 transition">
                    <i class="fa-solid fa-receipt text-sm"></i> Kelola Pesanan
                </a>
                <a href="#" onclick="switchTab('products')" id="nav-products" class="tab-btn flex items-center gap-3 py-3 px-4 rounded-xl text-gray-300 hover:bg-white/10 transition">
                    <i class="fa-solid fa-cake-candles text-sm"></i> Katalog Produk
                </a>
                <a href="#" onclick="switchTab('testimonials')" id="nav-testimonials" class="tab-btn flex items-center gap-3 py-3 px-4 rounded-xl text-gray-300 hover:bg-white/10 transition">
                    <i class="fa-solid fa-star-half-stroke text-sm text-yellow-400"></i> Evaluasi Testimoni
                </a>
                
                <!-- Menu Khusus Admin & View Admin List -->
                <a href="#" onclick="switchTab('admins')" id="nav-admins" class="tab-btn flex items-center gap-3 py-3 px-4 rounded-xl text-gray-300 hover:bg-white/10 transition">
                    <i class="fa-solid fa-users-gear text-sm"></i> Tim Admin Aktif
                </a>

                <!-- MENU KHUSUS OWNER SAJA -->
                <div id="ownerOnlyMenus" class="hidden space-y-1.5 pt-3 border-t border-white/10 mt-3">
                    <span class="text-[10px] text-gray-400 font-semibold px-4 tracking-wider uppercase">Hak Akses Owner</span>
                    <a href="#" onclick="switchTab('financial')" id="nav-financial" class="tab-btn flex items-center gap-3 py-3 px-4 rounded-xl text-gray-300 hover:bg-white/10 transition">
                        <i class="fa-solid fa-file-invoice-dollar text-sm text-yellow-400"></i> Laporan Keuangan
                    </a>
                    <a href="#" onclick="switchTab('accounts')" id="nav-accounts" class="tab-btn flex items-center gap-3 py-3 px-4 rounded-xl text-gray-300 hover:bg-white/10 transition">
                        <i class="fa-solid fa-user-shield text-sm text-pink-400"></i> Kelola Akun Admin
                    </a>
                </div>
            </nav>
        </div>

        <!-- User Info & Logout Button -->
        <div class="pt-4 border-t border-white/10">
            <div class="flex items-center justify-between">
                <div>
                    <p id="adminUserName" class="text-xs font-bold text-white">Loading...</p>
                    <p class="text-[10px] text-gray-400">Tbloom Management</p>
                </div>
                <button onclick="handleLogout()" class="p-2 bg-red-500/20 hover:bg-red-500 text-red-300 hover:text-white rounded-lg transition cursor-pointer" title="Keluar dari Sistem">
                    <i class="fa-solid fa-right-from-bracket text-xs"></i>
                </button>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-8 overflow-y-auto">

        <!-- Top Header Bar -->
        <header class="flex justify-between items-center mb-8 pb-4 border-b border-gray-200">
            <div>
                <h1 id="pageTitle" class="text-2xl font-bold text-[#251306]">Ringkasan Utama</h1>
                <p class="text-xs text-gray-500">Kelola operasional dan pemesanan Tbloom Cake & Bakery Indramayu</p>
            </div>
            <a href="{{ route('home') }}" class="bg-[#F7E3DF] text-[#CD3281] hover:bg-[#CD3281] hover:text-white px-4 py-2 rounded-xl text-xs font-bold transition flex items-center gap-2">
                <i class="fa-solid fa-store"></i> Lihat Halaman Toko
            </a>
        </header>

        <!-- TAB 1: OVERVIEW -->
        <section id="tab-overview" class="content-section space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-pink-100 text-[#CD3281] rounded-xl flex items-center justify-center font-bold text-xl"><i class="fa-solid fa-basket-shopping"></i></div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Total Pesanan</p>
                        <h3 id="statTotalOrders" class="text-xl font-bold text-[#251306]">0 Pesanan</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center font-bold text-xl"><i class="fa-solid fa-clock"></i></div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Menunggu Konfirmasi</p>
                        <h3 id="statPendingOrders" class="text-xl font-bold text-[#251306]">0 Pesanan</h3>
                    </div>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center font-bold text-xl"><i class="fa-solid fa-check-double"></i></div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Pesanan Selesai</p>
                        <h3 id="statCompletedOrders" class="text-xl font-bold text-[#251306]">0 Pesanan</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- TAB KELOLA PESANAN -->
        <section id="tab-orders" class="content-section hidden space-y-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 space-y-4">
                <h3 class="text-base font-bold text-[#251306]">Daftar Masuk Pesanan Pelanggan</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-[#F7E3DF]/50 text-[#512323]">
                                <th class="p-3 rounded-l-xl">Pelanggan</th>
                                <th class="p-3">Produk</th>
                                <th class="p-3">Metode Pengiriman</th>
                                <th class="p-3">Info Kontak & Penerima</th>
                                <th class="p-3">Metode & Bukti Pembayaran</th>
                                <th class="p-3">Total Harga</th>
                                <th class="p-3">Status Saat Ini</th>
                                <th class="p-3 rounded-r-xl text-center">Ubah Status</th>
                            </tr>
                        </thead>
                        <tbody id="adminOrdersTable" class="divide-y divide-gray-100">
                            <!-- Diisi via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- TAB EVALUASI TESTIMONI -->
        <section id="tab-testimonials" class="content-section hidden space-y-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 space-y-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-base font-bold text-[#251306]">Evaluasi Testimoni Pelanggan</h3>
                        <p class="text-xs text-gray-500">Ulasan dan rating dari pelanggan yang pesanannya sudah berstatus "Selesai".</p>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-[#512323] text-white">
                                <th class="p-3 rounded-l-xl">Tanggal</th>
                                <th class="p-3">Pelanggan</th>
                                <th class="p-3">Produk Pesanan</th>
                                <th class="p-3">Rating</th>
                                <th class="p-3 rounded-r-xl">Komentar / Evaluasi</th>
                            </tr>
                        </thead>
                        <tbody id="adminTestimonialTable" class="divide-y divide-gray-100">
                            <!-- Diisi via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- TAB DAFTAR ADMIN AKTIF -->
        <section id="tab-admins" class="content-section hidden space-y-6">
            <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-[#251306] mb-4">Tim Pemegang Akses Admin</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-[#F7E3DF]/50 text-[#512323]">
                                <th class="p-3 rounded-l-xl">Nama Admin</th>
                                <th class="p-3">Email Tim</th>
                                <th class="p-3 rounded-r-xl">Status Jabatan</th>
                            </tr>
                        </thead>
                        <tbody id="adminPublicTable" class="divide-y divide-gray-100">
                            <!-- Diisi Otomatis -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- TAB KEUANGAN -->
        <section id="tab-financial" class="content-section hidden space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-[#251306] mb-2">Ringkasan Laporan Keuangan Toko</h3>
                <p class="text-xs text-gray-500 mb-6">Laporan pemasukan dan pendapatan bersih khusus akses Owner.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="p-5 bg-green-50 border border-green-200 rounded-2xl">
                        <span class="text-xs text-green-700 font-semibold">Total Omzet Bulan Ini</span>
                        <h2 class="text-2xl font-bold text-green-800 mt-1">Rp 14.850.000</h2>
                    </div>
                    <div class="p-5 bg-blue-50 border border-blue-200 rounded-2xl">
                        <span class="text-xs text-blue-700 font-semibold">Estimasi Keuntungan Bersih</span>
                        <h2 class="text-2xl font-bold text-blue-800 mt-1">Rp 6.200.000</h2>
                    </div>
                </div>
            </div>
        </section>

        <!-- TAB KELOLA AKUN ADMIN -->
        <section id="tab-accounts" class="content-section hidden space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h3 class="text-base font-bold text-[#251306]">Kelola Pemegang Akun Admin</h3>
                        <p class="text-xs text-gray-500">Hanya Owner yang memiliki akses melihat sandi dan mengelola staf admin.</p>
                    </div>
                    <button onclick="showAddAdminModal()" class="bg-[#CD3281] hover:bg-[#b0256c] text-white text-xs font-bold px-4 py-2.5 rounded-xl transition shadow-md flex items-center gap-2 cursor-pointer">
                        <i class="fa-solid fa-plus"></i> Tambah Admin Baru
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-xs">
                        <thead>
                            <tr class="bg-[#251306] text-white">
                                <th class="p-3 rounded-l-xl">Nama Admin</th>
                                <th class="p-3">Email Akses</th>
                                <th class="p-3">Kata Sandi (Hanya Owner)</th>
                                <th class="p-3 text-center rounded-r-xl">Aksi Karyawan</th>
                            </tr>
                        </thead>
                        <tbody id="ownerAdminTable" class="divide-y divide-gray-100">
                            <!-- Diisi via JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    <!-- MODAL DETAIL KONTAK PENERIMA -->
    <div id="contactModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white w-full max-w-md rounded-[32px] p-8 shadow-2xl border border-[#C3B59C]/30 space-y-6 transform scale-95 transition-transform duration-300" id="contactModalContent">
            <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                <h3 class="text-lg font-bold font-serif-custom text-[#251306]">Informasi Kontak & Penerima</h3>
                <button onclick="closeContactModal()" class="text-gray-400 hover:text-gray-600 cursor-pointer"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div id="contactModalBody" class="space-y-3 text-xs text-gray-700">
                <!-- Diisi via JS -->
            </div>
            <button onclick="closeContactModal()" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white font-bold text-xs py-3.5 rounded-xl shadow-md transition cursor-pointer">
                Tutup
            </button>
        </div>
    </div>

    <!-- MODAL BUKTI PEMBAYARAN -->
    <div id="proofModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white w-full max-w-md rounded-[32px] p-8 shadow-2xl border border-[#C3B59C]/30 space-y-6 transform scale-95 transition-transform duration-300" id="proofModalContent">
            <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                <h3 class="text-lg font-bold font-serif-custom text-[#251306]">Bukti Pembayaran Customer</h3>
                <button onclick="closeProofModal()" class="text-gray-400 hover:text-gray-600 cursor-pointer"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>
            <div id="proofModalBody" class="text-center space-y-3">
                <!-- Diisi via JS -->
            </div>
            <button onclick="closeProofModal()" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white font-bold text-xs py-3.5 rounded-xl shadow-md transition cursor-pointer">
                Tutup
            </button>
        </div>
    </div>

    <!-- SCRIPT DASHBOARD ADMIN -->
    <script>
        const currentUserRole = localStorage.getItem('tbloom_user_role');
        const currentUserName = localStorage.getItem('tbloom_customer_name') || 'Pengguna';

        if (!currentUserRole || (currentUserRole !== 'owner' && currentUserRole !== 'admin')) {
            alert('Akses Ditolak! Anda harus login sebagai Admin atau Owner untuk mengakses halaman ini.');
            window.location.href = "{{ route('login') }}";
        }

        window.onload = function() {
            document.getElementById('adminUserName').innerText = currentUserName;
            document.getElementById('sidebarRoleBadge').innerText = currentUserRole === 'owner' ? 'Akses Owner (Super Admin)' : 'Akses Staf Admin';

            if (currentUserRole === 'owner') {
                document.getElementById('ownerOnlyMenus').classList.remove('hidden');
            }

            renderOverviewStats();
            renderAdminOrdersTable();
            renderAdminTestimonials();
            renderAdminTables();
        };

        function switchTab(tabName) {
            document.querySelectorAll('.content-section').forEach(sec => sec.classList.add('hidden'));
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('bg-[#CD3281]', 'text-white'));
            
            document.getElementById('tab-' + tabName).classList.remove('hidden');
            document.getElementById('nav-' + tabName).classList.add('bg-[#CD3281]', 'text-white');
            
            const titles = {
                'overview': 'Ringkasan Utama',
                'orders': 'Kelola Pesanan Customer',
                'products': 'Katalog Produk Tbloom',
                'testimonials': 'Evaluasi Testimoni Pelanggan',
                'admins': 'Tim Admin Aktif',
                'financial': 'Laporan Keuangan Toko',
                'accounts': 'Kelola Pemegang Akun Admin'
            };
            document.getElementById('pageTitle').innerText = titles[tabName] || 'Dashboard Management';
        }

        function renderOverviewStats() {
            let orders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            document.getElementById('statTotalOrders').innerText = orders.length + ' Pesanan';
            document.getElementById('statPendingOrders').innerText = orders.filter(o => o.status === 'Menunggu Konfirmasi' || !o.status).length + ' Pesanan';
            document.getElementById('statCompletedOrders').innerText = orders.filter(o => o.status === 'Selesai').length + ' Pesanan';
        }

        function renderAdminOrdersTable() {
            let orders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            const tbody = document.getElementById('adminOrdersTable');

            if (orders.length === 0) {
                tbody.innerHTML = `<tr><td colspan="8" class="p-6 text-center text-gray-400">Belum ada pesanan masuk.</td></tr>`;
                return;
            }

            tbody.innerHTML = orders.map((order, idx) => {
                let shippingText = (order.status === 'Selesai' && order.shippingMethod) 
                    ? order.shippingMethod 
                    : '<span class="text-gray-400 italic">customer belum memilih metode pengiriman</span>';
                
                let paymentText = order.paymentMethod ? order.paymentMethod : 'Transfer Bank';
                
                // Pengecekan bukti pembayaran yang lebih fleksibel terhadap base64 string
                let hasProof = order.paymentProof && (order.paymentProof.includes('data:image') || order.paymentProof.length > 20);

                return `
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 font-semibold text-[#251306]">${order.customer || order.receiverName || 'Customer'}</td>
                        <td class="p-3 text-gray-700">${order.productName || 'Kue Tbloom'} (${order.quantity || 1}x)</td>
                        <td class="p-3 font-medium text-[#CD3281]">${shippingText}</td>
                        <td class="p-3">
                            <button onclick="showContactModal(${idx})" class="bg-[#F7E3DF] hover:bg-[#CD3281] text-[#CD3281] hover:text-white px-3 py-1.5 rounded-xl font-bold transition flex items-center gap-1.5 cursor-pointer">
                                <i class="fa-solid fa-address-book"></i> Lihat Kontak
                            </button>
                        </td>
                        <td class="p-3">
                            <div class="space-y-1">
                                <span class="font-semibold text-[#251306] block">${paymentText}</span>
                                ${hasProof ? `
                                    <button onclick="showProofModal(${idx})" class="text-[10px] text-[#CD3281] font-bold underline hover:text-[#b0256c] cursor-pointer">
                                        <i class="fa-solid fa-image mr-1"></i> Lihat Bukti
                                    </button>
                                ` : '<span class="text-[10px] text-gray-400 italic">Tidak ada bukti</span>'}
                            </div>
                        </td>
                        <td class="p-3 font-bold text-[#251306]">Rp ${order.totalPrice || '0'}</td>
                        <td class="p-3">
                            <span class="px-2.5 py-1 rounded-full text-[10px] font-bold ${order.status === 'Selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-800'}">
                                ${order.status || 'Menunggu Konfirmasi'}
                            </span>
                        </td>
                        <td class="p-3 text-center">
                            <select onchange="updateOrderStatus(${idx}, this.value)" class="bg-gray-100 border border-gray-300 rounded-lg p-1.5 text-xs font-semibold text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281]">
                                <option value="Menunggu Konfirmasi" ${order.status === 'Menunggu Konfirmasi' ? 'selected' : ''}>Menunggu Konfirmasi</option>
                                <option value="Diproses" ${order.status === 'Diproses' ? 'selected' : ''}>Diproses</option>
                                <option value="Selesai" ${order.status === 'Selesai' ? 'selected' : ''}>Selesai</option>
                            </select>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        function showContactModal(idx) {
            let orders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let order = orders[idx];
            if (!order) return;

            // Mengambil data secara fleksibel dari berbagai variasi key properti pesanan
            let name = order.receiverName || order.customer || localStorage.getItem('tbloom_receiver_name') || 'Customer';
            let phone = order.receiverPhone || order.phone || localStorage.getItem('tbloom_receiver_phone') || 'Tidak dicantumkan';
            let address = order.shippingAddress || order.address || order.notes || localStorage.getItem('tbloom_shipping_address') || 'Tidak ada catatan khusus';

            const body = document.getElementById('contactModalBody');
            body.innerHTML = `
                <div class="bg-pink-50/50 p-4 rounded-2xl border border-pink-100 space-y-2">
                    <p><strong>Nama Penerima:</strong> ${name}</p>
                    <p><strong>No. Telepon / WhatsApp:</strong> <a href="https://wa.me/${phone.replace(/[^0-9]/g, '')}" target="_blank" class="text-[#CD3281] font-bold underline">${phone}</a></p>
                    <p><strong>Alamat Lengkap:</strong> ${address}</p>
                </div>
                <p class="text-[11px] text-gray-500 italic">* Jika pesanan berstatus Selesai namun belum diambil atau belum dijemput kurir, silakan hubungi nomor WhatsApp di atas.</p>
            `;

            const modal = document.getElementById('contactModal');
            const content = document.getElementById('contactModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        }

        function closeContactModal() {
            const modal = document.getElementById('contactModal');
            const content = document.getElementById('contactModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        function showProofModal(idx) {
            let orders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let order = orders[idx];
            if (!order || !order.paymentProof) return;

            const body = document.getElementById('proofModalBody');
            body.innerHTML = `
                <div class="space-y-3">
                    <img src="${order.paymentProof}" alt="Bukti Pembayaran" class="w-full max-h-80 object-contain rounded-2xl border border-gray-200 shadow-sm">
                    <p class="text-[11px] text-gray-500">Pastikan nominal dan bukti transfer valid sebelum mengubah status pesanan menjadi <strong>Diproses</strong>.</p>
                </div>
            `;

            const modal = document.getElementById('proofModal');
            const content = document.getElementById('proofModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        }

        function closeProofModal() {
            const modal = document.getElementById('proofModal');
            const content = document.getElementById('proofModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => { modal.classList.add('hidden'); }, 300);
        }

        function updateOrderStatus(index, newStatus) {
            let orders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            if (orders[index]) {
                orders[index].status = newStatus;
                localStorage.setItem('tbloom_orders', JSON.stringify(orders));
                renderOverviewStats();
                renderAdminOrdersTable();
                alert("Status pesanan berhasil diperbarui menjadi: " + newStatus);
            }
        }

        function renderAdminTestimonials() {
            let testimonials = JSON.parse(localStorage.getItem('tbloom_testimonials')) || [];
            const tbody = document.getElementById('adminTestimonialTable');

            if (testimonials.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" class="p-6 text-center text-gray-400">Belum ada testimoni evaluasi dari pelanggan.</td></tr>`;
                return;
            }

            tbody.innerHTML = testimonials.map(t => `
                <tr class="hover:bg-gray-50">
                    <td class="p-3 text-gray-500">${t.date || 'Hari ini'}</td>
                    <td class="p-3 font-semibold text-[#251306]">${t.customer}</td>
                    <td class="p-3 text-gray-700">${t.productName}</td>
                    <td class="p-3 text-yellow-500">
                        ${'★'.repeat(t.rating)}${'☆'.repeat(5 - t.rating)} (${t.rating}/5)
                    </td>
                    <td class="p-3 text-gray-600 italic">"${t.comment}"</td>
                </tr>
            `).join('');
        }

        function renderAdminTables() {
            const users = JSON.parse(localStorage.getItem('tbloom_users')) || [];
            const adminList = users.filter(u => u.role === 'admin' || u.role === 'owner');

            document.getElementById('adminPublicTable').innerHTML = adminList.map(u => `
                <tr class="hover:bg-gray-50">
                    <td class="p-3 font-semibold text-[#251306]">${u.name}</td>
                    <td class="p-3 text-gray-600">${u.email}</td>
                    <td class="p-3"><span class="px-2.5 py-1 rounded-full text-[10px] font-bold ${u.role === 'owner' ? 'bg-purple-100 text-purple-700' : 'bg-blue-100 text-blue-700'} uppercase">${u.role}</span></td>
                </tr>
            `).join('');

            document.getElementById('ownerAdminTable').innerHTML = adminList.map(u => `
                <tr class="hover:bg-gray-50">
                    <td class="p-3 font-semibold text-[#251306]">${u.name}</td>
                    <td class="p-3 text-gray-600">${u.email}</td>
                    <td class="p-3 font-mono font-bold text-[#CD3281]">${u.password}</td>
                    <td class="p-3 text-center">
                        ${u.role === 'admin' ? `<button onclick="deleteAdmin('${u.email}')" class="bg-red-100 hover:bg-red-500 text-red-600 hover:text-white px-3 py-1 rounded-lg transition text-[11px] font-bold cursor-pointer"><i class="fa-solid fa-trash mr-1"></i> Hapus Admin</button>` : '<span class="text-xs text-gray-400 italic">Pemilik Toko</span>'}
                    </td>
                </tr>
            `).join('');
        }

        function showAddAdminModal() {
            const name = prompt("Masukkan Nama Admin Baru:");
            if (!name) return;
            const email = prompt("Masukkan Email Admin Baru:");
            if (!email) return;
            const password = prompt("Buat Kata Sandi Admin Baru:");
            if (!password) return;

            let users = JSON.parse(localStorage.getItem('tbloom_users')) || [];
            users.push({ name, email, password, role: 'admin' });
            localStorage.setItem('tbloom_users', JSON.stringify(users));

            alert(`Admin baru (${name}) berhasil ditambahkan oleh Owner!`);
            renderAdminTables();
        }

        function deleteAdmin(email) {
            if (confirm("Apakah Anda yakin ingin menghapus akses akun admin ini?")) {
                let users = JSON.parse(localStorage.getItem('tbloom_users')) || [];
                users = users.filter(u => u.email !== email);
                localStorage.setItem('tbloom_users', JSON.stringify(users));
                alert("Admin berhasil dihapus.");
                renderAdminTables();
            }
        }

        function handleLogout() {
            localStorage.removeItem('tbloom_is_logged_in');
            localStorage.removeItem('tbloom_customer_name');
            localStorage.removeItem('tbloom_user_role');
            window.location.href = "{{ route('login') }}";
        }
    </script>
</body>
</html>