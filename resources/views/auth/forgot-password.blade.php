{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}

    <!-- Session Status -->
    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

    {{-- <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<x-guest-layout>
    <div class="flex flex-col min-h-screen bg-gray-100">
        <!-- Header Section -->
        <div class="bg-blue-600 py-6">
            <h1 class="text-center text-white text-3xl font-bold">Virtual Collaboration hub</h1>
        </div>

        <!-- Content Section -->
        <div class="flex items-center justify-center flex-grow">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <div class="flex justify-center mb-4">
                    <img src="https://via.placeholder.com/50" alt="Icon" class="rounded-full bg-blue-100 p-3">
                </div>
                <h2 class="text-center text-2xl font-bold text-gray-800 mb-2">Forgot Password</h2>
                <p class="text-center text-gray-500 text-sm mb-6">
                    Enter your email and we’ll send you a link to reset your password.
                </p>

                <!-- Session Status -->
                @if (session('status'))
                    <div class="text-center text-green-600 mb-4">{{ session('status') }}</div>
                @endif

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="text-center text-red-600 text-sm mb-4">
                        {{ $errors->first() }}
                    </div>
                @endif

                <!-- Form -->
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-sm text-gray-700 mb-2">Email Address</label>
                        <div class="relative">
                            <input type="email" id="email" name="email" 
                                   class="block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" 
                                   placeholder="Enter your email" required>
                            <span class="absolute inset-y-0 right-4 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m4-4v8" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <button type="submit" 
                            class="w-full py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">
                        Submit
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">← Back to Login</a>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="text-center text-gray-500 text-sm py-4">
            Virtual Collaboration hub Copyright © 2024 <br>
                    </footer>
    </div>
</x-guest-layout>

