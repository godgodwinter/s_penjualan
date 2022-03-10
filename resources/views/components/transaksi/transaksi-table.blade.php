<div>
    <x-babeng.table-one>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th >Tanggal Transaksi</th>
              <th>Nama Pelanggan</th>
              <th class="babeng-min-row text-center">Jenis Pembelian</th>
              <th class="babeng-min-row text-center">Jumlah Produk</th>
              <th class="babeng-min-row text-center">Jumlah Barang</th>
              <th class="babeng-min-row text-center">Total Tagihan</th>
              <th class="babeng-min-row text-center">Penanggung Jawab</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            @php
                $pelanggan='';
                $warnapelanggan='info';
                $warnatransaksi='dark';
                if($item->pelanggan_tipe=='member'){
                    $warnapelanggan='success';
                    $pelanggan=$item->pelanggan?$item->pelanggan->nama:'Pelangan tidak ditemukan';
                }else{
                    $pelanggan=$item->pelanggan_id;
                }
                if($item->transaksi_tipe=='online'){
                    $warnatransaksi='success';
                }
            @endphp
            @php
            $url=route('api.produk.restokdetail',$item->id);
            @endphp
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <x-btndelete link="{{route('admin.transaksi.destroy',$item->id)}}"></x-btndelete>
                    {{-- <button class="btn btn-info btn-sm" onclick="btnModalDetailTransaksi('{{$url}}',{{$item->id}})" data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi"><span
                        class="pcoded-micon"> <i class="fa-solid fa-angles-right"></i></span></button>
                    --}}
                    
                </td>
                {{-- <td>{{substr($item->kodetrans, 0, 7) . '...'}}</td> --}}
                <td>{{Fungsi::tanggalindo($item->tglbeli)}}</td>
                <td class="text-center babeng-min-row">{{$pelanggan}} - <span class="badge bg-label-{{$warnapelanggan}} me-1">{{$item->pelanggan_tipe}}</span> </td>
                <td class="text-center"><span class="badge bg-label-{{$warnatransaksi}} me-1">{{$item->transaksi_tipe}}</span></td>
                @php
                    $jumlahproduk = \App\Models\transaksidetail::where('transaksi_id',$item->id)->count();
                    $jumlahbarang = \App\Models\transaksidetail::where('transaksi_id',$item->id)->sum('jml');
                @endphp
                <td class="text-center">{{$jumlahproduk}}</td>
                <td class="text-center">{{$jumlahbarang}}</td>
                <td class="text-center">{{Fungsi::rupiah($item->totalbayar)}}</td>
                <td class="text-center">{{$item->penanggungjawab}}</td>
            </tr>
            @empty
            @endforelse
        </x-slot>
    </x-babeng.table-one>
</div>