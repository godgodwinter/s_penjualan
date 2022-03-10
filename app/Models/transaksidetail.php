<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksidetail extends Model
{
        public $table = "transaksidetail";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'transaksi_id',
            'barang_id',
            'jml',
            'harga_awal',
            'diskon',
            'harga_akhir',
        ];


}
