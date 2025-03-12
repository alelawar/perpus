<x-sidebar>
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2300)" x-show="show"
        class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
        <div class="bg-green-500  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2"></i> {{ session('success') }}
        </div>
    </div>
    @endif
    <div class="flex h-full">
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold">Data pinjaman all users | {{ auth()->user()->fullname }}</h2>
                {{-- <div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New</button>
                </div> --}}
            </header>

            <main class="mt-6">
                <div class="w-full overflow-x-auto">
                    <div x-data="{ actionType: 'update' }">
                        <!-- Tombol Pilih Aksi -->
                        <div class="flex justify-between ">
                            <div class="w-1/2">
                                <h3 class="my-3 font-semibold text-xl">Pilih status :</h3>
                                <div class="flex space-x-3 mb-4">
                                    <button @click="actionType = 'update'" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Update Status
                                    </button>
                                    <button @click="actionType = 'delete'" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                                        Hapus Data
                                    </button>
                                </div>
                            </div>
                            <div class="w-1/2 items-end">
                                <form action="/pinjam" method="GET">
                                    <input type="text" name="s" id="cari" placeholder="Cari berdasarkan token..." class="w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                                </form>
                            </div>

                        </div>

                        <!-- Form -->
                        <form x-bind:action="actionType === 'update' ? '/pinjam/update' : '/pinjam/delete'" method="POST" id="bulkActionForm">
                            @csrf
                            <input type="hidden" name="_method" x-bind:value="actionType === 'update' ? 'PUT' : 'DELETE'">

                            <!-- Tabel -->
                            <table class="min-w-full bg-white border border-gray-300">
                                <thead>
                                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left">Pilih</th>
                                        <th class="py-3 px-6 text-left">Nama Buku</th>
                                        <th class="py-3 px-6 text-left">Tanggal Pinjaman</th>
                                        <th class="py-3 px-6 text-left">Tanggal Pengembalian</th>
                                        <th class="py-3 px-6 text-left">Token</th>
                                        <th class="py-3 px-6 text-left">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                    @forelse ($pinjaman as $p)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">
                                            <input type="checkbox" name="ids[]" value="{{ $p->id }}" class="checkboxItem">
                                        </td>
                                        <td class="py-3 px-6 text-left"><a href="/view/{{ $p->buku->slug }}">{{ $p->buku->judul }}</a></td>
                                        <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($p->tanggal_peminjam)->format('d-m-Y') }}</td>
                                        <td class="py-3 px-6 text-left">{{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d-m-Y') }}</td>
                                        <td class="py-3 px-6 text-left">{{ $p->token }}</td>
                                        <td class="py-3 px-6 text-left">
                                            <div x-data="{ status:'{{ $p->status }}', getColor(status) {
                                            return {
                                            'telah diambil': 'bg-green-500 text-white',
                                            'belum diambil': 'bg-orange-400 text-white',
                                            'belum dikembalikan': 'bg-red-500 text-white',
                                            'sudah dikembalikan': 'bg-green-500 text-white'
                                            }
                                            [status] || 'bg-gray-50 text-black'; }}">
                                                <select name="status[{{ $p->id }}]" class="rounded p-1 w-full" x-model="status" x-bind:class="getColor(status)" x-bind:disabled="actionType === 'delete'">
                                                    <option value="telah diambil" class="bg-green-500 text-white">Telah Diambil</option>
                                                    <option value="belum diambil" class="bg-orange-400 text-white">Belum Diambil</option>
                                                    <option value="belum dikembalikan" class="bg-red-500 text-white">Belum Dikembalikan</option>
                                                    <option value="sudah dikembalikan" class="bg-green-500 text-white">Sudah Dikembalikan</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="py-3 px-6 text-center text-gray-500">Tidak ada data pinjaman.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{ $pinjaman->links() }}

                            <!-- Tombol Submit -->
                            <button type="submit" class="mt-3 px-4 py-2 rounded text-white"
                                x-bind:class="actionType === 'update' ? 'bg-blue-500 hover:bg-blue-600' : 'bg-red-500 hover:bg-red-600'">
                                <span x-text="actionType === 'update' ? 'Confirm Update' : 'Delete Selected'"></span>
                            </button>
                        </form>
                    </div>



                </div>
            </main>
        </div>
    </div>
</x-sidebar>