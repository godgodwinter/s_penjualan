@extends('layouts.default')

@section('title')
Restok Produk
@endsection

@push('before-script')

@if (session('status'))
<x-sweetalertsession tipe="{{session('tipe')}}" status="{{session('status')}}" />
@endif
@endpush

@section('content')
<x-jstooltip />

<h4 class="fw-bold py-3 mb-4">@yield('title')</h4>

<div class="card px-2">
    <div class="row">
        <div class="col-xl-6 mb-xl-0 mb-3">
            <div class="btn-toolbar demo-inline-spacing" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Third group">
                    <a href="{{route('admin.restok')}}" type="button" class="btn btn-secondary mr-2"
                        data-bs-toggle="tooltip" data-bs-placement="top" title="Kembali">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                    </a>
                    <button type="button" class="btn btn-info mr-2" data-bs-placement="top" title="Add Produk"
                        data-bs-toggle="modal" data-bs-target="#formModal">
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>

                </div>
            </div>
        </div>
    </div>

    <hr class="my-2" />
    <div class=card>
        <h4>Kode Transaksi : {{ $kodetrans}}</h4>
    </div>

    <hr class="my-1" />
    <x-restok.restok-form item=""></x-restok.restok-form>
</div>


@endsection

@section('containermodal')

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="formModalLabel">Modal title</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
@push('before-script')
<script src="{{asset('/assets/js/babeng.js')}}"></script>
<script src="{{asset('/assets/js/store.js')}}"></script>
<script>
    $(document).ready(function () {


      //proses Modal Store
        let contentResponse = '';
        $('#formModal').on('shown.bs.modal', function () {
            $('#inputCari').focus();
        });
        $('#inputCari').keyup(function () {
            // console.log($(this).val());

            let contentResponse = '';
            let datas=null;
            //fetch data example
            $.ajax({
                url: "{{route('api.produk.cari')}}",
                type: "GET",
                data: {
                    cari: $(this).val()
                },
                success: function (response) {
                    // console.log(response.data);
                    datas = response.data;
                    let jmlDataResponse = datas.length;
                    for (let i = 0; i < jmlDataResponse; i++) {
                        contentResponse += `
<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0 mt-3">
<div class="card border-0 bg-white text-center p-1" >
<img src="https://ui-avatars.com/api/?name=${datas[i].nama}&color=7F9CF5&background=EBF4FF" class="thumbnail img-responsive"  style="display: block;max-width: 100%;height: 200px;object-fit: cover"> 
<div class="card-body">
<h5 class="card-title">${datas[i].nama}</h5>
<p class="card-text">Harga : Rp ${rupiah(datas[i].harga_jual)},00</p>
<button  class="btn btn-info addProduk" onclick="storeProduk(${datas[i].id},'${datas[i].nama}',${datas[i].harga_jual})">Add</button>
</div>
</div>
</div>
`;
                    }
                    $('#contentCari').html(contentResponse);
                }
            });
        });

     
        
    }); 
    </script>
@endpush

                <div class="card mb-2">
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror" name="nama" required
                        value="" placeholder="Cari ... " id="inputCari">
                </div>

                <div class="row" id="contentCari">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
