<div>
    <form wire:submit.prevent="create" class="p-6 bg-white rounded-2xl shadow-md mx-8 my-6 font-poppins">
        <h1 class="text-xl font-bold text-pink-600 mb-1">Tambah Data PKL</h1>
        <p class="text-sm text-gray-500 mb-3">Isi form ini untuk menambahkan informasi PKL siswa.</p>
        <hr class="border-t border-pink-400 mb-4">

        {{-- Nama Siswa --}}
        <div class="mb-3">
            <label for="siswa_id" class="block mb-1 text-sm font-semibold text-gray-700">Nama Siswa</label>
            <select wire:model="siswa_id" id="siswa_id" disabled
                class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                <option value="{{ $siswa_id }}">{{ $nama_siswa }}</option>
            </select>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
            {{-- Select Nama Guru --}}
            <div>
                <label for="guru_id" class="block mb-1 text-sm font-semibold text-gray-700">Nama Guru</label>
                <select wire:model="guru_id" id="guru_id" required
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                    <option value="">Pilih Guru</option>
                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
                @error('guru_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Select Industri --}}
            <div>
                <label for="industri_id" class="block mb-1 text-sm font-semibold text-gray-700">Nama Industri</label>
                <select wire:model="industri_id" id="industri_id" required
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                    <option value="">Pilih Industri</option>
                    @foreach($industris as $industri)
                        <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                    @endforeach
                </select>
                @error('industri_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
            {{-- Input Tanggal Mulai --}}
            <div>
                <label for="mulai" class="block mb-1 text-sm font-semibold text-gray-700">Tanggal Mulai</label>
                <input wire:model="mulai" type="date" id="mulai" required
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500" />
                @error('mulai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Input Tanggal Selesai --}}
            <div>
                <label for="selesai" class="block mb-1 text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                <input wire:model="selesai" type="date" id="selesai" required
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500" />
                @error('selesai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
            </div>
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-end mt-4">
            <div class="flex justify-end gap-3 mt-4">
                <a href="{{ route('pkl') }}"
                    class="text-gray-700 bg-pink-100 border border-pink-500 hover:bg-pink-200 font-medium rounded-lg text-sm px-5 py-2 shadow-sm transition duration-200">
                    Kembali
                </a>
            <button type="submit"
                class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-6 py-2 text-center shadow-md transition duration-300 ease-in-out hover:scale-105">
                Simpan Data PKL
            </button>
        </div>

        {{-- Pesan Error --}}
        @if(session()->has('error'))
            <p class="text-red-500 mt-4 text-sm font-medium">
                {{ session('error') }}
            </p>
        @endif
    </form>
</div>
