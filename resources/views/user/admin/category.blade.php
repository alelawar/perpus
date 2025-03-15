<x-sidebar>
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show"
        class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
        <div class="bg-green-500  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2"></i> {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="space-y-4 mx-auto">
        {{-- FORM BUAT --}}
        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="flex justify-between gap-3">
                <div class="w-full">
                    {{-- CATEGORY --}}
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-700">
                            Category Baru
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        @error('slug')
                            <p class="mt-2 text-sm text-red-600">{{ $message }} // Masukan Kategori</p>
                        @enderror
                    </div>
                    {{-- SLUG --}}
                    <div class="mb-4">
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                            class="mt-1 block w-full h-10 rounded-md border-gray-300 bg-white shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm py-2 px-4 text-lg"
                            required readonly>
                        
                    </div>

                </div>
            </div>
    </div>
    {{-- SUBMIT --}}
    <div class="-mt-2">
        <button type="submit"
            class="px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Buat
        </button>
    </div>
    </form>
    {{-- END FORM --}}

    {{-- MAIN CATEGORY START --}}
    <main class="mt-4">
        <div class="flex flex-col space-y-3">
          {{-- {{ $books->links() }} --}}
          <h1 class="mt-2 mb-5 font-semibold text-xl">List category :</h1>
          @forelse ($categories as $cat )
          <div class="flex flex-row justify-between w-full h-20 bg-tertiary p-1 rounded-xl">
            <div class="flex">
              
              <div class="ml-2 my-auto">
                <p class="text-lg text-gray-700 font-medium">{{ $cat->name }}</p>
              </div>
            </div>

            <div class="flex justify-center items-center space-x-4 mx-6">
              <form action="/category/{{ $cat->slug }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"><i class="bi bi-trash3 text-red-600 text-2xl hover:text-red-700"></i></button>
              </form>
            </div>
          </div>
          @empty  
          <p class="text-gray-500 text-center">Masukan Kategori.</p>
          @endforelse
          {{-- {{ $books->links() }} --}}

        </div>
      </main>
    {{-- MAIN CATEGORY END --}}

    <script>
        const judul = document.querySelector('#name')
        const slug = document.querySelector('#slug')

        judul.addEventListener('change', function() {
            fetch('/category/books/checkSlug?judul=' + judul.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script>
</x-sidebar>
