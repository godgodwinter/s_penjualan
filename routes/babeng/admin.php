<?php

use App\Helpers\Fungsi;
use App\Http\Controllers\admin\portofolioController;
use Illuminate\Support\Facades\Route;


//pages
Route::get('/admin/portofolio', [portofolioController::class, 'index'])->name('admin.portofolio');
Route::get('/admin/portofolio/create', [portofolioController::class, 'create'])->name('admin.portofolio.create');
Route::post('/admin/portofolio/store', [portofolioController::class, 'store'])->name('admin.portofolio.store');
Route::get('/admin/portofolio/edit/{item}', [portofolioController::class, 'edit'])->name('admin.portofolio.edit');
Route::put('/admin/portofolio/update/{item}', [portofolioController::class, 'update'])->name('admin.portofolio.update');
Route::delete('/admin/portofolio/destroy/{item}', [portofolioController::class, 'destroy'])->name('admin.portofolio.destroy');
