<x-sidebar>

  <div class="w-full p-4 space-y-1">

    <!-- Atas -->
    <header class="flex gap-4 items-center h-full mb-2">
      <a href="/user/pinjaman"><i class="bi bi-arrow-left hover:text-red-600 text-2xl"></i></a>
      <h1 class="text-xl font-semibold">Pinjaman | auth()->user()->fullname</h1>
    </header>
    <div class="bg-tertiary px-4 py-2 rounded-t-lg">

      <div class="justify-between">
        <h1 class="text-lg font-medium">Detail Buku</h1>
        <div class="flex justify-between mt-2">
          <!-- Buku -->
          <div class="flex">
            <!-- img start -->
            <div class="h-full w-20 bg-slate-100 rounded-lg">
              <img src="{{ asset('/img/nocover.jpg') }}" alt="Cover" class="rounded-lg shadow-md">
            </div>
            <!-- img end -->
            <div class="ml-4 flex flex-col justify-between">
              <div>
                <p class="text-lg font-medium">$f->book->judul</p>
                <p class="text-gray-500">$f->book->penulis</p>
              </div>
              <div class="flex gap-2">
                <i class="bi bi-share bg-white pt-1.5 px-2 rounded-lg shadow-md"></i>
                <div class="bg-white text-green-500 border-2 border-green-500 rounded-lg p-2 py-1 ">2:23:59:59</div>
              </div>
            </div>
          </div>

          <div>
            <a href="">Lihat Buku ></a>
          </div>
        </div>

      </div>
    </div>

    <!-- Tengah -->
    <div class="bg-tertiary w-full p-4 flex justify-between">
      <div class="w-full">
        <div class="flex">
          <img src="{{ asset('img/favicon.png') }}" alt="logos" class="h-10 w-10">
          <p class="text-xl my-auto ml-2 text-gray-600">|</p>
          <p class="font-semibold my-auto ml-2">SMK Infokom Library</p>
        </div>
        <div class="w-full flex justify-between">
          <div>
            <p class="text-base mt-6 text-gray-700">Token Pengembalian Buku</p>
            <p class="text-red-500 font-semibold text-xl">PRPSSMKINFKMBGR0001</p>
          </div>
          <div class="flex items-end">
            <button class="bg-secondary text-white font-medium px-4 py-1 rounded-lg shadow-xl cursor-pointer hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">Salin</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Bawah -->
    <div class="bg-tertiary p-4 rounded-b-lg">
      <h2 class="font-semibold">Petunjuk Pengembalian</h2>
      <ol class="list-decimal list-inside mt-2 text-sm text-gray-700 font-medium">
        <li>Datangi perpustakaan SMK Infokom, dan temui perpustakawan.</li>
        <li>Sampaikan kepada perpustakawan ingin mengembalikan buku online.</li>
        <li>Tunjukan Token pengembalian kepada perpustakawan.</li>
        <li>Setelah token valid, kamu akan disuruh memberikan buku yang dipinjam.</li>
        <li>Pengembalian kamu akan terverifikasi di web.</li>
      </ol>
    </div>

  </div>

</x-sidebar>