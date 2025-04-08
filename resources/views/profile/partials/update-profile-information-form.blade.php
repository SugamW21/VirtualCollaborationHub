{{-- <section class="p-6 bg-gray-800 rounded-lg shadow-md relative">
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>
    

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-700 text-white" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-700 text-white" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-400 hover:text-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form> --}}{{-- 
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

                <!-- Profile Image -->
        <div>
            <x-input-label for="image" :value="__('Change profile')" class="text-white" />
            <input id="image" name="image" type="file" class="mt-1 block w-full bg-gray-700 text-white" accept="image/*" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>
    
        <!-- Current Profile Image -->
        <div class="mt-4">
            @if ($user->image)
                <img src="{{ asset($user->image) }}" alt="Profile Image" style="width: 150px" class="rounded-full">
            @else
                <p class="text-gray-400">{{ __('No profile image uploaded') }}</p>
            @endif
            
        </div>
    
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="text-white" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full bg-gray-700 text-white" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
    
        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-white" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full bg-gray-700 text-white" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
    

    
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
    

    @if (session('status') === 'profile-updated')
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="fixed top-4 right-4 p-4 bg-green-500 text-white rounded-md shadow-lg flex items-center z-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            <p>{{ __('Your profile has been updated successfully!') }}</p>
        </div>
    @endif
</section> --}}

<section class="relative">
    <div class="mb-6">
        <div class="flex items-center space-x-3 mb-3">
            <div class="h-10 w-1 bg-[#3b82f6] rounded-full"></div>
            <h2 class="text-2xl font-bold text-[#3b82f6]">
                {{ __('Profile Information') }}
            </h2>
        </div>

        <p class="mt-2 text-sm text-gray-300">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-8">
        @csrf
        @method('patch')

        <!-- Profile Image -->
        <div class="mb-8">
            <label class="block text-sm font-medium text-gray-300 mb-2">{{ __('Profile Image') }}</label>
            
            <div class="flex items-start">
                <!-- Current Profile Image with Camera Icon -->
                <div class="relative group">
                    @if ($user->image)
                        <div class="h-24 w-24 rounded-full overflow-hidden border-2 border-[#3b82f6]/50 group-hover:border-[#3b82f6] transition-all duration-300">
                            <img src="{{ asset($user->image) }}" alt="Profile Image" class="h-full w-full object-cover" />
                        </div>
                    @else
                        <div class="h-24 w-24 rounded-full bg-[#1e293b] flex items-center justify-center border-2 border-[#3b82f6]/50 group-hover:border-[#3b82f6] transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    @endif
                    
                    <!-- Camera Icon Button -->
                    <label for="image" class="absolute -bottom-1 -right-1 h-8 w-8 bg-[#3b82f6] rounded-full flex items-center justify-center text-white shadow-lg transform group-hover:scale-110 transition-all duration-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <input id="image" name="image" type="file" class="hidden" accept="image/*" />
                    </label>
                </div>
                
                <div class="ml-6 flex-1">
                    <div class="text-sm text-gray-300">{{ __('JPG, PNG, GIF up to 2MB') }}</div>
                    <div class="mt-1 text-xs text-gray-400">{{ __('Click the camera icon to change your profile image') }}</div>
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                </div>
            </div>
        </div>

        <!-- Name -->
        <div class="mb-6">
            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Name') }}</label>
            <input id="name" name="name" type="text" 
                class="block w-full bg-[#1e293b] border border-gray-700 rounded-lg py-3 px-4 text-white focus:ring-2 focus:ring-[#3b82f6] focus:border-[#3b82f6] transition-all duration-300" 
                value="{{ old('name', $user->name) }}" 
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Email') }}</label>
            <div class="flex">
                <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-700 bg-gray-700/50 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
                <input id="email" name="email" type="email" 
                    class="block w-full bg-[#1e293b] border border-gray-700 rounded-r-lg py-3 px-4 text-white focus:ring-2 focus:ring-[#3b82f6] focus:border-[#3b82f6] transition-all duration-300" 
                    value="{{ old('email', $user->email) }}" 
                    required autocomplete="username" />
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div class="flex items-center">
            <button type="submit" class="w-full py-3 px-6 bg-gradient-to-r from-[#3b82f6] to-[#60a5fa] text-white font-bold rounded-lg hover:from-[#2563eb] hover:to-[#3b82f6] focus:outline-none focus:ring-2 focus:ring-[#3b82f6] transition-all duration-300 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                {{ __('Save Changes') }}
            </button>
        </div>
    </form>

    @if (session('status') === 'profile-updated')
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 3000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4"
             class="fixed top-20 right-4 p-4 bg-[#3b82f6] text-white rounded-lg shadow-2xl flex items-center z-50 max-w-md">
            <div class="mr-3 bg-white/20 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold">{{ __('Profile Updated') }}</h3>
                <p>{{ __('Your profile has been updated successfully!') }}</p>
            </div>
            <button @click="show = false" class="ml-auto bg-white/20 rounded-full p-1 hover:bg-white/30 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
</section>

