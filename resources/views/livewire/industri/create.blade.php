<div>
        <form wire:submit.prevent="create" class="p-6 bg-white rounded-2xl shadow-md mx-8 my-6 font-poppins">
            <h1 class="text-xl font-bold text-pink-600 mb-1">Tambah Data Industri</h1>
            <p class="text-sm text-gray-500 mb-3">Isi form ini untuk menambahkan informasi industri.</p>
            <hr class="border-t border-pink-400 mb-4">

            {{-- Logo --}}
            <div class="mb-3">
                <label for="foto" class="block mb-1 text-sm font-semibold text-gray-700">Logo Industri</label>
                <input wire:model="foto" type="file" id="foto"
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                    focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                    @error('foto') border-red-600 @enderror">
                @error('foto') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Nama --}}
            <div class="mb-3">
                <label for="nama" class="block mb-1 text-sm font-semibold text-gray-700">Nama Industri</label>
                <input wire:model="nama" type="text" id="nama" placeholder="Nama Industri"
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                    focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                    @error('nama') border-red-600 @enderror">
                @error('nama') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                {{-- Bidang Usaha --}}
                <div>
                    <label for="bidang_usaha" class="block mb-1 text-sm font-semibold text-gray-700">Bidang Usaha</label>
                    <input wire:model="bidang_usaha" type="text" id="bidang_usaha" placeholder="Bidang Usaha"
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                        focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                        @error('bidang_usaha') border-red-600 @enderror">
                    @error('bidang_usaha') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Website --}}
                <div>
                    <label for="website" class="block mb-1 text-sm font-semibold text-gray-700">Website</label>
                    <input wire:model="website" type="text" id="website" placeholder="Website Industri"
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                        focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                        @error('website') border-red-600 @enderror">
                    @error('website') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Kontak --}}
                <div>
                    <label for="kontak" class="block mb-1 text-sm font-semibold text-gray-700">Kontak</label>
                    <input wire:model="kontak" type="text" id="kontak" placeholder="Kontak Industri"
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                        focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                        @error('kontak') border-red-600 @enderror">
                    @error('kontak') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block mb-1 text-sm font-semibold text-gray-700">Email</label>
                    <input wire:model="email" type="email" id="email" placeholder="Email Industri"
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                        focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                        @error('email') border-red-600 @enderror">
                    @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Alamat --}}
            <div class="mb-3">
                <label for="alamat" class="block mb-1 text-sm font-semibold text-gray-700">Alamat</label>
                <textarea wire:model="alamat" id="alamat" rows="3" placeholder="Alamat Industri"
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                    focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                    @error('alamat') border-red-600 @enderror"></textarea>
                @error('alamat') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-3 mt-4">
                <a href="{{ route('industri') }}"
                    class="text-gray-700 bg-pink-100 border border-pink-100 hover:bg-pink-200 font-medium rounded-lg text-sm px-5 py-2 shadow-sm transition duration-200">
                    Kembali
                </a>

                <button type="submit"
                    class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-6 py-2 shadow-md transition duration-300 ease-in-out hover:scale-105">
                    Tambahkan
                </button>
            </div>
        </form>
    </div>
</div>
</div>
