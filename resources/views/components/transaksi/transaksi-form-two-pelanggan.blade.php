<div >
    <div class="row py-2 px-2">
        <div class="col-sm-6 col-md-9" >
    <div class="btn-group" role="group" aria-label="Third group" id="onlineoffine">
        <button type="button" class="btn btn-info mr-0 " data-bs-placement="top" title="Online"
            data-bs-toggle="toggle"  id="buttonOnline">
            <i class="fa-solid fa-earth-asia"></i> Online
        </button>
    </div>
    <div class="btn-group" role="group" aria-label="Third group">
        <button type="button" class="btn btn-info mr-0 " data-bs-placement="top" title="Member"
            data-bs-toggle="toggle" id="buttonMember">
            <i class="fa-solid fa-user-large"></i> Member
        </button>

    </div>
</div>
</div>
    <form id="setting-form" method="POST" action="{{route('pelanggan.transaksi.store')}}">
    @php
    //declare var
        $nama=$getPelanggan?$getPelanggan->nama:'Data Pelanggan tidak ditemukan'; //pelanggan_id ,jika bukan member = diisi nama , jika member diisi pelanggan_id
        $tipe=''; //pelanggan_tipe , Offline / Online
        $alamat=''; //alamat kosong jika tipe = offine, jika member diisi alamat pelanggan (awal), bisa diedit jika alamat ganti, jika bukan member wajib diisi
        $tglbeli=date('Y-m-d');
        $penanggungjawab=''; //admin /operator
    @endphp
        @csrf

        <input type="hidden" class="form-control  " name="transaksi_tipe" id="inputTransaksiTipe" value="online" >
        <input type="hidden" class="form-control  " name="pelanggan_tipe" id="inputPelangganTipe" value="member" >
        <input type="hidden" class="form-control  @error('kodetrans') is-invalid @enderror" id="kodetrans" name="kodetrans" value="{{$kodetrans}}" >
        
        <input type="hidden" class="form-control  @error('cart') is-invalid @enderror" id="cart" name="cart"  >

    <div class="row py-2 px-2" id="formtwo">
            <div class="form-group row align-items-center py-2">
                <label for="site-title" class="form-control-label col-sm-5 text-md-right">Nama Pelanggan</label>
                <div class="col-sm-4 col-md-7" id="divpelanggan_id" >
                  <input type="text" class="form-control  @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id" required  value="{{old('pelanggan_id')?old('pelanggan_id'):$nama}}" readonly>
                  @error('nama')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror
                </div>
              </div>


              
        <div class="form-group row align-items-center py-2" id="divonline">
          <label for="site-title" class="form-control-label col-sm-5 text-md-right">Alamat Penerima</label>
          <div class="col-sm-4 col-md-7">

            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" required  value="">

            @error('alamat')<div class="invalid-feedback"> {{$message}}</div>
            @enderror

          </div>
          </div>
          

        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Tanggal Pembelian</label>
            <div class="col-sm-4 col-md-7">

              <input type="date" class="form-control  @error('tglbeli') is-invalid @enderror" name="tglbeli" required  value="{{old('tglbeli')?old('tglbeli'):$tglbeli}}" readonly>

              @error('tglbeli')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Total Tagihan</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('totalbayar') is-invalid @enderror" name="totalbayar"  readonly id="totalbayar" value="0">

              @error('totalbayar')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div>
              <div class="card-footer d-flex justify-end ">
                <span class="btn btn-danger ml-2" id="save-reset" onclick="return confirm('Anda yakin melakukan reset ? Y/N') ?resetData():''">Reset</span>
                <button class="btn btn-success ml-2" id="save-save" onclick="return confirm('Anda yakin data telah sesuai? Y/N')">Simpan</button>
              </div>
      </div>
      </form>

</div>