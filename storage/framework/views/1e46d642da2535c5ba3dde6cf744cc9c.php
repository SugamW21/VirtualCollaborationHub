


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
    <div class="flex h-screen bg-gray-50">

        <!-- Main Content -->
        <main class="flex-1 p-8 space-y-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-8">Dashboard</h1>

            <!-- Feature Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Chatroom Feature -->
                <!-- Chatroom Feature -->
<div class="bg-white p-6 rounded-xl shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:translate-y-2">
    <h3 class="text-xl font-semibold text-gray-800">📩 Chatroom</h3>
    <p class="text-gray-600 mt-2">Start a private conversation.</p>
    <div class="flex justify-between items-center mt-4">
        <button class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline" onclick="openModal('chatroom')">More Info</button>
        <a href="<?php echo e(route('dashboard'), false); ?>" class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline">Go to Chatroom →</a>
    </div>
</div>

<!-- Create Group Feature -->
<div class="bg-white p-6 rounded-xl shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:translate-y-2">
    <h3 class="text-xl font-semibold text-gray-800">🆕 Create Group</h3>
    <p class="text-gray-600 mt-2">Start a new group for collaboration.</p>
    <div class="flex justify-between items-center mt-4">
        <button class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline" onclick="openModal('create-group')">More Info</button>
        <a href="<?php echo e(route('groups'), false); ?>" class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline">Go to Settings →</a>
    </div>
</div>

<!-- Group Chat Feature -->
<div class="bg-white p-6 rounded-xl shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:translate-y-2">
    <h3 class="text-xl font-semibold text-gray-800">👥 Group Chat</h3>
    <p class="text-gray-600 mt-2">Collaborate with your team.</p>
    <div class="flex justify-between items-center mt-4">
        <button class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline" onclick="openModal('group-chat')">More Info</button>
        <a href="<?php echo e(route('meetings.meeting'), false); ?>" class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline">Start a Meeting →</a>
    </div>
</div>

<!-- Meetings Feature -->
<div class="bg-white p-6 rounded-xl shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:translate-y-2">
    <h3 class="text-xl font-semibold text-gray-800">🎥 Meetings</h3>
    <p class="text-gray-600 mt-2">Start or join a video meeting.</p>
    <div class="flex justify-between items-center mt-4">
        <button class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline" onclick="openModal('meetings')">More Info</button>
        <a href="<?php echo e(route('meetings.meeting'), false); ?>" class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline">Start a Meeting →</a>
    </div>
</div>

<!-- Task Management Feature -->
<div class="bg-white p-6 rounded-xl shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:translate-y-2">
    <h3 class="text-xl font-semibold text-gray-800">📋 Task Management</h3>
    <p class="text-gray-600 mt-2">Manage and track project tasks.</p>
    <div class="flex justify-between items-center mt-4">
        <button class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline" onclick="openModal('task-management')">More Info</button>
        <a href="<?php echo e(route('tasks.index'), false); ?>" class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline">Manage Tasks →</a>
    </div>
</div>

<!-- Profile & Settings Feature -->
<div class="bg-white p-6 rounded-xl shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:translate-y-2">
    <h3 class="text-xl font-semibold text-gray-800">⚙️ Profile & Settings</h3>
    <p class="text-gray-600 mt-2">Customize your account settings.</p>
    <div class="flex justify-between items-center mt-4">
        <button class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline" onclick="openModal('profile-settings')">More Info</button>
        <a href="<?php echo e(route('profile.edit'), false); ?>" class="text-blue-600 inline-block font-semibold transition-all duration-200 ease-in-out hover:text-blue-800 hover:underline">Go to Settings →</a>
    </div>
</div>

            </div>
        </main>
    </div>

    <!-- Modal (Hidden by default) -->
    <div id="feature-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-xl w-1/2 relative">
            <!-- Close Button -->
            <button class="absolute top-2 right-2 text-gray-500 text-2xl" onclick="closeModal()">×</button>
            <h2 id="modal-title" class="text-2xl font-semibold mb-4">Feature Information</h2>
            <p id="modal-description" class="text-gray-600"></p>
        </div>
    </div>

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
            const modal = document.getElementById("feature-modal");
            const title = document.getElementById("modal-title");
            const description = document.getElementById("modal-description");

            title.innerText = `${feature.charAt(0).toUpperCase() + feature.slice(1).replace("-", " ")}`;
            description.innerText = featureInfo[feature];
            modal.classList.remove("hidden");
        }

        function closeModal() {
            const modal = document.getElementById("feature-modal");
            modal.classList.add("hidden");
        }
    </script>
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