<?php

namespace App\Http\Controllers\dev;

use App\Http\Controllers\Controller;
use App\Models\transaksi;
use Illuminate\Http\Request;
use PDF;

class cetakController extends Controller
{
    public function transaksi($item)
    {
        $items=transaksi::with('transaksidetail')->where('kodetrans',$item)->first();
        $tgl=date("YmdHis");
        $pdf = PDF::loadview('pages.dev.testing.cetak2')->setPaper('a4', 'potrait');
        return $pdf->stream('data'.$tgl.'.pdf');
        // dd('invoice',$items);
        // return view('dev.cetak.index');
    }
}
