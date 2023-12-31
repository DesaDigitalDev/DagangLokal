<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\KeuanganAdminController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Producer\BarangProducerController;
use App\Http\Controllers\Producer\KeuanganProducerController;
use App\Http\Controllers\Producer\ProducerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('admin/dashboard', function () {
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
    Route::get('/admin/dashboard', [AdminController::class, 'show'])->name('dashboardAdmin');
    Route::get("/admin/barangAdmin/Approval", [BarangController::class, 'index'])->name('barangAdminApproval');
    Route::get("/admin/barangAdmin/OnProcess", [BarangController::class, 'indexOnProcess'])->name('barangAdminOnProcess');
    Route::get("/admin/barangAdmin/Gagal", [BarangController::class, 'indexGagal'])->name('barangAdminGagal');
    Route::get("/admin/barangAdmin/Done", [BarangController::class, 'indexDone'])->name('barangAdminDone');
    Route::get("/admin/barangAdmin/Detail/{id}", [BarangController::class, 'detail'])->name('barangDetail');
    Route::resource("/admin/barangAdmin", BarangController::class);
    Route::resource("/admin/keuanganAdmin", KeuanganAdminController::class);
});

// route producer
Route::middleware(['auth', 'user-access:producer'])->group(function () {
    Route::get('/producer/dashboard', [ProducerController::class, 'show'])->name('dashboard');
    Route::resource('/producer/barang', BarangProducerController::class);
    Route::get('/producer/keuangan/createBank', [KeuanganProducerController::class, 'Bank'])->name('createBank');
    Route::post('/producer/keuangan/createBank/store', [KeuanganProducerController::class, 'BankStore'])->name('StoreBank');
    Route::resource('/producer/keuangan', KeuanganProducerController::class);
    Route::get('/producer/tracking_product/{product}', [ProducerController::class, 'getProgress'])->name('tracking_product');
    Route::resource('/categories', CategoryController::class);
});

// route katalog
Route::middleware(['auth', 'user-access:seller'])->group(function () {
    Route::get('/seller/dashboard', [SellerController::class, 'index']);
    Route::get('/catalog', [CatalogController::class, 'index']);
    Route::get('/catalog/search', [CatalogController::class, 'search'])->name('Search');
    Route::get('/catalog/category', [CatalogController::class, 'searchByCategory'])->name('CategorySearch');
    Route::get('/catalog/detail/{id} ', [CatalogController::class, 'showProductById'])->name('ShowProduct');
    Route::post('/add-rating ', [RatingController::class, 'add']);
    Route::post('/update-rating ', [RatingController::class, 'update']);
});

// Route::get('/producer/barang', [ListBarangController::class, 'index']);
// Route::delete('/producer/delete/{id}', [ListBarangController::class, 'destroy']);
