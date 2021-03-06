<?php

namespace App\Helpers;

use App\Models\produkdetail;
use App\Models\restok;
use Illuminate\Support\Facades\DB;

class Fungsi
{
    // rata-rata = inputan = produk_id
    public static function getHargaBeliMonth($produk_id = 0, $date = '2022-05') //rata-rata harge beli (dari stok) samua sampai this month
    {
        $year = substr($date, 0, 4);
        $month = substr($date, 5, 2);
        $day = substr($date, 8, 2);
        //inputan : angka
        $hasil = 0;
        $getTotalHarga = produkdetail::with('restok')->where('produk_id', $produk_id)
            ->whereHas('restok', function ($query) use ($date, $year, $month) {
                $query->whereYear('tglbeli', '<=',  $year)
                    ->whereMonth('tglbeli', '<=',  $month);
                // $query->where('tglbeli', '<', $date);
            })
            ->get();
        $totalHarga = 0;
        foreach ($getTotalHarga as $item) {
            $harga_beli = $item->harga_beli;
            $jml = $item->jml;
            $totalHarga += $harga_beli * $jml;
        }
        $getTotalBarang =  produkdetail::with('restok')->where('produk_id', $produk_id)
            ->whereHas('restok', function ($query) use ($date, $year, $month) {
                $query->whereYear('tglbeli', '<=',  $year)
                    ->whereMonth('tglbeli', '<=',  $month);
                // $query->where('tglbeli', '<', $date);
            })
            ->sum('jml');
        if ($getTotalBarang) {
            $hasil = $totalHarga / $getTotalBarang;
            $hasil = round($hasil, 0);
        }
        // dd($getTotalHarga, $getTotalBarang, $hasil);

        return $hasil;
    }
    public static function getHargaBeli($produk_id = 0) //rata-rata harge beli (dari stok)
    {
        //inputan : angka
        $hasil = 0;
        $getTotalHarga = produkdetail::where('produk_id', $produk_id)->get();
        $totalHarga = 0;
        foreach ($getTotalHarga as $item) {
            $harga_beli = $item->harga_beli;
            $jml = $item->jml;
            $totalHarga += $harga_beli * $jml;
        }
        $getTotalBarang = produkdetail::where('produk_id', $produk_id)->sum('jml');
        $hasil = $totalHarga / $getTotalBarang;
        $hasil = round($hasil, 0);

        return $hasil;
    }

    public static function rupiah($angka)
    {
        //inputan : angka
        $hasil = (int) filter_var($angka, FILTER_SANITIZE_NUMBER_INT);
        $hasil_rupiah = "Rp " . number_format($hasil, 2, ',', '.');
        return $hasil_rupiah;
    }
    public static function rupiahtanpanol($angka)
    {
        //inputan : angka
        $hasil = (int) filter_var($angka, FILTER_SANITIZE_NUMBER_INT);
        $hasil_rupiah = "Rp " . number_format($hasil, 0, ',', '.');
        return $hasil_rupiah;
    }
    public static function angka($angka)
    {
        //inputan : angka
        $hasil = (int) filter_var($angka, FILTER_SANITIZE_NUMBER_INT);
        return $hasil;
    }

    public static function tanggalindo($inputan)
    {
        //formatInputan : 2020-02-19
        $bulanindo = 'Januari';
        $str = explode("-", $inputan);
        if ($str[1] == '01') {
            $bulanindo = 'Januari';
        } elseif ($str[1] == '02') {
            $bulanindo = 'Februari';
        } elseif ($str[1] == '03') {
            $bulanindo = 'Maret';
        } elseif ($str[1] == '04') {
            $bulanindo = 'April';
        } elseif ($str[1] == '05') {
            $bulanindo = 'Mei';
        } elseif ($str[1] == '06') {
            $bulanindo = 'Juni';
        } elseif ($str[1] == '07') {
            $bulanindo = 'Juli';
        } elseif ($str[1] == '08') {
            $bulanindo = 'Agustus';
        } elseif ($str[1] == '09') {
            $bulanindo = 'September';
        } elseif ($str[1] == '10') {
            $bulanindo = 'Oktober';
        } elseif ($str[1] == '11') {
            $bulanindo = 'November';
        } else {
            $bulanindo = 'Desember';
        }

        return $str[2] . " " . $bulanindo . " " . $str[0];
    }

