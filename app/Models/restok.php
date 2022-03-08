<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class restok extends Model
{
        public $table = "restok";

        use SoftDeletes;
        use HasFactory;

        protected $fillable = [
            'kodetrans',
            'namatoko',
            'tglbeli',
            'totalbayar',
            'penanggungjawab',
        ];


}
