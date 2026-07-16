<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\WisataController;

Route::get('/', [WisataController::class, 'index'])->name('wisata.index');
Route::get('/pesan', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pesan', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pesan/sukses/{pemesanan}', [PemesananController::class, 'sukses'])->name('pemesanan.sukses');
