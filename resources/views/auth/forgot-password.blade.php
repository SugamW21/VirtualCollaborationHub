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

{{-- <x-guest-layout>
    <div class="flex flex-col min-h-screen bg-gray-100">
        <!-- Header Section -->
        <div class="bg-blue-600 py-6">
            <h1 class="text-center text-white text-3xl font-bold">Virtual Collaboration hub</h1>
        </div>

        <!-- Content Section -->
        <div class="flex items-center justify-center flex-grow">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
                <div class="flex justify-center mb-4">
                    <img src="images/logo.png"  width="100px" alt="Icon" class="rounded-full bg-blue-100 p-3">
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
 --}}

 <x-guest-layout>
    <div style="min-height: 100vh; background: linear-gradient(135deg, #6B46C1 0%, #4F46E5 100%); display: flex; align-items: center; justify-content: center; padding: 20px; font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;">
        <div style="width: 100%; max-width: 500px; background-color: rgba(255, 255, 255, 0.95); border-radius: 16px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); overflow: hidden;">
            <!-- Header with wave design -->
            <div style="background: linear-gradient(90deg, #6B46C1, #4F46E5); height: 120px; position: relative; display: flex; align-items: center; justify-content: center;">
                <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 40px;">
                    <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                        <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: rgba(255, 255, 255, 0.95);"></path>
                    </svg>
                </div>
                <img src="/images/logo.png" alt="Logo" style="width: 80px; height: 80px; object-fit: contain; z-index: 10; filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.1));">
            </div>
            
            <!-- Content -->
            <div style="padding: 30px 40px 40px;">
                <h1 style="color: #1F2937; font-size: 24px; font-weight: 700; text-align: center; margin-bottom: 16px;">Forgot Password</h1>
                
                <p style="color: #4B5563; font-size: 16px; line-height: 1.5; margin-bottom: 24px; text-align: center;">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
                </p>
                
                <!-- Session Status -->
                @if (session('status'))
                    <div style="background-color: #D1FAE5; border-left: 4px solid #10B981; padding: 16px; border-radius: 8px; margin-bottom: 24px;">
                        <p style="color: #065F46; font-size: 14px; margin: 0;">
                            {{ session('status') }}
                        </p>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    
                    <div style="margin-bottom: 24px;">
                        <label for="email" style="display: block; font-size: 14px; font-weight: 500; color: #4B5563; margin-bottom: 8px;">
                            {{ __('Email') }}
                        </label>
                        
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus
                               style="width: 100%; padding: 12px 16px; border: 1px solid #D1D5DB; border-radius: 8px; font-size: 16px; transition: all 0.2s; outline: none; box-sizing: border-box;">
                        
                        @error('email')
                            <p style="color: #EF4444; font-size: 14px; margin-top: 8px;">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <button type="submit" style="width: 100%; background: linear-gradient(90deg, #6B46C1, #4F46E5); color: white; border: none; padding: 12px 20px; border-radius: 8px; font-weight: 600; font-size: 16px; cursor: pointer; transition: all 0.2s; box-shadow: 0 4px 6px rgba(107, 70, 193, 0.25);">
                        {{ __('Email Password Reset Link') }}
                    </button>
                    
                    <a href="{{ route('login') }}" style="display: block; text-align: center; margin-top: 20px; color: #6B46C1; text-decoration: none; font-weight: 500; font-size: 16px;">
                        {{ __('← Back to Login') }}
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>

