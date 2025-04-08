
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale()), false); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Virtual Collaboration Hub</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        },
                    },
                    fontFamily: {
                        'poppins': ['Poppins', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'fade-in': 'fadeIn 0.8s ease-out forwards',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                        'slide-in-right': 'slideInRight 0.8s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideInRight: {
                            '0%': { transform: 'translateX(50px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                    },
                    backdropBlur: {
                        'xs': '2px',
                    },
                },
            },
        }
    </script>
    <style>
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .gradient-bg {
            background: linear-gradient(-45deg, #0ea5e9, #7c3aed, #0c4a6e, #4c1d95);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            background-image: linear-gradient(90deg, #0ea5e9, #7c3aed);
        }

        .hero-video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .hero-video-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.7), rgba(0,0,0,0.5));
        }

        .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            object-fit: cover;
            opacity: 0.6;
        }

        .btn-glow {
            box-shadow: 0 0 15px rgba(124, 58, 237, 0.5);
            transition: all 0.3s ease;
        }

        .btn-glow:hover {
            box-shadow: 0 0 30px rgba(124, 58, 237, 0.8);
            transform: translateY(-2px);
        }

        .animate-delay-100 {
            animation-delay: 100ms;
        }

        .animate-delay-200 {
            animation-delay: 200ms;
        }

        .animate-delay-300 {
            animation-delay: 300ms;
        }

        .animate-delay-400 {
            animation-delay: 400ms;
        }

        .animate-delay-500 {
            animation-delay: 500ms;
        }

        .animate-delay-600 {
            animation-delay: 600ms;
        }

        .animate-delay-700 {
            animation-delay: 700ms;
        }

        .animate-delay-800 {
            animation-delay: 800ms;
        }

        .animate-delay-900 {
            animation-delay: 900ms;
        }

        .animate-delay-1000 {
            animation-delay: 1000ms;
        }

        .navbar-blur {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
        }
        
        /* Fix for overlapping elements */
        .notification-card {
            position: absolute;
            z-index: 10;
            max-width: 250px;
        }
        
        .notification-card.left {
            bottom: -20px;
            left: -20px;
        }
        
        .notification-card.right {
            top: -20px;
            right: -20px;
        }
        
        @media (max-width: 768px) {
            .notification-card {
                display: none;
            }
        }
        
        .hero-content {
            position: relative;
            z-index: 5;
        }
        
        .hero-image-container {
            position: relative;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body class="antialiased font-poppins min-h-screen gradient-bg text-white">

    <!-- Landing Page -->
    <div class="landing-page" id="landing-page">
        <!-- Navbar -->
        <header class="fixed w-full z-50 bg-transparent navbar-blur bg-opacity-10 border-b border-white/10">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="images/logo.png" alt="Logo" width="60" class="animate-float">
                    <h1 class="text-2xl font-bold text-white ml-3 text-gradient">Virtual Collaboration Hub</h1>
                </div>
                
                <?php if(Route::has('login')): ?>
                <div class="flex items-center space-x-4">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard'), false); ?>" class="font-semibold text-white/80 hover:text-white transition duration-300 ease-in-out">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login'), false); ?>" class="inline-block bg-white/10 hover:bg-white/20 text-white font-semibold px-5 py-2.5 rounded-lg backdrop-blur-sm transition duration-300 ease-in-out border border-white/20">Log in</a>
                        <a href="<?php echo e(route('register'), false); ?>" class="inline-block bg-gradient-to-r from-primary-600 to-secondary-600 text-white font-semibold px-5 py-2.5 rounded-lg shadow-lg hover:shadow-xl btn-glow transition duration-300 ease-in-out">Register</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="relative min-h-screen flex items-center px-4 overflow-hidden pt-24 pb-16">
            <div class="hero-video-container">
                <video class="hero-video" autoplay loop muted playsinline>
                    <source src="videos/landing.mp4" type="video/mp4">
                    <source src="videos/landing.webm" type="video/webm">
                    Your browser does not support the video tag.
                </video>
            </div>
            
            <div class="container mx-auto z-10">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Hero Content -->
                    <div class="hero-content text-left space-y-6 animate-fade-in">
                        <h1 class="text-5xl md:text-6xl font-bold leading-tight">
                            <span class="text-gradient">Collaborate</span> <br>Without Boundaries
                        </h1>
                        <p class="text-xl text-white/80 max-w-lg animate-slide-up animate-delay-200">
                            Connect with your team in real-time, share ideas, and work together seamlessly from anywhere in the world.
                        </p>
                        <div class="flex flex-wrap gap-4 pt-4 animate-slide-up animate-delay-400">
                            <a href="<?php echo e(route('register'), false); ?>" class="inline-block bg-gradient-to-r from-primary-600 to-secondary-600 text-white font-semibold px-8 py-4 rounded-lg shadow-lg hover:shadow-xl btn-glow transition duration-300 ease-in-out">
                                Get Started Free
                            </a>
                            <a href="#features" class="inline-block bg-white/10 hover:bg-white/20 text-white font-semibold px-8 py-4 rounded-lg backdrop-blur-sm transition duration-300 ease-in-out border border-white/20">
                                Explore Features
                            </a>
                        </div>
                        <div class="flex items-center space-x-4 pt-6 animate-slide-up animate-delay-600">
                            <div class="flex -space-x-2">
                                <img src="images/1735302998.jpg?height=40&width=40" class="w-10 h-10 rounded-full border-2 border-white" alt="User">
                                <img src="images/1736227170.jpg?height=40&width=40" class="w-10 h-10 rounded-full border-2 border-white" alt="User">
                                <img src="images/1737541585.jpg?height=40&width=40" class="w-10 h-10 rounded-full border-2 border-white" alt="User">
                                <div class="w-10 h-10 rounded-full border-2 border-white bg-primary-600 flex items-center justify-center text-xs font-bold">+5k</div>
                            </div>
                            <p class="text-white/80 text-sm">Trusted by 5,000+ teams worldwide</p>
                        </div>
                    </div>
                    
                    <!-- Hero Image -->
                    <div class="hidden md:block hero-image-container animate-slide-in-right">
                        <div class="glass-card rounded-2xl p-1 shadow-2xl relative ">
                            <img src="images/d.png?height=600&width=800" alt="Collaboration Dashboard" class="rounded-xl w-full h-auto">
                            
                            <!-- Notification Cards - Positioned with proper z-index -->
                            <div class="notification-card left glass-card rounded-xl p-4 animate-float">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Project completed</p>
                                        <p class="text-xs text-white/70">Team productivity +35%</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="notification-card right glass-card rounded-xl p-4 animate-float" style="animation-delay: 2s;">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">New message</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="absolute bottom-10 left-0 right-0 flex justify-center animate-bounce">
                <a href="#features" class="text-white/80 hover:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </a>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="py-20 px-4">
            <div class="container mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4 inline-block text-gradient">Powerful Collaboration Features</h2>
                    <p class="text-xl text-white/80 max-w-2xl mx-auto">Everything you need to connect, create, and collaborate with your team in one place.</p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="glass-card rounded-xl p-6 feature-card">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-r from-primary-500 to-primary-700 flex items-center justify-center mb-6 feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Chatroom</h3>
                        <p class="text-white/80">Communicate instantly with your team through text,attachments and video messages.</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="glass-card rounded-xl p-6 feature-card">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-r from-secondary-500 to-secondary-700 flex items-center justify-center mb-6 feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Create Group</h3>
                        <p class="text-white/80">Start a new group for collaboration.</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="glass-card rounded-xl p-6 feature-card">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-r from-secondary-600 to-primary-600 flex items-center justify-center mb-6 feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Group Chat</h3>
                        <p class="text-white/80">Collaborate with your team.</p>
                    </div>

                    
                    <!-- Feature 4 -->
                    <div class="glass-card rounded-xl p-6 feature-card">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-r from-primary-600 to-secondary-600 flex items-center justify-center mb-6 feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Task Management</h3>
                        <p class="text-white/80">Organize tasks, set deadlines, and track progress with customizable workflows.</p>
                    </div>
                    
                    <!-- Feature 5 -->
                    <div class="glass-card rounded-xl p-6 feature-card">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-r from-primary-700 to-secondary-700 flex items-center justify-center mb-6 feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Video Conferencing</h3>
                        <p class="text-white/80">Host HD video meetings with screen sharing, recording, and AI transcription.</p>
                    </div>

                    
                    <!-- Feature 6 -->
                    <div class="glass-card rounded-xl p-6 feature-card">
                        <div class="w-14 h-14 rounded-lg bg-gradient-to-r from-primary-500 to-secondary-500 flex items-center justify-center mb-6 feature-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold mb-3">Profile & Settings</h3>
                        <p class="text-white/80">Customize your account settings.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-20 px-4 bg-black/30">
            <div class="container mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold mb-4 inline-block text-gradient">Trusted by Teams Worldwide</h2>
                    <p class="text-xl text-white/80 max-w-2xl mx-auto">See what our customers have to say about their experience with Virtual Collaboration Hub.</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Testimonial 1 -->
                    <div class="glass-card rounded-xl p-8 relative">
                        <div class="absolute -top-5 -right-5 text-6xl text-primary-500 opacity-50">"</div>
                        <p class="text-white/90 mb-6">Virtual Collaboration Hub has transformed how our remote team works together. The seamless integration of all tools in one platform has boosted our productivity by 40%.</p>
                        <div class="flex items-center">
                            <img src="images/1735302998.jpg?height=50&width=50" alt="User" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">Sugam wosti</h4>
                                <p class="text-sm text-white/70">Bsc(Hons)Computing, Student</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 2 -->
                    <div class="glass-card rounded-xl p-8 relative md:mt-10">
                        <div class="absolute -top-5 -right-5 text-6xl text-primary-500 opacity-50">"</div>
                        <p class="text-white/90 mb-6">As a global company with teams across 5 continents, we needed a solution that works for everyone. This platform has eliminated communication barriers completely.</p>
                        <div class="flex items-center">
                            <img src="images/1736227170.jpg?height=50&width=50" alt="User" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">testing</h4>
                                <p class="text-sm text-white/70">Director, Global Operations</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial 3 -->
                    <div class="glass-card rounded-xl p-8 relative">
                        <div class="absolute -top-5 -right-5 text-6xl text-primary-500 opacity-50">"</div>
                        <p class="text-white/90 mb-6">The video conferencing quality is exceptional, and the collaborative document editing has made our creative process so much more efficient.</p>
                        <div class="flex items-center">
                            <img src="images/1737541585.jpg?height=50&width=50" alt="User" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">test</h4>
                                <p class="text-sm text-white/70">Creative Director, DesignWorks</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 px-4">
            <div class="container mx-auto">
                <div class="glass-card rounded-2xl p-12 text-center max-w-4xl mx-auto bg-gradient-to-r from-primary-900/50 to-secondary-900/50">
                    <h2 class="text-4xl font-bold mb-6">Ready to Transform Your Team Collaboration?</h2>
                    <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">Join thousands of teams who have already enhanced their productivity with our platform.</p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="<?php echo e(route('register'), false); ?>" class="inline-block bg-gradient-to-r from-primary-600 to-secondary-600 text-white font-semibold px-8 py-4 rounded-lg shadow-lg hover:shadow-xl btn-glow transition duration-300 ease-in-out">
                            Start Free Trial
                        </a>
                    </div>
                    <p class="mt-6 text-white/70 text-sm">No credit card required. 30-day free trial.</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-black/40 py-12 border-t border-white/10">
            <div class="container mx-auto px-6">
                <div class="grid md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <div class="flex items-center mb-4">
                            <img src="images/logo.png" alt="Logo" width="40">
                            <h3 class="text-xl font-bold text-white ml-2">Virtual Collaboration Hub</h3>
                        </div>
                        <p class="text-white/70 mb-6">Empowering teams to collaborate seamlessly from anywhere in the world.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-white/70 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-white/70 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-white/70 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/>
                                </svg>
                            </a>
                            <a href="#" class="text-white/70 hover:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.441 16.892c-2.102.144-6.784.144-8.883 0-2.276-.156-2.541-1.27-2.558-4.892.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0 2.277.156 2.541 1.27 2.559 4.892-.018 3.629-.285 4.736-2.559 4.892zm-6.441-7.234l4.917 2.338-4.917 2.346v-4.684z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Product</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-white/70 hover:text-white transition">Features</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Pricing</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Integrations</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Enterprise</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Security</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Resources</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-white/70 hover:text-white transition">Documentation</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Guides</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">API Reference</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Community</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Blog</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Company</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-white/70 hover:text-white transition">About Us</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Careers</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Contact</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Privacy Policy</a></li>
                            <li><a href="#" class="text-white/70 hover:text-white transition">Terms of Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="pt-8 mt-8 border-t border-white/10 text-center text-white/60 text-sm">
                    &copy; 2024 Virtual Collaboration Hub. All rights reserved.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/67df9e0c0df93d190c6bf814/1in0o2ocd';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->

<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/welcome.blade.php ENDPATH**/ ?>