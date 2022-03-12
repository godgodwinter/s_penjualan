<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\produk;
use App\Models\produkdetail;
use App\Models\transaksidetail;
use App\Models\User;
use Illuminate\Http\Request;

class apiProdukController extends Controller
{
    public function cari(Request $request){
        //add stok,terjual,dan stok tersedia to data
        $datas=produk::where('nama', 'like', '%'.$request->cari.'%')->get();
        $items=[];
        foreach($datas as $data){
            //get stok
            $getstok=produkdetail::where('produk_id',$data->id)->sum('jml');
            // $getterjual=transaksidetail::where('produk_id',$data->id)->sum('jml');
            $getterjual=transaksidetail::where('produk_id',$data->id)->whereHas('transaksi', function ($query) {
                $query->where('status', '<>', 'cancel');
            })->sum('jml');
            $getstoktersedia=$getstok-$getterjual;
            $arr['id']=$data->id;
            $arr['nama']=$data->nama;
            $arr['harga_jual']=$data->harga_jual;
            $arr['stok']=$getstok;
            $arr['terjual']=$getterjual;
            $arr['stoktersedia']=$getstoktersedia;
            $items[]=$arr; //array push
        }

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


    public function periksausername(Request $request){
        $items=0;
        if($request->username){
            $items=User::
            where('username',$request->username)->count();
        }
        if($request->email){
            $items=User::
            where('email',$request->email)->count();
        }
        return response()->json([
            'success'    => true,
            'data'    => $items,
        ], 200);
    }

    
}
