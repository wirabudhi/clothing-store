<x-app-layout>
    {{-- Mendefinisikan Header --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- Menentukan apakah form ini digunakan untuk edit outlet atau tambah outlet --}}
            {{ isset($outlet) ? 'Edit Outlet' : 'Tambah Outlet' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <div class="map" id="map"></div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Membuat form dengan method POST untuk mengirim data --}}
                    {{-- Pada action akan dicek apakah form ini digunakan untuk menambah data baru atau mengupdate data yang sudah ada --}}
                    {{-- Enctype berfungsi untuk menerima data berupa file --}}
                    <form method="post" action="{{ isset($outlet) ? route('outlet.update', $outlet->id) : route('outlet.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        {{-- Token security --}}
                        @csrf
                        {{-- Melakukan overiding terhadap method POST menjadi method PUT apabila form ini digunakan untuk edit --}}
                        @isset($outlet)
                            @method('put')
                        @endisset
                        

                        {{-- Menampilkan form nama_outlet --}}
                        <div>
                            {{-- Label Nama_outlet --}}
                            <x-input-label for="nama_outlet" value="Nama Outlet" />
                            {{-- Text input nama_outlet --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="nama_outlet" name="nama_outlet" type="text" class="mt-1 block w-full" :value="$outlet->nama_outlet ?? old('nama_outlet')" required autofocus />
                            {{-- Input error guna menampilkan error pada field nama_outlet --}}
                            <x-input-error class="mt-2" :messages="$errors->get('nama_outlet')" />
                        </div>

                        {{-- Menampilkan form alamat --}}
                        <div>
                            {{-- Label Alamat --}}
                            <x-input-label for="alamat" value="Alamat" />
                            {{-- Text input alamat --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="$outlet->alamat ?? old('alamat')" required autofocus />
                            {{-- Input error guna menampilkan error pada field alamat --}}
                            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                        </div>
                        
                        {{-- Menampilkan form lat --}}
                        <div>
                            {{-- Label Lat --}}
                            <x-input-label for="lat" value="Lat" />
                            {{-- Text input lat --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="lat" name="lat" type="text" class="mt-1 block w-full" :value="$outlet->lat ?? old('lat')" required autofocus />
                            {{-- Input error guna menampilkan error pada field lat --}}
                            <x-input-error class="mt-2" :messages="$errors->get('lat')" />
                        </div>
                        
                        {{-- Menampilkan form lon --}}
                        <div>
                            {{-- Label Lon --}}
                            <x-input-label for="lon" value="Lon" />
                            {{-- Text input lon --}}
                            {{-- Berisi :value guna mengecek apakah field ini menambahkan value baru atau menggunakan value lama --}}
                            <x-text-input id="lon" name="lon" type="text" class="mt-1 block w-full" :value="$outlet->lon ?? old('lon')" required autofocus />
                            {{-- Input error guna menampilkan error pada field lon --}}
                            <x-input-error class="mt-2" :messages="$errors->get('lon')" />
                        </div>
                        
                        {{-- Menampilkan form gambar --}}
                        <div>
                            {{-- Label Gambar --}}
                            <x-input-label for="gambar" value="Gambar" />
                            {{-- Button untuk memilih gambar --}}
                            <label class="block mt-2">
                                <span class="sr-only">Pilih Gambar</span>
                                <input type="file" id="gambar" name="gambar" class="block w-full text-sm text-slate-500
                                    file:mx-4 file:py-2 file:px-4
                                    file:rounded-bl file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                            </label>
                            {{-- Menampilkan gambar preview dengan source dari gambar yang dipilih oleh user tadi atau menggunakan gambar dari storage --}}
                            <div class="shrink-0 my-2">
                                <img id="gambar_preview" class="h-64 w-128 object-cover rounded-md" src="{{ isset($outlet) ? Storage::url($outlet->gambar) : '' }}" alt="Gambar preview" />
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

        var map = L.map('map').setView([-8.711878479696912, 115.18377128873612], 12)

        L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        }).addTo(map);

        var markerIcon = L.icon({
            iconUrl: "./public/marker.png",
            iconSize: [40, 40],
            popupAnchor: [0, -40],
        });

        var marker;

        var latitude = document.getElementById("lat");
        var longitude = document.getElementById("lon");
        function onMapClick(e) {
            marker = new L.marker(e.latlng).addTo(map);
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;

            if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
            } else {
            marker.setLatLng(e.latlng);
            }

            latitude.value = lat;
            longitude.value = lng;
        }

        map.on("click", onMapClick);
    </script>
</x-app-layout>
