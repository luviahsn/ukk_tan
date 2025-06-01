<div class="">
    <div class="mx-8 my-6">
        <form wire:submit.prevent="update" class="p-6 bg-white rounded-2xl shadow-md-poppins">
            <h1 class="text-xl font-bold text-pink-600 mb-1">Edit Data PKL</h1>
            <p class="text-sm text-gray-500 mb-3">Ubah informasi PKL siswa di bawah ini.</p>
            <hr class="border-t border-pink-400 mb-4">

            {{-- Nama Siswa --}}
            <div class="mb-3">
                <label for="siswa_id" class="block mb-1 text-sm font-semibold text-gray-700">Nama Siswa</label>
                <select wire:model='siswa_id' id="siswa_id" required
                    class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                           focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                           @error('siswa_id') border-red-500 @enderror">
                    <option value="">Nama Siswa</option>
                    @foreach($siswas as $siswa)
                        <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                    @endforeach
                </select>
                @error('siswa_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                @if(session()->has('error'))
                    <p class="text-xs text-red-500 mt-1">{{ session('error') }}</p>
                @endif
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                {{-- Nama Guru --}}
                <div>
                    <label for="guru_id" class="block mb-1 text-sm font-semibold text-gray-700">Nama Guru</label>
                    <select wire:model='guru_id' id="guru_id" required
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                               focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                               @error('guru_id') border-red-500 @enderror">
                        <option value="">Nama Guru</option>
                        @foreach($gurus as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                        @endforeach
                    </select>
                    @error('guru_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Nama Industri --}}
                <div>
                    <label for="industri_id" class="block mb-1 text-sm font-semibold text-gray-700">Nama Industri</label>
                    <select wire:model='industri_id' id="industri_id" required
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                               focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                               @error('industri_id') border-red-500 @enderror">
                        <option value="">Nama Industri</option>
                        @foreach($industris as $industri)
                            <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                        @endforeach
                    </select>
                    @error('industri_id') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                {{-- Tanggal Mulai --}}
                <div>
                    <label for="mulai" class="block mb-1 text-sm font-semibold text-gray-700">Tanggal Mulai</label>
                    <input type="date" wire:model="mulai" id="mulai" required
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                               focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                               @error('mulai') border-red-500 @enderror">
                    @error('mulai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Tanggal Selesai --}}
                <div>
                    <label for="selesai" class="block mb-1 text-sm font-semibold text-gray-700">Tanggal Selesai</label>
                    <input type="date" wire:model="selesai" id="selesai" required
                        class="w-full text-sm p-2 border border-pink-200 rounded-md bg-pink-50 text-gray-800
                               focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500
                               @error('selesai') border-red-500 @enderror">
                    @error('selesai') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end mt-4 gap-3">
                <a href="{{ route('pkl') }}"
                   class="text-white bg-gray-400 hover:bg-gray-500 font-medium rounded-lg text-sm px-6 py-2 text-center shadow-md transition duration-300 ease-in-out hover:scale-105">
                    Kembali
                </a>

                <button type="submit"
                    class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-6 py-2 text-center shadow-md transition duration-300 ease-in-out hover:scale-105">
                    Update Data
                </button>
            </div>
        </form>
    </div>
</div>
    