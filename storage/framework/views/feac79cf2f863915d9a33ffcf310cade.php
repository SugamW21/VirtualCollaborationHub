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
    <h3>Meeting Invitations</h3>
    
    <?php $__currentLoopData = $invitations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invitation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <p>You have been invited to a meeting by <?php echo e($invitation->sender->name, false); ?></p>
            <p>Meeting URL: <a href="<?php echo e($invitation->meeting_url, false); ?>" target="_blank"><?php echo e($invitation->meeting_url, false); ?></a></p>
            <?php if($invitation->status == 'pending'): ?>
                <form action="<?php echo e(route('meetings.respond', $invitation->id), false); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit" name="status" value="accepted">Accept</button>
                    <button type="submit" name="status" value="rejected">Reject</button>
                </form>
            <?php elseif($invitation->status == 'accepted'): ?>
                <p>Accepted the invitation. Redirecting to the meeting...</p>
            <?php else: ?>
                <p>Invitation Rejected.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/meetings/invitations.blade.php ENDPATH**/ ?>