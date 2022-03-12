<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use App\Models\transaksidetail;
use Illuminate\Http\Request;

class apiTransaksiController extends Controller
{
    public function detail($item,Request $request){
        $items=transaksidetail::with('produk')->with('transaksi')->where('transaksi_id',$item)->get();
        return response()->json([
            'success'    => true,
            'data'    => $items,
        ], 200);
    }
}
