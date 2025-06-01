<x-guest-layout>
    <div class="min-h-screen relative bg-pink-50 flex items-center justify-center overflow-hidden font-poppins">

        {{-- Bubble Backgrounds --}}
        <div class="absolute top-10 left-10 w-72 h-72 bg-pink-400 rounded-full opacity-25 blur-3xl animate-bounce-slow z-0"></div>
        <div class="absolute top-1/2 left-1/3 w-96 h-96 bg-pink-400 rounded-full opacity-25 blur-3xl animate-spin-slow z-0"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 bg-pink-400 rounded-full opacity-25 blur-3xl animate-pulse z-0"></div>

        {{-- Register Form Card --}}
        <div class="z-10 w-full max-w-md px-6">
            <div class="text-center text-pink-600 text-2xl font-bold mb-6">SIJAVERSE</div>

            <div class="bg-white rounded-xl shadow-xl px-8 py-10">

                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-label for="u" value="{{ __('Username') }}" class="text-pink-600 font-semibold text-base" />
                        <x-input
                            id="name"
                            placeholder="Masukkan username"
                            class="block mt-2 w-full bg-pink-50 border-pink-300 focus:border-pink-500 focus:ring-pink-500 rounded-lg shadow-sm py-2 px-4 text-base"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                        />
                    </div>

                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="text-pink-600 font-semibold text-base" />
                        <x-input
                            id="email"
                            placeholder="Masukkan email"
                            class="block mt-2 w-full bg-pink-50 border-pink-300 focus:border-pink-500 focus:ring-pink-500 rounded-lg shadow-sm py-2 px-4 text-base"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                        />
                    </div>

                    <div>
                        <x-label for="password" value="{{ __('Password') }}" class="text-pink-600 font-semibold text-base" />
                        <x-input
                            id="password"
                            placeholder="Masukkan password"
                            class="block mt-2 w-full bg-pink-50 border-pink-300 focus:border-pink-500 focus:ring-pink-500 rounded-lg shadow-sm py-2 px-4 text-base"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                        />
                    </div>

                    <div>
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-pink-600 font-semibold text-base" />
                        <x-input
                            id="password_confirmation"
                            placeholder="Konfirmasi password"
                            class="block mt-2 w-full bg-pink-50 border-pink-300 focus:border-pink-500 focus:ring-pink-500 rounded-lg shadow-sm py-2 px-4 text-base"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                        />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div>
                            <x-label for="terms" class="text-pink-600 font-semibold text-base">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" class="text-pink-500 focus:ring-pink-500" required />

                                    <div class="ms-2 text-sm text-gray-600">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-pink-500 hover:text-pink-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-pink-500 hover:text-pink-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-between">
                        <a class="underline text-sm text-pink-500 hover:text-pink-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="bg-pink-500 hover:bg-pink-600 text-white font-semibold py-2 px-6 rounded-lg transition duration-150 ease-in-out text-base">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
