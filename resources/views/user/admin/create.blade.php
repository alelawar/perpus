<x-sidebar>

  <form action="" method="POST" class="flex">

    {{-- img strt --}}
    <div class="">
      <img src="{{ asset('/img/createCover.png') }}" class="shadow-md rounded-lg hover:shadow-xl" alt="Cover">
    </div>
    {{-- img end --}}

    <div class="ml-10 w-full">
      @csrf
      <h1 class="text-4xl font-semibold mb-2">Tambah Buku</h1>

      <div class="mb-4">
        <label for="judul" class="text-lg font-semibold">Judul Buku:</label>
        <input type="text" id="judul" name="judul" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-5">
        <label for="penulis" class="text-xl font-medium">Penulis:</label>
        <input type="text" id="penulis" name="penulis" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-4">
        <h2 class="text-lg font-semibold">Deskripsi :</h2>
        <textarea id="deskripsi" name="deskripsi" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500" rows="4"></textarea>
      </div>

      <div class="max-w-xl mt-5 mb-5">
        <h2 class="text-lg font-semibold mb-4">Detail Buku</h2>

        <div class="grid grid-cols-2 gap-y-4 gap-x-8 text-gray-700">
          <div>
            <p class="text-gray-500">Penerbit</p>
            <input type="text" name="penerbit" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <p class="text-gray-500">Tanggal Terbit</p>
            <input type="date" name="tanggal_terbit" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <p class="text-gray-500">ISBN</p>
            <input type="text" name="isbn" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <p class="text-gray-500">Halaman</p>
            <input type="number" name="halaman" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <p class="text-gray-500">Bahasa</p>
            <input type="text" name="bahasa" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <p class="text-gray-500">Panjang (cm)</p>
            <input type="number" name="panjang" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <p class="text-gray-500">Lebar (cm)</p>
            <input type="number" name="lebar" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
          <div>
            <p class="text-gray-500">Berat (kg)</p>
            <input type="number" step="0.01" name="berat" class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
          </div>
        </div>
      </div>

      <button type="submit" class="bg-secondary shadow-lg w-full text-white font-semibold py-2 rounded-lg hover:bg-primary transition">Simpan Buku</button>
    </div>


</form>

</x-sidebar>