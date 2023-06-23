<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Producer\ProducerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\SellerController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'show']);
    Route::get('/producer/dashboard', [ProducerController::class, 'show']);
    Route::get('/seller/dashboard', [SellerController::class, 'show']);
});

Route::get('/producer/barang', [ProducerController::class, 'showBarang']);
Route::get('/producer/keuangan', [ProducerController::class, 'showKeuangan']);

Route::get('/producer/tambah-barang', [ProducerController::class, 'insertBarang'])->name('insertBarang');
Route::post('/producer/simpan-barang', [ProducerController::class, 'store'])->name('simpan-barang');
Route::get('/producer/edit-barang/{id}', [ProducerController::class, 'editBarang'])->name('editBarang');
Route::put('/producer/update-barang/{id}', [ProducerController::class, 'updateBarang'])->name('updateBarang');

Route::get('/producer/transaksi', [ProducerController::class, 'transaksi'])->name('transaksi');
Route::post('/producer/simpan-transaksi', [ProducerController::class, 'storetransaksi'])->name('simpan-transaksi');
Route::get('/producer/edit-transaksi/{id}', [ProducerController::class, 'editTransaksi'])->name('editTransaksi');
Route::put('/producer/update-transaksi/{id}', [ProducerController::class, 'updateTransaksi'])->name('updateTransaksi');
