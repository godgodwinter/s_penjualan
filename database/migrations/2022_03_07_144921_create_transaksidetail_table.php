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
        Schema::create('transaksidetail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaksi_id');
            $table->string('produk_id');
            $table->string('harga_jual');
            $table->string('diskon');
            $table->string('harga_akhir');
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
        Schema::dropIfExists('transaksidetail');
    }
};
