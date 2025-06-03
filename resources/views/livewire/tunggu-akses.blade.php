<div class="flex items-center justify-center min-h-screen bg-rose-50 font-poppins">
    <div class="max-w-4xl w-full px-4 sm:px-6 lg:px-8 my-6">
        <div class="bg-white overflow-hidden shadow-md rounded-2xl">
            
            <!-- Header -->
            <div class="bg-gradient-to-r from-rose-300 to-rose-100 p-8 rounded-t-2xl">
                <div class="flex items-center justify-between">
                    <div wire:poll.5000ms="checkRoles">
                        <h2 class="text-3xl font-semibold text-white mb-1 tracking-wide">Menunggu Persetujuan</h2>
                        <p class="text-white/90 text-sm">Akun Anda sedang dalam proses verifikasi</p>
                        <p class="text-white/90 text-sm">Halaman ini akan otomatis redirect jika sudah diberikan role.</p>
                    </div>
                    <div class="hidden md:block">
                        <i class="fas fa-clock text-white/60 text-7xl"></i>
                    </div>
                </div>
            </div>

            <!-- Status card -->
            <div class="p-6">
                <div class="flex items-center p-4 mb-6 bg-rose-50 border-l-4 border-rose-300 rounded-r-lg shadow-sm">
                    <i class="fas fa-exclamation-triangle text-rose-400 mr-3 text-xl"></i>
                    <p class="text-rose-700 text-sm font-medium tracking-wide">
                        Akun Anda telah berhasil terdaftar dan sedang menunggu persetujuan administrator.
                    </p>
                </div>

                <!-- Progress indicator -->
                <div class="flex items-center justify-center my-8">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center bg-emerald-400 text-white font-semibold shadow">
                            ✓
                        </div>
                        <span class="text-xs mt-2 text-emerald-600 font-medium">Registrasi</span>
                    </div>

                    <!-- Garis -->
                    <div class="flex-auto border-t-2 border-rose-400 mx-2 mb-4"></div>

                    <!-- Step 2 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center bg-rose-400 text-white font-semibold animate-pulse shadow">
                            2
                        </div>
                        <span class="text-xs mt-2 text-rose-600 font-medium">Persetujuan</span>
                    </div>

                    <!-- Garis -->
                    <div class="flex-auto border-t-2 border-gray-300 mx-2 mb-4"></div>

                    <!-- Step 3 -->
                    <div class="flex flex-col items-center text-center">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center bg-gray-300 text-white font-semibold">
                            3
                        </div>
                        <span class="text-xs mt-2 text-gray-400 font-medium">Akses Penuh</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</div>
