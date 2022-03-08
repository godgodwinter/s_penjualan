<?php

use App\Http\Controllers\api\apiKategoriController;
use App\Http\Controllers\api\apiProdukController;
use Illuminate\Support\Facades\Route;
Route::get('restapi/dataproduk/cari', [apiProdukController::class, 'cari'])->name('api.produk.cari');
Route::middleware('auth')->group(function () {
    Route::get('restapi/label', [apiKategoriController::class, 'label'])->name('api.label.index');
});

//arsip
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->name('getuser');
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
//  });