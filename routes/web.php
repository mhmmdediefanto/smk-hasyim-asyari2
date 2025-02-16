<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckSlugController;
use App\Http\Controllers\DashboardBeritaController;
use App\Http\Controllers\DashboardKategoriBeritaController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/berita/{slug}', [PublicController::class, 'show'])->name('berita.show');

// route auth
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('sejarah-sekolah', function () {
    return view('public.pages.sejarah-sekolah');
})->name('sejarah-sekolah');


// Profile
Route::prefix('profile')->group(function () {
    Route::get('/visi-misi', fn() => redirect()->route('maintenance'))->name('visi-misi');
    Route::get('/kepala-sekolah', fn() => redirect()->route('maintenance'))->name('kepala-sekolah');
    Route::get('/wakil-kepala-sekolah', fn() => redirect()->route('maintenance'))->name('wakil-kepala-sekolah');
    Route::get('/kepala-tata-usaha', fn() => redirect()->route('maintenance'))->name('kepala-tata-usaha');
    Route::get('/guru', fn() => redirect()->route('maintenance'))->name('guru');
    Route::get('/tenaga-kependidikan', fn() => redirect()->route('maintenance'))->name('tenaga-kependidikan');
    Route::get('/data-peserta-didik', fn() => redirect()->route('maintenance'))->name('data-peserta-didik');
});

// Kejuruan
Route::prefix('kejuruan')->group(function () {
    Route::get('/busana-fashion', fn() => redirect()->route('maintenance'))->name('busana-fashion');
    Route::get('/tjkt', fn() => redirect()->route('maintenance'))->name('tjkt');
});

// Ekstra Kulikuler
Route::prefix('ekstra-kulikuler')->group(function () {
    Route::get('/pramuka', fn() => redirect()->route('maintenance'))->name('pramuka');
    Route::get('/bola-volly', fn() => redirect()->route('maintenance'))->name('bola-volly');
    Route::get('/pmr', fn() => redirect()->route('maintenance'))->name('pmr');
    Route::get('/rebana-qiroah', fn() => redirect()->route('maintenance'))->name('rebana-qiroah');
    Route::get('/futsal', fn() => redirect()->route('maintenance'))->name('futsal');
    Route::get('/bulu-tangkis', fn() => redirect()->route('maintenance'))->name('bulu-tangkis');
});

// Sarana & Prasarana
Route::prefix('sarana-prasarana')->group(function () {
    Route::get('/ruang-kelas', fn() => redirect()->route('maintenance'))->name('ruang-kelas');
    Route::get('/lab-busana', fn() => redirect()->route('maintenance'))->name('lab-busana');
    Route::get('/lab-tjkt', fn() => redirect()->route('maintenance'))->name('lab-tjkt');
    Route::get('/perpustakaan', fn() => redirect()->route('maintenance'))->name('perpustakaan');
    Route::get('/musholla', fn() => redirect()->route('maintenance'))->name('musholla');
    Route::get('/ruang-kesenian', fn() => redirect()->route('maintenance'))->name('ruang-kesenian');
    Route::get('/ruang-guru', fn() => redirect()->route('maintenance'))->name('ruang-guru');
    Route::get('/kantor-tu', fn() => redirect()->route('maintenance'))->name('kantor-tu');
});

// Portal Skahada
Route::prefix('portal')->group(function () {
    Route::get('/ppdb', fn() => redirect()->route('maintenance'))->name('ppdb');
    Route::get('/absensi-pkl', fn() => redirect()->route('maintenance'))->name('absensi-pkl');
});


Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', function () {
            return view('dashboard.index');
        })->name('dashboard');


        // berita
        Route::get('/berita', [DashboardBeritaController::class, 'index'])->name('dashboard.berita');
        Route::get('/berita/create', [DashboardBeritaController::class, 'create'])->name('dashboard.berita.create');
        Route::post('/berita/store', [DashboardBeritaController::class, 'store'])->name('dashboard.berita.store');
        Route::post('/berita/upload-image', [DashboardBeritaController::class, 'uploadImage'])->name('dashboard.berita.uploadImage');
        Route::get('/berita/checkSlug', [DashboardBeritaController::class, 'checkSlug'])->name('dashboard.berita.checkSlug');
        Route::delete('/berita/delete/{id}', [DashboardBeritaController::class, 'destroy'])->name('dashboard.berita.delete');
        Route::get('/berita/edit/{id}', [DashboardBeritaController::class, 'editShow'])->name('dashboard.berita.edit');
        Route::put('/berita/edit/{id}', [DashboardBeritaController::class, 'update'])->name('dashboard.berita.update');
        Route::post('/berita/delete/image', [DashboardBeritaController::class, 'deleteImage'])->name('dashboard.berita.deleteImage');

        // kategori berita
        Route::get('/kategori-berita', [DashboardKategoriBeritaController::class, 'index'])->name('dashboard.kategori-berita');
        Route::post('/kategori-berita/store', [DashboardKategoriBeritaController::class, 'store'])->name('dashboard.kategori-berita.store');
        Route::put('/kategori-berita/edit/{id}', [DashboardKategoriBeritaController::class, 'update'])->name('dashboard.kategori-berita.update');
        Route::delete('/kategori-berita/delete/{id}', [DashboardKategoriBeritaController::class, 'destroy'])->name('dashboard.kategori-berita.delete');
    });
});

// route checkslug
Route::get('/checkSlug', [CheckSlugController::class, 'checkSlug'])->name('checkSlug');

// route 404
Route::fallback(function () {
    return view('public.components.404');
})->name('fallback');

// route maintenance
Route::get('/maintenance', function () {
    return view('public.components.maintenance');
})->name('maintenance');
