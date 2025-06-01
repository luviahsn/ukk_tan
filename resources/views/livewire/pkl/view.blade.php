<div class="bg-gray-100 min-h-screen font-poppins">
    <div class="pt-4">
        <div class="py-2 px-6 flex flex-col gap-y-4">
            <div class="text-lg mb-1 text-pink-700 font-semibold">
                Data PKL <span class="font-medium text-pink-600">{{ $pkl->siswa->nama }}</span>
            </div>   

            <!-- informasi siswa -->
            <div class="bg-pink-50 shadow px-4 py-3 rounded-lg">
                <div class="flex justify-between cursor-pointer text-sm mb-2 text-pink-700" data-collapse-toggle="detailSiswa">
                    Informasi Siswa
                    <i class="fa-solid fa-chevron-down text-pink-500"></i>
                </div> 

                <div id="detailSiswa" class="flex flex-col gap-y-1 pt-3 border-t border-pink-400 text-sm">
                    @foreach ([
                        ['icon' => 'fa-user', 'label' => 'Nama', 'value' => $pkl->siswa->nama],
                        ['icon' => 'fa-id-card', 'label' => 'NIS', 'value' => $pkl->siswa->nis],
                        ['icon' => 'fa-venus-mars', 'label' => 'Gender', 'value' => $pkl->siswa->gender],
                        ['icon' => 'fa-users-rectangle', 'label' => 'Rombel', 'value' => $pkl->siswa->rombel],
                        ['icon' => 'fa-phone-alt', 'label' => 'Kontak', 'value' => $pkl->siswa->kontak],
                        ['icon' => 'fa-envelope', 'label' => 'Email', 'value' => $pkl->siswa->email],
                        ['icon' => 'fa-map-marker-alt', 'label' => 'Alamat', 'value' => $pkl->siswa->alamat],
                    ] as $item)
                    <div class="flex text-sm font-normal">
                        <div class="flex items-center w-1/4 min-w-[120px] text-pink-600">
                            <i class="fa-solid {{ $item['icon'] }} pr-2"></i>{{ $item['label'] }}
                        </div>    
                        <div class="text-pink-500">: <span class="text-slate-700">{{ $item['value'] }}</span></div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- informasi guru pembimbing -->
            <div class="bg-pink-50 shadow px-4 py-3 rounded-lg">
                <div class="flex justify-between cursor-pointer text-sm mb-2 text-pink-700" data-collapse-toggle="detailGuru">
                    Informasi Guru Pembimbing
                    <i class="fa-solid fa-chevron-down text-pink-500"></i>
                </div> 

                <div id="detailGuru" class="flex flex-col gap-y-1 pt-3 border-t border-pink-400 text-sm">
                    @foreach ([
                        ['icon' => 'fa-user', 'label' => 'Nama', 'value' => $pkl->guru->nama],
                        ['icon' => 'fa-id-card', 'label' => 'NIP', 'value' => $pkl->guru->nip],
                        ['icon' => 'fa-venus-mars', 'label' => 'Gender', 'value' => $pkl->guru->gender],
                        ['icon' => 'fa-phone-alt', 'label' => 'Kontak', 'value' => $pkl->guru->kontak],
                        ['icon' => 'fa-envelope', 'label' => 'Email', 'value' => $pkl->guru->email],
                        ['icon' => 'fa-map-marker-alt', 'label' => 'Alamat', 'value' => $pkl->guru->alamat],
                    ] as $item)
                    <div class="flex text-sm font-normal">
                        <div class="flex items-center w-1/4 min-w-[120px] text-pink-600">
                            <i class="fa-solid {{ $item['icon'] }} pr-2"></i>{{ $item['label'] }}
                        </div>    
                        <div class="text-pink-500">: <span class="text-slate-700">{{ $item['value'] }}</span></div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- informasi industri -->
            <div class="bg-pink-50 shadow px-4 py-3 rounded-lg">
                <div class="flex justify-between cursor-pointer text-sm mb-2 text-pink-700" data-collapse-toggle="detailIndustri">
                    Informasi Industri
                    <i class="fa-solid fa-chevron-down text-pink-500"></i>
                </div> 

                <div id="detailIndustri" class="flex flex-col gap-y-1 pt-3 border-t border-pink-400 text-sm">
                    @foreach ([
                        ['icon' => 'fa-user', 'label' => 'Nama', 'value' => $pkl->industri->nama],
                        ['icon' => 'fa-id-card', 'label' => 'Bidang Usaha', 'value' => $pkl->industri->bidang_usaha],
                        ['icon' => 'fa-phone-alt', 'label' => 'Kontak', 'value' => $pkl->industri->kontak],
                        ['icon' => 'fa-envelope', 'label' => 'Email', 'value' => $pkl->industri->email],
                        ['icon' => 'fa-map-marker-alt', 'label' => 'Alamat', 'value' => $pkl->industri->alamat],
                    ] as $item)
                    <div class="flex text-sm font-normal">
                        <div class="flex items-center w-1/4 min-w-[120px] text-pink-600">
                            <i class="fa-solid {{ $item['icon'] }} pr-2"></i>{{ $item['label'] }}
                        </div>    
                        <div class="text-pink-500">: <span class="text-slate-700">{{ $item['value'] }}</span></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- button kembali -->
        <div class="flex justify-end mb-4 mr-6">
            <a href="{{ route('pkl') }}"
                class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br font-medium rounded-lg text-sm py-2 px-5 mt-4 text-center shadow-md transition-transform duration-300 hover:scale-105">
                Kembali
            </a>
        </div>

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- js flowbite -->
        <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
    </div>
</div>