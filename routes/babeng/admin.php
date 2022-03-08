<?php

use App\Helpers\Fungsi;
use App\Http\Controllers\admin\labelController;
use App\Http\Controllers\admin\pelangganController;
use App\Http\Controllers\admin\portofolioController;
use App\Http\Controllers\admin\produkController;
use App\Http\Controllers\admin\transaksiController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    //label
    Route::get('/admin/label', [labelController::class, 'index'])->name('admin.label');
    Route::get('/admin/label/create', [labelController::class, 'create'])->name('admin.label.create');
    Route::post('/admin/label/store', [labelController::class, 'store'])->name('admin.label.store');
    Route::get('/admin/label/{item}', [labelController::class, 'edit'])->name('admin.label.edit');
    Route::put('/admin/label/{item}', [labelController::class, 'update'])->name('admin.label.update');
    Route::delete('/admin/label/{item}', [labelController::class, 'destroy'])->name('admin.label.destroy');

    //pages
    Route::get('/admin/portofolio', [portofolioController::class, 'index'])->name('admin.portofolio');
    Route::get('/admin/portofolio/create', [portofolioController::class, 'create'])->name('admin.portofolio.create');
    Route::post('/admin/portofolio/store', [portofolioController::class, 'store'])->name('admin.portofolio.store');
    Route::get('/admin/portofolio/edit/{item}', [portofolioController::class, 'edit'])->name('admin.portofolio.edit');
    Route::put('/admin/portofolio/update/{item}', [portofolioController::class, 'update'])->name('admin.portofolio.update');
    Route::delete('/admin/portofolio/destroy/{item}', [portofolioController::class, 'destroy'])->name('admin.portofolio.destroy');

    //produk
    Route::get('/admin/produk', [produkController::class, 'index'])->name('admin.produk');
    Route::get('/admin/produk/create', [produkController::class, 'create'])->name('admin.produk.create');
    Route::post('/admin/produk/store', [produkController::class, 'store'])->name('admin.produk.store');
    Route::get('/admin/produk/{item}', [produkController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/admin/produk/{item}', [produkController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/produk/{item}', [produkController::class, 'destroy'])->name('admin.produk.destroy');


    //pelanggan
    Route::get('/admin/pelanggan', [pelangganController::class, 'index'])->name('admin.pelanggan');
    Route::get('/admin/pelanggan/create', [pelangganController::class, 'create'])->name('admin.pelanggan.create');
    Route::post('/admin/pelanggan/store', [pelangganController::class, 'store'])->name('admin.pelanggan.store');
    Route::get('/admin/pelanggan/{item}', [pelangganController::class, 'edit'])->name('admin.pelanggan.edit');
    Route::put('/admin/pelanggan/{item}', [pelangganController::class, 'update'])->name('admin.pelanggan.update');
    Route::delete('/admin/pelanggan/{item}', [pelangganController::class, 'destroy'])->name('admin.pelanggan.destroy');


    //transaksi
    Route::get('/admin/transaksi', [transaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/admin/transaksi/create', [transaksiController::class, 'create'])->name('admin.transaksi.create');
    Route::post('/admin/transaksi/store', [transaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::get('/admin/transaksi/{item}', [transaksiController::class, 'edit'])->name('admin.transaksi.edit');
    Route::put('/admin/transaksi/{item}', [transaksiController::class, 'update'])->name('admin.transaksi.update');
    Route::delete('/admin/transaksi/{item}', [transaksiController::class, 'destroy'])->name('admin.transaksi.destroy');
});