    public static function tanggalindocreated($data)
    {
        //inputan : 2022-02-22 03:09:56
        $data2 = explode(" ", $data);

        $inputan = $data2[0];

        $bulanindo = 'Januari';
        $str = explode("-", $inputan);
        if ($str[1] == '01') {
            $bulanindo = 'Januari';
        } elseif ($str[1] == '02') {
            $bulanindo = 'Februari';
        } elseif ($str[1] == '03') {
            $bulanindo = 'Maret';
        } elseif ($str[1] == '04') {
            $bulanindo = 'April';
        } elseif ($str[1] == '05') {
            $bulanindo = 'Mei';
        } elseif ($str[1] == '06') {
            $bulanindo = 'Juni';
        } elseif ($str[1] == '07') {
            $bulanindo = 'Juli';
        } elseif ($str[1] == '08') {
            $bulanindo = 'Agustus';
        } elseif ($str[1] == '09') {
            $bulanindo = 'September';
        } elseif ($str[1] == '10') {
            $bulanindo = 'Oktober';
        } elseif ($str[1] == '11') {
            $bulanindo = 'November';
        } else {
            $bulanindo = 'Desember';
        }

        return $str[2] . " " . $bulanindo . " " . $str[0];
    }


    public static function bulanindo($inputan)
    {
        //inputan = 02
        $bulanindo = 'Januari';
        if ($inputan == '01') {
            $bulanindo = 'Januari';
        } elseif ($inputan == '02') {
            $bulanindo = 'Februari';
        } elseif ($inputan == '03') {
            $bulanindo = 'Maret';
        } elseif ($inputan == '04') {
            $bulanindo = 'April';
        } elseif ($inputan == '05') {
            $bulanindo = 'Mei';
        } elseif ($inputan == '06') {
            $bulanindo = 'Juni';
        } elseif ($inputan == '07') {
            $bulanindo = 'Juli';
        } elseif ($inputan == '08') {
            $bulanindo = 'Agustus';
        } elseif ($inputan == '09') {
            $bulanindo = 'September';
        } elseif ($inputan == '10') {
            $bulanindo = 'Oktober';
        } elseif ($inputan == '11') {
            $bulanindo = 'November';
        } else {
            $bulanindo = 'Desember';
        }

        return $bulanindo;
    }
    public static function tanggalindobln($inputan)
    {
        //inputan : 2022-01
        $bulanindo = 'Januari';
        $str = explode("-", $inputan);
        if ($str[1] == '01') {
            $bulanindo = 'Januari';
        } elseif ($str[1] == '02') {
            $bulanindo = 'Februari';
        } elseif ($str[1] == '03') {
            $bulanindo = 'Maret';
        } elseif ($str[1] == '04') {
            $bulanindo = 'April';
        } elseif ($str[1] == '05') {
            $bulanindo = 'Mei';
        } elseif ($str[1] == '06') {
            $bulanindo = 'Juni';
        } elseif ($str[1] == '07') {
            $bulanindo = 'Juli';
        } elseif ($str[1] == '08') {
            $bulanindo = 'Agustus';
        } elseif ($str[1] == '09') {
            $bulanindo = 'September';
        } elseif ($str[1] == '10') {
            $bulanindo = 'Oktober';
        } elseif ($str[1] == '11') {
            $bulanindo = 'November';
        } else {
            $bulanindo = 'Desember';
        }

        return $bulanindo . " " . $str[0];
    }
    public static  function isWeekend($date)
    {
        $weekDay = date('w', strtotime($date));
        return ($weekDay == 0 || $weekDay == 6);
    }
    // getter and setter
    public static function app_nama()
    {
        $settings = DB::table('settings')->first();
        // dd($settings->first()->app_nama);
        if ($settings != null) {
            $data = $settings->app_nama;
        } else {
            $data = "Judul Aplikasi";
        }
        return $data;
    }
    // getter and setter
    public static function app_namapendek()
    {
        $settings = DB::table('settings')->first();
        if ($settings != null) {
            $data = $settings->app_namapendek;
        } else {
            $data = "Judul Aplikasi";
        }
        return $data;
    }

    public static function bank_nama()
    {
        $settings = DB::table('settings')->first();
        if ($settings != null) {
            $data = $settings->bank_nama;
        } else {
            $data = "Bank BRI";
        }
        return $data;
    }

    public static function bank_rekening()
    {
        $settings = DB::table('settings')->first();
        if ($settings != null) {
            $data = $settings->bank_rekening;
        } else {
            $data = "5252-2525-2525-2525";
        }
        return $data;
    }


    public static function desc()
    {
        $settings = DB::table('settings')->first();
        // dd($settings->first()->desc);
        if ($settings != null) {
            $data = $settings->desc;
        } else {
            $data = "Termurah, Terpercaya dan Terlengkap";
        }
        return $data;
    }


    public static function desc2()
    {
        $settings = DB::table('settings')->first();
        // dd($settings->first()->desc2);
        if ($settings != null) {
            $data = $settings->desc2;
        } else {
            $data = "Semua ada semua bisa.";
        }
        return $data;
    }
    public static function paginationjml()
    {
        $settings = DB::table('settings')->first();
        $data = $settings->paginationjml;
        return $data;
    }
}
