<x-sidebar>

  <div class="mb-3">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-tertiary rounded-lg p-2 md:col-span-2">
        <h2 class="text-2xl font-semibold mb-4">
          Your Details Matter!
        </h2>
        <form>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-sm font-medium text-gray-700" for="first-name">
                Nama Lengkap
              </label>
              <input class="mt-1 block w-full border p-2 rounded-md outline-none" id="first-name" type="text" value="{{ auth()->user()->fullname }}" readonly/>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700" for="last-name">
                Username
              </label>
              <input class="mt-1 block w-full border p-2 rounded-md outline-none" id="last-name" type="text" value="{{ auth()->user()->username }}" readonly/>
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
              Email
            </label>
            <input class="mt-1 block w-full border border-gray-300 p-2 rounded-md outline-none" type="email" value="{{ auth()->user()->email }}" readonly/>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
              No Tlp
            </label>
            <input class="mt-1 block w-full border border-gray-300 p-2 rounded-md outline-none" type="email" value="{{ auth()->user()->telepon }}" readonly/>
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">
              Alamat
            </label>
            <textarea class="mt-1 block w-full border border-gray-300 p-2 rounded-md outline-none" readonly>{{ auth()->user()->alamat }}</textarea>
          </div>

          <button class="bg-secondary text-white text-base font-semibold rounded-xl hover:bg-transparent hover:text-secondary hover:border-blue-300 border-2 hover:ring-1 transition duration-500 w-full py-2 flex justify-center items-center">
            Konfirmasi
          </button>
        </form>
      </div>

      <div>
        <div class="bg-tertiary p-1 rounded-md shadow-md">
          <h3 class="text-lg font-semibold mb-4">
            Order Details
          </h3>

          <!-- Bukunya -->
          <div class="bg-white rounded-lg p-2 mx-2 mb-2 flex flex-col justify-between h-full relative shadow-md transition duration-300">
                    <img src="{{ asset('/img/nocover.jpg') }}" class="shadow-xl rounded-lg mb-3" alt="Cover">
                    <div class="text-left mb-7">
                        <p class="text-lg font-bold -mb-1">Judul</p>
                        <p class="text-sm text-gray-700 mb-2">Penulis</p>
                    </div>
                </div>
        </div>
      </div>
    </div>
  </div>

</x-sidebar>