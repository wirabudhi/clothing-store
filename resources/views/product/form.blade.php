<x-app-layout>
    {{-- Mendefinisikan Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Menentukan apakah form ini digunakan untuk edit product atau tambah product --}}
            {{ isset($product) ? 'Edit Product' : 'Tambah Product' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Membuat form dengan method POST untuk mengirim data --}}
                    {{-- Pada action akan dicek apakah form ini digunakan untuk menambah data baru atau mengupdate data yang sudah ada --}}
                    {{-- Enctype berfungsi untuk menerima data berupa file --}}
                    <form method="post" action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        {{-- Token security --}}
                        @csrf
                        {{-- Melakukan overiding terhadap method POST menjadi method PUT apabila form ini digunakan untuk edit --}}
                        @isset($product)
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
                                    <option value="{{ $item->id }}" {{ isset($product) ? (($product->outlets_id == $item->id) ? 'selected' : '') : '' }}>{{ $item->nama_outlet }}</option>
                                @endforeach
                            </select>
                            {{-- Input error guna menampilkan error pada field outlets_id --}}
                            <x-input-error class="mt-2" :messages="$errors->get('outlets_id')" />
                        </div>

                        {{-- Menampilkan form nama_product --}}
                        <div>
                            {{-- Label Nama_product --}}
                            <x-input-label for="nama_product" value="Nama Product" />
                            {{-- Text input nama_product --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="nama_product" name="nama_product" type="text" class="mt-1 block w-full" :value="$product->nama_product ?? old('nama_product')" required autofocus />
                            {{-- Input error guna menampilkan error pada field nama_product --}}
                            <x-input-error class="mt-2" :messages="$errors->get('nama_product')" />
                        </div>

                        {{-- Menampilkan form jenis_product --}}
                        <div>
                            {{-- Label Jenis_product --}}
                            <x-input-label for="jenis_product" value="Jenis Product" />
                            {{-- Text input jenis_product --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="jenis_product" name="jenis_product" type="text" class="mt-1 block w-full" :value="$product->jenis_product ?? old('jenis_product')" required autofocus />
                            {{-- Input error guna menampilkan error pada field jenis_product --}}
                            <x-input-error class="mt-2" :messages="$errors->get('jenis_product')" />
                        </div>
                        
                        {{-- Menampilkan form harga --}}
                        <div>
                            {{-- Label Harga --}}
                            <x-input-label for="harga" value="Harga" />
                            {{-- Text input harga --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="harga" name="harga" type="text" class="mt-1 block w-full" :value="$product->harga ?? old('harga')" required autofocus />
                            {{-- Input error guna menampilkan error pada field harga --}}
                            <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                        </div>
                        
                        {{-- Menampilkan form deskripsi --}}
                        <div>
                            {{-- Label Deskripsi --}}
                            <x-input-label for="deskripsi" value="Deskripsi" />
                            {{-- Text input deskripsi --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="deskripsi" name="deskripsi" type="text" class="mt-1 block w-full" :value="$product->deskripsi ?? old('deskripsi')" required autofocus />
                            {{-- Input error guna menampilkan error pada field deskripsi --}}
                            <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                        </div>
                        
                        {{-- Menampilkan form ukuran --}}
                        <div>
                            {{-- Label Ukuran --}}
                            <x-input-label for="ukuran" value="Ukuran" />
                            {{-- Text input ukuran --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="ukuran" name="ukuran" type="text" class="mt-1 block w-full" :value="$product->ukuran ?? old('ukuran')" required autofocus />
                            {{-- Input error guna menampilkan error pada field ukuran --}}
                            <x-input-error class="mt-2" :messages="$errors->get('ukuran')" />
                        </div>
                        
                        {{-- Menampilkan form stok --}}
                        <div>
                            {{-- Label Stok --}}
                            <x-input-label for="" value="Stok" />
                            {{-- Text input stok --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="stok" name="stok" type="text" class="mt-1 block w-full" :value="$product->stok ?? old('stok')" required autofocus />
                            {{-- Input error guna menampilkan error pada field stok --}}
                            <x-input-error class="mt-2" :messages="$errors->get('stok')" />
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
                                <img id="gambar_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($product) ? Storage::url($product->gambar) : '' }}" alt="Gambar preview" />
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
