<x-html>

    <div class="flex items-center justify-center min-h-screen mx-auto">
        <div class="flex flex-col w-[1000px] h-[580px] shadow-lg rounded-2xl overflow-hidden p-5 bg-tertiary">
            <h1
                class="font-semibold text-lg relative w-fit after:content-[''] after:block after:w-1/4 after:h-0.5 after:bg-secondary">
                Registration
            </h1>

            <div>
                <form action="/auth/register" method="POST" class="space-y-4 mt-5">
                    @csrf {{-- Token untuk keamanan Laravel --}}
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Kolom Kiri -->
                        <div class="space-y-4">
                            <div class="relative rounded-lg">
                                <label class="block text-gray-700 text-sm font-medium mb-1">Nama Lengkap</label>
                                <input name="fullname"
                                    class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                                    placeholder="Masukan Nama" type="text" required value="{{ old('fullname') }}" />
                            </div>
                            @error('fullname')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="relative rounded-lg">
                                <label class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                                <input name="email"
                                    class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                                    placeholder="Masukan Email" type="email" value="{{ old('email') }}" />
                            </div>
                            @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="relative rounded-lg">
                                <label class="block text-gray-700 text-sm font-medium mb-1">Kata Sandi</label>
                                <input name="password"
                                    class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                                    placeholder="Masukan Kata Sandi" type="password" />
                            </div>
                            @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="space-y-4">
                            <div class="relative rounded-lg">
                                <label class="block text-gray-700 text-sm font-medium mb-1">Username</label>
                                <input name="username"
                                    class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                                    placeholder="Masukan Username" type="text" value="{{ old('username') }}" />
                            </div>
                            @error('username')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            <div class="relative rounded-lg">
                                <label class="block text-gray-700 text-sm font-medium mb-1">No Tlp</label>
                                <input name="telepon"
                                    class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                                    placeholder="Masukan Nomer Telp" type="text" value="{{ old('telepon') }}" />
                            </div>
                            @error('telepon')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror

                            {{-- <div class="relative rounded-lg">
                                <label class="block text-gray-700 text-sm font-medium mb-1">Konfirmasi Kata Sandi</label>
                                <input name="password_confirmation"
                                    class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                                    placeholder="Konfirmasi Kata Sandi Anda" type="password" />
                                @error('password_confirmation')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div> --}}
                    </div>
            </div>

            <!-- Alamat -->
            <div class="w-full">
                <div class="relative rounded-lg">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Alamat Lengkap</label>
                    <textarea name="alamat"
                        class="w-full py-2 pl-5 pr-4 border bg-white border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        placeholder="Masukan Alamat Lengkap">{{ old('alamat') }}</textarea>
                </div>
                @error('alamat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input class="form-checkbox text-secondary" type="checkbox" />
                    <span class="ml-2 text-gray-700">Saya menerima semua syarat & ketentuan</span>
                </label>
                <p class="text-center text-sm mt-5">
                    Sudah memiliki akun? <a class="text-blue-600 hover:underline" href="login">Masuk</a>
                </p>
            </div>

            <button
                class="w-1/4 py-2 block mx-auto bg-secondary text-white text-lg font-bold rounded-lg hover:bg-transparent hover:text-secondary hover:border-blue-300 border-2 focus:ring focus:ring-blue-300 transition duration-500"
                type="submit">
                Daftar
            </button>
            </form>
        </div>

    </div>
    </div>

</x-html>