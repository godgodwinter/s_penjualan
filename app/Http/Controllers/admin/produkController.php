<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Fungsi;
use App\Http\Controllers\Controller;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class produkController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='produk';
        $items=produk::orderBy('nama','asc')
        ->paginate();
        return view('pages.admin.produk.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='produk';
        return view('pages.admin.produk.create',compact('pages'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'nama'=>'required',
                'harga_jual'=>'required',
                'desc'=>'required',
                'satuan'=>'required',
            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);
            $slug=Str::slug($request->nama, '-');
            DB::table('produk')->insert(
                array(
                       'nama'     =>   $request->nama,
                       'harga_jual'     =>    Fungsi::angka($request->harga_jual),
                       'desc'     =>   $request->desc,
                       'slug'     =>   $slug,
                       'satuan'     =>   $request->satuan,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
    return redirect()->route('admin.produk')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(produk $item)
    {
        $pages='produk';
        return view('pages.admin.produk.edit',compact('pages','item'));
    }
    public function update(produk $item,Request $request)
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
            produk::where('id',$item->id)
            ->update([
                'nama'     =>   $request->nama,
                'harga_jual'     =>    Fungsi::angka($request->harga_jual),
                'desc'     =>   $request->desc,
                'satuan'     =>   $request->satuan,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);



    return redirect()->route('admin.produk')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(produk $item){

        produk::destroy($item->id);
        return redirect()->route('admin.produk')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
