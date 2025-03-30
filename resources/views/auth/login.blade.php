{{-- 
 <x-guest-layout>
    <head>
        <link rel="icon" href="/images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
    </head>
    <!-- Full Screen Background -->
    <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <!-- Background Video -->
        <video autoplay loop muted class="absolute inset-0 w-full h-full" style="object-fit: cover;">
            <source src="videos/Logreg.mp4" type="video/mp4">
            <!-- Add fallback sources in case mp4 is not supported -->
            <source src="videos/Logreg.webm" type="video/webm">
        </video>
        <div class="absolute inset-0 bg-black opacity-30"></div> <!-- Optional dark overlay for better contrast -->

        <!-- Go Back Button -->
        <div class="absolute top-4 left-4 z-10">
            <a href="{{ route('home') }}" class="px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Go Back
            </a>
        </div>
        
        <!-- Form Container -->
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg space-y-6 z-10">
            <h2 class="text-2xl font-semibold text-center text-gray-800">Virtual Collaboration Hub</h2>
            <p class="text-center text-gray-600">Sign in to access your account</p>
    
            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>
    
                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center text-gray-600">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-between mt-6">
                    <!-- Forgot Password Link -->
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
    
                    <!-- Login Button -->
                    <x-primary-button class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
            <div class="text-center mt-4">
                <p class="text-sm text-gray-600">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500">
                        {{ __('Register now') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout> --}}


<x-guest-layout>
    <head>
        <link rel="icon" href="/images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
    </head>

    <!-- Full Screen Background -->
    <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <!-- Background Video -->
        <video autoplay loop muted class="absolute inset-0 w-full h-full" style="object-fit: cover;">
            <source src="videos/Logreg.mp4" type="video/mp4">
            <!-- Add fallback sources in case mp4 is not supported -->
            <source src="videos/Logreg.webm" type="video/webm">
        </video>
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Darker overlay for contrast -->

        <!-- Go Back Button -->
        <div class="absolute top-6 left-6 z-10">
            <a href="{{ route('home') }}" style="padding: 12px 24px; background-color: #00000099; color: rgb(255, 255, 255); border-radius: 8px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 6px rgba(255, 255, 255, 0.356); text-decoration: none; transition: all 0.3s ease-in-out;">
                👈 Go Back
            </a>
        </div>

        <!-- Form Container (Transparent) -->
        <div style="width: 100%; max-width: 450px; padding: 40px; background-color: rgba(255, 255, 255, 0); backdrop-filter: blur(10px); border-radius: 12px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.244); position: relative; z-index: 10; opacity: 0.95;">
            <img src="/images/logo.png" alt="logo" style="width: 100px; height: auto; margin: 0 auto; display: block; margin-bottom: 20px; opacity: 0.50;">
            <h2 style="font-size: 28px; font-weight: 600; text-align: center; color: #ffffff; margin-bottom: 20px;">Virtual Collaboration Hub</h2>
            <p style="text-align: center; color: #ffffff; font-size: 16px; margin-bottom: 30px;">Sign in to access your account</p>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div style="margin-bottom: 20px;">
                    <x-input-label style="color: #fffefe" for="email" :value="__('Email')" />
                    <x-text-input id="email" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #fffefe; box-sizing: border-box; font-size: 16px; transition: all 0.3s ease; background: rgba(255, 255, 255, 0.7);" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Enter your email" />
                    <x-input-error :messages="$errors->get('email')" style="color: red; font-size: 14px; margin-top: 5px;" />
                </div>

                <!-- Password -->
                <div style="margin-bottom: 20px;">
                    <x-input-label style="color: #fffefe" for="password" :value="__('Password')" />
                    <x-text-input id="password" style="width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #ffffff; box-sizing: border-box; font-size: 16px; transition: all 0.3s ease; background: rgba(255, 255, 255, 0.7);" type="password" name="password" required autocomplete="current-password" placeholder="Enter your password" />
                    <x-input-error :messages="$errors->get('password')" style="color: red; font-size: 14px; margin-top: 5px;" />
                </div>

                <!-- Remember Me -->
                <div style="margin-bottom: 20px;">
                    <label for="remember_me" style="font-size: 16px; color: #555;">
                        <input id="remember_me" type="checkbox" style="width: 18px; height: 18px; margin-right: 10px; vertical-align: middle;" name="remember">
                        <span style="font-size: 14px; color: #ffffff;">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Forgot Password and Login Button -->
                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 30px;">
                    <!-- Forgot Password Link -->
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="font-size: 14px; color: #4A90E2; text-decoration: none; transition: color 0.3s;">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <!-- Login Button -->
                    <button type="submit" style="padding: 12px 24px; background-color: #4A90E2; color: white; border-radius: 8px; font-weight: bold; text-transform: uppercase; border: none; cursor: pointer; transition: all 0.3s ease;">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>

            <div style="text-align: center; margin-top: 20px;">
                <p style="font-size: 14px; color: #ffffff;">
                    {{ __("Don't have an account?") }}
                    <a href="{{ route('register') }}" style="color: #4A90E2; text-decoration: none; font-weight: bold; transition: color 0.3s;">
                        {{ __('Register now') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
