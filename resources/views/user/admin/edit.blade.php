<x-sidebar>

    <form action="/dashboard/{{ $book->slug }}" method="POST" class="flex" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="oldCover" value="{{ $book->cover }}">

        {{-- Cover Image --}}
        <div x-data="{ preview: '' }">
            <input type="file" name="cover" id="cover"
                @change="preview = URL.createObjectURL($event.target.files[0])" class="mb-5">

            <template x-if="preview">
                <img :src="preview" alt="Preview" class="shadow-md rounded-lg hover:shadow-xl max-w-[40vh]">
            </template>

            <template x-if="!preview">
                @if ($book->cover ?? false)
                    <img src="{{ asset('storage/' . $book->cover) }}" class="shadow-md rounded-lg hover:shadow-xl max-w-[40vh]"
                        alt="Cover">
                @else
                    <img src="{{ asset('/img/createCover.png') }}" class="shadow-md rounded-lg hover:shadow-xl max-w-[40vh]"
                        alt="Cover">
                    <p class="text-red-600 text-sm mt-2">*Buku Tidak memiliki cover</p>
                @endif
            </template>

            @error('cover')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="ml-10 w-full">
            <h1 class="text-4xl font-semibold mb-2">Tambah Buku</h1>

            {{-- Judul --}}
            <div class="mb-4">
                <label for="judul" class="text-lg font-semibold">Judul Buku:</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $book->judul ?? '') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('judul')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <input type="text" readonly id="slug" name="slug" value="{{ old('slug', $book->slug ?? '') }}">

            {{-- Penulis --}}
            <div class="mb-5">
                <label for="penulis" class="text-xl font-medium">Penulis:</label>
                <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $book->penulis ?? '') }}"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('penulis')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-5">
                <label for="category_id" class="text-xl font-medium">Category:</label>
                <select id="category_id" name="category_id"
                    class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                    <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>Pilih Kategori</option>
                    @foreach ($categories as $c)
                        <option value="{{ $c->id }}"
                            {{ old('category_id', $book->category_id ?? '') == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <h2 class="text-lg font-semibold">Deskripsi :</h2>
                <textarea id="deskripsi" name="deskripsi" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    rows="4">{{ old('deskripsi', $book->deskripsi ?? '') }}</textarea>
                @error('deskripsi')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Detail Buku --}}
            <div class="max-w-xl mt-5 mb-5">
                <h2 class="text-lg font-semibold mb-4">Detail Buku</h2>

                <div class="grid grid-cols-2 gap-y-4 gap-x-8 text-gray-700">
                    <div>
                        <p class="text-gray-500">Penerbit</p>
                        <input type="text" name="penerbit" value="{{ old('penerbit', $book->penerbit ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('penerbit')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-500">Tanggal Terbit</p>
                        <input type="date" name="tanggal_terbit"
                            value="{{ old('tanggal_terbit', $book->tanggal_terbit ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('tanggal_terbit')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-500">ISBN</p>
                        <input type="text" name="isbn" value="{{ old('isbn', $book->isbn ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('isbn')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-500">Halaman</p>
                        <input type="number" name="halaman" value="{{ old('halaman', $book->halaman ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('halaman')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-500">Bahasa</p>
                        <input type="text" name="bahasa" value="{{ old('bahasa', $book->bahasa ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('bahasa')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-500">Panjang (cm)</p>
                        <input type="number" name="panjang" value="{{ old('panjang', $book->panjang ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('panjang')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-500">Lebar (cm)</p>
                        <input type="number" name="lebar" value="{{ old('lebar', $book->lebar ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('lebar')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <p class="text-gray-500">Berat (kg)</p>
                        <input type="number" step="0.01" name="berat"
                            value="{{ old('berat', $book->berat ?? '') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        @error('berat')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
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
