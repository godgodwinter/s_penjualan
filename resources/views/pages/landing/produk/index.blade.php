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
            <div class="col-12 col-md-10 text-center mb-4 mb-lg-4">
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

        storeCariData('',"{{route('api.produk.cari')}}");

    });
    </script>
@endpush
                <div class="row " id="contentCari">

</div>


</div>
</section>

@endsection
