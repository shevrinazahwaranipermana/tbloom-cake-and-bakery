<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran - Tbloom Cake & Bakery</title>
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
                <a href="{{ route('home') }}#lacak-pesanan" class="hover:text-[#CD3281] transition">Lacak Pesanan</a>
            </nav>
            <div class="flex items-center gap-3 flex-shrink-0">
                <a href="{{ route('cart') }}" class="relative p-2.5 bg-[#CD3281] text-white rounded-full transition shadow-sm">
                    <i class="fa-solid fa-cart-shopping text-sm"></i>
                    <span id="nav-cart-count" class="absolute -top-1 -right-1 bg-white text-[#CD3281] text-[10px] w-4 h-4 rounded-full flex items-center justify-center font-bold">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- KONTEN UTAMA UPLOAD BUKTI -->
    <main class="flex-1 max-w-2xl w-full mx-auto px-6 py-10 space-y-8">
        
        <!-- Header Judul & Tombol Kembali -->
        <div class="flex items-center justify-between bg-white/60 backdrop-blur-md border border-[#C3B59C]/40 rounded-3xl p-6 shadow-sm">
            <div class="flex items-center gap-3">
                <a href="{{ route('checkout.payment') }}" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-[#512323] shadow-sm hover:bg-[#CD3281] hover:text-white transition cursor-pointer">
                    <i class="fa-solid fa-arrow-left text-xs"></i>
                </a>
                <h1 class="text-2xl md:text-3xl font-serif-custom font-bold text-[#251306]">Pembayaran</h1>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="bg-white rounded-3xl p-6 border border-[#C3B59C]/40 shadow-sm">
            <div class="flex items-center justify-between relative max-w-md mx-auto">
                <div class="absolute left-8 right-8 top-1/2 -translate-y-1/2 h-0.5 bg-gray-200 z-0"></div>

                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-green-600 text-white font-bold text-xs flex items-center justify-center shadow-md"><i class="fa-solid fa-check"></i></div>
                    <span class="text-[11px] font-bold text-green-700">Data Pesanan</span>
                </div>

                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-[#CD3281] text-white font-bold text-xs flex items-center justify-center shadow-md">2</div>
                    <span class="text-[11px] font-bold text-[#CD3281]">Pembayaran</span>
                </div>

                <div class="flex flex-col items-center z-10 space-y-1">
                    <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 font-bold text-xs flex items-center justify-center">3</div>
                    <span class="text-[11px] font-medium text-gray-400">Pengiriman</span>
                </div>
            </div>
        </div>

        <!-- Detail Rekening & Unggah Bukti -->
        <div class="bg-white rounded-3xl p-8 border border-[#C3B59C]/40 shadow-md space-y-6">
            <h2 class="text-lg font-serif-custom font-bold text-[#251306] border-b border-gray-100 pb-3">Transfer ke Rekening</h2>

            <!-- Box Info Rekening -->
            <div class="border-2 border-[#CD3281] rounded-2xl p-5 flex items-center justify-between bg-white shadow-sm">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-12 bg-blue-50 border border-blue-200 rounded-xl flex items-center justify-center font-bold text-blue-900 text-sm tracking-wide">
                        BCA
                    </div>
                    <div>
                        <p class="font-bold text-sm text-[#251306]" id="selected-bank-title">1234 5678 90</p>
                        <p class="text-[11px] text-gray-500">a.n. Tbloom Cake and Bakery</p>
                    </div>
                </div>
                <button onclick="alert('Nomor rekening disalin!')" class="bg-[#F7E3DF] hover:bg-[#ebd0cc] text-[#CD3281] font-bold text-[11px] px-3.5 py-2 rounded-xl transition cursor-pointer">
                    Salin
                </button>
            </div>

            <!-- Upload Bukti Pembayaran -->
            <div class="space-y-3 pt-2">
                <h3 class="text-sm font-bold text-[#512323]">Upload Bukti Pembayaran</h3>
                
                <label for="proofFile" class="border-2 border-dashed border-[#CD3281]/50 bg-[#F7E3DF]/20 hover:bg-[#F7E3DF]/40 rounded-3xl p-8 flex flex-col items-center justify-center cursor-pointer transition text-center space-y-2">
                    <div class="w-16 h-16 bg-white text-[#CD3281] rounded-2xl flex items-center justify-center text-xl shadow-sm">
                        <i class="fa-solid fa-camera"></i>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-bold text-[#CD3281]" id="file-label-text">Tap untuk upload atau pilih dari galeri</p>
                        <p class="text-[10px] text-gray-400">Format yang didukung: JPG, PNG, JPEG (Maks. 5MB)</p>
                    </div>
                    <input type="file" id="proofFile" accept="image/*" class="hidden" onchange="handleFileSelect(event)">
                </label>
            </div>

            <!-- Tombol Konfirmasi Pembayaran -->
            <div class="pt-4">
                <button type="button" id="confirmBtn" onclick="submitPayment()" disabled class="w-full bg-gray-300 text-gray-500 py-4 rounded-full text-xs font-bold shadow-none transition cursor-not-allowed text-center">
                    Konfirmasi Pembayaran
                </button>
            </div>
        </div>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#251306] text-[#F7E3DF] mt-16 py-8 text-center text-xs">
        <p>&copy; 2026 Tbloom Cake & Bakery • Indramayu. All Rights Reserved.</p>
    </footer>

    <!-- SCRIPT VALIDASI UPLOAD & SINKRONISASI KERANJANG UTUH -->
    <script>
        let uploadedBase64Proof = null;
        let isSubmitting = false;

        function handleFileSelect(event) {
            const file = event.target.files[0];
            const confirmBtn = document.getElementById('confirmBtn');
            const labelText = document.getElementById('file-label-text');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    uploadedBase64Proof = e.target.result; 
                    labelText.innerText = "File terpilih: " + file.name;
                    
                    confirmBtn.removeAttribute('disabled');
                    confirmBtn.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed', 'shadow-none');
                    confirmBtn.classList.add('bg-[#CD3281]', 'hover:bg-[#b0256c]', 'text-white', 'shadow-lg', 'active:scale-95', 'cursor-pointer');
                };
                reader.readAsDataURL(file);
            } else {
                uploadedBase64Proof = null;
                labelText.innerText = "Tap untuk upload atau pilih dari galeri";
                
                confirmBtn.setAttribute('disabled', 'true');
                confirmBtn.classList.add('bg-gray-300', 'text-gray-500', 'cursor-not-allowed', 'shadow-none');
                confirmBtn.classList.remove('bg-[#CD3281]', 'hover:bg-[#b0256c]', 'text-white', 'shadow-lg', 'active:scale-95', 'cursor-pointer');
            }
        }

        function submitPayment() {
            if (isSubmitting) return;

            if (!uploadedBase64Proof) {
                alert('Harap upload bukti pembayaran terlebih dahulu!');
                return;
            }

            // Ambil data keranjang saat ini
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            
            if (cart.length === 0) {
                let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
                let fallbackIndex = allOrders.length > 0 ? allOrders.length - 1 : 0;
                alert('Konfirmasi pembayaran berhasil!');
                window.location.href = "{{ route('checkout.detail') }}?index=" + fallbackIndex;
                return;
            }

            isSubmitting = true;
            const confirmBtn = document.getElementById('confirmBtn');
            if (confirmBtn) {
                confirmBtn.setAttribute('disabled', 'true');
                confirmBtn.innerText = "Memproses Pesanan...";
            }

            // Ambil data kontak & penerima secara akurat dari inputan sesi checkout-customer
            let customerName = localStorage.getItem('tbloom_customer_name') || 'Customer';
            let receiverName = localStorage.getItem('tbloom_receiver_name') || localStorage.getItem('tbloom_customer_name') || customerName;
            let receiverPhone = localStorage.getItem('tbloom_receiver_phone') || localStorage.getItem('tbloom_phone') || '-';
            let shippingAddress = localStorage.getItem('tbloom_shipping_address') || localStorage.getItem('tbloom_address') || '-';
            let paymentMethod = localStorage.getItem('tbloom_payment_method') || 'Transfer Bank';
            let shippingMethod = localStorage.getItem('tbloom_shipping_method') || null;

            let totalPrice = cart.reduce((sum, item) => sum + ((item.price || 0) * (item.qty || 1)), 0);
            let totalQty = cart.reduce((sum, item) => sum + (item.qty || 1), 0);
            
            let productName = cart.length > 1 
                ? `${cart[0].name} (+${cart.length - 1} kue lainnya)` 
                : cart[0].name;

            let newOrder = {
                customer: customerName,
                receiverName: receiverName,
                receiverPhone: receiverPhone,
                shippingAddress: shippingAddress,
                productName: productName,
                quantity: totalQty,
                totalPrice: totalPrice > 0 ? totalPrice.toLocaleString('id-ID') : '0',
                paymentMethod: paymentMethod,
                shippingMethod: shippingMethod,
                paymentProof: uploadedBase64Proof, // Menyimpan base64 foto bukti transfer
                status: 'Menunggu Konfirmasi',
                date: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' }),
                estDate: '3-4 Hari Lagi',
                items: cart
            };

            // Simpan ke tbloom_orders menggunakan push()
            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            allOrders.push(newOrder);
            localStorage.setItem('tbloom_orders', JSON.stringify(allOrders));

            // Hitung index dinamis posisi pesanan
            let targetIndex = allOrders.length - 1;

            // Hapus keranjang belanja SETELAH data aman tersimpan
            localStorage.removeItem('tbloom_cart');

            alert('Konfirmasi pembayaran berhasil!');
            
            // Arahkan ke halaman detail sesuai index pesanan yang baru saja dibayar
            window.location.href = "{{ route('checkout.detail') }}?index=" + targetIndex;
        }

        window.onload = function() {
            let cart = JSON.parse(localStorage.getItem('tbloom_cart')) || [];
            let totalCount = cart.reduce((sum, item) => sum + item.qty, 0);
            const badge = document.getElementById('nav-cart-count');
            if (badge) badge.innerText = totalCount;

            let method = localStorage.getItem('tbloom_payment_method') || 'Transfer Bank';
            let bankAcc = method === 'BCA' ? '1234 5678 90' : (method === 'BJB' ? '0987 6543 21' : '1234 5678 90');
            document.getElementById('selected-bank-title').innerText = method + ' - ' + bankAcc;
        }
    </script>
</body>
</html>