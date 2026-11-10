<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semua Riwayat Pesanan - Tbloom Cake & Bakery</title>
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

    <!-- KONTEN UTAMA SEMUA RIWAYAT PESANAN -->
    <main class="flex-1 max-w-4xl w-full mx-auto px-6 py-12 space-y-6">
        
        <div class="bg-white p-8 rounded-[32px] shadow-lg shadow-pink-900/5 border border-[#C3B59C]/30 space-y-6">
            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                <div>
                    <h1 class="text-2xl font-bold font-serif-custom text-[#251306]">History Pesanan Anda</h1>
                    <p class="text-xs text-gray-500 mt-1">Daftar seluruh transaksi kue manis yang pernah Anda pesan.</p>
                </div>
                <a href="{{ route('home') }}" class="text-xs font-bold text-[#CD3281] hover:underline flex items-center gap-2 cursor-pointer">
                    <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>

            <!-- Container Semua Kartu Pesanan -->
            <div id="allOrdersContainer" class="space-y-4">
                <!-- Diisi via JavaScript -->
            </div>
        </div>

    </main>

    <!-- MODAL PENGISIAN TESTIMONI -->
    <div id="testimonialModal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
        <div class="bg-white w-full max-w-md rounded-[32px] p-8 shadow-2xl border border-[#C3B59C]/30 space-y-6 transform scale-95 transition-transform duration-300" id="testimonialModalContent">
            
            <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                <h3 class="text-lg font-bold font-serif-custom text-[#251306]">Berikan Testimoni</h3>
                <button onclick="closeTestimonialModal()" class="text-gray-400 hover:text-gray-600 cursor-pointer"><i class="fa-solid fa-xmark text-lg"></i></button>
            </div>

            <div id="modalProductInfo" class="p-3 bg-pink-50/50 rounded-2xl border border-pink-100 text-xs flex items-center gap-3">
                <!-- Info Produk -->
            </div>

            <div class="space-y-2 text-center">
                <span class="text-xs font-semibold text-gray-700 block">Rating</span>
                <div class="flex justify-center gap-2 text-2xl text-gray-300" id="starContainer">
                    <i class="fa-solid fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(1)"></i>
                    <i class="fa-solid fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(2)"></i>
                    <i class="fa-solid fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(3)"></i>
                    <i class="fa-solid fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(4)"></i>
                    <i class="fa-solid fa-star cursor-pointer hover:text-yellow-400" onclick="setRating(5)"></i>
                </div>
                <input type="hidden" id="selectedRating" value="5">
            </div>

            <div class="space-y-1">
                <label class="text-xs font-semibold text-gray-700 block">Tulis Pengalaman kamu...</label>
                <textarea id="testimonialComment" rows="3" maxlength="500" placeholder="Contoh: Kue nya enak, tampilannya cantik..." class="w-full bg-gray-50 border border-gray-200 rounded-xl p-3 text-xs focus:outline-none focus:ring-2 focus:ring-[#CD3281]"></textarea>
            </div>

            <div class="bg-[#F7E3DF]/50 border border-[#CD3281]/20 p-3 rounded-xl flex items-start gap-2.5 text-[11px] text-[#512323]">
                <i class="fa-solid fa-circle-exclamation text-[#CD3281] mt-0.5"></i>
                <p>Testimoni yang kamu berikan bisa dilihat oleh Tbloom untuk keperluan evaluasi produk dan pelayanan, dan tidak akan ditampilkan kepada pelanggan lain.</p>
            </div>

            <button onclick="submitTestimonial()" class="w-full bg-[#CD3281] hover:bg-[#b0256c] text-white font-bold text-xs py-3.5 rounded-xl shadow-md transition cursor-pointer flex items-center justify-center gap-2">
                <i class="fa-solid fa-paper-plane"></i> Kirim Testimoni
            </button>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 py-6 text-center text-xs text-gray-500 mt-12">
        <p>&copy; 2026 Tbloom Cake & Bakery Indramayu. All rights reserved.</p>
    </footer>

    <!-- SCRIPT RENDER RIWAYAT PESANAN & TESTIMONI -->
    <script>
        let activeOrderIndex = null;
        let currentRating = 5;

        window.onload = function() {
            const isLoggedIn = localStorage.getItem('tbloom_is_logged_in');
            const customerName = localStorage.getItem('tbloom_customer_name');

            if (!isLoggedIn || isLoggedIn !== 'true') {
                alert('Silakan login terlebih dahulu.');
                window.location.href = "{{ route('home') }}";
                return;
            }

            renderOrderHistory();
        };

        function renderOrderHistory() {
            const customerName = localStorage.getItem('tbloom_customer_name');
            const container = document.getElementById('allOrdersContainer');
            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let myOrders = allOrders.filter(order => order.customer === customerName);

            if (myOrders.length === 0) {
                container.innerHTML = `
                    <div class="text-center py-16 space-y-4 bg-[#F7E3DF]/20 rounded-3xl border border-dashed border-[#CD3281]/30 p-8">
                        <div class="w-20 h-20 bg-white text-[#CD3281] rounded-full flex items-center justify-center mx-auto text-3xl shadow-md">
                            <i class="fa-solid fa-cookie-bite"></i>
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-base text-[#251306]">Belum Ada Pesanan</h3>
                            <p class="text-xs text-gray-500 max-w-sm mx-auto">Anda belum memiliki riwayat transaksi pemesanan kue.</p>
                        </div>
                        <a href="{{ route('home') }}" class="inline-block bg-[#CD3281] hover:bg-[#b0256c] text-white text-xs font-bold px-6 py-3 rounded-2xl shadow-md transition">
                            Pesan Kue Sekarang <i class="fa-solid fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                `;
                return;
            }

            container.innerHTML = myOrders.map((order, idx) => {
                let isCompleted = order.status === 'Selesai';
                let hasSubmittedTesti = order.hasTestimonial === true;
                
                // Sinkronisasi: Tampilkan metode pengiriman hanya jika status sudah Selesai dan sudah dipilih, selain itu tampilkan teks default
                let displayShipping = (order.status === 'Selesai' && order.shippingMethod) 
                    ? order.shippingMethod 
                    : 'Customer belum memilih metode pengiriman';

                return `
                    <div class="bg-gradient-to-r from-white via-white to-[#F7E3DF]/20 border border-[#C3B59C]/40 rounded-2xl p-5 space-y-3 shadow-sm hover:shadow-md transition">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                            <div class="space-y-1 cursor-pointer flex-1" onclick="window.location.href='{{ route('checkout.detail') }}?index=${idx}'">
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-0.5 rounded-full text-[10px] font-bold ${order.status === 'Selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-800'}">
                                        ${order.status || 'Menunggu Konfirmasi'}
                                    </span>
                                </div>
                                <h4 class="font-bold text-xs text-[#251306] hover:text-[#CD3281] transition">${order.productName || 'Kue Tbloom'} (${order.quantity || 1}x)</h4>
                                <p class="text-[11px] text-gray-500">Metode Pengiriman: <span class="font-semibold text-[#CD3281]">${displayShipping}</span> | Total: <span class="font-bold text-[#CD3281]">Rp ${order.totalPrice || '0'}</span></p>
                            </div>
                            <div class="text-left sm:text-right space-y-1">
                                <span class="text-[10px] text-gray-400 block"><i class="fa-regular fa-calendar text-[#CD3281] mr-1"></i> Pesan: ${order.date || 'Hari ini'}</span>
                                <span class="text-[11px] font-semibold text-[#512323] bg-white px-3 py-1.5 rounded-xl border border-gray-200 inline-block shadow-sm">
                                    <i class="fa-solid fa-clock text-[#CD3281] mr-1"></i> Perkiraan Siap: ${order.estDate || '3-4 Hari Lagi'}
                                </span>
                            </div>
                        </div>

                        ${isCompleted ? `
                            <div class="pt-3 border-t border-gray-100 flex justify-end">
                                ${hasSubmittedTesti ? `
                                    <span class="text-xs text-green-600 font-semibold bg-green-50 px-4 py-2 rounded-xl border border-green-200"><i class="fa-solid fa-check mr-1"></i> Testimoni Telah Dikirim</span>
                                ` : `
                                    <button onclick="openTestimonialModal(${idx})" class="bg-[#CD3281] hover:bg-[#b0256c] text-white text-xs font-bold px-5 py-2.5 rounded-xl shadow-md transition flex items-center gap-2 cursor-pointer">
                                        <i class="fa-solid fa-star"></i> Beri Testimoni <i class="fa-solid fa-arrow-right"></i>
                                    </button>
                                `}
                            </div>
                        ` : ''}
                    </div>
                `;
            }).join('');
        }

        function openTestimonialModal(idx) {
            activeOrderIndex = idx;
            const customerName = localStorage.getItem('tbloom_customer_name');
            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let myOrders = allOrders.filter(order => order.customer === customerName);
            let targetOrder = myOrders[idx];

            if (targetOrder) {
                document.getElementById('modalProductInfo').innerHTML = `
                    <div>
                        <p class="font-bold text-[#251306]">${targetOrder.productName}</p>
                        <p class="text-[10px] text-gray-500">Jumlah: ${targetOrder.quantity}x | Total: Rp ${targetOrder.totalPrice} | Pengiriman: ${targetOrder.shippingMethod || 'Ambil di Toko'}</p>
                    </div>
                `;
            }

            setRating(5);
            document.getElementById('testimonialComment').value = '';

            const modal = document.getElementById('testimonialModal');
            const content = document.getElementById('testimonialModalContent');
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                content.classList.remove('scale-95');
                content.classList.add('scale-100');
            }, 10);
        }

        function closeTestimonialModal() {
            const modal = document.getElementById('testimonialModal');
            const content = document.getElementById('testimonialModalContent');
            modal.classList.add('opacity-0');
            content.classList.remove('scale-100');
            content.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        function setRating(rating) {
            currentRating = rating;
            document.getElementById('selectedRating').value = rating;
            const stars = document.querySelectorAll('#starContainer i');
            stars.forEach((star, index) => {
                if (index < rating) {
                    star.classList.remove('text-gray-300');
                    star.classList.add('text-yellow-400');
                } else {
                    star.classList.remove('text-yellow-400');
                    star.classList.add('text-gray-300');
                }
            });
        }

        function submitTestimonial() {
            const comment = document.getElementById('testimonialComment').value.trim();
            const customerName = localStorage.getItem('tbloom_customer_name');
            let allOrders = JSON.parse(localStorage.getItem('tbloom_orders')) || [];
            let myOrders = allOrders.filter(order => order.customer === customerName);
            let targetOrder = myOrders[activeOrderIndex];

            if (!comment) {
                alert('Silakan tulis ulasan atau pengalaman kamu terlebih dahulu.');
                return;
            }

            let testimonials = JSON.parse(localStorage.getItem('tbloom_testimonials')) || [];
            testimonials.push({
                customer: customerName,
                productName: targetOrder.productName || 'Kue Tbloom',
                rating: currentRating,
                comment: comment,
                date: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' })
            });
            localStorage.setItem('tbloom_testimonials', JSON.stringify(testimonials));

            let globalIdx = allOrders.findIndex(o => o.customer === customerName && o.productName === targetOrder.productName && o.date === targetOrder.date);
            if (globalIdx !== -1) {
                allOrders[globalIdx].hasTestimonial = true;
                localStorage.setItem('tbloom_orders', JSON.stringify(allOrders));
            }

            alert('Terima kasih! Testimoni dan evaluasi Anda berhasil dikirim.');
            closeTestimonialModal();
            renderOrderHistory();
        }
    </script>
</body>
</html>