<!-- resources/views/meetings/join.blade.php -->
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

    
    <h1 style="text-align: center; color: rgb(183, 45, 45);"><b>Join Meeting</b></h1>

    <div style="text-align: center;">
        <h2>Meeting URL: <?php echo e(url('/meetings/' . $meeting->url), false); ?></h2>
        <p>Meeting Host: <?php echo e($meeting->host_user_id, false); ?></p>

        <!-- You can add more details and controls here for joining the meeting -->
        <button onclick="startMeeting()">Join Meeting</button>
    </div>

    <script>

        function startMeeting() {
    // Example WebRTC logic (simplified)
    const meetingId = "<?php echo e($meeting->url, false); ?>"; // You can use the meeting URL for identifying the meeting
    const room = meetingId; // Assuming a room is identified by the meeting URL
    
    // Create or join the room (you may need a WebRTC signaling server)
    const signalingServer = "YOUR_SIGNALING_SERVER_URL"; // Replace with your signaling server URL
    const socket = new WebSocket(signalingServer);
    
    socket.onopen = function() {
        socket.send(JSON.stringify({ action: 'join', room: room }));
    };

    socket.onmessage = function(event) {
        // Handle the server's response, for example setting up the video connection
        const data = JSON.parse(event.data);
        if (data.action === 'joined') {
            console.log('Meeting started.');
            // Implement the logic to show video/audio calls, etc.
        }
    };
}

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
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/meetings/join.blade.php ENDPATH**/ ?>