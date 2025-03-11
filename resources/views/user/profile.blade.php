<x-sidebar>
    @if (session('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
        <div class="bg-secondary  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
            <i class="bi bi-check2"></i> {{ session('success') }}
        </div>
    </div>
@endif

    <div class="flex h-screen">

        <!-- Main Content -->
        <div class="flex-1 px-6">

            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-medium -mt-6">Profile | {{ auth()->user()->fullname }}</h2>
            </header>

            <main class="mt-6 w-full">
                <div class="p-2">
                    <div class="flex border-2 border-gray-300 p-6 rounded-md">
                        <!-- Photo Profile -->
                        <div class="relative w-32 h-32">
                            <img src="{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('storage/profile/default-profile.jpg') }}"
                                class="w-full h-full object-cover rounded-full border-2 border-gray-300">
                            <label for="avatar"
                                class="absolute bottom-0 right-0 bg-white p-2 rounded-full cursor-pointer shadow-md">
                                <i class="bi bi-camera"></i>
                            </label>
                        </div>


                        <div class="ml-10">
                            <p class="text-2xl font-medium">{{ auth()->user()->username }}</p>
                            <p class="text-xl text-gray-500">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="mt-6 text-lg text-gray-500 border-2 border-gray-300 p-6 rounded-md">
                        <h1 class="text-black text-xl font-medium">Informasi Pribadi</h1>
                        <div class="flex space-x-20">
                            <div>
                                <p>Nama Lengkap</p>
                                <p>No Telepon</p>
                                <p>Alamat</p>
                            </div>
                            <div>
                                <p>{{ auth()->user()->fullname }}</p>
                                <p>{{ auth()->user()->telepon }}</p>
                                <p>{{ auth()->user()->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
</x-sidebar>
