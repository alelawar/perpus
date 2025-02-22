<x-layout>
    
    <!-- Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10 mx-5 mt-10">
            @forelse ($books as $book)
            <div class="bg-white rounded-lg shadow-lg p-2 flex flex-col justify-between h-full relative">
                @if ($book->cover)
                <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg mb-3" alt="Cover">
                @else
                <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg mb-3" alt="Cover">
                @endif
                <div class="text-left mb-7">
                    <h2 class="text-lg font-bold -mb-1">{{ $book->judul }}</h2>
                    <p class="text-sm text-gray-700 mb-2">{{ $book->penulis }}</p>
                </div>
                <!-- Wishlist Button -->
                <button @click="wishlist = !wishlist" x-data="{ wishlist: false }"
                    class="text-red-500 text-2xl absolute bottom-2 right-2">
                    <span x-show="!wishlist"><i class="bi bi-heart"></i></span>
                    <span x-show="wishlist"><i class="bi bi-heart-fill"></i></span>
                </button>
            </div>
            @empty
            @endforelse
        </div>
        <!-- End Card -->

</x-layout>