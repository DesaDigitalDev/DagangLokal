<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Producer\ListBarangController;
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

Route::resource("/producer/barang", ListBarangController::class);
Route::resource("/admin/barang", BarangController::class);

// Route::get('/producer/barang', [ListBarangController::class, 'index']);
// Route::delete('/producer/delete/{id}', [ListBarangController::class, 'destroy']);
Route::get('/producer/keuangan', [ProducerController::class, 'showKeuangan']);
