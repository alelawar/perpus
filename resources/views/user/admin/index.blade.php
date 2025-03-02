<x-sidebar>

  <div class="flex h-screen">

    <!-- Main Content -->
    <div class="flex-1 px-6">

      <header class="flex items-center justify-between">
        <h2 class="text-2xl font-medium mt-2">Profile | {{ auth()->user()->fullname }}</h2>
      </header>

      <main class="mt-6 w-full">
        <div class="p-2">
          <div class="flex border-2 border-gray-300 p-6 rounded-md">
            <div>
              <div class="w-32 h-32 bg-slate-600 rounded-full"></div>
              <div class="flex justify-end -mt-12">
                <i class="bi bi-camera shadow-lg bg-white px-5 py-4 rounded-full"></i>
              </div>
            </div>

            <div class="ml-10">
              <p class="text-2xl font-medium">{{ auth()->user()->username }}</p>
              <p class="text-xl text-gray-500">{{ auth()->user()->email }}</p>
            </div>
          </div>

          <div class="mt-6 text-xl text-gray-500 border-2 border-gray-300 p-6 rounded-md">
            <h1 class="text-black text-2xl font-medium">Personal Information</h1>
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