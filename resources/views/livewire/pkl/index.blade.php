<div>
@if (session()->has('success'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="mx-4 mt-6 mb-4 flex items-center justify-between rounded-lg px-4 py-3 shadow border font-poppins"
        style="background-color: #e6f4ec; border-color: #c3e6cb; color: #2e7d32;"
    >
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="mx-4 mt-6 mb-4 flex items-center justify-between rounded-lg px-4 py-3 shadow border font-poppins"
        style="background-color: #fdeaea; border-color: #f5c6cb; color: #c62828;"
    >
        <div class="flex items-center space-x-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10A8 8 0 11.999 10 8 8 0 0118 10zM9 5a1 1 0 012 0v4a1 1 0 01-2 0V5zm1 8a1.25 1.25 0 100-2.5A1.25 1.25 0 0010 13z" clip-rule="evenodd" />
            </svg>
            <span>{{ session('error') }}</span>
        </div>
    </div>
@endif



<div class="p-6 bg-white rounded-2xl shadow-md mx-3 my-6 font-poppins">
    <div class="overflow-x-auto">

        <!-- BUTTON & SEARCH -->
        <div class="flex justify-between items-center bg-white rounded-xl mb-4 px-1 py-1">
            <!-- BUTTON -->
            <a href="{{ route('pklCreate') }}">
                <button type="button"
                    class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-6 py-2 text-center me-2 shadow-md transform transition duration-500 hover:scale-105">
                    Tambah Data PKL
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


        <!-- TABLE -->
        <table class="w-full text-sm text-left rtl:text-right text-gray-700">
            <thead class="text-xs text-pink-700 uppercase bg-pink-100">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">NIS</th>
                    <th class="px-6 py-3">NAMA</th>
                    <th class="px-6 py-3">GURU PEMBIMBING</th>
                    <th class="px-6 py-3">INDUSTRI</th>
                    <th class="px-6 py-3">BIDANG USAHA</th>
                    <th class="px-6 py-3">MULAI</th>
                    <th class="px-6 py-3">SELESAI</th>
                    <th class="px-6 py-3">DURASI</th>
                    <th class="px-4 py-3"></th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody>
            @php $no = $pkls->firstItem(); @endphp <!--inisupaya walaupun pindah page dari pagination, angkanya tetap urut dengan yang sebelumnya-->

                @forelse ($pkls as $pkl)
                <tr class="bg-white border-b hover:bg-pink-50">
                    <!-- <td class="px-6 py-4">{{ $pkl->id }}</td> --> <!--aku komen karena membuat tampilan di fe bagian id nya urut dari 1 walaupun sudah dihapus,
                                                                         tapi tidak pengaruh ke id di backend/database -->
                    <td class="px-6 py-4">{{ $no++ }}</td>
                    <td class="px-6 py-4">{{ $pkl->siswa->nis }}</td>
                    <td class="px-6 py-4">{{ $pkl->siswa->nama }}</td>
                    <td class="px-6 py-4">{{ $pkl->guru->nama }}</td>
                    <td class="px-6 py-4">{{ $pkl->industri->nama }}</td>
                    <td class="px-6 py-4">{{ $pkl->industri->bidang_usaha }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pkl->mulai)->format('d F Y') }}</td>
                    <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pkl->selesai)->format('d F Y') }}</td>
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($pkl->mulai)->diffInDays(\Carbon\Carbon::parse($pkl->selesai)) }} hari
                    </td>
                    <td class="px-1 py-3 cursor-pointer text-white font-medium">
                        <a href="{{ route('pklView', ['id' => $pkl->id]) }}">
                            <button type="button"
                                class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm px-3.5 py-1.5 text-center me-2 shadow-md transform transition duration-500 hover:scale-105">
                                View
                            </button>
                        </a>
                    </td>   

                    <td class="px-1 py-3 cursor-pointer text-pink-500 font-medium">
                        @php
                            $user = Auth::user();
                        @endphp
                        
                        @if ($user && $user->email === $pkl->siswa->email)
                        <a href="{{ route('pklEdit', ['id' => $pkl->id]) }}">
                            <button type="button"
                                class="text-pink-700 bg-pink-50 border border-pink-300  font-medium rounded-lg text-sm px-3.5 py-1.5 text-center me-2 shadow-md transform transition duration-500 hover:scale-105">
                                Edit
                            </button>
                        </a>
                        @endif
                    </td>   
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-6 py-4 text-center text-gray-500">Siswa tidak terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-6 px-4">
            {{ $pkls->links('pagination::tailwind') }}
        </div>


    </div>
</div>
</div>