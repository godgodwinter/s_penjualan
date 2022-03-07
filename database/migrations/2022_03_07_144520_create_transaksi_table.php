<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pelanggan_id');
            $table->string('tgl_beli');
            $table->string('ppn');
            $table->string('status'); //pembayaran
            $table->string('photo_konfirmasi'); 
            $table->string('total_bayar'); 
            $table->string('dibayar'); 
            $table->string('kembalian'); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
