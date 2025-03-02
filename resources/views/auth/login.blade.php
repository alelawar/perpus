<x-html>

    @if (session('success'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
            class="fixed inset-0 flex items-center justify-center bg-black/50  z-50">
            <div class="bg-secondary  z-50 text-white px-6 py-3 rounded-lg shadow-lg">
                <i class="bi bi-check2"></i> {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('loginError'))
        <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show"
            class="fixed inset-0 flex items-center justify-center bg-black/50 z-50">
            <div class="bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg">
                <i class="bi bi-exclamation-triangle"></i> {{ session('loginError') }}
            </div>
        </div>
    @endif

    <div class="flex items-center justify-center min-h-screen mx-auto">
        <div
            class="flex w-[1000px] h-[480px] shadow-lg rounded-2xl overflow-hidden bg-[url('https://img.freepik.com/free-photo/vivid-blurred-colorful-wallpaper-background_58702-3893.jpg?t=st=1739927988~exp=1739931588~hmac=e50107499c04e8dc3326e2278fea890054ab0fe068fb5a38e17c6d2ef2c7b260&w=1380')] bg-cover bg-center justify-center items-center">

            <!-- Bagian Kiri -->
            <div class="text-center text-white w-1/2 px-20 h-full flex flex-col justify-center">
                <h1 class="text-2xl font-bold font-mono">Perpus<br>SMK Infokom</h1>
                <p class="text-sm mt-4 bottom-4">
                    Perpustakaan ini hanya bisa diakses oleh Siswa dan Siswi SMK Infokom.
                    Login untuk meminjam buku.
                </p>
            </div>

            <!-- Bagian Form -->
            <div class="w-1/2 h-full px-8 flex justify-center flex-col bg-white rounded-xl">
                <h2 class="text-3xl font-bold text-center text-secondary">
                    Selamat Datang
                </h2>
                <p class="text-sm text-center">
                    Silahkan masukkan akun untuk<br>melanjutkan.
                </p>

                <form action="/auth/login" method="POST" class="space-y-4 mt-5">
                    @csrf {{-- Token untuk keamanan Laravel --}}
                    <div class="relative bg-tertiary rounded-lg">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 bg-transparent">
                            <i class="bi bi-person text-secondary"></i>
                        </span>
                        <input name="email"
                            class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary bg-transparent @error('email') is-invalid @enderror"
                            placeholder="Email" type="email" autofocus required value="{{ old('email') }}" />
                        </div>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    <div class="relative bg-tertiary rounded-lg">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 bg-transparent">
                            <i class="bi bi-lock text-secondary"></i>
                        </span>
                        <input name="password"
                            class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary bg-transparent"
                            placeholder="Password" type="password" required />
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="flex items-center">
                            <input class="form-checkbox text-secondary" type="checkbox" />
                            <span class="ml-2 text-gray-700">Ingat saya</span>
                        </label>
                        <a class="text-secondary hover:underline text-sm" href="#">
                            Lupa password?
                        </a>
                    </div>

                    <button
                        class="w-1/3 py-2 block mx-auto bg-secondary text-white text-xs font-bold rounded-lg hover:bg-transparent hover:text-secondary hover:border-blue-300 border-2 focus:ring focus:ring-blue-300 transition duration-500"
                        type="submit">
                        Masuk
                    </button>
                </form>

                <p class="text-center text-sm mt-5">
                    Belum memiliki akun? <a class="text-blue-600 hover:underline" href="register">Buat akun</a>
                </p>
            </div>
        </div>
    </div>



</x-html>
