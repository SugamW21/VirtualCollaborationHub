{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Update Profile Information Card -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg transition-transform transform hover:scale-105 border border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Update Profile Information</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Change Password Card -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg transition-transform transform hover:scale-105 border border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Change Password</h3>
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="p-6 bg-white dark:bg-gray-800 shadow-lg rounded-lg transition-transform transform hover:scale-105 border border-gray-300 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Delete Account</h3>
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Additional CSS for enhancement */
        body {
            background-color: #f9fafb; /* Light background for better contrast */
            font-family: 'Inter', sans-serif; /* Modern font */
        }

        .transition-transform:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Enhanced shadow */
        }

        h3 {
            border-bottom: 2px solid #4f46e5; /* Bottom border for section titles */
            padding-bottom: 8px; /* Padding for better spacing */
        }

        /* Responsive adjustments */
        @media (max-width: 640px) {
            .max-w-xl {
                width: 100%; /* Full width on small screens */
            }
        }
    </style>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-white leading-tight">
                {{ __('Profile') }}
            </h2>
            <div class="flex items-center space-x-2">
                <span class="relative flex h-3 w-3">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                </span>
                <span class="text-sm text-gray-400">{{ __('Online') }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12 min-h-screen bg-[#111827]">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Main Container with Gradient Border -->
            <div class="rounded-2xl p-[1px] bg-gradient-to-r from-cyan-500 via-purple-500 to-pink-500 shadow-xl">
                <div class="bg-[#111827] rounded-2xl">
                    <!-- Update Profile Information Card -->
                    <div class="p-6">
                        <div class="max-w-4xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Change Password Card -->
                    <div class="p-6">
                        <div class="max-w-4xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Delete Account Card -->
                    <div class="p-6">
                        <div class="max-w-4xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Additional CSS for enhancement */
        body {
            background-color: #111827; /* Dark background */
            font-family: 'Inter', sans-serif; /* Modern font */
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #6366f1, #8b5cf6);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #4f46e5, #7c3aed);
        }
    </style>
</x-app-layout>

