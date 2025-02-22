<x-layout>

    <div class="flex flex-col shadow-lg rounded-2xl overflow-hidden p-5 bg-tersier-color">
        <h1 class="font-semibold text-lg relative w-fit after:content-[''] after:block after:w-1/4 after:h-0.5 after:bg-skunder-color">Apa Buku Yang Anda Ingin Usulkan</h1>

        <div>
            <form class="space-y-4 mt-5">

                <div class="">
                    <!-- Kolom Kiri -->
                    <div class="space-y-4">
                        <div class="relative rounded-lg">
                            <label class="block text-gray-700 text-sm font-medium mb-1">Judul Buku</label>
                            <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Judul" type="text" />
                        </div>

                        <div class="relative rounded-lg">
                            <label class="block text-gray-700 text-sm font-medium mb-1">Jenis Buku</label>
                            <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Jenis" type="text" />
                        </div>

                        <div class="relative rounded-lg">
                            <label class="block text-gray-700 text-sm font-medium mb-1">Nama Penerbit</label>
                            <input class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-skunder-color" placeholder="Masukan Penerbit" type="text" />
                        </div>
                    </div>

                </div>

                <button class="w-1/4 py-4 block mx-auto bg-skunder-color text-white text-lg font-bold rounded-lg hover:bg-transparent hover:text-skunder-color hover:border-blue-300 border-2 focus:ring focus:ring-blue-300 transition duration-500" type="submit">
                    Kirim
                </button>
            </form>
        </div>
    </div>

</x-layout>