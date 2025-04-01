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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">Meetings Dashboard</h2>
                    
                    <!-- Create New Meeting Button -->
                    <div class="mb-8">
                        <button id="createMeetingBtn" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            Create New Meeting
                        </button>
                    </div>
                    
                    <!-- Meeting URL Display (initially hidden) -->
                    <div id="meetingUrlContainer" class="mb-8 p-4 border rounded bg-gray-50 hidden">
                        <h3 class="text-lg font-semibold mb-2">Your Meeting URL</h3>
                        <div class="flex items-center">
                            <input id="meetingUrlInput" type="text" readonly class="flex-1 p-2 border rounded mr-2" />
                            <button id="copyUrlBtn" class="px-3 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">
                                Copy
                            </button>
                        </div>
                        <div class="mt-4">
                            <button id="joinMeetingBtn" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                Join Meeting
                            </button>
                        </div>
                    </div>
                    
                    <!-- Invite User Section (initially hidden) -->
                    <div id="inviteUserContainer" class="mb-8 p-4 border rounded bg-gray-50 hidden">
                        <h3 class="text-lg font-semibold mb-2">Invite User</h3>
                        <div class="flex items-center">
                            <input id="inviteEmailInput" type="email" placeholder="Enter email address" class="flex-1 p-2 border rounded mr-2" />
                            <button id="sendInviteBtn" class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                Send Invite
                            </button>
                        </div>
                    </div>
                    
                    <!-- Your Meetings Section -->
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold mb-4">Your Meetings</h3>
                        
                        <?php if($createdMeetings->isEmpty()): ?>
                            <p class="text-gray-500 italic">You haven't created any meetings yet.</p>
                        <?php else: ?>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Meeting ID
                                            </th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Created
                                            </th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $createdMeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <?php echo e($meeting->room_name, false); ?>

                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <?php echo e($meeting->created_at->format('M d, Y H:i'), false); ?>

                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        <?php echo e(ucfirst($meeting->status), false); ?>

                                                    </span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <a href="<?php echo e(route('meetings.meeting', ['room' => $meeting->room_name]), false); ?>" class="text-blue-600 hover:text-blue-900">
                                                        Join
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Meetings You're Invited To Section -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Meetings You're Invited To</h3>
                        
                        <?php if($invitedMeetings->isEmpty()): ?>
                            <p class="text-gray-500 italic">You don't have any meeting invitations.</p>
                        <?php else: ?>
                            <div class="overflow-x-auto">
                                <table class="min-w-full bg-white">
                                    <thead>
                                        <tr>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                From
                                            </th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Received
                                            </th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $invitedMeetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <?php echo e($invitation->sender->name, false); ?>

                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <?php echo e($invitation->created_at->format('M d, Y H:i'), false); ?>

                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        <?php echo e(ucfirst($invitation->status), false); ?>

                                                    </span>
                                                </td>
                                                <td class="py-2 px-4 border-b border-gray-200">
                                                    <a href="<?php echo e($invitation->meeting_url, false); ?>" class="text-blue-600 hover:text-blue-900">
                                                        Join
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createMeetingBtn = document.getElementById('createMeetingBtn');
            const meetingUrlContainer = document.getElementById('meetingUrlContainer');
            const meetingUrlInput = document.getElementById('meetingUrlInput');
            const copyUrlBtn = document.getElementById('copyUrlBtn');
            const joinMeetingBtn = document.getElementById('joinMeetingBtn');
            const inviteUserContainer = document.getElementById('inviteUserContainer');
            const inviteEmailInput = document.getElementById('inviteEmailInput');
            const sendInviteBtn = document.getElementById('sendInviteBtn');
            
            let currentMeetingUrl = '';
            
            // Create Meeting Button Click
            createMeetingBtn.addEventListener('click', function() {
                fetch("<?php echo e(route('meetings.create'), false); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token(), false); ?>"
                    },
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    currentMeetingUrl = data.meeting_url;
                    meetingUrlInput.value = currentMeetingUrl;
                    meetingUrlContainer.classList.remove('hidden');
                    inviteUserContainer.classList.remove('hidden');
                    
                    console.log("Created meeting with room name:", data.room_name);
                })
                .catch(error => {
                    console.error('Error creating meeting:', error);
                    alert('Error creating meeting. Please try again.');
                });
            });
            
            // Copy URL Button Click
            copyUrlBtn.addEventListener('click', function() {
                meetingUrlInput.select();
                document.execCommand('copy');
                
                // Show feedback
                const originalText = copyUrlBtn.textContent;
                copyUrlBtn.textContent = 'Copied!';
                setTimeout(() => {
                    copyUrlBtn.textContent = originalText;
                }, 2000);
            });
            
            // Join Meeting Button Click
            joinMeetingBtn.addEventListener('click', function() {
                if (currentMeetingUrl) {
                    window.location.href = currentMeetingUrl;
                }
            });
            
            // Send Invite Button Click
            sendInviteBtn.addEventListener('click', function() {
                const email = inviteEmailInput.value.trim();
                
                if (!email) {
                    alert('Please enter an email address.');
                    return;
                }
                
                if (!currentMeetingUrl) {
                    alert('Please create a meeting first.');
                    return;
                }
                
                fetch("<?php echo e(route('meetings.invite'), false); ?>", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "<?php echo e(csrf_token(), false); ?>"
                    },
                    body: JSON.stringify({ 
                        email: email, 
                        meeting_url: currentMeetingUrl 
                    }),
                    credentials: 'same-origin'
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    inviteEmailInput.value = ''; // Clear the input
                })
                .catch(error => {
                    console.error('Error sending invitation:', error);
                    alert('Error sending invitation. Please try again.');
                });
            });
        });
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

<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/meetings/dashboard.blade.php ENDPATH**/ ?>