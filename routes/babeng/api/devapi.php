<?php

use App\Http\Controllers\api\apiKategoriController;
use Illuminate\Support\Facades\Route;
// Route::post('/admin/label/store', [labelController::class, 'store'])->name('admin.label.store');

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