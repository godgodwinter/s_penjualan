<?php

namespace App\Http\Controllers\pelanggan;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class pelangganTransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(Auth::user()->tipeuser!='pelanggan'){
                return redirect()->route('dashboard')->with('status','Halaman tidak ditemukan!')->with('tipe','danger');
            }
        return $next($request);
        });
    }
    public function index(Request $request)
    {
        $getPelanggan=pelanggan::where('users_id',Auth::user()->id)->first();
        #WAJIB
        $pages='transaksi';
        $items=transaksi::
        orderBy('tglbeli','desc')
        ->where('pelanggan_id',$getPelanggan->id)
        ->orderBy('id','desc')
        ->paginate();
        return view('pages.pelanggan.transaksi.index',compact('items','request','pages'));
    }
    public function create()
    {
        $getPelanggan=pelanggan::where('users_id',Auth::user()->id)->first();
        $pages='transaksi';
        $faker = Faker::create('id_ID');
        $kodetrans=$faker->unique()->uuid();
        $pelanggan=pelanggan::where('id',$getPelanggan->id)->get();
        // dd($getPelanggan);
        return view('pages.pelanggan.transaksi.create',compact('pages','kodetrans','pelanggan','getPelanggan'));
    }
    public function store(Request $request){
        $getPelanggan=pelanggan::where('users_id',Auth::user()->id)->first();
        $periksapending=transaksi::where('pelanggan_id',$getPelanggan->id)->where('status','pending')->count();
        if($periksapending>0){
            return redirect()->route('pelanggan.transaksi.create')->with('status','Gagal tambahkan! Menunggu proses transaksi sebelumnya!')->with('tipe','error')->with('icon','fas fa-feather');
        }
        $datakeranjang=null;
    if($request->cart){
        $datakeranjang=json_decode($request->cart);
    }
    // dd($request,$datakeranjang);
        $request->validate([
            'pelanggan_id'=>'required',
            // 'penanggungjawab'=>'required',
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
                    'pelanggan_tipe'     =>   'member',
                    'transaksi_tipe'     =>   'online',
                   'pelanggan_id'     =>   $getPelanggan->id,
                   'totalbayar'     =>    Fungsi::angka($request->totalbayar),
                   'penanggungjawab'     =>   'member',
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
                    if($datakeranjang[$i]->inputTerjual>0||!empty($datakeranjang[$i]->inputTerjual)){
                    DB::table('transaksidetail')->insertGetId(
                        array(
                                'produk_id'     =>   $datakeranjang[$i]->id,
                                'transaksi_id'     =>   $data_id,
                                'harga_jual'     =>   $datakeranjang[$i]->inputTerjual?$datakeranjang[$i]->inputTerjual:0,
                                'jml'     =>   $datakeranjang[$i]->jumlah,
                                'diskon'     =>   0,
                                'harga_akhir'     =>   $datakeranjang[$i]->inputTerjual?$datakeranjang[$i]->inputTerjual:0,
                                'created_at'=>date("Y-m-d H:i:s"),
                                'updated_at'=>date("Y-m-d H:i:s")
                        ));
                }
            }
return redirect()->route('pelanggan.transaksi')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');

        // dd($request);
    }
}
