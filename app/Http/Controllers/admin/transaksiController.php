<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class transaksiController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='transaksi';
        $items=transaksi::
        orderBy('tglbeli','desc')
        ->orderBy('id','desc')
        ->paginate();
        return view('pages.admin.transaksi.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='transaksi';
        $faker = Faker::create('id_ID');
        $kodetrans=$faker->unique()->uuid();
        $pelanggan=pelanggan::get();
        return view('pages.admin.transaksi.create',compact('pages','kodetrans','pelanggan'));
    }
    public function store(Request $request){
        $datakeranjang=null;
    if($request->cart){
        $datakeranjang=json_decode($request->cart);
    }
    // dd($request,$datakeranjang);
        $request->validate([
            'pelanggan_id'=>'required',
            'penanggungjawab'=>'required',
            'tglbeli'=>'required',
        ],
        [
            'pelanggan_id.required'=>'Pelanggan harus diisi',
        ]);
        $status='success';
        if($request->transaksi_tipe=='online'){
            $status='pending';
        }
        $data_id=DB::table('transaksi')->insertGetId(
            array(
                    'kodetrans'     =>   $request->kodetrans,
                    'pelanggan_tipe'     =>   $request->pelanggan_tipe,
                    'transaksi_tipe'     =>   $request->transaksi_tipe,
                   'pelanggan_id'     =>   $request->pelanggan_id,
                   'totalbayar'     =>    Fungsi::angka($request->totalbayar),
                   'penanggungjawab'     =>   $request->penanggungjawab,
                   'tglbeli'     =>   $request->tglbeli,
                   'alamat'     =>   $request->alamat,
                   'ppn'     =>   null,
                   'dibayar'     =>   null,
                   'kembalian'     =>   null,
                   'status'     =>   $status, //pending.cancel,success,delivered
                   'created_at'=>date("Y-m-d H:i:s"),
                   'updated_at'=>date("Y-m-d H:i:s")
            ));

            //transaksidetail store
                $jmlData=count($datakeranjang);
                for($i=0;$i<$jmlData;$i++){
                    DB::table('transaksidetail')->insertGetId(
                        array(
                                'produk_id'     =>   $datakeranjang[$i]->id,
                                'transaksi_id'     =>   $data_id,
                                'harga_jual'     =>   $datakeranjang[$i]->inputTerjual,
                                'jml'     =>   $datakeranjang[$i]->jumlah,
                                'diskon'     =>   0,
                                'harga_akhir'     =>   $datakeranjang[$i]->inputTerjual,
                                'created_at'=>date("Y-m-d H:i:s"),
                                'updated_at'=>date("Y-m-d H:i:s")
                        ));
                }
return redirect()->route('admin.transaksi')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
  
        // dd($request);
    }
    public function destroy(transaksi $item){

        transaksi::destroy($item->id);
        return redirect()->route('admin.transaksi')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
