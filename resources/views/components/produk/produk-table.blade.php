<div>
    <x-babeng.table-one>
        <x-slot name="thead">
              <th class="babeng-min-row text-center">No</th>
              <th class="text-center">Aksi</th>
              <th>Nama</th>
              <th>Harga Jual</th>
              <th class="text-center">Stok</th>
              <th class="text-center">Terjual</th>
              <th class="text-center">Satuan</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            <tr>
                <td class=" text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <x-btnedit link="{{route('admin.produk.edit',$item->id)}}"></x-btnedit>
                    <x-btndelete link="{{route('admin.produk.destroy',$item->id)}}"></x-btndelete>
                </td>
                <td>{{$item->nama}}</td>
                <td>{{Fungsi::rupiah($item->harga_jual)}}</td>
                @php
                    $getstok=\App\Models\produkdetail::where('produk_id',$item->id)->sum('jml');
                @endphp
                <td class="text-center">{{ $getstok}}</td>
                <td class="text-center">0</td>
                <td class="text-center">{{$item->satuan}}</td>
            </tr>
            @empty
            @endforelse
        </x-slot>
    </x-babeng.table-one>
</div>