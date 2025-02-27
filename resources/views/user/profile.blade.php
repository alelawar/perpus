<x-layout>
    <div class="flex h-screen bg-gray-200">
        <x-sidebar></x-sidebar>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-semibold">Profile | {{ auth()->user()->fullname }}</h2>
                {{-- <div>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Add New</button>
                </div> --}}
            </header>

            <main class="mt-6">
                <div class="w-full">

                    <div class="flex justify-between p-2">
                        <div class="">
                            <p class="mb-4">Uername : {{ auth()->user()->username }}</p>
                            <p class="mb-4">Email : {{ auth()->user()->email }}</p>
                        </div>
                        <div>
                            <p class="mb-4">Nama Lengkap : {{ auth()->user()->fullname }}</p>
                            <p class="mb-4">No Telp : {{ auth()->user()->telepon }}</p>
                        </div>
                        {{-- NANTI SAMA FE AJA LANJUTIN MALES GW AOWKWOKOAWK --}}
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layout>