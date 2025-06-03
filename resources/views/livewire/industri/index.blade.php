<div class="p-6 bg-white rounded-2xl shadow-md mx-3 my-6 font-poppins">
    <div class="overflow-x-auto">

        <!-- BUTTON & SEARCH -->
        <div class="flex justify-between items-center bg-white rounded-xl mb-4 px-1 py-1">
            <!-- BUTTON -->
            <a href="{{ route('industriCreate') }}">
                <button type="button"
                    class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-6 py-2 text-center me-2 shadow-md transform transition duration-500 hover:scale-105">
                    Tambah Industri
                </button>
            </a>

            <!-- SEARCH -->
            <form>
                <label for="default-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-4.35-4.35m0 0a7.5 7.5 0 1 0-1.06 1.06L21 21z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="h-[36px] ps-10 pe-4 text-sm text-gray-900 border border-pink-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 shadow"
                        placeholder="Search" required wire:model.live="search" />
                </div>
            </form>
        </div>



        <!-- INDUSTRI GRID -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse($industris as $industri)
                <div
                    class="bg-white border border-pink-200 rounded-2xl shadow-sm hover:shadow-md transition p-5 flex flex-col justify-between">
                    <!-- Foto -->
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('storage/' . $industri->foto) }}"
                            class="w-28 h-32 object-cover rounded-lg shadow" alt="Foto Industri">
                    </div>

                    <!-- Info -->
                    <div class="space-y-2 text-sm text-gray-700">
                        <div class="text-lg font-semibold text-pink-600 text-center">
                            {{ $industri->nama }}
                        </div>
                        <div class="text-center text-gray-500">{{ $industri->bidang_usaha }}</div>

                        <div class="flex items-center text-pink-500">
                            <i class="fas fa-phone-alt mr-6"></i>
                            <span class="text-gray-700">{{ $industri->kontak }}</span>
                        </div>
                        <div class="flex items-center text-pink-500">
                            <i class="fas fa-envelope mr-6"></i>
                            <span class="text-gray-700">{{ $industri->email }}</span>
                        </div>
                        <div class="flex items-center text-pink-500">
                            <i class="fas fa-globe mr-6"></i>
                            <span class="text-gray-700">{{ $industri->website }}</span>
                        </div>
                        <div class="flex items-start text-pink-500">
                            <i class="fas fa-map-marker-alt mr-6 pt-0.5"></i>
                            <span class="text-gray-700">{{ $industri->alamat }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    Belum ada data industri. Tambahkan sekarang yuk!
                </div>
            @endforelse
        </div>

    </div>

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
</div>
