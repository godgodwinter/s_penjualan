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
            $table->string('pelanggan_id')->nullable(); //jika non member berarti offline tidak perlu pelanggan_id
            $table->string('pelanggan_tipe'); //member, non member
            $table->text('alamat')->nullable(); //jika offline tidak perlu diisi 
            $table->string('tgl_beli');
            $table->integer('ppn')->nullable();
            $table->string('status'); //pembayaran
            $table->string('photo_konfirmasi')->nullable(); 
            $table->integer('total_bayar'); 
            $table->integer('dibayar'); 
            $table->integer('kembalian')->nullable(); 
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
