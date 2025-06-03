<x-guest-layout>
    <div class="min-h-screen relative bg-pink-50 flex items-center justify-center overflow-hidden font-poppins">

        {{-- Bubble Backgrounds --}}
        <div class="absolute top-10 left-10 w-72 h-72 bg-pink-400 rounded-full opacity-25 blur-3xl animate-bounce-slow z-0"></div>
        <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-pink-400 rounded-full opacity-25 blur-3xl animate-spin-slow z-0"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-pink-400 rounded-full opacity-25 blur-3xl animate-pulse z-0"></div>

        

        {{-- Login Form Card --}}
        <div class="z-10 w-full max-w-md px-6">
                    <div class="text-center text-pink-600 text-2xl font-bold mb-6">SIJAVERSE</div>

            <div class="bg-white rounded-xl shadow-xl px-8 py-10">

                <x-validation-errors class="mb-4" />

                @session('status')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ $value }}
                    </div>
                @endsession

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="text-pink-600 font-semibold text-base" />
                        <x-input
                            id="email"
                            placeholder="Masukkan email kamu"
                            class="block mt-2 w-full border-pink-300 focus:border-pink-500 focus:ring-pink-500 rounded-lg shadow-sm py-2 px-4 text-base"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            autocomplete="username"
                        />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Password') }}" class="text-pink-600 font-semibold text-base" />
                        <x-input
                            id="password"
                            class="block mt-2 w-full border-pink-300 focus:border-pink-500 focus:ring-pink-500 rounded-lg shadow-sm py-2 px-4 text-base"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center">
                            <x-checkbox id="remember_me" name="remember" class="text-pink-500 focus:ring-pink-500" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-pink-500 hover:text-pink-700" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <div>
                        <x-button class="w-full justify-center bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 rounded-lg transition duration-150 ease-in-out text-base">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
