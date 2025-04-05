<style>
    /* Base Styles - with !important to prevent Bootstrap overrides */
    :root {
        --primary: #6366f1;
        --primary-hover: #4f46e5;
        --secondary: #10b981;
        --accent: #f43f5e;
        --dark: #0f172a;
        --darker: #020617;
        --light: #f8fafc;
        --border: #1e293b;
        --text-primary: #f8fafc;
        --text-secondary: #ffffff;
    }

    /* Glassmorphism Navigation - with higher z-index and !important */
    nav.collab-nav {
        background: rgba(15, 23, 42, 0.95) !important;
        backdrop-filter: blur(10px) !important;
        -webkit-backdrop-filter: blur(10px) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08) !important;
        position: sticky !important;
        top: 0 !important;
        z-index: 1050 !important; /* Higher than Bootstrap's default */
        transition: all 0.3s ease !important;
        width: 100% !important;
    }

    /* Logo Container */
    .logo-container {
        display: flex !important;
        align-items: center !important;
        gap: 12px !important;
    }

    /* App Logo */
    .app-logo {
        width: 36px !important;
        height: 36px !important;
        border-radius: 8px !important;
        background: linear-gradient(135deg, var(--primary), var(--secondary)) !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        color: white !important;
        font-weight: bold !important;
        font-size: 18px !important;
        box-shadow: 0 2px 10px rgba(99, 102, 241, 0.3) !important;
        transition: all 0.3s ease !important;
    }

    .app-logo:hover {
        transform: scale(1.05) !important;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4) !important;
    }

    .app-logo img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
        border-radius: 8px !important;
    }

    /* Logo Animation */
    .logo-text {
        background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
        -webkit-background-clip: text !important;
        background-clip: text !important;
        color: transparent !important;
        background-size: 200% auto !important;
        animation: shine 3s linear infinite !important;
        font-weight: bold !important;
    }

    @keyframes shine {
        to {
            background-position: 200% center;
        }
    }

    /* Navigation Links - with !important */
    .nav-link {
        position: relative !important;
        color: var(--text-secondary) !important;
        font-weight: 500 !important;
        transition: all 0.3s ease !important;
        padding: 0.5rem 0.75rem !important;
        border-radius: 0.375rem !important;
        text-decoration: none !important;
        display: flex !important;
        align-items: center !important;
    }

    .nav-link:hover {
        color: var(--text-primary) !important;
        background: rgba(255, 255, 255, 0.05) !important;
    }

    .nav-link.active {
        color: var(--primary) !important;
        font-weight: 600 !important;
    }

    .nav-link.active::after {
        content: '' !important;
        position: absolute !important;
        bottom: -1px !important;
        left: 0.75rem !important;
        right: 0.75rem !important;
        height: 2px !important;
        background: linear-gradient(90deg, var(--primary), var(--secondary)) !important;
        border-radius: 1px !important;
        transform-origin: center !important;
        animation: navIndicator 0.3s ease forwards !important;
    }

    @keyframes navIndicator {
        from {
            transform: scaleX(0);
            opacity: 0;
        }
        to {
            transform: scaleX(1);
            opacity: 1;
        }
    }

    /* User Profile Button - with !important */
    .profile-button {
        background: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        transition: all 0.3s ease !important;
        overflow: hidden !important;
        display: flex !important;
        align-items: center !important;
    }

    .profile-button:hover {
        background: rgba(255, 255, 255, 0.1) !important;
        border-color: rgba(255, 255, 255, 0.2) !important;
        transform: translateY(-1px) !important;
    }

    .profile-button:focus {
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5) !important;
        outline: none !important;
    }

    .profile-avatar {
        position: relative !important;
        overflow: hidden !important;
        transition: all 0.3s ease !important;
    }

    .profile-button:hover .profile-avatar {
        transform: scale(1.05) !important;
    }

    /* Dropdown Menu - with !important and higher z-index */
    .x-dropdown {
        background: rgba(15, 23, 42, 0.95) !important;
        backdrop-filter: blur(10px) !important;
        -webkit-backdrop-filter: blur(10px) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 0.75rem !important;
        box-shadow: 
            0 10px 25px -5px rgba(0, 0, 0, 0.3) !important,
            0 8px 10px -6px rgba(0, 0, 0, 0.2) !important,
            0 0 0 1px rgba(255, 255, 255, 0.05) !important;
        padding: 0.5rem !important;
        min-width: 220px !important;
        transform-origin: top right !important;
        animation: dropdownAppear 0.2s ease forwards !important;
        z-index: 1060 !important; /* Higher than Bootstrap's default */
    }

    @keyframes dropdownAppear {
        from {
            opacity: 0;
            transform: scale(0.95);
        }
        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    .x-dropdown a {
        display: flex !important;
        align-items: center !important;
        padding: 0.75rem 1rem !important;
        color: var(--text-primary) !important;
        border-radius: 0.5rem !important;
        transition: all 0.2s ease !important;
        margin-bottom: 0.25rem !important;
        font-weight: 500 !important;
        text-decoration: none !important;
    }

    .x-dropdown a:hover {
        background: rgba(255, 255, 255, 0.08) !important;
        transform: translateX(2px) !important;
    }

    .x-dropdown a svg {
        margin-right: 0.75rem !important;
        width: 1.25rem !important;
        height: 1.25rem !important;
        color: var(--text-secondary) !important;
        transition: all 0.2s ease !important;
    }

    .x-dropdown a:hover svg {
        color: var(--primary) !important;
        transform: scale(1.1) !important;
    }

    .dropdown-divider {
        height: 1px !important;
        background: rgba(255, 255, 255, 0.08) !important;
        margin: 0.5rem 0 !important;
    }

    /* Hamburger Menu - with !important */
    .hamburger-button {
        position: relative !important;
        width: 40px !important;
        height: 40px !important;
        border-radius: 0.5rem !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        transition: all 0.3s ease !important;
        background: rgba(255, 255, 255, 0.05) !important;
        border: none !important;
        cursor: pointer !important;
    }

    .hamburger-button:hover {
        background: rgba(255, 255, 255, 0.1) !important;
    }

    .hamburger-button svg {
        transition: all 0.3s ease !important;
    }

    .hamburger-button:hover svg {
        color: var(--text-primary) !important;
    }

    /* Mobile Menu Animation - with !important */
    .mobile-menu {
        transition: all 0.3s ease !important;
        max-height: 0 !important;
        overflow: hidden !important;
        background: rgba(15, 23, 42, 0.95) !important;
        z-index: 1050 !important;
    }

    .mobile-menu.open {
        max-height: 500px !important;
    }

    /* Fix for Bootstrap conflicts */
    nav.collab-nav * {
        box-sizing: border-box !important;
    }
    
    nav.collab-nav .container {
        width: 100% !important;
        max-width: 1320px !important;
        margin-right: auto !important;
        margin-left: auto !important;
        padding-right: 1rem !important;
        padding-left: 1rem !important;
        background: transparent !important;
        border-radius: 0 !important;
    }
    
    /* Ensure nav is above other content */
    nav.collab-nav {
        position: relative !important;
        z-index: 1050 !important;
    }
    
    /* Responsive Settings */
    @media (max-width: 640px) {
        .nav-link.active::after {
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
        }
    }
</style>

<nav x-data="{ open: false }" class="collab-nav">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center">
                    <div class="logo-container">
                        <!-- App Logo - You can replace the icon with an actual image -->
                        <div class="app-logo">
                            <!-- If you have an actual logo image, use this: -->
                            <img src="{{ asset('images/logo.png') }}" alt="App Logo"> 
                            
                            <!-- If you don't have a logo yet, we'll use an icon: -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <h1 class="logo-text text-xl">Virtual Collaboration Hub</h1>
                    </div>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-2 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('homepage')" :active="request()->routeIs('homepage')" class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                        </svg>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                            <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                        </svg>
                        {{ __('Chatroom') }}
                    </x-nav-link>
                    <x-nav-link :href="route('groups')" :active="request()->routeIs('groups')" class="nav-link {{ request()->routeIs('groups') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                        {{ __('Groups') }}
                    </x-nav-link>
                    <x-nav-link :href="route('groupChats')" :active="request()->routeIs('groupChats')" class="nav-link {{ request()->routeIs('groupChats') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                        </svg>
                        {{ __('CollaborateChat') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.index')" class="nav-link {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                        </svg>
                        {{ __('TaskManagement') }}
                    </x-nav-link>
                    <x-nav-link :href="route('meetings.meeting')" :active="request()->routeIs('meetings.meeting')" class="nav-link {{ request()->routeIs('meetings.meeting') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                        </svg>
                        {{ __('Meeting') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="profile-button inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white focus:outline-none transition ease-in-out duration-150">
                            @if (Auth::user()->image)
                                <div class="profile-avatar w-10 h-10 rounded-full mr-2 overflow-hidden">
                                    <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image" class="w-full h-full object-cover">
                                </div>
                            @else
                                <div class="profile-avatar w-10 h-10 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-xs font-semibold mr-2">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="flex flex-col items-start">
                                <div class="font-medium">{{ Auth::user()->name }}</div>
                                <div class="text-xs text-gray-400">Online</div>
                            </div>
                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="x-dropdown">
                            <div class="px-4 py-3 border-b border-gray-700">
                                <p class="text-sm text-gray-400">Signed in as</p>
                                <p class="text-sm font-medium text-white truncate">{{ Auth::user()->email }}</p>
                            </div>
                            
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            
                            <x-dropdown-link :href="route('feedbackandrating')" @click="showFeedbackModal = true">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Feedback') }}
                            </x-dropdown-link>
                            
                            <div class="dropdown-divider"></div>
                            
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5.707-5.707A1 1 0 009.586 1H3zm0 2v10h14V7.414L13.586 4H3z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M11 14.414V17h2v-4a1 1 0 00-1-1h-1v2.414l-1 1L9.414 14H5v2h3.586l1.707-1.707a1 1 0 011.414 0L11 14.414z" clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="hamburger-button">
                    <svg class="h-6 w-6 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'mobile-menu open': open, 'mobile-menu': ! open}" class="sm:hidden">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('homepage')" :active="request()->routeIs('homepage')" class="nav-link block w-full {{ request()->routeIs('homepage') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link block w-full {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z" />
                    <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z" />
                </svg>
                {{ __('Chatroom') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('groups')" :active="request()->routeIs('groups')" class="nav-link block w-full {{ request()->routeIs('groups') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                </svg>
                {{ __('Groups') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('groupChats')" :active="request()->routeIs('groupChats')" class="nav-link block w-full {{ request()->routeIs('groupChats') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                </svg>
                {{ __('CollaborateChat') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('tasks.index')" :active="request()->routeIs('tasks.index')" class="nav-link block w-full {{ request()->routeIs('tasks.index') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                </svg>
                {{ __('TaskManagement') }}
            </x-responsive-nav-link>
            
            <x-responsive-nav-link :href="route('meetings.meeting')" :active="request()->routeIs('meetings.meeting')" class="nav-link block w-full {{ request()->routeIs('meetings.meeting') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z" />
                </svg>
                {{ __('Meeting') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-600">
            <div class="px-4 py-2 flex items-center">
                @if (Auth::user()->image)
                    <div class="profile-avatar w-10 h-10 rounded-full mr-3 overflow-hidden">
                        <img src="{{ asset(Auth::user()->image) }}" alt="Profile Image" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="profile-avatar w-10 h-10 rounded-full bg-gradient-to-br from-primary to-secondary flex items-center justify-center text-white text-xs font-semibold mr-3">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                @endif
                <div>
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 px-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="nav-link flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="nav-link flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 001 1h12a1 1 0 001-1V7.414l-5.707-5.707A1 1 0 009.586 1H3zm0 2v10h14V7.414L13.586 4H3z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M11 14.414V17h2v-4a1 1 0 00-1-1h-1v2.414l-1 1L9.414 14H5v2h3.586l1.707-1.707a1 1 0 011.414 0L11 14.414z" clip-rule="evenodd" />
                        </svg>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
                
                <x-responsive-nav-link :href="route('feedbackandrating')" @click="showFeedbackModal = true" class="nav-link flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Feedback') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>
</nav>