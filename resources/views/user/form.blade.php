<x-app-layout>
    {{-- Mendefinisikan Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Menentukan apakah form ini digunakan untuk edit user atau tambah user --}}
            {{ isset($user) ? 'Edit User' : 'Tambah User' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Membuat form dengan method POST untuk mengirim data --}}
                    {{-- Pada action akan dicek apakah form ini digunakan untuk menambah data baru atau mengupdate data yang sudah ada --}}
                    {{-- Enctype berfungsi untuk menerima data berupa file --}}
                    <form method="post" action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        {{-- Token security --}}
                        @csrf
                        {{-- Melakukan overiding terhadap method POST menjadi method PUT apabila form ini digunakan untuk edit --}}
                        @isset($user)
                            @method('put')
                        @endisset
                        
                        

                        {{-- Menampilkan form name --}}
                        <div>
                            {{-- Label Name --}}
                            <x-input-label for="name" value="Nama User" />
                            {{-- Text input name --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="$user->name ?? old('name')" required autofocus />
                            {{-- Input error guna menampilkan error pada field name --}}
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        
                        
                        {{-- Menampilkan form email --}}
                        <div>
                            {{-- Label Email --}}
                            <x-input-label for="email" value="Email" />
                            {{-- Text input email --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="$user->email ?? old('email')" required autofocus />
                            {{-- Input error guna menampilkan error pada field email --}}
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                        
                        {{-- Menampilkan form password --}}
                        <div>
                            {{-- Label Password --}}
                            <x-input-label for="password" value="Password" />
                            {{-- Text input password --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="$user->password ?? old('password')" required autocomplete="new-password"  />
                            {{-- Input error guna menampilkan error pada field password --}}
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>
                        
                        {{-- Menampilkan form password_confirmation --}}
                        <div>
                            {{-- Label Password_confirmation --}}
                            <x-input-label for="password_confirmation" value="Konfirmasi Password" />
                            {{-- Text input password_confirmation --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" :value="$user->password_confirmation ?? old('password_confirmation')" required autocomplete="new-password"  />
                            {{-- Input error guna menampilkan error pada field password_confirmation --}}
                            <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                        </div>

                        {{-- Menampilkan form role --}}
                        <div>
                            {{-- Label Role --}}
                            <x-input-label for="role" value="Role" />
                            {{-- Text input role --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <select id="role" name="role" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                                @foreach ($role as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $user->roles->pluck('id')->first()) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            {{-- Input error guna menampilkan error pada field role --}}
                            <x-input-error class="mt-2" :messages="$errors->get('role')" />
                        </div>
                
                        {{-- Menampilkan button Submit --}}
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Submit') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
