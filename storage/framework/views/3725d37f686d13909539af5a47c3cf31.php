
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
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .hero-bg {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .hero-bg video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
            z-index: 0;
        }

        .hero-bg > * {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="antialiased bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-white">

    <!-- Landing Page -->
    <div class="landing-page" id="landing-page">
        <!-- Navbar -->
        <header class="bg-white dark:bg-gray-800 shadow-lg">
            <div class="container mx-auto px-6 py-4 flex justify-between items-center">
                <div class="flex items-center">
                    <img src="images/logo.png" alt="Logo" width="80px">
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white ml-3">Virtual Collaboration Hub</h1>
                </div>
                
                <?php if(Route::has('login')): ?>
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/dashboard'), false); ?>" class="font-semibold text-gray-600 hover:text-blue-500 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500 transition">Dashboard</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login'), false); ?>" class="inline-block bg-blue-500 text-white font-semibold px-4 py-2 rounded-lg shadow hover:bg-blue-600 transition">Log in</a>
                        <a href="<?php echo e(route('register'), false); ?>" class="inline-block bg-gray-200 text-gray-600 font-semibold px-4 py-2 rounded-lg shadow ml-4 hover:bg-gray-300 transition dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Register</a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </header>

        <!-- Hero Section -->
        <main class="hero-bg flex items-center justify-center text-center">
            <video autoplay loop muted>
                <source src="videos/landing.mp4" type="video/mp4">
                <source src="videos/landing.webm" type="video/webm">
                Your browser does not support the video tag.
            </video>
            <div class="bg-blue-300 bg-opacity-90 p-8 rounded-lg shadow-lg">
                <h2 class="text-5xl font-extrabold text-white mb-4">Welcome to Virtual Collaboration Hub</h2>
                <p class="text-lg text-blue-500">Collaborate seamlessly with your team from anywhere!</p>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-200 dark:bg-gray-800 py-4">
            <div class="container mx-auto text-center text-gray-600 dark:text-gray-400">
                &copy; 2024 Virtual Collaboration Hub. All rights reserved.
            </div>
        </footer>
    </div>
</body>
</html>
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/welcome.blade.php ENDPATH**/ ?>