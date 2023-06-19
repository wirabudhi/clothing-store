<x-app-layout>
    {{-- Membuat header --}}
    <x-slot name="header">
        <div class="flex justify-center">
            {{-- Menampilkan Text Data User --}}
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ 'Data User' }}
            </h2>
            @can('create')
                {{-- Menambahkan button tambah yang mengarah ke halaman add user menggunakan route user.create --}}
                <a href="{{ route('user.create') }}" class="bg-blue-500 text-white px-4 py-1 rounded-md">Tambah User</a>
            @endcan
            
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-red-800">
                    {{-- Menampilkan table untuk data user --}}
                    <table class="border-collapse table-auto w-full text-sm">
                        {{-- Menampilkan table head --}}
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">ID User</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Nama User</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Email</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Roles</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-black text-left">Action</th>
                            </tr>
                        </thead>
                        {{-- Menampilkan table body --}}
                        <tbody class="bg-white">
                            {{-- Melakukan perulangan data user --}}
                            @foreach ($user as $s)
                                <tr>
                                    {{-- Menampilkan ID --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $s->id }}</td>
                                    {{-- Menampilkan Nama User --}}
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $s->name }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">{{ $s->email }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-black">
                                        @foreach ($s->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-black dark:text-black">
                                        
                                        @can('update')
                                            {{-- Button untuk menampilkan edit user --}}
                                            <a href="{{ route('user.edit', $s->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">Edit</a>
                                        @endcan

                                        @can('delete')
                                            {{-- Form khusus untuk melakukan hapus data user --}}
                                            <form method="post" action="{{ route('user.destroy', $s->id) }}" class="inline">
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

</x-app-layout>
