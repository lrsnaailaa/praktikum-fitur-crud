<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/', function () {
    return redirect()->route('home');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/buku/search', [BukuController::class, 'search'])
        ->name('buku.search');

    // Route halaman daftar buku
    Route::get('/list-buku', [BukuController::class, 'listbuku'])
        ->name('buku.list');

    // Route halaman detail buku
    Route::get('/detail-buku/{title}', [BukuController::class, 'galbuku'])
        ->name('galeri.buku');

    Route::resource('buku', BukuController::class);

    Route::resource('gallery', GalleryController::class);

    Route::resource('users', UserController::class)->except('show');
});
