<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MonographController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\BumdesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route Visitor
Route::get('/', [VisitorController::class, 'home'])->name('home');
Route::get('/pencarian', [VisitorController::class, 'search'])->name('search');
Route::get('/visi-misi', [VisitorController::class, 'visi_misi'])->name('visi-misi');
Route::get('/sejarah', [VisitorController::class, 'sejarah'])->name('sejarah');
Route::get('/struktur-organisasi', [VisitorController::class, 'struktur_organisasi'])->name('struktur-organisasi');
Route::get('/berita', [VisitorController::class, 'berita'])->name('berita');
Route::get('/berita/{data:slug}', [VisitorController::class, 'show_berita'])->name('show-berita');
Route::get('/berita/kategori/{tag}', [VisitorController::class, 'kategori_berita'])->name('kategori-berita');
Route::get('/usaha-desa', [VisitorController::class, 'usaha_desa'])->name('usaha-desa');
Route::get('/usaha-desa/{data:slug}', [VisitorController::class, 'show_usaha_desa'])->name('show-usaha-desa');
Route::get('/monografi', [VisitorController::class, 'monografi'])->name('monografi');
Route::get('/galeri-foto', [VisitorController::class, 'galeri_foto'])->name('galeri-foto');
Route::get('/galeri-video', [VisitorController::class, 'galeri_video'])->name('galeri-video');
// Register Route
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store_register'])->name('store-register');
// End Register Route
// Login Route
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
// End Login Route

// Routes Admin
Route::middleware(['auth', 'checkRole:0,1'])->group(function () {
    // Admin Home
    Route::get('/admin', function () {
        return view('admin.home.index', [
            'title' => 'Beranda'
        ]);
    })->name('beranda');
    // Admin Informasi Umum 
    Route::get('/admin/slider', [InformationController::class, 'index']);
    Route::get('/admin/slider/create', [InformationController::class, 'create']);
    Route::post('/admin/slider', [InformationController::class, 'store']);
    Route::get('/admin/slider/{information}', [InformationController::class, 'show']);
    Route::get('/admin/slider/{information}/edit', [InformationController::class, 'edit']);
    Route::patch('/admin/slider/{information}', [InformationController::class, 'update']);
    Route::delete('/admin/slider/{information}', [InformationController::class, 'destroy']);

    // Admin Profile
    Route::get('/admin/profile', [ProfilesController::class, 'index']);
    Route::get('/admin/profile/create', [ProfilesController::class, 'create']);
    Route::post('/admin/profile', [ProfilesController::class, 'store']);
    Route::get('/admin/profile/{profile}', [ProfilesController::class, 'show']);
    Route::get('/admin/profile/{profile}/edit', [ProfilesController::class, 'edit']);
    Route::patch('/admin/profile/{profile}', [ProfilesController::class, 'update']);
    Route::delete('/admin/profile/{profile}', [ProfilesController::class, 'destroy']);

    // Admin News
    Route::get('/admin/news', [NewsController::class, 'index']);
    Route::get('/admin/news/create', [NewsController::class, 'create']);
    Route::post('/admin/news', [NewsController::class, 'store']);
    Route::get('/admin/news/{news:slug}', [NewsController::class, 'show']);
    Route::get('/admin/news/{news:slug}/edit', [NewsController::class, 'edit']);
    Route::patch('/admin/news/{news}', [NewsController::class, 'update']);
    Route::delete('/admin/news/{news:slug}', [NewsController::class, 'destroy']);

    // Admin Business
    Route::get('/admin/business', [BusinessController::class, 'index']);
    Route::get('/admin/business/create', [BusinessController::class, 'create']);
    Route::post('/admin/business', [BusinessController::class, 'store']);
    Route::get('/admin/business/{business:slug}', [BusinessController::class, 'show']);
    Route::get('/admin/business/{business:slug}/edit', [BusinessController::class, 'edit']);
    Route::patch('/admin/business/{business}', [BusinessController::class, 'update']);
    Route::delete('/admin/business/{business:slug}', [BusinessController::class, 'destroy']);

    // Admin Gallery
    Route::get('/admin/gallery', [GalleryController::class, 'index']);
    Route::get('/admin/gallery/create', [GalleryController::class, 'create']);
    Route::post('/admin/gallery', [GalleryController::class, 'store']);
    Route::get('/admin/gallery/{gallery:slug}', [GalleryController::class, 'show']);
    Route::get('/admin/gallery/{gallery:slug}/edit', [GalleryController::class, 'edit']);
    Route::patch('/admin/gallery/{gallery}', [GalleryController::class, 'update']);
    Route::delete('/admin/gallery/{gallery:slug}', [GalleryController::class, 'destroy']);

    // Admin Monograph
    Route::get('/admin/monograph', [MonographController::class, 'index']);
    Route::get('/admin/monograph/create', [MonographController::class, 'create']);
    Route::post('/admin/monograph', [MonographController::class, 'store']);
    Route::get('/admin/monograph/create-category', [MonographController::class, 'create_category']);
    Route::get('/Filter/{id}', [MonographController::class, 'Filter']);
    Route::post('/admin/monograph-category', [MonographController::class, 'store_category']);
    Route::get('/admin/monograph-category/{category}', [MonographController::class, 'show_category']);
    Route::get('/admin/monograph/{monograph}', [MonographController::class, 'show']);
    Route::get('/admin/monograph/{monograph}/edit', [MonographController::class, 'edit']);
    Route::patch('/admin/monograph/{monograph}', [MonographController::class, 'update']);
    Route::delete('/admin/monograph/{monograph}', [MonographController::class, 'destroy']);
    Route::delete('/admin/monograph-category/{category}', [MonographController::class, 'destroy_category']);
    Route::delete('/admin/monograph-sub-category/{sub_category}', [MonographController::class, 'destroy_sub_category']);
});
// End Route Admin

