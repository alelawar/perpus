<x-sidebar>

  <div class="flex h-screen">
    <!-- Main Content -->
    <div class="flex-1 px-6">
      <header class="flex items-center justify-between">
        <h2 class="text-2xl font-medium mt-2">Wishlist | {{ auth()->user()->fullname }}</h2>
        <a href="admin/create"
          class="bottom-4 bg-secondary text-white font-medium p-2 rounded-lg shadow-xl cursor-pointer mt-2 hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">
          <i class="bi bi-plus-square"></i>
          Tambah
        </a>
      </header>

      <main class="mt-6">
        <div class="flex flex-col space-y-3">

          <div class="flex flex-row justify-between w-full h-20 bg-tertiary p-1 rounded-xl">
            <div class="flex">
              <!-- img start -->
              <div class="h-full w-12 bg-slate-100 rounded-lg">
                <img src="{{ asset('/img/nocover.jpg') }}" alt="Cover">
              </div>
              <!-- img end -->

              <div class="ml-2">
                <p class="text-lg text-gray-700 font-medium">Judul Buku</p>
                <p class="text-gray-500">Penerbit Buku</p>
              </div>
            </div>

            <div class="flex justify-center items-center space-x-4 mx-6">
              <i class="bi bi-trash3 text-red-600 text-2xl hover:text-red-700"></i>
              <button type="button"
                x-data="{ show: false }"
                x-on:click="show = !show"
                class="text-red-500 text-2xl">

                <i x-show="!show" class="bi bi-eye"></i>
                <i x-show="show" class="bi bi-eye-slash"></i>
              </button>

              <i class="bi bi-pencil-square hover:text-gray-700 text-2xl"></i>
            </div>
          </div>
          <!-- (a keong)empty
                    <p class="text-gray-500 text-center">Tidak ada data yang tersimpan.</p> -->

        </div>
      </main>

    </div>
  </div>
</x-sidebar>