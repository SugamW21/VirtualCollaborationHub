<Style>
    /* Dropdown Menu */
.x-dropdown {
    background-color: #1a1a1a; /* Dark background */
    border: 1px solid #333; /* Subtle border */
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    padding: 10px;
    min-width: 200px;
}

/* Dropdown Links */
.x-dropdown a {
    display: block;
    padding: 10px;
    color: #ffffff; /* White text */
    transition: background 0.3s ease-in-out;
}

.x-dropdown a:hover {
    background: #333; /* Darker background on hover */
}

</Style>

<nav x-data="{ open: false }" class="bg-black border-b border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <h1 class="text-white font-bold text-xl">Virtual Collaboration Hub</h1>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-500">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('groups')" :active="request()->routeIs('groups')" class="text-white hover:text-gray-500">
                        {{ __('Groups') }}
                    </x-nav-link>
                    <x-nav-link :href="route('groupChats')" :active="request()->routeIs('groupChats')" class="text-white hover:text-gray-500">
                        {{ __('CollaborateChat') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.index')" class="text-white hover:text-gray-500">
                        {{ __('TaskManagement') }}
                    </x-nav-link>
                    <x-nav-link :href="route('meetings.meeting')" :active="request()->routeIs('meetings.meeting')" class="text-white hover:text-gray-500">
                        {{ __('Meeting') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-black hover:text-gray-500 focus:outline-none transition ease-in-out duration-150">
                            @if (Auth::user()->image)
                                <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image" class="w-10 h-10 rounded-full mr-2">
                            @else
                                <p class="w-10 h-10 rounded-full bg-gray-500 flex items-center justify-center text-white text-xs font-semibold mr-2">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </p>
                            @endif
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a 1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" >
                        {{-- <x-dropdown-link :href="route('profile.edit')" class="text-white hover:bg-gray-700">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('feedbackandrating')" @click="showFeedbackModal = true" class="text-white hover:bg-gray-700">
                            {{ __('Feedback') }}
                       </x-dropdown-link>


                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="text-white hover:bg-gray-700">
                                {{ __('Log Out') }}
                            </x-dropdown-link> --}}
                            <x-dropdown-link :href="route('profile.edit')" class="text-blue-500 hover:bg-gray-200">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            
                            <x-dropdown-link :href="route('feedbackandrating')" @click="showFeedbackModal = true" class="text-blue-500 hover:bg-gray-200">
                                {{ __('Feedback') }}
                            </x-dropdown-link>
                            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                            
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();" class="text-blue-500 hover:bg-gray-200">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                            
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-900 focus:outline-none focus:bg-gray-900 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-gray-500">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:bg-gray-700">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-white hover:bg-gray-700">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
