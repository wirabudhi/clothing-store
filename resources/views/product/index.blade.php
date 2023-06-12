<x-app-layout>
    {{-- Membuat header --}}
    <x-slot name="header">
        <div class="flex justify-center">
            {{-- Menampilkan Text Data Product --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ 'Data Product' }}
            </h2>
            {{-- Menambahkan button tambah yang mengarah ke halaman add product menggunakan route product.create --}}
            <a href="{{ route('product.create') }}" class="bg-blue-500 text-white px-4 py-1 rounded-md">Tambah Product</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-800">
                    {{-- Menampilkan table untuk data product --}}
                    <table class="border-collapse table-auto w-full text-sm">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">ID Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Nama Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Stok</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Ukuran</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Action</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            {{-- Melakukan perulangan data product --}}
                            @foreach ($product as $p)
                                <tr>
                                    {{-- Menampilkan ID --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $p->id }}</td>
                                    {{-- Menampilkan Nama Product --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $p->nama_product }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $p->stok }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $p->ukuran }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">
                                        {{-- Button untuk menampilkan detail product --}}
                                        <a href="{{ route('product.show', $p->id) }}" class="border border-green-500 hover:bg-green-500 hover:text-white px-4 py-2 rounded-md">Detail</a>
                                        {{-- Button untuk menampilkan edit product --}}
                                        <a href="{{ route('product.edit', $p->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">Edit</a>
                                        {{-- Form khusus untuk melakukan hapus data product --}}
                                        <form method="post" action="{{ route('product.destroy', $p->id) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>               
                </div>
            </div>
        </div>
    </div>

    <script>
        var map = L.map('map').setView([-8.711878479696912, 115.18377128873612], 12)

        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        }).addTo(map);

        var markerIcon = L.icon({
            iconUrl: "marker.png",
            iconSize: [40, 40],
            popupAnchor: [0, -40],
        });

        @foreach ($product as $item)
            L.marker([{{ $item->lat }},{{ $item->lon }}], {icon: markerIcon,})
            .bindPopup(
            `
                <div class="" style="width: 18rem;">
                <img class="cropped-image" src="{{ Storage::url($item->gambar) }}" alt="User Photo">
                <h4 class="pt-3 pb-1" style="text-align: center">{{$item->nama_product}}</h4>
                <div class="border-top border-bottom">
                    <table class="table table-borderless my-1">
                    <tbody>
                        <tr>
                        <td>{{$item->alamat}}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </img>
            `
            ).addTo(map)
        @endforeach      

    </script>
</x-app-layout>
