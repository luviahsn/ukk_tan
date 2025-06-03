<div>
    <div class="p-6 bg-white rounded-2xl shadow-md mx-3 my-6 font-poppins">
        <div class="overflow-x-auto">

            <!-- FILTER & SEARCH -->
            <div class="flex justify-end items-center mb-4 gap-4">

                <!-- SEARCH BAR -->
                <form class="w-72">
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
                            class="block w-full h-[36px] ps-10 pe-4 text-sm text-gray-900 border border-pink-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 shadow"
                            placeholder="Search" required wire:model.live="search" />
                    </div>
                </form>

                <!-- FILTER & SORT BUTTON -->
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button type="button"
                        class="inline-flex justify-center rounded-md border border-pink-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-pink-700 hover:bg-pink-50 "
                        @click="open = !open">
                        Filter & Sort
                        <svg class="-mr-1 ml-2 h-5 w-5 text-pink-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- DROPDOWN -->
                    <div x-show="open" @click.away="open = false" x-transition
                        class="absolute right-0 z-10 mt-2 w-72 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-4 space-y-4">

                        <!-- FILTER GENDER -->
                        <div>
                            <h3 class="text-pink-600 font-semibold text-sm mb-2">Filter Gender</h3>
                            <div class="flex gap-3 flex-wrap">
                                @foreach($genders as $value => $label)
                                    <label class="flex items-center gap-1 text-gray-700 text-sm">
                                        <input type="checkbox" wire:model.live="selected_gender" value="{{ $value }}"
                                            class="text-pink-500 focus:ring-pink-500 border-gray-300 rounded" />
                                        {{ $label }}
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- SORT -->
                        <div>
                            <h3 class="text-pink-600 font-semibold text-sm mb-2">Urutkan Nama</h3>
                            <div class="flex gap-3">
                                <label class="flex items-center gap-1 text-gray-700 text-sm">
                                    <input type="radio" wire:model.live="selected_abjad" value="Abjad:A - Z"
                                        class="text-pink-500 focus:ring-pink-500" />
                                    A - Z
                                </label>
                                <label class="flex items-center gap-1 text-gray-700 text-sm">
                                    <input type="radio" wire:model.live="selected_abjad" value="Abjad:Z - A"
                                        class="text-pink-500 focus:ring-pink-500" />
                                    Z - A
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RESET FILTER BUTTON -->
           @if ($this->hasFilter())
            <div class="mb-4 text-right px-1">
            <button
                wire:click="resetFilters"
                x-data
                @click="$el.style.display='none'"
                class="bg-pink-500 hover:bg-pink-600 text-white px-3 py-1 rounded"
            >
                Reset
            </button>
</div>
        @endif



            <!-- TABLE -->
            <table class="w-full text-sm text-left rtl:text-right text-gray-700">
                <thead class="text-xs text-pink-700 uppercase bg-pink-100">
                    <tr>
                        <th class="px-6 py-3">NO</th>
                        <th class="px-6 py-3">NAMA</th>
                        <th class="px-6 py-3">NIP</th>
                        <th class="px-6 py-3">GENDER</th>
                        <th class="px-6 py-3">ALAMAT</th>
                        <th class="px-6 py-3">KONTAK</th>
                        <th class="px-6 py-3">EMAIL</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = $gurus->firstItem(); @endphp

                    @forelse ($gurus as $key => $guru)
                        <tr class="bg-white border-b hover:bg-pink-50">
                            <td class="px-6 py-4">{{ $no++ }}</td>
                            <td class="px-6 py-4">{{ $guru->nama }} </td>
                            <td class="px-6 py-4">{{ $guru->nip }}</td>
                            <td class="px-6 py-4">{{ $guru->gender ? \Illuminate\Support\Facades\DB::select("select getGenderCode(?) AS gender", [$guru->gender])[0]->gender :'Gender tidak tersedia'}}</td>
                            <td class="px-6 py-4">{{ $guru->alamat }}</td>
                            <td class="px-6 py-4">{{ $guru->kontak }}</td>
                            <td class="px-6 py-4">{{ $guru->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500">Guru Tidak Terdaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- PAGINATION -->
            <div class="mt-6 px-4">
                {{ $gurus->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
</div>
