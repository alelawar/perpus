<x-sidebar>

    <div class="flex h-screen">

        <!-- Main Content -->
        <div class="flex-1 px-6">

            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-medium -mt-6">Profile | {{ auth()->user()->fullname }}</h2>
            </header>

            <main class="mt-6 w-full">
                    <!-- Form Edit Profile -->
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                        @csrf
                        @method('PUT')

                        <div class="space-y-3">
                            <label class="block">
                                <span class="text-gray-700">Nama Lengkap</span>
                                <input type="text" name="fullname"
                                    class="w-full border-gray-300 rounded-md p-2 mt-1 focus:ring focus:ring-gray-200" value="{{ old('fullname', auth()->user()->fullname) }}">
                            </label>

                            <label class="block">
                                <span class="text-gray-700">No Telepon</span>
                                <input type="text" name="telepon"
                                    class="w-full border-gray-300 rounded-md p-2 mt-1 focus:ring focus:ring-gray-200" value="{{ old('telepon', auth()->user()->telepon) }}">
                            </label>

                            <label class="block">
                                <span class="text-gray-700">Alamat</span>
                                <textarea name="alamat" class="w-full border-gray-300 rounded-md p-2 mt-1 focus:ring focus:ring-gray-200">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                            </label>

                            <label class="block">
                                <span class="text-gray-700">Foto Profil</span>
                                <input type="file" name="profile" class="w-full border-gray-300 rounded-md p-2 mt-1">
                            </label>

                            <button type="submit"
                                class="w-full bg-blue-500 text-white p-2 rounded-md hover:bg-blue-600">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>

                </div>
            </main>

        </div>
    </div>

</x-sidebar>
