<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Pembayaran - Tbloom Cake & Bakery</title>
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
<body class="bg-[#F7E3DF] text-[#251306] font-sans-custom min-h-screen flex flex-col selection:bg-[#CD3281] selection:text-white pb-16">

    <!-- NAVBAR DESKTOP -->
    <header class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-[#C3B59C]/30 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between gap-4">
            <a href="{{ route('home') }}" class="flex items-center gap-2 flex-shrink-0">
                <img src="{{ asset('Images/logo_tbloom.PNG') }}" alt="Tbloom Logo" class="h-10 md:h-12 object-contain">
            </a>
            <div class="flex-1 max-w-sm mx-4">
                <div class="relative">
                    <input type="text" placeholder="Cari cake favoritmu..." class="w-full bg-[#F7E3DF]/40 border border-[#C3B59C]/50 rounded-full py-2.5 pl-10 pr-4 text-xs text-[#251306] focus:outline-none focus:ring-2 focus:ring-[#CD3281] transition placeholder:text-gray-400">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
                </div>
            </div>
            <nav class="flex items-center gap-6 text-xs font-semibold text-[#512323]">
                <a href="{{ route('home') }}" class="hover:text-[#CD3281] transition">Beranda</a>
                <a href="{{ route('simple.cake') }}" class="hover:text-[#CD3281] transition">Kategori</a>
                <a href="{{ route('home') }}#riwayat-pesanan-section" class="hover:text-[#CD3281] transition">Riwayat Pesanan</a>
            </nav>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('cart') }}" class="relative p-2.5 bg-[#CD3281] text-white rounded-full transition shadow-sm">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-white text-[#CD3281] text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA PEMBAYARAN -->
    <main class="flex-1 max-w-2xl w-full mx-auto px-6 py-10 space-y-8">
        
        <!-- Header Judul & Tombol Kembali -->
        <div class="flex items-center justify-between bg-white/60 backdrop-blur-md border border-[#C3B59C]/40 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <a href="{{ route('checkout.customer') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#512323] shadow-sm hover:bg-[#CD3281] hover:text-white transition">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                </a>
                <h1 class="text-2xl md:text-3xl font-serif-custom font-bold text-[#251306]">Pembayaran</h1>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="bg-white rounded-3xl p-6 border border-[#C3B59C]/40 shadow-sm">
            <div class="flex items-center justify-between relative max-w-md mx-auto">
                <div class="absolute left-8 right-8 top-1/2 -translate-y-1/2 h-0.5 bg-gray-200 z-0"></div>

                <!-- Step 1 (Selesai) -->
                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white font-bold text-xs flex items-center justify-center shadow-md"><i class="fa-solid fa-check"></i></div>
                    <span class="text-[11px] font-bold text-green-700">Data Pesanan</span>
                </div>

                <!-- Step 2 (Aktif) -->
                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-[#CD3281] text-white font-bold text-xs flex items-center justify-center shadow-md">2</div>
                    <span class="text-[11px] font-bold text-[#CD3281]">Pembayaran</span>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 font-bold text-xs flex items-center justify-center">3</div>
                    <span class="text-[11px] font-medium text-gray-400">Pengiriman</span>
                </div>
            </div>
        </div>

        <!-- Pilihan Metode Pembayaran -->
        <div class="bg-white rounded-3xl p-8 border border-[#C3B59C]/40 shadow-md space-y-6">
            <h2 class="text-lg font-serif-custom font-bold text-[#251306] border-b border-gray-100 pb-3">Pilih Metode Pembayaran</h2>

            <div class="space-y-4">
                
                <!-- Opsi 1: Transfer Bank -->
                <label onclick="selectPayment('Transfer Bank')" class="payment-card flex items-center justify-between p-4 rounded-2xl border-2 border-[#CD3281] bg-white cursor-pointer shadow-sm transition hover:border-[#CD3281]">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-10 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-center p-1 text-[10px] font-bold text-gray-600 text-center">
                            <i class="fa-solid fa-building-columns text-[#CD3281] text-base"></i>
                        </div>
                        <div>
                            <p class="font-bold text-xs text-[#251306]">Transfer Bank</p>
                            <p class="text-[11px] text-gray-400">BCA, BRI, BNI, Mandiri</p>
                        </div>
                    </div>
                    <input type="radio" name="payment_method" checked class="accent-[#CD3281] w-4 h-4">
                </label>

                <!-- Opsi 2: QRIS -->
                <label onclick="selectPayment('QRIS')" class="payment-card flex items-center justify-between p-4 rounded-2xl border-2 border-gray-200 bg-white cursor-pointer shadow-sm transition hover:border-[#CD3281]">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-10 bg-gray-50 border border-gray-200 rounded-lg flex items-center justify-center font-black text-xs tracking-tighter text-gray-800">
                            QRIS
                        </div>
                        <div>
                            <p class="font-bold text-xs text-[#251306]">QRIS</p>
                            <p class="text-[11px] text-gray-400">Scan & Pay (GoPay, OVO, DANA, BCA)</p>
                        </div>
                    </div>
                    <input type="radio" name="payment_method" class="accent-[#CD3281] w-4 h-4">
                </label>

                <!-- Opsi 3: BJB -->
                <label onclick="selectPayment('BJB')" class="payment-card flex items-center justify-between p-4 rounded-2xl border-2 border-gray-200 bg-white cursor-pointer shadow-sm transition hover:border-[#CD3281]">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-10 bg-blue-50 border border-blue-200 rounded-lg flex items-center justify-center font-bold text-blue-800 text-[11px]">
                            bjb
                        </div>
                        <div>
                            <p class="font-bold text-xs text-[#251306]">BJB</p>
                            <p class="text-[11px] text-gray-400">Bank Pembangunan Daerah Jabar</p>
                        </div>
                    </div>
                    <input type="radio" name="payment_method" class="accent-[#CD3281] w-4 h-4">
                </label>

                <!-- Opsi 4: ShopeePay -->
                <label onclick="selectPayment('ShopeePay')" class="payment-card flex items-center justify-between p-4 rounded-2xl border-2 border-gray-200 bg-white cursor-pointer shadow-sm transition hover:border-[#CD3281]">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-10 bg-[#EE4D2D] rounded-lg flex items-center justify-center text-white font-bold text-[10px]">
                            ShopeePay
                        </div>
                        <div>
                            <p class="font-bold text-xs text-[#251306]">ShopeePay</p>
                            <p class="text-[11px] text-gray-400">Pembayaran instan e-wallet</p>
                        </div>
                    </div>
                    <input type="radio" name="payment_method" class="accent-[#CD3281] w-4 h-4">
                </label>

            </div>

            <!-- Tombol Lanjutkan -->
            <div class="pt-4">
                <button onclick="proceedToNext()" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white py-4 rounded-full text-xs font-bold shadow-lg transition transform active:scale-95 text-center cursor-pointer">
                    Lanjutkan & Buat Pesanan
                </button>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

    <!-- SCRIPT INTERAKTIF & SINKRONISASI PESANAN KE LOCALSTORAGE -->
    <script>
        let selectedMethod = 'Transfer Bank';

        function selectPayment(method) {
            selectedMethod = method;
            document.querySelectorAll('.payment-card').forEach(card => {
                card.classList.remove('border-[#CD3281]');
                card.classList.add('border-gray-200');
                card.querySelector('input').checked = false;
            });
            event.currentTarget.classList.remove('border-gray-200');
            event.currentTarget.classList.add('border-[#CD3281]');
            event.currentTarget.querySelector('input').checked = true;
        }

        function updateCartCountBadge() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            let totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.innerText = totalCount;
        }

function proceedToNext() {
    localStorage.setItem('tbloom_payment_method', selectedMethod);

    let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
    let customerName = localStorage.getItem('tbloom_customer_name') || 'Customer Tbloom';

    if (cart.length > 0) {
        let existingOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];

        // Hitung Tanggal Pesan (Hari ini) dan Estimasi Siap (3-4 hari ke depan)
        let now = new Date();
        let options = { day: 'numeric', month: 'long', year: 'numeric' };
        let orderDateStr = now.toLocaleDateString('id-ID', options);

        let estDateObj = new Date(now);
        estDateObj.setDate(estDateObj.getDate() + 4); // Estimasi 4 hari
        let estDateStr = estDateObj.toLocaleDateString('id-ID', options);

        let totalPrice = cart.reduce((sum, item) => sum + (item.price * item.qty), 0);

        // Petik data item kue yang dipesan beserta spesifikasinya
        let orderItems = cart.map(item => ({
            name: item.name,
            category: item.category || (item.name.toLowerCase().includes('bento') ? 'bento' : 'simple'),
            size: item.size || '12cm',
            flavor: item.flavor || '-',
            filling: item.filling || '-',
            color: item.color || '-',
            note: item.note || item.customText || '-',
            price: item.price,
            qty: item.qty,
            image: item.image || 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=400&q=80'
        }));

        let newOrder = {
            customer: customerName,
            paymentMethod: selectedMethod,
            items: orderItems,
            productName: orderItems[0].name + (orderItems.length > 1 ? ` (+${orderItems.length - 1} kue lainnya)` : ''),
            quantity: orderItems.reduce((sum, i) => sum + i.qty, 0),
            totalPrice: totalPrice.toLocaleString('id-ID'),
            status: 'Menunggu Konfirmasi', // Status awal sesuai permintaan
            date: orderDateStr,
            estDate: estDateStr
        };

        existingOrders.push(newOrder);
        localStorage.setItem('tbloom_orders', JSON.stringify(existingOrders));

        // Kosongkan keranjang setelah pesanan diproses
        localStorage.removeItem('tbloom_cart');
    }

    window.location.href = "{{ route('checkout.upload') }}";
}
        window.onload = function() {
            updateCartCountBadge();
        }
    </script>
</body>
</html>