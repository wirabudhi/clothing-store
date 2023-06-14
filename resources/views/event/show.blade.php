<x-app-layout>
    {{-- Menambah Header --}}
    <x-slot name="header">
        {{-- Menampilkan teks detail event --}}
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Detail Event' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Menampilkan Profile --}}
                    <div class="mb-6">
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128 mx-auto" src="{{ Storage::url($event->gambar) }}" alt="{{ $event->nama_event }}" srcset="">
                        </p>
                    </div>

                    <table class="border-collapse table-auto mx-auto">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-center" colspan="2">Data Event</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'ID Event' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $event->id }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Nama Event' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $event->nama_event }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Tanggal Mulai' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $event->tanggal_mulai }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Tanggal Selesai' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $event->tanggal_selesai }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Nama Outlet' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $event->nama_outlet }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Created At' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $event->created_at }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ 'Updated At' }}
                                </td>
                                <td class="border-b border-slate-100 p-4 text-black text-left">
                                    {{ $event->updated_at }}
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex justify-center pt-8">
                        {{-- Button untuk kembali menuju route event.index --}}
                    <a href="{{ route('event.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md justify-center">Kembali</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>