// Start Route Account
Route::middleware(['auth', 'checkRole:0'])->group(function () {
    // Admin Account
    Route::get('/admin/account/{user:slug}/edit', [UserController::class, 'edit'])->name('edit-profile');
    Route::patch('/admin/account/{user}', [UserController::class, 'update']);
});
// End Route Account

// Super Admin Route
Route::middleware(['auth', 'checkRole:0'])->group(function () {
    // Admin Account
    Route::get('/admin/account', [UserController::class, 'index']);
    Route::get('/admin/account/create', [UserController::class, 'create']);
    Route::post('/admin/account', [UserController::class, 'store']);
    Route::delete('/admin/account/{user}', [UserController::class, 'destroy']);

    Route::delete('/admin/bumdes/inventory/{inventory}', [BumdesController::class, 'destroy_inventory'])->name('destroy-inventory');
    Route::delete('/admin/bumdes/reservation/{reservation}', [BumdesController::class, 'destroy_reservation'])->name('destroy-reservation');
});
// End Super Admin Route

// Route BUMDES
Route::middleware(['auth', 'checkRole:0,2'])->group(function () {

    // Start Route BUMDES
    // Home BUMDES
    Route::get('/admin/bumdes', [BumdesController::class, 'home'])->name('bumdes-home');
    // Bumdes Inventory
    Route::get('/admin/bumdes/inventory', [BumdesController::class, 'index_inventory'])->name('inventory');
    Route::get('/admin/bumdes/inventory/print', [BumdesController::class, 'print_inventory'])->name('print-inventory');
    Route::get('/admin/bumdes/inventory/create', [BumdesController::class, 'create_inventory'])->name('create-inventory');
    Route::post('/admin/bumdes/inventory', [BumdesController::class, 'store_inventory'])->name('store-inventory');
    Route::get('/admin/bumdes/inventory/{inventory}', [BumdesController::class, 'show_inventory'])->name('show-inventory');
    Route::get('/admin/bumdes/inventory/{inventory}/edit', [BumdesController::class, 'edit_inventory'])->name('edit-inventory');
    Route::patch('/admin/bumdes/inventory/{inventory}', [BumdesController::class, 'update_inventory'])->name('update-inventory');


    // Bumdes Penyewaan
    Route::get('/admin/bumdes/reservation', [BumdesController::class, 'index_reservation'])->name('reservation');
    Route::get('/admin/bumdes/reservation/create', [BumdesController::class, 'create_reservation'])->name('create-reservation');
    Route::post('/admin/bumdes/reservation', [BumdesController::class, 'store_reservation'])->name('store-reservation');
    Route::get('/lunas/{reservation}', [BumdesController::class, 'lunas'])->name('lunas');
    Route::get('/selesai/{reservation}', [BumdesController::class, 'selesai'])->name('selesai');
    Route::get('/admin/bumdes/reservation/{reservation}', [BumdesController::class, 'show_reservation'])->name('show-reservation');
    Route::get('/admin/bumdes/reservation/{reservation}/edit', [BumdesController::class, 'edit_reservation'])->name('edit-reservation');
    Route::patch('/admin/bumdes/reservation/{reservation}', [BumdesController::class, 'update_reservation'])->name('update-reservation');


    // Bumdes Rental
    Route::get('/admin/bumdes/rental', [BumdesController::class, 'index_rental'])->name('rental');
    Route::get('/admin/bumdes/rental/print', [BumdesController::class, 'print_rental'])->name('print-rental');
    Route::get('/admin/bumdes/rental/{rental}', [BumdesController::class, 'show_rental'])->name('show-rental');
    // End Route BUMDES
});
