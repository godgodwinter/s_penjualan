<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\produkdetail;
use App\Models\restok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class restokController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='restok';
        $items=restok::
        orderBy('namatoko','asc')
        ->paginate();
        return view('pages.admin.restok.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='restok';
        $faker = Faker::create('id_ID');
        $kodetrans=$faker->unique()->uuid();
        return view('pages.admin.restok.create',compact('pages','kodetrans'));
    }

    public function store(Request $request)
    {
            $datakeranjang=null;
        if($request->cart){
            $datakeranjang=json_decode($request->cart);
        }
        dd($request,$datakeranjang);
            $request->validate([
                'nama'=>'required',
                'harga_jual'=>'required',
                'desc'=>'required',
            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);

            $slug=Str::slug($request->nama, '-');
            DB::table('restok')->insert(
                array(
                       'nama'     =>   $request->nama,
                       'harga_jual'     =>    Fungsi::angka($request->harga_jual),
                       'desc'     =>   $request->desc,
                       'slug'     =>   $slug,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
    return redirect()->route('admin.restok')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(produkdetail $item)
    {
        $pages='restok';
        return view('pages.admin.restok.edit',compact('pages','item'));
    }
    public function update(produkdetail $item,Request $request)
    {

        $request->validate([
            'nama'=>'required',
            'harga_jual'=>'required',
            'desc'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
            // 'prefix'=>'required',
            'kode'=>'required',
        ]);

        $slug=Str::slug($request->nama, '-');
        produkdetail::where('id',$item->id)
            ->update([
                'nama'     =>   $request->nama,
                'harga_jual'     =>    Fungsi::angka($request->harga_jual),
                'desc'     =>   $request->desc,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);



    return redirect()->route('admin.restok')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(produkdetail $item){

        produkdetail::destroy($item->id);
        return redirect()->route('admin.restok')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
