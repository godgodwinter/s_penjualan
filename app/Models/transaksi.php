<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksi extends Model
{
        public $table = "transaksi";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'pelanggan_id',
            'tgl_beli',
            'ppn',
            'status', //status pembayaran
            'photo_konfirmasi',
            'total_bayar',
            'dibayar',
            'kembalian',
        ];

        public function transaksidetail()
        {
            return $this->hasMany(transaksidetail::class,'parrent_id','id');
        }

    public static function boot() {
        parent::boot();

        static::deleting(function($transaksi) { // before delete() method call this
             $transaksi->transaksidetail()->delete();
             // do the rest of the cleanup...
        });
    }

}
