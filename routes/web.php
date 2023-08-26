<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Producer\ProducerController;
use App\Http\Controllers\Producer\ListBarangController;
use App\Http\Controllers\Producer\BarangProducerController;
use App\Http\Controllers\Producer\KeuanganProducerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// route admin
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'show']);
    Route::resource("/admin/barang", BarangController::class);
});

// route seller
Route::middleware(['auth', 'user-access:seller'])->group(function () {
    Route::get('/seller/dashboard', [SellerController::class, 'index']);
    Route::get('/seller/produk', [SellerController::class, 'show']);
});

// route producer
Route::middleware(['auth', 'user-access:producer'])->group(function () {
    Route::get('/producer/dashboard', [ProducerController::class, 'show'])->name('dashboard');
    Route::resource('/producer/barang', BarangProducerController::class);
    Route::resource('/producer/keuangan', KeuanganProducerController::class);
    Route::get('/producer/tracking_product/{product}', [ProducerController::class, 'getProgress'])->name('tracking_product');
});

// route katalog
Route::middleware(['auth', 'user-access:seller'])->group(function () {
    Route::get('/catalog', [ProductsController::class, 'index']);
    Route::get('/catalog/detail/{id} ', [ProductsController::class, 'show'])->name('ShowProduct');
    Route::post('/add-rating ', [RatingController::class, 'add']);
});


// Route::get('/producer/barang', [ListBarangController::class, 'index']);
// Route::delete('/producer/delete/{id}', [ListBarangController::class, 'destroy']);




