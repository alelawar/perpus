<x-sidebar>
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
        <div class="bg-secondary  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2"></i> {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="w-fullspace-y-1 p-2 bg-slate-50  rounded-lg shadow-lg">
        <header class="flex gap-4 items-center mb-3">
            <a href="/user/pinjaman"><i class="bi bi-arrow-left hover:text-red-600 text-2xl"></i> <span class="text-xl font-semibold">Pengambilan</span></a>
           
        </header>
        <!-- Atas -->
        <div class="bg-tertiary p-4 rounded-t-lg">
            <div class="flex justify-between">
                <p class="text-base font-medium my-auto">Ambil Dalam</p>
                <div class="flex flex-col items-end mt-2">
                    <span class="text-red-500 text-lg font-semibold">23:59:59</span>
                    <span class="text-sm text-gray-700">Jatuh tempo {{ $pinjaman->tanggal_pengembalian }}</span>
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
                        <p class="text-base mt-6 text-gray-700">Token Pengambilan Buku</p>
                        <p class="text-red-500 font-semibold text-xl">{{ $pinjaman->token }}</p>
                    </div>
                    <div class="flex items-end">
                        <button class="bg-secondary text-white font-medium px-4 py-1 rounded-lg shadow-xl cursor-pointer hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">Salin</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bawah -->
        <div class="bg-tertiary p-4 rounded-b-lg">
            <h2 class="font-semibold">Petunjuk Pengambilan</h2>
            <ol class="list-decimal list-inside mt-2 text-sm text-gray-700 font-medium">
                <li>Datangi perpustakaan SMK Infokom, dan temui perpustakawan.</li>
                <li>Sampaikan kepada perpustakawan ingin mengambil buku online.</li>
                <li>Tunjukan Token pengambilan kepada perpustakawan.</li>
                <li>Setelah token valid, kamu akan diberikan buku yang kamu inginkan.</li>
                <li>Pengambilan kamu akan terverifikasi di web, kembalikan sesuai jadwal yang ditunjukkan.</li>
            </ol>
        </div>
    </div>

</x-sidebar>