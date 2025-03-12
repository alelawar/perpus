<x-layout>

    <div class="flex mb-5">

        {{-- img strt --}}
        <div class="">
            @if ($buku->cover)
            <div class="h-80 w-72 bg-gray-600 shadow-2xl">
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="">
            </div>
            @else
            <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg" alt="Cover">
            @endif
        </div>
        {{-- img end --}}

        <div class="ml-10 w-full">
            <h1 class="text-4xl font-semibold">{{ $buku->judul }}</h1>
            <h2 class="text-xl font-medium text-gray-600 mb-5 ">{{ $buku->penulis }}</h2>
            <h2 class="text-lg font-semibold text-justify mb-2">Kategori :             <a href="/category/{{ $buku->category->slug }}" class="text-base font-normal text-gray-600">{{ $buku->category->name }}</a >
            </h2>
            <h2 class="text-lg font-semibold text-justify">Deskripsi :</h2>
            <p class="text-base font-normal text-gray-600">{{ $buku->deskripsi }}</p>

            <div class="max-w-xl mt-5 mb-5">
                <h2 class="text-lg font-semibold mb-4">Detail Buku</h2>

                <div class="grid grid-cols-2 gap-y-4 text-gray-700">
                    <!-- Kolom Kiri -->
                    <div>
                        <p class="text-gray-500">Penerbit</p>
                        <p class="font-medium transition duration-500">{{ $buku->penerbit }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Tanggal Terbit</p>
                        <p class="font-medium">{{ $buku->tanggal_terbit }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">ISBN</p>
                        <p class="font-medium">{{ $buku->isbn }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Halaman</p>
                        <p class="font-medium">{{ $buku->halaman }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Bahasa
                        <p class="font-medium">{{ $buku->bahasa }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Panjang</p>
                        <p class="font-medium">{{ $buku->panjang }} cm</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Lebar</p>
                        <p class="font-medium">{{ $buku->lebar }} cm</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Berat</p>
                        <p class="font-medium">{{ $buku->berat }} kg</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="sticky bottom-5 w-full p-2 bg-white shadow-lg rounded-xl flex items-center gap-4">
        {{-- img strt --}}
        <div class="">
            @if ($buku->cover)
            <div class="h-20 w-16 rounded-lg">
                <img src="{{ asset('storage/' . $buku->cover) }}" alt="" class="h-full rounded-lg">
            </div>
            @else
            <img src="{{ asset('/img/nocover.jpg') }}" class=" rounded-md h-20 w-16" alt="Cover">
            @endif
        </div>
        {{-- img end --}}

        <div class="flex-1">
            <h2 class="text-lg font-medium">{{ $buku->judul }}</h2>
            <h3 class="text-xs text-gray-600 mb-5 ">{{ $buku->penulis }}</h3>
        </div>

        <a href="/pinjam/{{ $buku->slug }}"
            class="bg-secondary text-white text-base font-semibold rounded-xl hover:bg-transparent hover:text-secondary hover:border-blue-300 border-2 hover:ring-1 transition duration-500 px-4 py-2 flex items-center">
            Pinjam
        </a >
    </div>


</x-layout>