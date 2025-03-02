<x-layout>
  @if (session('status'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
    class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
    <div class="bg-secondary  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
      <i class="bi bi-check2"></i> {{ session('status') }}
    </div>
  </div>
  @endif
  <main>

    {{-- paginate --}}
    <div class="my-5">
      {{ $books->links() }}
    </div>
    {{-- end paginate --}}

    <!-- Card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-10 mx-5 mt-10 ">
      @forelse ($books as $book)
      <a href="view/{{ $book->slug }}">
        <div class="bg-white rounded-lg p-2 flex flex-col justify-between h-full relative shadow-md hover:shadow-2xl transition duration-300">
          @if ($book->cover)
          <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg mb-3" alt="Cover">
          @else
          <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg mb-3" alt="Cover">
          @endif
          <div class="text-left mb-7">
            <p class="text-lg font-bold -mb-1">{{ $book->judul }}</p>
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
      </a>
      @empty
      @endforelse
    </div>
    <!-- End Card -->

    {{-- paginate --}}
    <div class="my-5">
      {{ $books->links() }}
    </div>
    {{-- end paginate --}}
  </main>

</x-layout>