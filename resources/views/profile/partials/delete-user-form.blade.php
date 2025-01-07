<section class="space-y-8 bg-gray-50 dark:bg-gray-800 p-6 rounded-lg shadow-lg relative">
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
</section>