<x-app-layout>
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
</x-app-layout>