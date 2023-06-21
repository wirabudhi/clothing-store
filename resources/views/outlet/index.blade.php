<x-app-layout>
    {{-- Membuat header --}}
    <x-slot name="header">
        <div class="flex justify-center">
            {{-- Menampilkan Text Data Outlet --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ 'Data Outlet' }}
            </h2>
            @can('create')
                {{-- Menambahkan button tambah yang mengarah ke halaman add outlet menggunakan route outlet.create --}}
                <a href="{{ route('outlet.create') }}" class="bg-blue-500 text-white px-4 py-1 rounded-md">Tambah Outlet</a>
            @endcan
            
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-10">
                <div class="p-6 text-gray-900">
                    <div class="map" id="map"></div>
                </div>
            </div>
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-800">
                    {{-- Menampilkan table untuk data outlet --}}
                    <table class="border-collapse table-auto w-full text-sm">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">ID Outlet</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Nama Outlet</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Alamat</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Action</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            {{-- Melakukan perulangan data outlet --}}
                            @foreach ($outlet as $s)
                                <tr>
                                    {{-- Menampilkan ID --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $s->id }}</td>
                                    {{-- Menampilkan Nama Outlet --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $s->nama_outlet }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $s->alamat }}</td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">
                                        <x-dropdown align="top" width="48" class="block">
                                            <x-slot name="trigger">
                                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                    <div class="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                                        </svg>
                                                    </div>
                                                </button>
                                            </x-slot>

                                            <x-slot name="content" no-body-click>
                                                <x-dropdown-link :href="route('outlet.show', $s->id)">
                                                    {{ __('Detail') }}
                                                </x-dropdown-link>

                                                @can('update')
                                                    <x-dropdown-link :href="route('outlet.edit', $s->id)">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>
                                                @endcan
                                                
                                                @can('delete')
                                                    <form method="post" action="{{ route('outlet.destroy', $s->id) }}" class="inline">
                                                        @csrf
                                                        @method('delete')
                                                        <x-dropdown-link :href="route('outlet.destroy', $s->id)"
                                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                        </x-dropdown-link>
                                                    </form>
                                                @endcan

                                                @can('create')
                                                    <x-dropdown-link :href="route('product.create', $s->id)">
                                                        {{ __('Add Product') }}
                                                    </x-dropdown-link>
                                                    
                                                    <x-dropdown-link :href="route('event.create', $s->id)">
                                                        {{ __('Add Event') }}
                                                    </x-dropdown-link>
                                                @endcan

                                                
                                            </x-slot>
                                        </x-dropdown>
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

        @foreach ($outlet as $item)
            L.marker([{{ $item->lat }},{{ $item->lon }}], {icon: markerIcon,})
            .bindPopup(
            `
                <div class="" style="width: 12rem; display: flex; flex-direction: column; align-items: center; padding:10dp">
                <img class="cropped-image" src="{{ Storage::url($item->gambar) }}" alt="User Photo">
                <h4 class="pt-3 pb-1" style="text-align: center; margin-top:10px">{{$item->nama_outlet}}</h4>
                <div class="border-top border-bottom">
                    <table class="table table-borderless my-1 text-center">
                    <tbody>
                        <tr>
                            <td>Alamat : {{$item->alamat}}</td>
                        </tr>
                        <tr>
                            <td>Jam Operasional : {{$item->jam_operasional}}</td>
                        </tr>
                        <tr>
                            <td>No Telp : {{$item->no_telp}}</td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ route('outlet.show', $item->id) }}" class="btn btn-primary">Detail</a>
                            </td>
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
