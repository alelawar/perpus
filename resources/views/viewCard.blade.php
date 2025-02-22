<x-layout>

    <div class="flex mb-5">

        <div class="h-80 w-72 bg-gray-600 shadow-2xl"></div>

        <div class="ml-10 w-full">
            <h1 class="text-4xl font-semibold">Judul Buku Yang DiKlik</h1>
            <h2 class="text-xl font-medium text-gray-600 mb-5 ">Penulis Bukunya</h2>
            <h2 class="text-lg font-semibold text-justify">Deskripsi</h2>
            <p class="text-base font-normal text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque perspiciatis pariatur impedit molestiae quas temporibus adipisci eos unde sapiente culpa necessitatibus non voluptate placeat quis quo recusandae, odio ipsam repudiandae dolore laudantium alias veritatis aperiam. Necessitatibus ipsa voluptatum accusamus atque id architecto nisi sed numquam repellat beatae, reiciendis neque accusantium quia fugiat tempore quas minima? Omnis velit minus earum rem molestias numquam hic, vel nisi aliquam sed repellendus laudantium aperiam, doloremque officia id nesciunt quaerat, ipsam delectus magnam. At quis dolores, explicabo beatae laboriosam natus ipsam suscipit vero quidem distinctio iste, iure quaerat tempora cum inventore dolorum excepturi Iste.</p>

            <div class="max-w-xl mt-5 mb-5">
                <h2 class="text-lg font-semibold mb-4">Detail Buku</h2>

                <div class="grid grid-cols-2 gap-y-4 text-gray-700">
                    <!-- Kolom Kiri -->
                    <div>
                        <p class="text-gray-500">Penerbit</p>
                        <p class="font-medium hover:underline hover:text-blue-500 transition duration-500"><a href="#">Perpus SMK Infokom</a></p>
                    </div>
                    <div>
                        <p class="text-gray-500">Tanggal Terbit</p>
                        <p class="font-medium">19 Feb 2025</p>
                    </div>
                    <div>
                        <p class="text-gray-500">ISBN</p>
                        <p class="font-medium">1234567891011</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Halaman</p>
                        <p class="font-medium">200</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Bahasa
                        <p class="font-medium">Indonesia</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Panjang</p>
                        <p class="font-medium">20.0 cm</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Lebar</p>
                        <p class="font-medium">13.0 cm</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Berat</p>
                        <p class="font-medium">0.16 kg</p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="sticky bottom-5 w-full p-2 bg-white shadow-lg rounded-xl flex items-center gap-4">
        <div class="h-20 w-16 bg-gray-600 rounded-lg"></div>

        <div class="flex-1">
            <h2 class="text-lg font-medium">Judul Buku Yang DiKlik</h2>
            <h3 class="text-xs text-gray-600 mb-5 ">Penulis Bukunya</h3>
        </div>

        <button class="bg-skunder-color text-white text-base font-semibold rounded-xl hover:bg-transparent hover:text-skunder-color hover:border-blue-300 border-2 hover:ring-1 transition duration-500 px-4 py-2 flex items-center">
            Pinjam
        </button>
    </div>


</x-layout>