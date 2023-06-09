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
                            <img class="h-64 w-128 mx-auto" src="{{ Storage::url($outlet->gambar) }}" alt="{{ $outlet->nama }}" srcset="">
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
                                    {{ 'Nama_outlet' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $outlet->nama_outlet }}
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
        </div>
    </div>
</x-app-layout>