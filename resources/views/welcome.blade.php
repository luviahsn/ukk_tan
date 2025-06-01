<x-guest-layout>
    <div class="min-h-screen relative bg-pink-50 flex flex-col overflow-hidden font-poppins">

        <!-- Bubbles & blobs background -->
        <div class="absolute top-10 left-10 w-72 h-72 bg-pink-400 rounded-full opacity-25 blur-3xl animate-bounce-slow z-0"></div>
        <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-pink-400 rounded-full opacity-25 blur-3xl animate-spin-slow z-0"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-pink-400 rounded-full opacity-25 blur-3xl animate-pulse z-0"></div>

        <!--  Navbar -->
        <header class="flex justify-between items-center mb-18 px-10 py-6 z-10">
            <div class="text-xl font-bold text-pink-600">SIJAVERSE</div>
            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-4 py-2 rounded-xl border border-pink-500 text-pink-600 hover:bg-pink-100">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 rounded-xl border border-pink-500 text-pink-600 hover:bg-pink-100">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 rounded-xl bg-pink-500 text-white hover:bg-pink-600">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </header>

    <!--  Hero Section -->
<main class="flex flex-1 flex-col items-center justify-center mb-4 gap-12 px-6 lg:px-20 pt-24 pb-12 animate-fade-in animate-slide-in-from-bottom duration-2000 z-10 min-h-[60vh]">
    <div class="w-full max-w-4xl text-center">
        <h1 class="text-5xl font-bold text-gray-800 leading-tight">
            Sistem Informasi
            PKL Siswa SIJA<br>
            <span class="text-pink-600 text-3xl">by SIJAVERSE</span>
        </h1>
        <p class="mt-3 text-gray-600 text-lg">
            <br>
            Mempermudah pemetaan siswa yang sedang PKL,<br>
            lengkap dengan data industri & guru pembimbing
        </p>
    </div>
</main>



        <!-- 🖼️ Galeri Sejurusan -->
        <section class="px-10 py-10 z-10 max-w-7xl mx-auto w-full">
            <!-- <h2 class="text-3xl font-bold text-center text-pink-600 mb-10">This Is SIJA</h2>
            <p class="text-center text-gray-600 text-lg mb-10"> Sistem Informasi Jaringan & Aplikasi </p> -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach (['fotosija_1.jpg', 'fotosija_2.jpg', 'fotosija_3.jpg'] as $foto)
                    <div class="rounded-xl overflow-hidden shadow-lg hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('images/' . $foto) }}" alt="Foto Sejurusan" class="w-full h-60 object-cover">
                    </div>
                @endforeach
            </div>
        </section>

        <!-- 📦 Footer -->
        <footer class="bg-white text-center py-6 border-t border-pink-100 mt-10 z-10">
            <p class="text-sm text-gray-500">
                &copy; {{ date('Y') }} SIJAVERSE. All rights reserved.
            </p>
        </footer>
    </div>
</x-guest-layout>
