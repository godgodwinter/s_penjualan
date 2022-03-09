<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Faker\Factory as Faker;

class transaksiController extends Controller
{
    public function index(Request $request)
    {
        #WAJIB
        $pages='transaksi';
        $items=transaksi::
        orderBy('tglbeli','desc')
        ->orderBy('namatoko','asc')
        ->paginate();
        return view('pages.admin.transaksi.index',compact('items','request','pages'));
    }
    public function create()
    {
        $pages='transaksi';
        $faker = Faker::create('id_ID');
        $kodetrans=$faker->unique()->uuid();
        return view('pages.admin.transaksi.create',compact('pages','kodetrans'));
    }
}
