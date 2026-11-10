<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Halaman Splash Screen
Route::get('/', function () {
    return view('welcome');
});

// Halaman Beranda / Katalog Utama
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Halaman Khusus Simple Cake (Langsung Beli / Masuk Keranjang)
Route::get('/simple-cake', function () {
    return view('simple-cake');
})->name('simple.cake');

// Halaman Khusus Cup Cakes & Custom
Route::get('/cup-cakes', function () {
    return view('cupcakes');
})->name('cupcakes');

// Halaman Detail Cup Cakes Custom
Route::get('/cup-cakes/detail', function () {
    return view('cupcakes-detail');
})->name('cupcakes.detail');

// Halaman Bento Cake Tbloom (Siap Pesan & Custom)
Route::get('/bento-cake', function () {
    return view('bento-cake');
})->name('bento.cake');

// Halaman Katalog Simple Cake
Route::get('/simple-cake', function () {
    return view('simple-cake');
})->name('simple.cake');

// Halaman Detail Simple Cake
Route::get('/simple-cake/detail', function () {
    return view('simple-cake-detail');
})->name('simple.cake.detail');

// Halaman Keranjang Belanja
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Halaman Detail Bento Cake Siap Pesan
Route::get('/bento-cake/detail', function () {
    return view('bento-detail');
})->name('bento.detail');

Route::get('/checkout/customer', function () {
    return view('checkout-customer');
})->name('checkout.customer');

Route::get('/checkout/payment', function () {
    return view('checkout-payment'); // Atau arahkan ke view pembayaran Anda selanjutnya
})->name('checkout.payment');

Route::get('/login', function () {
    return view('auth.login'); // Sesuaikan dengan posisi file view login Anda
})->name('login');

Route::get('/checkout/payment', function () {
    return view('checkout-payment');
})->name('checkout.payment');

Route::get('/checkout/shipping', function () {
    return view('checkout-shipping'); // Atau arahkan ke halaman berikutnya yang Anda inginkan
})->name('checkout.shipping');

Route::get('/checkout/upload', function () {
    return view('checkout-upload');
})->name('checkout.upload');

Route::get('/checkout/detail', function () {
    return view('checkout-detail');
})->name('checkout.detail');

Route::get('/checkout/shipping', function () {
    return view('checkout-shipping');
})->name('checkout.shipping');

Route::get('/account', function () {
    return view('account');
})->name('account');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// ==========================================
// ROUTE TAMBAHAN: Rekap Semua History Pesanan
// ==========================================
Route::get('/order-history', function () {
    return view('order-history');
})->name('order.history');

Route::get('/account/registration-data', function () {
    return view('customer-data');
})->name('customer.data');