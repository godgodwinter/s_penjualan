<div>
    <x-babeng.table-one>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th >Kode Transaksi</th>
              <th>Nama Toko</th>
              <th class="babeng-min-row text-center">Jumlah Produk</th>
              <th class="babeng-min-row text-center">Jumlah Barang</th>
              <th class="babeng-min-row text-center">Total Tagihan</th>
              <th class="babeng-min-row text-center">Penanggung Jawab</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <x-btndelete link="{{route('admin.label.destroy',$item->id)}}"></x-btndelete>
                </td>
                <td>{{substr($item->kodetrans, 0, 7) . '...'}}</td>
                <td>{{$item->namatoko}}</td>
                @php
                    $jumlahproduk = \App\Models\produkdetail::where('restok_id',$item->id)->count();
                    $jumlahbarang = \App\Models\produkdetail::where('restok_id',$item->id)->sum('jml');
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