<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\produk;
use App\Models\produkdetail;
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

    public function restokdetail($item,Request $request){
        $items=produkdetail::with('produk')->where('restok_id',$item)->get();
        return response()->json([
            'success'    => true,
            'data'    => $items,
        ], 200);
    }
}
