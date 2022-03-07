<?php

use App\Http\Controllers\landingController;
use Illuminate\Support\Facades\Route;


//pages
Route::get('/portofolio', [landingController::class, 'index'])->name('portofolio');
Route::get('/portofolio/{slug}', [landingController::class, 'show'])->name('portofolio.show');
