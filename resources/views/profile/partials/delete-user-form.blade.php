{{-- <section class="space-y-8 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-lg relative">
    <header>
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="w-full py-3 px-6 bg-red-600 text-white font-semibold text-lg rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
    >{{ __('Delete Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="bg-white p-8 rounded-lg shadow-xl">
            @csrf
            @method('delete')

            <h2 class="text-xl font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-full py-3 px-4 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="{{ __('Enter your password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="py-2 px-4 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button type="submit" class="py-2 px-6 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

    @if (session('status') === 'account-deleted')
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 30000)" class="fixed top-4 right-4 p-4 bg-red-500 text-white rounded-md shadow-lg flex items-center z-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            <p>{{ __('Your account has been deleted successfully!') }}</p>
        </div>
    @endif
</section> --}}

<section class="relative">
    <div class="mb-6">
        <div class="flex items-center space-x-3 mb-3">
            <div class="h-10 w-1 bg-[#ef4444] rounded-full"></div>
            <h2 class="text-2xl font-bold text-[#ef4444]">
                {{ __('Delete Account') }}
            </h2>
        </div>

        <p class="mt-2 text-sm text-gray-300 leading-relaxed max-w-2xl">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </div>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="w-full py-4 px-6 bg-gradient-to-r from-[#ef4444] to-[#f97316] text-white font-bold text-lg rounded-lg hover:from-[#dc2626] hover:to-[#ea580c] focus:outline-none focus:ring-2 focus:ring-[#ef4444] transition-all duration-300 flex items-center justify-center gap-2"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
        {{ __('Delete Account') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <div class="bg-[#111827] p-6 rounded-lg">
            <div class="flex items-center gap-4 mb-6">
                <div class="h-12 w-12 rounded-full bg-[#ef4444]/20 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#ef4444]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h2 class="text-xl font-bold text-white">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>
            </div>

            <p class="mt-2 text-sm text-gray-300 leading-relaxed mb-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <form method="post" action="{{ route('profile.destroy') }}" class="mt-6">
                @csrf
                @method('delete')

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">{{ __('Password') }}</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="block w-full bg-[#1e293b] border border-gray-700 rounded-lg py-3 px-4 text-white focus:ring-2 focus:ring-[#ef4444] focus:border-[#ef4444] transition-all duration-300"
                        placeholder="{{ __('Enter your password') }}"
                    />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-sm text-red-400" />
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" x-on:click="$dispatch('close')" class="py-2 px-4 bg-[#1e293b] text-gray-200 rounded-lg hover:bg-[#334155] focus:outline-none focus:ring-2 focus:ring-gray-500 transition-all duration-300">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="py-2 px-6 bg-gradient-to-r from-[#ef4444] to-[#f97316] text-white rounded-lg hover:from-[#dc2626] hover:to-[#ea580c] focus:outline-none focus:ring-2 focus:ring-[#ef4444] transition-all duration-300">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>

    @if (session('status') === 'account-deleted')
        <div x-data="{ show: true }" 
             x-show="show" 
             x-init="setTimeout(() => show = false, 3000)"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-y-4"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform translate-y-4"
             class="fixed top-20 right-4 p-4 bg-[#ef4444] text-white rounded-lg shadow-2xl flex items-center z-50 max-w-md">
            <div class="mr-3 bg-white/20 rounded-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div>
                <h3 class="font-bold">{{ __('Account Deleted') }}</h3>
                <p>{{ __('Your account has been deleted successfully!') }}</p>
            </div>
            <button @click="show = false" class="ml-auto bg-white/20 rounded-full p-1 hover:bg-white/30 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    @endif
</section>

