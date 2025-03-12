<x-sidebar>

    <div class="flex h-screen">

        <!-- Main Content -->
        <div class="flex-1 px-6">

            <header class="flex items-center justify-between">
                <h2 class="text-2xl font-medium -mt-6">Edit Profile | {{ auth()->user()->fullname }}</h2>
            </header>

            <main class="mt-6 w-full">
                <!-- Form Edit Profile -->
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    @method('PUT')

                    <div class="space-y-3">
                        <!-- Photo Profile -->
                        <div x-data="{ preview: '{{ auth()->user()->profile ? asset('storage/' . auth()->user()->profile) : asset('storage/profile/default-profile.jpg') }}' }" class="w-32 h-32">
                            <!-- Gambar Profil -->
                            <img :src="preview"
                                class="w-full h-full object-cover rounded-full border-2 border-gray-300 shadow-sm float-start">

                            <!-- Label Upload -->
                            <label for="avatar"
                                class="bottom-0 float-right bg-white p-2 px-3 -mt-10 rounded-full cursor-pointer shadow-md border border-gray-200 hover:bg-gray-100">
                                <i class="bi bi-camera text-gray-600"></i>
                            </label>

                            <!-- Input File (Hidden) -->
                            <input type="file" id="avatar" name="profile" class="hidden" accept="image/*"
                                @change="preview = URL.createObjectURL($event.target.files[0])">
                        </div>


                        <label class="block w-full">
                            <span class="text-gray-700">Nama Lengkap</span>
                            <input type="text" name="fullname"
                                class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:ring focus:ring-secondary focus:border-secondary"
                                value="{{ old('fullname', auth()->user()->fullname) }}" required>
                        </label>


                        <label class="block w-full">
                            <span class="text-gray-700">No Telepon</span>
                            <input type="text" name="telepon"
                                class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:ring focus:ring-secondary focus:border-secondary" value="{{ old('telepon', auth()->user()->telepon) }}">
                        </label>

                        <label class="block w-full">
                            <span class="text-gray-700">Alamat</span>
                            <textarea name="alamat" class="w-full border border-gray-300 rounded-md p-2 mt-1 focus:ring focus:ring-secondary focus:border-secondary">{{ old('alamat', auth()->user()->alamat) }}</textarea>
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