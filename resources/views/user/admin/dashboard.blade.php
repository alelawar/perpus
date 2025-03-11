<x-sidebar>
  @if (session('status'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 1000)" x-show="show"
      class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
      <div class="bg-secondary  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
          <i class="bi bi-check2"></i> {{ session('status') }}
      </div>
  </div>
  @endif
  @if (session('success'))
  <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
      class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
      <div class="bg-secondary  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
          <i class="bi bi-check2"></i> {{ session('success') }}
      </div>
  </div>
  @endif
  <div class="flex h-full">
    <!-- Main Content -->
    <div class="flex-1 px-6">
      <header class="flex items-center justify-between">
        <h2 class="text-2xl font-medium mt-2">Admin Page | {{ auth()->user()->fullname }}</h2>
        <a href="/dashboard/create"
          class="bottom-4 bg-secondary text-white font-medium p-2 rounded-lg shadow-xl cursor-pointer mt-2 hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">
          <i class="bi bi-plus-square"></i>
          Tambah
        </a>
      </header>

      <main class="mt-6">
        <div class="flex flex-col space-y-3">
          {{-- {{ $books->links() }} --}}
          <div class="w-3/4">
            <form action="/dashboard" method="GET">
              <input type="text" name="s" id="cari" placeholder="Cari berdasarkan judul..." class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </form>
          </div>
          @forelse ($books as $book )
          <div class="flex flex-row justify-between w-full h-20 bg-tertiary p-1 rounded-xl">
            <div class="flex">
              <!-- img start -->
              @if ($book->cover)
              <div class="h-full w-12 bg-slate-100 rounded-lg">
                <img src="{{ asset('storage/' . $book->cover) }}" alt="Cover">
              </div>
              @else
              <div class="h-full w-12 bg-slate-100 rounded-lg">
                <img src="{{ asset('/img/nocover.jpg') }}" alt="Cover">
              </div>
              @endif
              <!-- img end -->

              <div class="ml-2">
                <p class="text-lg text-gray-700 font-medium">{{ $book->judul }}</p>
                <p class="text-gray-500">{{ $book->penerbit }}</p>
              </div>
            </div>

            <div class="flex justify-center items-center space-x-4 mx-6">
              <form action="/dashboard/{{ $book->slug }}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit"><i class="bi bi-trash3 text-red-600 text-2xl hover:text-red-700"></i></button>
              </form>

              <a href="/dashboard/{{ $book->slug }}/edit"><i class="bi bi-pencil-square hover:text-gray-700 text-2xl"></i></a>
            </div>
          </div>
          @empty
          <p class="text-gray-500 text-center">Tidak ada data yang tersimpan.</p>
          @endforelse
          {{ $books->links() }}

        </div>
      </main>

    </div>
  </div>
</x-sidebar>
