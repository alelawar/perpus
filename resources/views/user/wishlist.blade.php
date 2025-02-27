<x-layout>

    <div class="flex h-screen bg-gray-200">
        <x-sidebar></x-sidebar> {{-- BEBAS LU MAU PAKE ASIDE APA ENGGAK --}}

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold">Wishlist | {{ auth()->user()->fullname }}</h2>
                {{-- <div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New</button>
                </div> --}}
            </header>

            <main class="mt-6">
                @forelse ($favorites as $f )
                       {{-- DISINI TAMPILIN CARDNYA RIS  --}}
                       <p>{{ $f->book->judul }}</p> {{-- contoh querynya ris --}} 
            
                       {{-- NANTI BUAT BUTTON LOPENYA SAMA GW AJA, SALIN DLU WEH DARI INDEX --}}
                @empty
                    
                @endforelse
            </main>
        </div>
    </div>
</x-layout>