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

        <!-- Background Video -->
        <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="<?php echo e(asset('videos/home2.mp4'), false); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>

        <!-- Main Content -->
        <div class="relative z-20 flex h-full">
            <main class="flex-1 p-8 space-y-8 overflow-y-auto">
                <h1 class="text-4xl font-bold text-white mb-8">Dashboard</h1>

                <!-- Dashboard Feature Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php $__currentLoopData = [
                        ['title' => '📩 Chatroom', 'desc' => 'Start a private conversation.', 'feature' => 'chatroom', 'link' => route('dashboard'), 'linkText' => 'Go to Chatroom →'],
                        ['title' => '🆕 Create Group', 'desc' => 'Start a new group for collaboration.', 'feature' => 'create-group', 'link' => route('groups'), 'linkText' => 'Go to Settings →'],
                        ['title' => '👥 Group Chat', 'desc' => 'Collaborate with your team.', 'feature' => 'group-chat', 'link' => route('meetings.meeting'), 'linkText' => 'Start a Meeting →'],
                        ['title' => '🎥 Meetings', 'desc' => 'Start or join a video meeting.', 'feature' => 'meetings', 'link' => route('meetings.meeting'), 'linkText' => 'Start a Meeting →'],
                        ['title' => '📋 Task Management', 'desc' => 'Manage and track project tasks.', 'feature' => 'task-management', 'link' => route('tasks.index'), 'linkText' => 'Manage Tasks →'],
                        ['title' => '⚙️ Profile & Settings', 'desc' => 'Customize your account settings.', 'feature' => 'profile-settings', 'link' => route('profile.edit'), 'linkText' => 'Go to Settings →'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white/90 backdrop-blur-md p-6 rounded-xl shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:translate-y-2">
                            <h3 class="text-xl font-semibold text-gray-800"><?php echo e($card['title'], false); ?></h3>
                            <p class="text-gray-600 mt-2"><?php echo e($card['desc'], false); ?></p>
                            <div class="flex justify-between items-center mt-4">
                                <button class="text-blue-600 font-semibold transition hover:text-blue-800 hover:underline" onclick="openModal('<?php echo e($card['feature'], false); ?>')">More Info</button>
                                <a href="<?php echo e($card['link'], false); ?>" class="text-blue-600 font-semibold transition hover:text-blue-800 hover:underline"><?php echo e($card['linkText'], false); ?></a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
<br>
<br>
<br>
                <!-- User Feedback Section -->
                <div class="bg-white/90 backdrop-blur-md p-6 rounded-xl shadow-lg mt-8">
                    <h2 class="text-3xl font-bold mb-6 text-gray-800">What Our Users Say 💬</h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php $__empty_1 = true; $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="bg-white rounded-xl shadow-md p-5 hover:shadow-xl transition duration-300">
                                <div class="flex items-center gap-4 mb-4">
                                    <img src="<?php echo e($feedback->user->image ?? asset('images/default-avatar.png'), false); ?>" 
                                        alt="User Avatar" 
                                        class="w-20 h-20 rounded-full object-cover border border-gray-300 shadow-sm">

                                    <div>
                                        <h4 class="font-semibold text-lg text-gray-800"><?php echo e($feedback->user->name, false); ?></h4>
                                        <div class="flex items-center text-yellow-400">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <svg class="w-4 h-4" fill="<?php echo e($i <= $feedback->rating ? 'currentColor' : 'none', false); ?>" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 
                                                          3.957a1 1 0 00.95.69h4.163c.969 0 
                                                          1.371 1.24.588 1.81l-3.37 
                                                          2.448a1 1 0 00-.364 1.118l1.285 
                                                          3.956c.3.921-.755 
                                                          1.688-1.538 1.118L12 
                                                          13.347l-3.37 
                                                          2.448c-.783.57-1.838-.197-1.538-1.118l1.286-3.956a1 
                                                          1 0 00-.364-1.118L4.644 
                                                          9.384c-.783-.57-.38-1.81.588-1.81h4.163a1 
                                                          1 0 00.95-.69l1.286-3.957z"/>
                                                </svg>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-gray-600 leading-relaxed"><?php echo e($feedback->feedback, false); ?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-gray-500">No feedback available yet. Be the first to leave a review!</p>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>

        <!-- Modal -->
        <div id="feature-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-30">
            <div class="bg-white p-6 rounded-xl w-11/12 md:w-1/2 relative">
                <button class="absolute top-2 right-2 text-gray-500 text-2xl" onclick="closeModal()">×</button>
                <h2 id="modal-title" class="text-2xl font-semibold mb-4">Feature Information</h2>
                <p id="modal-description" class="text-gray-600"></p>
            </div>
        </div>

        <!-- Scripts -->
        <script>
            const featureInfo = {
                chatroom: "This feature allows you to start private conversations with your contacts. You can send messages and stay in touch.",
                "create-group": "This feature allows you to create a new group for team collaboration. Add members and start working together!",
                "group-chat": "Group Chat allows you to collaborate with your team members. Share messages and files in real-time.",
                meetings: "With Meetings, you can start or join video meetings with your team. Stay connected with face-to-face communication.",
                "task-management": "Manage your project tasks easily. Assign tasks, set deadlines, and track your team's progress.",
                "profile-settings": "This feature allows you to customize your account settings, including profile updates and privacy preferences."
            };

            function openModal(feature) {
                document.getElementById("modal-title").innerText = feature.replace("-", " ").replace(/\b\w/g, c => c.toUpperCase());
                document.getElementById("modal-description").innerText = featureInfo[feature];
                document.getElementById("feature-modal").classList.remove("hidden");
            }

            function closeModal() {
                document.getElementById("feature-modal").classList.add("hidden");
            }
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