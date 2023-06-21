<x-app-layout>
    {{-- Menambah Header --}}
    <x-slot name="header">
        {{-- Menampilkan teks detail outlet --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detail Outlet' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Menampilkan Profile --}}
                    <div class="mb-6">
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128 mx-auto" src="{{ Storage::url($outlet->gambar) }}" alt="{{ $outlet->nama_outlet }}" srcset="">
                        </p>
                    </div>

                    <table class="border-collapse table-auto mx-auto">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-center" colspan="2">Data Outlet</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Nama Outlet' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->nama_outlet }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'No Telp' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->no_telp }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Email' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->email }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Jam Operasional' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->jam_operasional }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Alamat' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->alamat }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Lat' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->lat }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Lon' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->lon }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex justify-center pt-8">
                        {{-- Button untuk kembali menuju route outlet.index --}}
                    <a href="{{ route('outlet.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md justify-center">Kembali</a>
                    </div>
                    
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg mt-12">
                <div class="p-6 text-gray-900">

                    <table class="border-collapse table-auto mx-auto w-full">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-bold p-4 pt-0 pb-3 text-black" colspan="5">Data Product</th>
                            </tr>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Gambar Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Nama Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Jenis Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Stok Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Action</th>
                            </tr>
                            
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            @foreach ($products as $product)
                            <tr>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">
                                    <img class="h-20 w-20 mx-auto" src="{{ Storage::url($product->gambar) }}" alt="{{ $product->nama_product }}" srcset="">
                                </td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $product->nama_product }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $product->jenis_product }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $product->stok }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">
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

                                                @can('update')
                                                    <x-dropdown-link :href="route('product.edit', $product->id)">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>
                                                @endcan
                                                
                                                @can('delete')
                                                    <form method="post" action="{{ route('product.destroy', $product->id) }}" class="inline">
                                                        @csrf
                                                        @method('delete')
                                                        <x-dropdown-link :href="route('product.destroy', $product->id)"
                                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                        </x-dropdown-link>
                                                    </form>
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
            
            <div class="bg-white shadow-sm sm:rounded-lg mt-12">
                <div class="p-6 text-gray-900">

                    <table class="border-collapse table-auto mx-auto w-full">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-bold p-4 pt-0 pb-3 text-black" colspan="5">Data Event</th>
                            </tr>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Gambar Event</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Nama Event</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Tanggal Mulai</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Tanggal Selesai</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Action</th>

                            </tr>
                            
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            @foreach ($events as $event)
                            <tr>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">
                                    <img class="h-20 w-20 mx-auto" src="{{ Storage::url($event->gambar) }}" alt="{{ $event->nama_event }}" srcset="">
                                </td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $event->nama_event }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $event->tanggal_mulai }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $event->tanggal_selesai }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">
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

                                                @can('update')
                                                    <x-dropdown-link :href="route('event.edit', $event->id)">
                                                        {{ __('Edit') }}
                                                    </x-dropdown-link>
                                                @endcan
                                                
                                                @can('delete')
                                                    <form method="post" action="{{ route('event.destroy', $event->id) }}" class="inline">
                                                        @csrf
                                                        @method('delete')
                                                        <x-dropdown-link :href="route('event.destroy', $event->id)"
                                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                                        {{ __('Delete') }}
                                                        </x-dropdown-link>
                                                    </form>
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
</x-app-layout>