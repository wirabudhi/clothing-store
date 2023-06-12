<x-app-layout>
    {{-- Mendefinisikan Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Menentukan apakah form ini digunakan untuk edit event atau tambah event --}}
            {{ isset($event) ? 'Edit Event' : 'Tambah Event' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Membuat form dengan method POST untuk mengirim data --}}
                    {{-- Pada action akan dicek apakah form ini digunakan untuk menambah data baru atau mengupdate data yang sudah ada --}}
                    {{-- Enctype berfungsi untuk menerima data berupa file --}}
                    <form method="post" action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        {{-- Token security --}}
                        @csrf
                        {{-- Melakukan overiding terhadap method POST menjadi method PUT apabila form ini digunakan untuk edit --}}
                        @isset($event)
                            @method('put')
                        @endisset
                        

                        {{-- Menampilkan form outlets_id --}}
                        <div>
                            {{-- Label Outlets_id --}}
                            <x-input-label for="outlets_id" value="Nama Outlet" />
                            {{-- Text input outlets_id --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <select id="outlets_id" name="outlets_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required autofocus>
                                @foreach ($outlets as $item)
                                    <option value="{{ $item->id }}" {{ isset($event) ? (($event->outlets_id == $item->id) ? 'selected' : '') : '' }}>{{ $item->nama_outlet }}</option>
                                @endforeach
                            </select>
                            {{-- Input error guna menampilkan error pada field outlets_id --}}
                            <x-input-error class="mt-2" :messages="$errors->get('outlets_id')" />
                        </div>

                        {{-- Menampilkan form nama_event --}}
                        <div>
                            {{-- Label Nama_event --}}
                            <x-input-label for="nama_event" value="Nama Event" />
                            {{-- Text input nama_event --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="nama_event" name="nama_event" type="text" class="mt-1 block w-full" :value="$event->nama_event ?? old('nama_event')" required autofocus />
                            {{-- Input error guna menampilkan error pada field nama_event --}}
                            <x-input-error class="mt-2" :messages="$errors->get('nama_event')" />
                        </div>

                        {{-- Menampilkan form tanggal_mulai --}}
                        <div>
                            {{-- Label Tanggal_mulai --}}
                            <x-input-label for="tanggal_mulai" value="Tanggal Mulai" />
                            {{-- Text input tanggal_mulai --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="tanggal_mulai" name="tanggal_mulai" type="date" class="mt-1 block w-full" :value="$event->tanggal_mulai ?? old('tanggal_mulai')" required autofocus />
                            {{-- Input error guna menampilkan error pada field tanggal_mulai --}}
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_mulai')" />
                        </div>
                        
                        {{-- Menampilkan form tanggal_selesai --}}
                        <div>
                            {{-- Label Tanggal_selesai --}}
                            <x-input-label for="tanggal_selesai" value="Tanggal Selesai" />
                            {{-- Text input tanggal_selesai --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="tanggal_selesai" name="tanggal_selesai" type="date" class="mt-1 block w-full" :value="$event->tanggal_selesai ?? old('tanggal_selesai')" required autofocus />
                            {{-- Input error guna menampilkan error pada field tanggal_selesai --}}
                            <x-input-error class="mt-2" :messages="$errors->get('tanggal_selesai')" />
                        </div>
                        
                        {{-- Menampilkan form kupon --}}
                        <div>
                            {{-- Label Kupon --}}
                            <x-input-label for="kupon" value="Kupon" />
                            {{-- Text input kupon --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="kupon" name="kupon" type="text" class="mt-1 block w-full" :value="$event->kupon ?? old('kupon')" required autofocus />
                            {{-- Input error guna menampilkan error pada field kupon --}}
                            <x-input-error class="mt-2" :messages="$errors->get('kupon')" />
                        </div>
                        
                        {{-- Menampilkan form gambar --}}
                        <div>
                            {{-- Label Gambar --}}
                            <x-input-label for="gambar" value="Gambar" />
                            {{-- Button untuk memilih gambar --}}
                            <label class="block mt-2">
                                <span class="sr-only">Pilih Gambar</span>
                                <input type="file" id="gambar" name="gambar" class="block w-full text-sm text-shargae-500
                                    file:mx-4 file:py-2 file:px-4
                                    file:rounded-bl file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            {{-- Menampilkan gambar preview dengan source dari gambar yang dipilih oleh user tadi atau menggunakan gambar dari storage --}}
                            <div class="shrink-0 my-2">
                                <img id="gambar_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($event) ? Storage::url($event->gambar) : '' }}" alt="Gambar preview" />
                            </div>
                            {{-- Input error guna menampilkan error pada field gambar --}}
                            <x-input-error class="mt-2" :messages="$errors->get('gambar')" />
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
    {{-- Script ini berguna untuk menampilkan perubahan gambar yang terjadi --}}
    <script>
        // Membuat event onchange listener untuk menangkap perubahan gambar
        document.getElementById('gambar').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // Apabila terdapat gambar, maka akan secara otomatis menampilkan gambar
                document.getElementById('gambar_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
