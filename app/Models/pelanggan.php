<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pelanggan extends Model
{
        public $table = "pelanggan";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'nama',
            'jk',
            'alamat',
            'telp', //status pembayaran
        ];


}
