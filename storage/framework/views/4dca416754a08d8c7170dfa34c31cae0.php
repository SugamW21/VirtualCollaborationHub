<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Virtual Collaboration Hub</title>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f9fafb; /* Tailwind gray-100 */
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrolling */
        }

        .video-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black */
            display: flex;
            justify-content: center;
            align-items: center;
            border: 10px solid #ffffff; /* White frame */
            border-radius: 15px; /* Rounded corners */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5); /* Shadow effect */
            overflow: hidden; /* Prevent overflow */
        }

        .video-overlay video {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Cover the entire area */
            border-radius: 15px; /* Match border radius of overlay */
        }

        .skip-overlay {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            background-color: white;
            border: 1px solid #ccc;
            color: black;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s; /* Smooth transition */
        }

        .skip-overlay:hover {
            background-color: #e5e5e5; /* Light gray on hover */
        }

        .skip-overlay span {
            margin-left: 5px;
            font-size: 1.2rem;
        }
    </style>
</head>
<body class="antialiased">
    <div class="video-overlay">
        <video id="welcome-video" playsinline autoplay>
            <source src="/videos/openingVideo.mp4" type="video/mp4">
        </video>
        <div class="skip-overlay" id="skip-overlay">
            Skip<span>▶</span>
        </div>
    </div>

    <script>
        const skipOverlay = document.getElementById('skip-overlay');
        const video = document.getElementById('welcome-video');

        // Ensure video starts playing on user interaction (click)
        document.body.addEventListener('click', () => {
            if (video.paused) {
                video.play();
            }
        }, { once: true }); // Ensures this event listener runs only once

        // Skip the video and go to the landing page
        skipOverlay.addEventListener('click', () => {
            window.location.href = "<?php echo e(route('home'), false); ?>"; // Redirect to landing page
        });

        // Redirect to the landing page when the video ends
        video.addEventListener('ended', () => {
            window.location.href = "<?php echo e(route('home'), false); ?>"; // Redirect to landing page
        });
    </script>
</body>
</html><?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/video.blade.php ENDPATH**/ ?>