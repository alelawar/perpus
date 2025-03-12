<x-sidebar>
    @if (session('status'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show"
        class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
        <div class="bg-green-500  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2"></i> {{ session('status') }}
        </div>
    </div>
    @endif
    <div class="flex h-screen">
        <!-- Main Content -->
        <div class="flex-1 px-6">
            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-medium -mt-6">Wishlist | {{ auth()->user()->fullname }}</h2>
            </header>

            <main class="mt-6">
                <div class="flex flex-col space-y-3">
                    @forelse ($favorites as $f)
                    <a href="/view/{{ $f->book->slug }}" class="w-full">
                    <div class="flex flex-row justify-between w-full h-20 bg-tertiary p-1 rounded-xl">
                        <div class="flex">
                            <!-- img start -->
                            @if ($f->book->cover)
                            <div class="h-full w-12 bg-slate-100 rounded-lg">
                                <img src="{{ asset('storage/' . $f->book->cover) }}" alt="Cover" class="rounded-lg">
                            </div>
                            @else
                            <div class="h-full w-12 bg-slate-100 rounded-lg">
                                <img src="{{ asset('/img/nocover.jpg') }}" alt="Cover" class="rounded-lg">
                            </div>
                            @endif
                            <!-- img end -->

                            <div class="ml-2">
                                <p class="text-lg text-gray-700 font-medium">{{ $f->book->judul }}</p>
                                <p class="text-gray-500">{{ $f->book->penulis }}</p>
                            </div>
                        </div>

                        <div class="flex justify-center items-center space-x-4">
                            {{-- button fav start --}}
                            @php
                            $isFavorited = auth()->user()->favorites()->where('book_id', $f->book->id)->exists();
                            @endphp
                            <form action="{{ route('favorites.toggle') }}" method="POST">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $f->book->id }}">
                                <button type="submit" class="text-red-500 text-2xl">
                                    @if ($isFavorited)
                                    <i class="bi bi-trash3 text-red-600 text-2xl hover:text-red-700"></i>
                                    @else
                                    <i class="bi bi-trash3 text-red-600 text-2xl hover:text-red-700"></i>
                                    @endif
                                </button>
                            </form>
                            {{-- button fav end --}}
                            <a href="/pinjam/{{ $f->book->slug }}"
                                class="bg-secondary text-white text-sm font-medium rounded-xl hover:bg-transparent hover:text-secondary hover:border-blue-300 border-2 hover:ring-1 transition duration-500 px-4 py-2 flex items-center">
                                Pinjam
</a>
                        </div>
                    </div>
                    </a>
                    @empty
                    <p class="text-gray-500 text-center">Tidak ada wishlist yang tersimpan.</p>
                    @endforelse
                </div>
            </main>

        </div>
    </div>
</x-sidebar>