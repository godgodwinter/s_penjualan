<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;

class apiProdukController extends Controller
{
    public function cari(Request $request){
        $items=produk::where('nama', 'like', '%'.$request->cari.'%')->get();
        return response()->json([
            'success'    => true,
            'data'    => $items,
        ], 200);
    }
}
