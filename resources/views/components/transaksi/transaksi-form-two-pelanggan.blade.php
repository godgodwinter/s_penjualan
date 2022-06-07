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

<div class="card card-body">
    BANK BRI - 6769-4568953 - H. Nasuki
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

              @push('before-script')
              <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                  <script>

    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            // theme: "classic",
            // allowClear: true,
            width: "resolve"
        });
    });


    let dataProvinsi=document.getElementById("dataProvinsi");
    let dataCity=document.getElementById("dataCity");
// let dataKabupaten=document.getElementById("dataKabupaten");
// let kab = document.getElementsByClassName("kab");
        //ambildatanconst
getDatas = async () => {
//  axios.get('https://reqres.in/api/users')
await axios.get('http://127.0.0.1:8000/pelanggan/rajaongkir/province',)
 .then(response => {
  let datas =  response.data.rajaongkir.results;

//   dataKabupaten.remove();
//     dataKecamatan.remove();
dataProvinsi.innerHTML=`<option disabled selected value=""> Pilih Provinsi</option>`;
  datas.forEach(function(data){
    // console.log(data);
    // addOption(data.id,data.nama);

    dataProvinsi.innerHTML += `
    <option value="${data.province_id}"> ${data.province}</option>
    `;
  })
//   console.log(`GET data`, datas);
// console.log('tes');
})
 .catch(error => console.error(error));
};
getDatas();

// onchange
getDataProvinsi=(sel)=>{

let value = sel.value;
let text = sel.options[sel.selectedIndex].text;
provinsi_id.value=value;
provinsi_nama.value=text;
  console.log(value+' '+text);

//ambildataKabupaten
getDatasKota(value);


}


getDatasKota = async (id=11) => {
//  axios.get('https://reqres.in/api/users')
await axios.get(`http://127.0.0.1:8000/pelanggan/rajaongkir/city?provinsi_id=${id}`)
 .then(response => {
  let datas =  response.data.rajaongkir.results;

//   dataKabupaten.remove();
//     dataKecamatan.remove();
dataCity.innerHTML=`<option disabled selected value=""> Pilih Kota / Kabupaten</option>`;
  datas.forEach(function(data){

    dataCity.innerHTML += `
    <option value="${data.city_id}">${data.type} ${data.city_name} </option>
    `;
  })
  console.log(`GET data`, datas);
})
 .catch(error => console.error(error));
};


// onchange
getDataCity=(sel)=>{

let value = sel.value;
let text = sel.options[sel.selectedIndex].text;
city_id.value=value;
city_nama.value=text;
  console.log(value+' '+text);

//ambildataKabupaten
getDatasKota(value);


}
                  </script>
              @endpush
              <div class="form-group row align-items-center py-2" id="divonline">
                <label for="site-title" class="form-control-label col-sm-5 text-md-right">Pilih Provinsi</label>
                <div class="col-sm-4 col-md-7">

                    <select class="js-example-basic-single form-control-sm @error('provinsi')
                    is-invalid
                @enderror" name="provinsi"  style="width: 100%" id="dataProvinsi"  onchange="getDataProvinsi(this)" >
                    <option disabled selected value=""> Pilih Provinsi</option>

                  </select>
                  <input type="hidden" name="provinsi_id" id="provinsi_id" value="">
                  <input type="hidden" name="provinsi_nama" id="provinsi_nama" value="">
                  <input type="hidden" name="city_id" id="city_id" value="">
                  <input type="hidden" name="city_nama" id="city_nama" value="">

                  @error('provinsi')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
                </div>

              <div class="form-group row align-items-center py-2" id="divonline">
                <label for="site-title" class="form-control-label col-sm-5 text-md-right">Pilih Kota</label>
                <div class="col-sm-4 col-md-7">


                    <select class="js-example-basic-single form-control-sm @error('city')
                    is-invalid
                @enderror" name="city"  style="width: 100%" id="dataCity"  onchange="getDataCity(this)" >
                    <option disabled selected value=""> Pilih Kota / Kabupaten</option>

                  </select>
                  <input type="hidden" name="city_nama" id="city_nama" value="">

                  @error('kota')<div class="invalid-feedback"> {{$message}}</div>
                  @enderror

                </div>
                </div>


        <div class="form-group row align-items-center py-2" id="divonline">
          <label for="site-title" class="form-control-label col-sm-5 text-md-right">Alamat Lengkap Penerima</label>
          <div class="col-sm-4 col-md-7">

            <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" required  value="">

            @error('alamat')<div class="invalid-feedback"> {{$message}}</div>
            @enderror

          </div>
          </div>

          <div class="form-group row align-items-center py-2" id="divonline">
            <label for="site-title" class="form-control-label col-sm-5 text-md-right">Total Ongkir</label>
            <div class="col-sm-4 col-md-7">

              <input type="text" class="form-control  @error('ongkir') is-invalid @enderror" name="ongkir" required  value="0" readonly id="ongkir">

              @error('ongkir')<div class="invalid-feedback"> {{$message}}</div>
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


              {{-- <p>
                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                 Detail No Rekening
                </a>
              </p>
              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                 BANK BRI - 6769-4568953 - H. Nasuki
                </div>
              </div> --}}
      </div>
      </form>

</div>
