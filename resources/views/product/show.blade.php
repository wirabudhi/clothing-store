<x-app-layout>
    {{-- Menambah Header --}}
    <x-slot name="header">
        {{-- Menampilkan teks detail product --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detail Product' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Menampilkan Profile --}}
                    <div class="mb-6">
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128 mx-auto" src="{{ Storage::url($product->gambar) }}" alt="{{ $product->nama }}" srcset="">
                        </p>
                    </div>

                    <table class="border-collapse table-auto mx-auto">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-center" colspan="2">Data Product</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'ID Product' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->id }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Nama Product' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->nama_product }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Jenis Product' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->jenis_product }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Harga' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->harga }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Deskripsi' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->deskripsi }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Ukuran' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->ukuran }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Stok' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->stok }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Nama Outlet' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->nama_outlet }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Created At' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->created_at }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Updated At' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $product->updated_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex justify-center pt-8">
                        {{-- Button untuk kembali menuju route product.index --}}
                    <a href="{{ route('product.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md justify-center">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>