<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class produkdetail extends Model
{
        public $table = "produkdetail";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'barang_id',
            'harga_beli',
            'jml',
            // 'harga_jual',
        ];


}
