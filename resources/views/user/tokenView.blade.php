<x-sidebar>
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
        <div class="bg-green-500  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2"></i> {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="w-full p-2 bg-slate-50  rounded-lg shadow-lg">
        <header class="flex gap-4 items-center mb-3">
            @if($pinjaman->status != 'telah diambil' )
            <a href="/user/pinjaman"><i class="bi bi-arrow-left hover:text-red-600 text-2xl"></i> <span class="text-xl font-semibold">Pengambilan</span></a>
            @else
            <a href="/user/pinjaman"><i class="bi bi-arrow-left hover:text-red-600 text-2xl"></i> <span class="text-xl font-semibold">Pengambilan</span></a>
            @endif
        </header>
        <div class="flex flex-col gap-y-1">
            <!-- Atas -->
            <div class="bg-tertiary p-4 rounded-t-lg">
                <div class="flex justify-between">
                    @if($pinjaman->status != 'telah diambil')
                    <p class="text-base font-medium my-auto">Ambil Dalam</p>
                    <div class="flex flex-col items-end mt-2">
                        <span class="text-red-500 text-lg font-semibold">23:59:59</span>
                        <span class="text-sm text-gray-700">Jatuh tempo {{ \Carbon\Carbon::parse($pinjaman->tanggal_pengembalian)->format('d F Y') }}</span>
                    </div>
                    @else
                    <p class="text-base font-medium my-auto">Kembalikan Pada Tanggal</p>
                    <div
                        x-data="{ 
                    isLate: new Date('{{ \Carbon\Carbon::parse($pinjaman->tanggal_pengembalian)->format('Y-m-d') }}') <= new Date().setHours(0,0,0,0)
                }"
                        class="flex gap-2">
                        <div
                            class="bg-white rounded-lg p-2 py-1 border-2"
                            :class="isLate ? 'border-red-500 text-red-500' : 'border-green-500 text-green-500'">
                            {{ \Carbon\Carbon::parse($pinjaman->tanggal_pengembalian)->format('d F Y') }}
                        </div>
                    </div>
                    @endif
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
                    <div class="w-full flex justify-between" x-data="{ copied: false }">
                        <div>
                            @if($pinjaman->status != 'telah diambil' )
                            <p class="text-base mt-6 text-gray-700">Token Pengambilan Buku</p>
                            @else
                            <p class="text-base mt-6 text-gray-700">Token Pengembalian Buku</p>
                            @endif
                            <p class="text-red-500 font-semibold text-xl" id="token">{{ $pinjaman->token }}</p>
                        </div>
                        <div class="flex items-end">
                            <button
                                @click="navigator.clipboard.writeText('{{ $pinjaman->token }}').then(() => { copied = true; setTimeout(() => copied = false, 2000) })"
                                class="bg-secondary text-white font-medium px-4 py-1 rounded-lg shadow-xl cursor-pointer hover:bg-transparent hover:text-secondary hover:ring-2 transition duration-500 text-center">
                                <span x-show="!copied">Salin</span>
                                <span x-show="copied">✅ Disalin!</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Bawah -->
            <div class="bg-tertiary p-4 rounded-b-lg">
                @if($pinjaman->status != 'telah diambil' )
                <h2 class="font-semibold">Petunjuk Pengambilan</h2>
                <ol class="list-decimal list-inside mt-2 text-sm text-gray-700 font-medium">
                    <li>Datangi perpustakaan SMK Infokom, dan temui perpustakawan.</li>
                    <li>Sampaikan kepada perpustakawan ingin mengambil buku online.</li>
                    <li>Tunjukan Token pengambilan kepada perpustakawan.</li>
                    <li>Setelah token valid, kamu akan diberikan buku yang kamu inginkan.</li>
                    <li>Pengambilan kamu akan terverifikasi di web, kembalikan sesuai jadwal yang ditunjukkan.</li>
                </ol>
                @else
                <h2 class="font-semibold">Petunjuk Pengembalian</h2>
                <ol class="list-decimal list-inside mt-2 text-sm text-gray-700 font-medium">
                    <li>Datangi perpustakaan SMK Infokom, dan temui perpustakawan.</li>
                    <li>Sampaikan kepada perpustakawan ingin mengembalikan buku online.</li>
                    <li>Tunjukan Token pengembalian kepada perpustakawan.</li>
                    <li>Setelah token valid, kamu akan disuruh memberikan buku yang dipinjam.</li>
                    <li>Pengembalian kamu akan terverifikasi di web.</li>
                </ol>
                @endif
            </div>
        </div>

    </div>

</x-sidebar>