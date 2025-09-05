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

        <!-- Password with Show/Hide -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Password')" />

            <div class="relative">
                <x-text-input id="password" 
                              class="block mt-1 w-full pr-10"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />

                <!-- Toggle Button -->
                <button type="button" 
                        onclick="togglePassword()" 
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" 
                         class="h-5 w-5" fill="none" viewBox="0 0 24 24" 
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 
                                 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
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

    <!-- Script for toggle -->
    <script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        const eyeIcon = document.getElementById("eyeIcon");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            // Eye-off icon
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7
                         a10.05 10.05 0 012.052-3.368M9.88 9.88a3 3 0 104.24 4.24" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15 15l5 5m-5-5L5 5" />`;
        } else {
            passwordField.type = "password";
            // Eye icon
            eyeIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 
                       9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
        }
    }
    </script>
</x-guest-layout>
