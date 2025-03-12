<x-sidebar>


    {{-- content --}}
    <div class="flex h-screen">
        <!-- Main Content -->
        <div class="flex-1 px-6">
            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-medium -mt-6">Pinjaman | {{ auth()->user()->fullname }}</h2>
            </header>

            <main class="mt-6">
                <div class="w-full overflow-x-auto border-gray-300">
                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">No</th>
                                <th class="py-3 px-6 text-left">Nama Buku</th>
                                <th class="py-3 px-6 text-left">Tanggal Pinjaman</th>
                                <th class="py-3 px-6 text-left">Tanggal pengembalisan</th>
                                <th class="py-3 px-6 text-left">Token</th>
                                <th class="py-3 px-6 text-left">Status</th>
                                <th class="py-3 px-6 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @forelse ($pinjaman as $index => $p)
                            <tr class="border-b border-gray-200">
                                <td class="py-3 px-6 text-left">{{ $index + 1 }}</td>
                                <td class="py-3 px-6 text-left"><a href="/view/{{ $p->buku->slug }}">{{ $p->buku->judul }}</a></td>
                                <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($p->tanggal_peminjam)->format('d-m-Y') }}</td>
                                <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d-m-Y') }}</td>
                                <td class="py-3 px-6 text-left">{{ $p->token }}</td>
                                <td class="px-1 text-left font-medium  
                                    @if($p->status == 'telah diambil') text-green-500
                                    @elseif($p->status == 'belum diambil') bg-orange-400
                                    @elseif($p->status == 'belum dikembalikan') bg-red-500
                                    @elseif($p->status == 'sudah dikembalikan') bg-green-500
                                    @else
                                    bg-gray-700
                                    @endif">
                                    {{ $p->status }}
                                </td>
                                <td class="py-3 px-8 text-left font-semiboldf hover:bg-gray-100 hover:text-black hover:underline"><a href="/user/pinjaman/detail/{{ $p->token }}"><i class="bi bi-card-text text-2xl"></i></a></td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="py-3 px-6 text-center text-gray-500">Tidak ada data pinjaman.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</x-sidebar>