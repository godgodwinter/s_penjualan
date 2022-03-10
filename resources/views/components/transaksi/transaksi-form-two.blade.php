<div >


    <div class="row py-2 px-2">
        <div class="col-sm-6 col-md-9" >
    <div class="btn-group" role="group" aria-label="Third group" id="onlineoffine">
        <button type="button" class="btn btn-dark mr-0 text-secondary" data-bs-placement="top" title="Online"
            data-bs-toggle="toggle"  id="buttonOnline">
            <i class="fa-solid fa-earth-asia"></i> Online
        </button>
        <button type="button" class="btn btn-info mr-2" data-bs-placement="top" title="Offine"
            data-bs-toggle="toggle" id="buttonOffline">
            <i class="fa-solid fa-power-off"></i> Offline
        </button>
    </div>
</div>
</div>
@push('before-script')
<script>
    $(function () {
        let transaksiTipe='offline';
    $("#buttonOnline").on("click", function(){
        transaksiTipe='online';
            $("#buttonOnline").addClass("btn-info text-white");
            $("#buttonOnline").removeClass("btn-dark");
            $("#buttonOffline").addClass("btn-dark text-secondary");
            $("#buttonOffline").removeClass("btn-info text-white");
        document.getElementById("inputTransaksiTipe").value = transaksiTipe;
        console.log("Online");
   }); 
  
   $("#buttonOffline").on("click", function(){
        transaksiTipe='offline';
            $("#buttonOffline").addClass("btn-info text-white");
            $("#buttonOffline").removeClass("btn-dark");
            $("#buttonOnline").addClass("btn-dark text-secondary");
            $("#buttonOnline").removeClass("btn-info text-white");
        document.getElementById("inputTransaksiTipe").value = transaksiTipe;
        console.log("Offline");
   }); 
  
    });
</script>
@endpush


<div class="row py-2 px-2">
<div class="col-sm-6 col-md-9" id="membernonmember">
    <div class="btn-group" role="group" aria-label="Third group">
        <button type="button" class="btn btn-dark mr-0 text-secondary" data-bs-placement="top" title="Member"
            data-bs-toggle="toggle" id="buttonMember">
            <i class="fa-solid fa-user-large"></i> Member
        </button>

        <button type="button" class="btn btn-info mr-2" data-bs-placement="top" title="Non-Member Active"
            data-bs-toggle="toggle" id="buttonNonmember">
            <i class="fa-solid fa-user-large-slash"></i> Non-Member
        </button>
    </div>
</div>
</div>

@push('before-script')
<script>
    $(function () {
        let pelangganTipe='nonmember';
    $("#buttonMember").on("click", function(){
        pelangganTipe='member';
            $("#buttonMember").addClass("btn-info text-white");
            $("#buttonMember").removeClass("btn-dark");
            $("#buttonNonmember").addClass("btn-dark text-secondary");
            $("#buttonNonmember").removeClass("btn-info text-white");
        document.getElementById("inputPelangganTipe").value = pelangganTipe;
        console.log("member");
   }); 
  
   $("#buttonNonmember").on("click", function(){
        pelangganTipe='nonmember';
            $("#buttonNonmember").addClass("btn-info text-white");
            $("#buttonNonmember").removeClass("btn-dark");
            $("#buttonMember").addClass("btn-dark text-secondary");
            $("#buttonMember").removeClass("btn-info text-white");
        document.getElementById("inputPelangganTipe").value = pelangganTipe;
        console.log("nonmember");
   }); 
  
    });
</script>
@endpush
    <form id="setting-form" method="POST" action="{{route('admin.transaksi.store')}}">
    @php
    //declare var
        $nama=''; //pelanggan_id ,jika bukan member = diisi nama , jika member diisi pelanggan_id
        $tipe=''; //pelanggan_tipe , Offline / Online
        $alamat=''; //alamat kosong jika tipe = offine, jika member diisi alamat pelanggan (awal), bisa diedit jika alamat ganti, jika bukan member wajib diisi
        $tglbeli=date('Y-m-d');
        $penanggungjawab=''; //admin /operator
    @endphp
        @csrf

        <input type="hidden" class="form-control  " name="transaksi_tipe" id="inputTransaksiTipe" value="offline" >
        <input type="hidden" class="form-control  " name="pelanggan_tipe" id="inputPelangganTipe" value="nonmember" >
        <input type="hidden" class="form-control  @error('kodetrans') is-invalid @enderror" id="kodetrans" name="kodetrans" value="{{$kodetrans}}" >
        
        <input type="hidden" class="form-control  @error('cart') is-invalid @enderror" id="cart" name="cart"  >

    <div class="row py-2 px-2" id="formtwo">
        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Nama Pelanggan</label>
            <div class="col-sm-4 col-md-7">
              <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" required  value="{{old('nama')?old('nama'):$nama}}">
              @error('nama')<div class="invalid-feedback"> {{$message}}</div>
              @enderror
            </div>
          </div>

        {{-- <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Alamat Penerima</label>
            <div class="col-sm-4 col-md-7">

                <input type="hidden" class="form-control  @error('cart') is-invalid @enderror" id="cart" name="cart"  >

                <input type="hidden" class="form-control  @error('kodetrans') is-invalid @enderror" id="kodetrans" name="kodetrans" value="{{$kodetrans}}" >

              <input type="text" class="form-control  @error('namatoko') is-invalid @enderror" name="namatoko" required  value="{{old('namatoko')?old('namatoko'):$namatoko}}">

              @error('namatoko')<div class="invalid-feedback"> {{$message}}</div>
              @enderror

            </div>
          </div> --}}
          

        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Tanggal Pembelian</label>
            <div class="col-sm-4 col-md-7">

              <input type="date" class="form-control  @error('tglbeli') is-invalid @enderror" name="tglbeli" required  value="{{old('tglbeli')?old('tglbeli'):$tglbeli}}">

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


        <div class="form-group row align-items-center py-2">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Penanggung Jawab</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('penanggungjawab') is-invalid @enderror" name="penanggungjawab" required  value="{{old('penanggungjawab')?old('penanggungjawab'):$penanggungjawab}}">

              @error('penanggungjawab')<div class="invalid-feedback"> {{$message}}</div>
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