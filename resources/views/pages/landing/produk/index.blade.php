@extends('layouts.landing')

@section('title')
Beranda
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}"/>
@endif
@endpush

@section('content')
<section class="section section-lg pb-0" id="testimonials">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center mb-5 mb-lg-6">
                <h2 class="display-3 mb-4">Pencarian</h2>
                {{-- <p class="lead">This is some what i  made <br class="d-none d-lg-inline-block"> Some project is private and hidden repo / demo.</p> --}}
                <input type="text" class="form-control" placeholder="Cari..." id="inputCari">
            </div>
        </div>

@push('before-script')
<script src="{{asset('/assets/js/babeng.js')}}"></script>
<script src="{{asset('/assets/js/landingProduk.js')}}"></script>
<script>
    $(document).ready(function () {


      //proses Modal Store
        let contentResponse = '';
        $('#formModal').on('shown.bs.modal', function () {
            storeCariData('',"{{route('api.produk.cari')}}");
            $('#inputCari').focus();
        });
        $('#inputCari').keyup(function () {
            // console.log($(this).val());
            storeCariData($(this).val(),"{{route('api.produk.cari')}}");
        });

     
        
    }); 
    </script>
@endpush
        <div class="row mt-lg-6">
                <div class="row " id="contentCari">
@forelse ($items as $item)

    <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
        <div class="card border-0 bg-white text-center p-1" >
        <img src="https://ui-avatars.com/api/?name=Produk&color=7F9CF5&background=EBF4FF" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 150px;object-fit: cover"> 
        <div class="card-body">
          <h5 class="card-title">{{$item->nama}}</h5>
          <p class="card-text">Harga : {{Fungsi::rupiah($item->harga_jual)}}</p>
          @php
          $getstok=\App\Models\produkdetail::where('produk_id',$item->id)->sum('jml');
          $getterjual=\App\Models\transaksidetail::where('produk_id',$item->id)->whereHas('transaksi', function ($query) {
              $query->where('status', '<>', 'cancel');
          })->sum('jml');
          $getsisastok=$getstok-$getterjual;
          $warna='info';
          if($getsisastok<1){
              $warna='dark';
          }
      @endphp
          <p class="card-text">Stok : {{$getsisastok}}</p>
          <button class="btn btn-{{$warna}}">Tambahkan Keranjang</button>
        </div>
      </div>
    </div>

    
@empty

@endforelse

</div>


    </div>
</div>
</section>

@endsection
