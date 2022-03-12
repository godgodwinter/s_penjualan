<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pelangganController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='pelanggan';
        $items=pelanggan::with('users')
        ->orderBy('nama','asc')
        ->get();
        return view('pages.admin.pelanggan.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='pelanggan';
        return view('pages.admin.pelanggan.create',compact('pages'));
    }

    public function store(Request $request)
    {
        dd($request);
            $request->validate([
                'nama'=>'required',
                // 'prefix'=>'required',
                'kode'=>'required',
            ],
            [
                'nama.nama'=>'Nama harus diisi',
            ]);
            DB::table('pelanggan')->insert(
                array(
                       'nama'     =>   $request->nama,
                       'prefix'     =>   'pelanggan',
                       'kode'     =>   $request->kode,
                       'created_at'=>date("Y-m-d H:i:s"),
                       'updated_at'=>date("Y-m-d H:i:s")
                ));
    return redirect()->route('admin.pelanggan')->with('status','Data berhasil tambahkan!')->with('tipe','success')->with('icon','fas fa-feather');
    }

    public function edit(pelanggan $item)
    {
        $pages='pelanggan';
        return view('pages.admin.pelanggan.edit',compact('pages','item'));
    }
    public function update(pelanggan $item,Request $request)
    {

        $request->validate([
            'nama'=>'required',
        ],
        [
            'nama.required'=>'nama harus diisi',
            // 'prefix'=>'required',
            'kode'=>'required',
        ]);

            pelanggan::where('id',$item->id)
            ->update([
                'nama'     =>   $request->nama,
                'prefix'     =>   'pelanggan',
                'kode'     =>   $request->kode,
               'updated_at'=>date("Y-m-d H:i:s")
            ]);



    return redirect()->route('admin.pelanggan')->with('status','Data berhasil diubah!')->with('tipe','success')->with('icon','fas fa-feather');
    }
    public function destroy(pelanggan $item){

        pelanggan::destroy($item->id);
        return redirect()->route('admin.pelanggan')->with('status','Data berhasil dihapus!')->with('tipe','warning')->with('icon','fas fa-feather');

    }
}
