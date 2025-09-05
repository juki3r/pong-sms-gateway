<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h3 class="text-center w-100 fs-4 mb-5">Login</h3>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" 
                          type="email" name="email" 
                          :value="old('email')" required autofocus 
                          autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <!-- Eye Button -->
                <button type="button" 
                        onclick="togglePassword()" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-600 hover:text-gray-900">
                    👁️
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" 
                       class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" 
                       name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Login Button -->
        <div class="mt-6">
            <x-primary-button class="w-full justify-center">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <!-- Links Row -->
        <div class="mt-4 flex justify-between text-sm w-full">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" 
                   class="text-gray-600 hover:text-gray-900">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}" 
                   class="text-indigo-600 hover:text-indigo-900 font-medium">
                    {{ __('Register') }}
                </a>
            @endif
        </div>
    </form>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
