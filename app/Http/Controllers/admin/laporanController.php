<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\restok;
use App\Models\transaksi;
use Illuminate\Http\Request;

class laporanController extends Controller
{
    public function restok(Request $request)
    {
        #WAJIB
        $pages='laporanrestok';
        $items=restok::
        orderBy('tglbeli','desc')
        ->with('produkdetail')
        ->WhereMonth('tglbeli',date('m'))
        ->WhereYear('tglbeli',date('Y'))
        ->orderBy('id','desc')
        ->paginate();
        // dd($items);
        return view('pages.admin.laporan.restok',compact('items','request','pages'));
    }

    public function penjualan(Request $request)
    {
        #WAJIB
        $pages='laporanpenjualan';
        $items=transaksi::
        orderBy('tglbeli','desc')
        ->orderBy('id','desc')
        ->paginate();
        return view('pages.admin.laporan.penjualan',compact('items','request','pages'));
    }
}
