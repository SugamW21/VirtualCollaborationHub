
 



<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="relative h-screen overflow-hidden">
        <!-- Background Video with improved overlay gradient -->
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="<?php echo e(asset('videos/home2.mp4'), false); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Enhanced Overlay with gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-black/80 via-black/70 to-black/60 z-10"></div>

        <!-- Main Content -->
        <div class="relative z-20 flex h-full">
            <main class="flex-1 p-4 md:p-8 space-y-8 overflow-y-auto">
                <!-- Improved Header with animation and subtitle -->
                <div class="mb-12 animate-fade-in-down">
                    <h1 class="text-5xl font-bold text-white mb-2 tracking-tight">Welcome to Your Dashboard</h1>
                    <p class="text-gray-300 text-xl max-w-2xl">Access all your collaboration tools in one place</p>
                </div>

                <!-- Dashboard Feature Cards with improved design -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    <?php $__currentLoopData = [
                        ['title' => '📩 Chatroom', 'desc' => 'Start private conversations with team members and clients.', 'feature' => 'chatroom', 'link' => route('dashboard'), 'linkText' => 'Go to Chatroom', 'color' => 'from-purple-500 to-indigo-600', 'icon' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z'],
                        ['title' => '🆕 Create Group', 'desc' => 'Create new groups for team collaboration and project management.', 'feature' => 'create-group', 'link' => route('groups'), 'linkText' => 'Create Group', 'color' => 'from-green-500 to-emerald-600', 'icon' => 'M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z'],
                        ['title' => '👥 Group Chat', 'desc' => 'Collaborate with your team members in real-time group discussions.', 'feature' => 'group-chat', 'link' => route('meetings.meeting'), 'linkText' => 'Open Group Chat', 'color' => 'from-blue-500 to-cyan-600', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
                        ['title' => '🎥 Meetings', 'desc' => 'Start or join video meetings with HD quality and screen sharing.', 'feature' => 'meetings', 'link' => route('meetings.meeting'), 'linkText' => 'Start Meeting', 'color' => 'from-red-500 to-pink-600', 'icon' => 'M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z'],
                        ['title' => '📋 Task Management', 'desc' => 'Create, assign and track project tasks with deadlines and priorities.', 'feature' => 'task-management', 'link' => route('tasks.index'), 'linkText' => 'Manage Tasks', 'color' => 'from-amber-500 to-orange-600', 'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01'],
                        ['title' => '⚙️ Profile & Settings', 'desc' => 'Customize your account settings and manage your profile details.', 'feature' => 'profile-settings', 'link' => route('profile.edit'), 'linkText' => 'Edit Profile', 'color' => 'from-gray-600 to-gray-800', 'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="group relative overflow-hidden bg-white/10 backdrop-blur-lg p-6 rounded-2xl shadow-xl transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2 border border-white/10">
                            <!-- Card gradient background -->
                            <div class="absolute inset-0 bg-gradient-to-br <?php echo e($card['color'], false); ?> opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-2xl -z-10"></div>
                            
                            <!-- Card icon -->
                            <div class="w-12 h-12 mb-4 flex items-center justify-center rounded-full bg-white/20 group-hover:bg-white/30 transition-all duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo e($card['icon'], false); ?>" />
                                </svg>
                            </div>
                            
                            <h3 class="text-xl font-bold text-white group-hover:text-white transition-colors duration-300"><?php echo e($card['title'], false); ?></h3>
                            <p class="text-gray-300 mt-2 group-hover:text-white/90 transition-colors duration-300"><?php echo e($card['desc'], false); ?></p>
                            
                            <div class="flex justify-between items-center mt-6 pt-4 border-t border-white/10">
                                <button class="text-white/80 font-medium transition hover:text-white group-hover:scale-105 flex items-center gap-1" onclick="openModal('<?php echo e($card['feature'], false); ?>')">
                                    <span>More Info</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                                <a href="<?php echo e($card['link'], false); ?>" class="flex items-center gap-1 text-white font-medium transition hover:text-white group-hover:scale-105">
                                    <span><?php echo e($card['linkText'], false); ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <!-- User Feedback Section with improved design -->
                <div class="bg-white/10 backdrop-blur-lg p-8 rounded-2xl shadow-xl mt-12 border border-white/10 max-w-6xl mx-auto">
                    <div class="flex items-center justify-between mb-8">
                        <h2 class="text-3xl font-bold text-white">What Our Users Say</h2>
                        <div class="flex items-center gap-2">
                            <span class="text-yellow-400 text-2xl">★</span>
                            <span class="text-white font-bold text-xl">4.3</span>
                            <span class="text-gray-300">(<?php echo e(count($feedbacks), false); ?> reviews)</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="bg-white/10 backdrop-blur-md rounded-xl p-6 hover:bg-white/20 transition duration-300 border border-white/10">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="relative">
                                        <div class="absolute inset-0 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full blur-sm opacity-75"></div>
                                        <img src="<?php echo e($feedback->user->image ?? asset('images/default-avatar.png'), false); ?>" 
                                            alt="User Avatar" 
                                            class="relative w-16 h-16 rounded-full object-cover border-2 border-white/50">
                                    </div>

                                    <div>
                                        <h4 class="font-bold text-lg text-white"><?php echo e($feedback->user->name, false); ?></h4>
                                        <div class="flex items-center text-yellow-400 mt-1">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <svg class="w-4 h-4 <?php echo e($i <= $feedback->rating ? 'text-yellow-400' : 'text-gray-500', false); ?>" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-200 leading-relaxed"><?php echo e($feedback->feedback, false); ?></p>
                                <div class="mt-4 text-gray-400 text-sm"><?php echo e($feedback->created_at->diffForHumans(), false); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-span-3 bg-white/10 backdrop-blur-md rounded-xl p-6 border border-white/10">
                                <p class="text-gray-300 text-center">No feedback available yet. Be the first to leave a review!</p>
                                <div class="mt-4 flex justify-center">
                                    <button class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg text-white font-medium hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105">
                                        Leave a Review
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>

        <!-- Enhanced Modal with Image Slider -->
        <div id="feature-modal" class="fixed inset-0 bg-black/70 backdrop-blur-sm flex justify-center items-center opacity-0 pointer-events-none transition-opacity duration-300 z-30">
            <div class="bg-gradient-to-br from-gray-900 to-gray-800 p-8 rounded-2xl w-11/12 md:w-2/3 lg:w-3/4 max-w-4xl relative border border-white/10 shadow-2xl transform scale-95 transition-all duration-300" id="modal-content">
                <button class="absolute top-4 right-4 text-gray-400 hover:text-white text-2xl w-8 h-8 flex items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all z-10" onclick="closeModal()">×</button>
                
                <!-- Modal Content with Image Slider -->
                <div class="flex flex-col lg:flex-row gap-6">
                    <!-- Image Slider Section -->
                    <div class="lg:w-1/2 relative">
                        <div class="image-slider-container relative h-64 md:h-80 lg:h-96 overflow-hidden rounded-xl">
                            <div id="image-slider" class="flex transition-transform duration-500 ease-in-out h-full">
                                <!-- Images will be inserted here by JavaScript -->
                            </div>
                            
                            <!-- Slider Controls -->
                            <button id="prev-slide" class="absolute left-2 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/50 text-white flex items-center justify-center hover:bg-black/70 transition-all z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button id="next-slide" class="absolute right-2 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/50 text-white flex items-center justify-center hover:bg-black/70 transition-all z-10">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                            
                            <!-- Slide Indicators -->
                            <div id="slide-indicators" class="absolute bottom-4 left-0 right-0 flex justify-center gap-2">
                                <!-- Indicators will be inserted here by JavaScript -->
                            </div>
                        </div>
                    </div>
                    
                    <!-- Text Content Section -->
                    <div class="lg:w-1/2">
                        <h2 id="modal-title" class="text-2xl font-bold mb-2 text-white"></h2>
                        <div class="w-16 h-1 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full mb-4"></div>
                        <p id="modal-description" class="text-gray-300 leading-relaxed"></p>
                        
                        <div class="mt-8 flex justify-end">
                            <button onclick="closeModal()" class="px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg text-white font-medium transition-all duration-300 mr-2">
                                Close
                            </button>
                            <button id="modal-action-btn" class="px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg text-white font-medium hover:from-purple-600 hover:to-pink-600 transition-all duration-300">
                                Get Started
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script>
            // Enhanced feature information
            const featureInfo = {
                chatroom: "Connect instantly with team members through our secure private messaging system. Send text, images, files, and even voice messages. All conversations are encrypted and searchable for your convenience.",
                "create-group": "Create custom groups for different projects, departments, or interests. Add members, set permissions, and organize your workspace efficiently. Perfect for team collaboration and project management.",
                "group-chat": "Collaborate with your entire team in real-time. Share ideas, files, and updates in a centralized space. Supports rich media, code snippets, and integrations with other tools you use daily.",
                meetings: "Host or join high-quality video meetings with up to 100 participants. Features include screen sharing, virtual backgrounds, recording, live captions, and breakout rooms for smaller discussions.",
                "task-management": "Stay organized with our comprehensive task management system. Create tasks, assign them to team members, set priorities and deadlines, track progress, and receive notifications when tasks are completed.",
                "profile-settings": "Customize your profile and account settings to match your preferences. Update your profile picture, notification settings, privacy options, theme preferences, and connected accounts."
            };
            
            // Feature images for the slider (3 images per feature)
            const featureImages = {
                chatroom: [
                    "<?php echo e(asset('images/c1.png'), false); ?>",
                    "<?php echo e(asset('images/c2.png'), false); ?>",
                    "<?php echo e(asset('images/c3.png'), false); ?>"
                ],
                "create-group": [
                    "<?php echo e(asset('images/cg1.png'), false); ?>",
                    "<?php echo e(asset('images/cg2.png'), false); ?>",
                    "<?php echo e(asset('images/cg3.png'), false); ?>"
                ],
                "group-chat": [
                    "<?php echo e(asset('images/gc1.png'), false); ?>",
                    "<?php echo e(asset('images/gc2.png'), false); ?>",
                    "<?php echo e(asset('images/gc3.png'), false); ?>"
                ],
                meetings: [
                    "<?php echo e(asset('images/m1.png'), false); ?>",
                    "<?php echo e(asset('images/m2.png'), false); ?>",
                    "<?php echo e(asset('images/m3.jpg'), false); ?>"
                ],
                "task-management": [
                    "<?php echo e(asset('images/t1.png'), false); ?>",
                    "<?php echo e(asset('images/t2.png'), false); ?>",
                    "<?php echo e(asset('images/t3.png'), false); ?>"
                ],
                "profile-settings": [
                    "<?php echo e(asset('images/p1.png'), false); ?>",
                    "<?php echo e(asset('images/p2.png'), false); ?>",
                    "<?php echo e(asset('images/p3.png'), false); ?>"
                ]
            };
            
            // Fallback images if the actual images are not available
            const fallbackImages = [
                "https://placehold.co/600x400/3b82f6/ffffff?text=Feature+Image+1",
                "https://placehold.co/600x400/8b5cf6/ffffff?text=Feature+Image+2",
                "https://placehold.co/600x400/ec4899/ffffff?text=Feature+Image+3"
            ];

            // Image slider variables
            let currentSlide = 0;
            let slideInterval;
            let currentFeature = '';
            
            // Enhanced modal functionality with animations and image slider
            function openModal(feature) {
                const modal = document.getElementById("feature-modal");
                const modalContent = document.getElementById("modal-content");
                const modalTitle = document.getElementById("modal-title");
                const modalDescription = document.getElementById("modal-description");
                const modalActionBtn = document.getElementById("modal-action-btn");
                const imageSlider = document.getElementById("image-slider");
                const slideIndicators = document.getElementById("slide-indicators");
                
                // Set content
                modalTitle.innerText = feature.replace("-", " ").replace(/\b\w/g, c => c.toUpperCase());
                modalDescription.innerText = featureInfo[feature];
                currentFeature = feature;
                
                // Set button text based on feature
                const buttonTexts = {
                    chatroom: "Start Chatting",
                    "create-group": "Create a Group",
                    "group-chat": "Join Group Chat",
                    meetings: "Start a Meeting",
                    "task-management": "Manage Tasks",
                    "profile-settings": "Edit Profile"
                };
                modalActionBtn.innerText = buttonTexts[feature] || "Get Started";
                
                // Set up action button functionality
                modalActionBtn.onclick = function() {
                    const featureLinks = {
                        chatroom: "<?php echo e(route('dashboard'), false); ?>",
                        "create-group": "<?php echo e(route('groups'), false); ?>",
                        "group-chat": "<?php echo e(route('meetings.meeting'), false); ?>",
                        meetings: "<?php echo e(route('meetings.meeting'), false); ?>",
                        "task-management": "<?php echo e(route('tasks.index'), false); ?>",
                        "profile-settings": "<?php echo e(route('profile.edit'), false); ?>"
                    };
                    
                    window.location.href = featureLinks[feature];
                };
                
                // Clear previous slider content
                imageSlider.innerHTML = '';
                slideIndicators.innerHTML = '';
                
                // Get images for this feature (or use fallback)
                const images = featureImages[feature] || fallbackImages;
                
                // Add images to slider
                images.forEach((src, index) => {
                    const img = document.createElement('div');
                    img.className = 'min-w-full h-full';
                    img.style.backgroundImage = `url(${src})`;
                    img.style.backgroundSize = 'cover';
                    img.style.backgroundPosition = 'center';
                    imageSlider.appendChild(img);
                    
                    // Add indicator
                    const indicator = document.createElement('button');
                    indicator.className = `w-2.5 h-2.5 rounded-full ${index === 0 ? 'bg-white' : 'bg-white/40'}`;
                    indicator.onclick = () => goToSlide(index);
                    slideIndicators.appendChild(indicator);
                });
                
                // Reset to first slide
                currentSlide = 0;
                updateSlider();
                
                // Start auto-sliding
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 5000);
                
                // Show modal with animation
                modal.classList.remove("opacity-0", "pointer-events-none");
                setTimeout(() => {
                    modalContent.classList.remove("scale-95");
                    modalContent.classList.add("scale-100");
                }, 10);
                
                // Add event listener for escape key
                document.addEventListener('keydown', handleEscKey);
                
                // Set up slider controls
                document.getElementById('prev-slide').onclick = prevSlide;
                document.getElementById('next-slide').onclick = nextSlide;
            }

            function closeModal() {
                const modal = document.getElementById("feature-modal");
                const modalContent = document.getElementById("modal-content");
                
                // Stop auto-sliding
                clearInterval(slideInterval);
                
                // Hide modal with animation
                modalContent.classList.remove("scale-100");
                modalContent.classList.add("scale-95");
                setTimeout(() => {
                    modal.classList.add("opacity-0", "pointer-events-none");
                }, 200);
                
                // Remove event listener for escape key
                document.removeEventListener('keydown', handleEscKey);
            }
            
            // Slider functions
            function updateSlider() {
                const slider = document.getElementById('image-slider');
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Update indicators
                const indicators = document.querySelectorAll('#slide-indicators button');
                indicators.forEach((indicator, index) => {
                    if (index === currentSlide) {
                        indicator.classList.remove('bg-white/40');
                        indicator.classList.add('bg-white');
                    } else {
                        indicator.classList.remove('bg-white');
                        indicator.classList.add('bg-white/40');
                    }
                });
            }
            
            function nextSlide() {
                const slider = document.getElementById('image-slider');
                const slideCount = slider.children.length;
                currentSlide = (currentSlide + 1) % slideCount;
                updateSlider();
            }
            
            function prevSlide() {
                const slider = document.getElementById('image-slider');
                const slideCount = slider.children.length;
                currentSlide = (currentSlide - 1 + slideCount) % slideCount;
                updateSlider();
            }
            
            function goToSlide(index) {
                currentSlide = index;
                updateSlider();
                
                // Reset auto-slide timer
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 5000);
            }
            
            function handleEscKey(e) {
                if (e.key === 'Escape') {
                    closeModal();
                }
            }
            
            // Click outside to close
            document.getElementById("feature-modal").addEventListener("click", function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });
            
            // Add animations
            document.addEventListener("DOMContentLoaded", function() {
                // Add animation classes
                document.head.insertAdjacentHTML('beforeend', `
                    <style>
                        @keyframes fadeInDown {
                            from { opacity: 0; transform: translateY(-20px); }
                            to { opacity: 1; transform: translateY(0); }
                        }
                        .animate-fade-in-down {
                            animation: fadeInDown 0.6s ease forwards;
                        }
                        
                        /* Card hover effect */
                        .card-hover-effect {
                            transition: all 0.3s ease;
                        }
                        .card-hover-effect:hover {
                            transform: translateY(-5px);
                            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
                        }
                        
                        /* Image slider animations */
                        .image-slider-container {
                            position: relative;
                            border: 2px solid rgba(255, 255, 255, 0.1);
                            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.3);
                        }
                        
                        #image-slider > div {
                            transition: transform 0.5s ease;
                        }
                        
                        #slide-indicators button {
                            transition: all 0.3s ease;
                        }
                        
                        #slide-indicators button:hover {
                            transform: scale(1.2);
                        }
                    </style>
                `);
            });
        </script>

        <!-- Tawk.to Live Chat -->
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
            (function () {
                var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/67df9e0c0df93d190c6bf814/1in0o2ocd';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>

<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/home.blade.php ENDPATH**/ ?>