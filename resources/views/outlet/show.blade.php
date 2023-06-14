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
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                    {{ 'ID Outlet' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->id }}
                                </td>
                            </tr>
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
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Created At' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->created_at }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Updated At' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->updated_at }}
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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-12">
                <div class="p-6 text-gray-900">

                    <table class="border-collapse table-auto mx-auto w-full">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-bold p-4 pt-0 pb-3 text-black" colspan="4">Data Product</th>
                            </tr>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">ID Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Nama Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Jenis Product</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Stok Product</th>
                            </tr>
                            
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            @foreach ($products as $product)
                            <tr>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $product->id }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $product->nama_product }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $product->jenis_product }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $product->stok }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-12">
                <div class="p-6 text-gray-900">

                    <table class="border-collapse table-auto mx-auto w-full">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-bold p-4 pt-0 pb-3 text-black" colspan="4">Data Event</th>
                            </tr>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">ID Event</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Nama Event</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Tanggal Mulai</th>
                                <th class="border-b font-medium p-4 pl-8 pt-3 pb-3 text-black">Tanggal Selesai</th>

                            </tr>
                            
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            @foreach ($events as $event)
                            <tr>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $event->id }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $event->nama_event }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $event->tanggal_mulai }}</td>
                                <td class="border-b border-slate-100 p-4 pl-8 text-black text-center">{{ $event->tanggal_selesai }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>