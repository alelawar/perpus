<x-sidebar>

    <form action="/dashboard" method="POST" class="flex" enctype="multipart/form-data">

        @csrf

        {{-- img strt --}}
        <div x-data="{ preview: '' }">
            <input type="file" name="cover" id="cover" required
                @change="preview = URL.createObjectURL($event.target.files[0])" class="mb-5">

            <template x-if="preview">
                <img :src="preview" alt="Preview" class="shadow-md rounded-lg hover:shadow-xl max-w-[50vh]">
            </template>

            <template x-if="!preview">
                <img src="{{ asset('/img/createCover.png') }}" class="shadow-md rounded-lg hover:shadow-xl  max-w-[50vh]"
                    alt="Cover">
            </template>

            @error('cover')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        {{-- img end --}}

        <div class="ml-10 w-full">
            <h1 class="text-4xl font-semibold mb-2">Tambah Buku</h1>

            <div class="mb-4">
                <label for="judul" class="text-lg font-semibold">Judul Buku:</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('judul')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <input type="hidden" id="slug" name="slug" value="{{ old('slug') }}">

            <div class="mb-5">
                <label for="penulis" class="text-xl font-medium">Penulis:</label>
                <input type="text" id="penulis" name="penulis" value="{{ old('penulis') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('penulis')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-5">
                <label for="category_id" class="text-xl font-medium">Category:</label>
                <select id="category_id" name="category_id"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    <option value="" disabled>Pilih Kategori</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}" {{ old('category_id') == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <h2 class="text-lg font-semibold">Deskripsi :</h2>
                <textarea id="deskripsi" name="deskripsi" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="max-w-xl mt-5 mb-5">
                <h2 class="text-lg font-semibold mb-4">Detail Buku</h2>

                <div class="grid grid-cols-2 gap-y-4 gap-x-8 text-gray-700">
                    @php
                        $fields = [
                            'penerbit',
                            'tanggal_terbit',
                            'isbn',
                            'halaman',
                            'bahasa',
                            'panjang',
                            'lebar',
                            'berat',
                        ];
                    @endphp

                    @foreach ($fields as $field)
                        <div>
                            <p class="text-gray-500">{{ ucfirst(str_replace('_', ' ', $field)) }}</p>
                            <input
                                type="{{ $field == 'tanggal_terbit' ? 'date' : ($field == 'berat' ? 'number step="0.01"' : 'text') }}"
                                name="{{ $field }}" value="{{ old($field) }}"
                                class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            @error($field)
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit"
                class="bg-secondary shadow-lg w-full text-white font-semibold py-2 rounded-lg hover:bg-primary transition">
                Simpan Buku
            </button>
        </div>
    </form>


    <script>
        const judul = document.querySelector('#judul')
        const slug = document.querySelector('#slug')

        judul.addEventListener('change', function() {
            fetch('/dashboard/books/checkSlug?judul=' + judul.value)
                .then(response => response.json()) // Ubah 'respone' menjadi 'response'
                .then(data => slug.value = data.slug);
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
</x-sidebar>
