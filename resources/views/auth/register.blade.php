<x-html>

  <div class="flex  items-center justify-center min-h-screen mx-auto">
    <div class="flex flex-col w-[1000px] h-[580px] shadow-lg rounded-2xl overflow-hidden p-5 bg-tersier-color">
      <h1 class="font-semibold text-lg relative w-fit after:content-[''] after:block after:w-1/4 after:h-0.5 after:bg-skunder-color">Registration</h1>

      <div>
        <form class="space-y-4 mt-5">

          <div class="grid grid-cols-2 gap-4">
            <!-- Kolom Kiri -->
            <div class="space-y-4">
              <div class="relative rounded-lg">
                <label class="block text-gray-700 text-sm font-medium mb-1">Nama Lengkap</label>
                <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Nama" type="text" />
              </div>

              <div class="relative rounded-lg">
                <label class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Email" type="text" />
              </div>

              <div class="relative rounded-lg">
                <label class="block text-gray-700 text-sm font-medium mb-1">Kata Sandi</label>
                <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Kata Sandi" type="password" />
              </div>
            </div>

            <!-- Kolom Kanan -->
            <div class="space-y-4">
              <div class="relative rounded-lg">
                <label class="block text-gray-700 text-sm font-medium mb-1">Username</label>
                <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Username" type="text" />
              </div>

              <div class="relative rounded-lg">
                <label class="block text-gray-700 text-sm font-medium mb-1">No Tlp</label>
                <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Nomer Telp" type="text" />
              </div>

              <div class="relative rounded-lg">
                <label class="block text-gray-700 text-sm font-medium mb-1">Konfirmasi Kata Sandi</label>
                <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Konfirmasi Kata Sandi Anda" type="password" />
              </div>
            </div>
          </div>
          
          <!-- Alamat -->
          <div class="w-full">
            <div class="relative rounded-lg">
              <label class="block text-gray-700 text-sm font-medium mb-1">Alamat Lengkap</label>
              <textarea class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Alamat Lengkap" type="text"></textarea>
            </div>
          </div>


          <div class="flex items-center justify-between">
            <label class="flex items-center">
              <input class="form-checkbox text-skunder-color" type="checkbox" />
              <span class="ml-2 text-gray-700">Saya menerima semua syarat & ketentuan</span>
            </label>
            <p class="text-center text-sm mt-5">
              Sudah memiliki akun? <a class="text-blue-600 hover:underline" href="#">Masuk</a>
            </p>
          </div>

          <button class="w-1/4 py-2 block mx-auto bg-skunder-color text-white text-lg font-bold rounded-lg hover:bg-transparent hover:text-skunder-color hover:border-blue-300 border-2 focus:ring focus:ring-blue-300 transition duration-500" type="submit">
            Daftar
          </button>
        </form>
      </div>

    </div>
  </div>



</x-html>