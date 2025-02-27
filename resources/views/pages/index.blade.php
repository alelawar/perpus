<x-layout>
    @if (session('status'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
            <div class="bg-primer-color  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
                <i class="bi bi-check2"></i> {{ session('status') }}
            </div>
        </div>
    @endif
    <div>
        <!-- Slider -->
        <div class="max-w-full mx-auto mt-5 ">

            <div id="default-carousel" class="relative" data-carousel="static">
                <!-- Carousel wrapper -->
                <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <span
                            class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
                            Slide</span>
                        <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg"
                            class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2"
                            alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>
            <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>
        </div>
        <!-- End Slider -->

        {{-- paginate --}}
        <div class="my-5">
            {{ $books->links() }}
        </div>
        {{-- end paginate --}}

        <!-- Card -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10 mx-5 mt-10">
            @forelse ($books as $book)
                {{-- DISINI GW UBAH JADI A KALO CARDNYA DI PENCET NNTI BAKALAN KE VIEW DETAIL --}}
                {{-- TAMBAHIN HOVER DI CARD A NYA!!! --}}
                <div class="bg-white rounded-lg shadow-lg p-2 flex flex-col justify-between h-full relative">
                    @if ($book->cover)
                        <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg mb-3" alt="Cover">
                    @else
                        <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg mb-3" alt="Cover">
                    @endif
                    <div class="text-left mb-7">
                        <a href="view/{{ $book->slug }}" class="text-lg font-bold -mb-1">{{ $book->judul }}</a>
                        <p class="text-sm text-gray-700 mb-2">{{ $book->penulis }}</p>
                    </div>
                    <!-- Wishlist Button -->
                    @auth
                        @php
                            $isFavorited = auth()->user()->favorites()->where('book_id', $book->id)->exists();
                        @endphp

                        <form action="{{ route('favorites.toggle') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="text-red-500 text-2xl absolute bottom-2 right-2">
                                @if ($isFavorited)
                                    <i class="bi bi-heart-fill"></i>
                                @else
                                    <i class="bi bi-heart"></i>
                                @endif
                            </button>
                        </form>
                    @endauth



                </div>
            @empty
            @endforelse
        </div>
        <!-- End Card -->

        {{-- paginate --}}
        <div class="my-5">
            {{ $books->links() }}
        </div>
        {{-- end paginate --}}
    </div>

</x-layout>
