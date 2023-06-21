<x-app-layout>
    {{-- Membuat header --}}
    <x-slot name="header">
        <div class="flex justify-center">
            {{-- Menampilkan Text Data Event --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ 'Data Event' }}
            </h2>
            @can('create')
                {{-- Menambahkan button tambah yang mengarah ke halaman add event menggunakan route event.create --}}
                <a href="{{ route('event.create') }}" class="bg-blue-500 text-white px-4 py-1 rounded-md">Tambah Event</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-800">
                    {{-- Menampilkan table untuk data event --}}
                    <table class="border-collapse table-auto w-full text-sm">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">ID Event</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Nama Event</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Tanggal Mulai</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Tanggal Selesai</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Action</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            {{-- Melakukan perulangan data event --}}
                            @foreach ($event as $e)
                                <tr>
                                    {{-- Menampilkan ID --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $e->id }}</td>
                                    {{-- Menampilkan Nama Event --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $e->nama_event }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $e->tanggal_mulai }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $e->tanggal_selesai }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">
                                        {{-- Button untuk menampilkan detail event --}}
                                        <a href="{{ route('event.show', $e->id) }}" class="border border-green-500 hover:bg-green-500 hover:text-white px-4 py-2 rounded-md">Detail</a>
                                        @can('update')
                                            {{-- Button untuk menampilkan edit event --}}
                                            <a href="{{ route('event.edit', $e->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">Edit</a>
                                        @endcan

                                        @can('delete')
                                            {{-- Form khusus untuk melakukan hapus data event --}}
                                            <form method="post" action="{{ route('event.destroy', $e->id) }}" class="inline">
                                                @csrf
                                                @method('delete')
                                                <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">Hapus</button>
                                            </form>
                                        @endcan
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

        @foreach ($event as $item)
            L.marker([{{ $item->lat }},{{ $item->lon }}], {icon: markerIcon,})
            .bindPopup(
            `
                <div class="" style="width: 18rem;">
                <img class="cropped-image" src="{{ Storage::url($item->gambar) }}" alt="User Photo">
                <h4 class="pt-3 pb-1" style="text-align: center">{{$item->nama_event}}</h4>
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
