{{-- 
<x-guest-layout>
    <head>
        <link rel="icon" href="/images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
    </head>
    <style>
        /* Form Container Styles */
        .form-container {
            max-width: 350px; /* Further reduced max width */
            margin: 0 auto; /* Center the form */
            padding: 1.5rem; /* Reduced padding */
        }

        /* Responsive Adjustments */
        @media (max-width: 600px) {
            .form-container {
                width: 90%; /* Ensure it takes more width on smaller screens */
                padding: 1rem; /* Less padding on small screens */
            }
            .text-2xl {
                font-size: 1.3rem; /* Smaller title size */
            }
        }

        /* Input Field Styles */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            height: 35px; /* Set a specific height for input fields */
            padding: 0.3rem; /* Reduced padding */
            font-size: 0.9rem; /* Smaller font size */
        }

        /* Button Size Adjustments */
        .px-6 {
            padding-left: 1rem; /* Adjust horizontal padding */
            padding-right: 1rem; /* Adjust horizontal padding */
            font-size: 0.9rem; /* Smaller button font size */
        }
        
        .error-message {
            font-size: 0.8rem; /* Smaller error message size */
        }
    </style>

    <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <video autoplay loop muted class="absolute inset-0 w-full h-full" style="object-fit: cover;">
            <source src="videos/Logreg.mp4" type="video/mp4">
            <source src="videos/Logreg.webm" type="video/webm">
        </video>
        <div class="absolute inset-0 bg-black opacity-30"></div>

        <!-- Go Back Button -->
        <div class="absolute top-4 left-4 z-10">
            <a href="{{ route('home') }}" class="px-6 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Go Back
            </a>
        </div>

        <!-- Form Container -->
        <div class="w-full p-3 bg-white rounded-lg shadow-lg space-y-6 z-10 form-container">
            <h2 class="text-xl font-semibold text-center text-gray-800">Virtual Collaboration Hub</h2>
            <p class="text-center text-gray-600 text-sm">Create your account to get started</p>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Image Upload -->
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Profile Image')" />
                    <input id="image" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="file" name="image" accept="image/*" />
                    <x-input-error :messages="$errors->get('image')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout> --}}

<x-guest-layout>
    <head>
        <link rel="icon" href="/images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
    </head>
    <style>
        /* Full Screen Background */
        .background-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        /* Form Container Styles */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 1.5rem;
            background: rgba(0, 0, 0, 0.091);
            backdrop-filter: blur(10px); /* Glassmorphism effect */
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }

        .form-container h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-container p {
            font-size: 1rem;
            color: #ffffff;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Input Field Styles */
        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"] {
            height: 40px;
            padding: 0.5rem;
            font-size: 1rem;
            border: 1px solid #D1D1D1;
            border-radius: 8px;
            width: 100%;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 0.8rem;
            color: red;
            margin-top: 5px;
        }

        /* Button Styles */
        .px-6 {
            padding-left: 1rem;
            padding-right: 1rem;
            font-size: 1rem;
        }

        .btn {
            background-color: #4A90E2;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn:hover {
            background-color: #357ABD;
        }

        /* Responsive Adjustments */
        @media (max-width: 600px) {
            .form-container {
                width: 90%;
                padding: 1rem;
            }

            .form-container h2 {
                font-size: 1.5rem;
            }

            .form-container p {
                font-size: 0.9rem;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"],
            input[type="file"] {
                font-size: 0.9rem;
            }

            .px-6 {
                padding-left: 0.8rem;
                padding-right: 0.8rem;
            }
        }
    </style>

    <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <video autoplay loop muted class="background-video">
            <source src="videos/Logreg.mp4" type="video/mp4">
            <source src="videos/Logreg.webm" type="video/webm">
        </video>
        <div class="overlay"></div>

        <!-- Go Back Button -->
        <div class="absolute top-6 left-6 z-10">
            <a href="{{ route('home') }}" style="padding: 12px 24px; background-color: #00000099; color: rgb(255, 255, 255); border-radius: 8px; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 4px 6px rgba(255, 255, 255, 0.356); text-decoration: none; transition: all 0.3s ease-in-out;">
                👈 Go Back
            </a>
        </div>

        <!-- Form Container -->
        <div class="form-container">
            <img src="/images/logo.png" alt="logo" style="width: 100px; height: auto; margin: 0 auto; display: block; margin-bottom: 20px; opacity: 0.50;">
            <h2>Virtual Collaboration Hub</h2>
            <p>Create your account to get started</p>

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label style="color: #fffefe" for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label style="color: #fffefe" for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label style="color: #fffefe" for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Image Upload -->
                <div class="mt-4">
                    <x-input-label style="color: #fffefe" for="image" :value="__('Profile Image')" />
                    <input id="image" style="color: #fffefe" class="block mt-1 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" type="file" name="image" accept="image/*" />
                    <x-input-error :messages="$errors->get('image')" class="mt-1 text-sm text-red-600 error-message" />
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-between mt-6">
                    <b><a href="{{ route('login') }}"  class="text-sm text-indigo-600 hover:text-indigo-500">
                        {{ __('Already registered?') }}
                    </a><b>
                    <x-primary-button class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
