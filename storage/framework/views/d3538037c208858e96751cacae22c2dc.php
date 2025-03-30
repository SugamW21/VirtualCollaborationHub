

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
    <div class="container mt-4"> 
        <html lang="en">
        <head>
            <link rel="icon" href="images/logo.png" type="image/x-icon">
            <title>Virtual Collaboration Hub</title>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <style>
                .assigned-task {
                    background-color: rgba(70, 130, 180, 0.1); /* Light blue background for assigned tasks */
                }
                .task-badge {
                    display: inline-block;
                    padding: 2px 8px;
                    border-radius: 12px;
                    font-size: 12px;
                    margin-bottom: 5px;
                }
                .created-badge {
                    background-color: #28a745;
                    color: white;
                }
                .assigned-badge {
                    background-color: #007bff;
                    color: white;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="absolute top-25 left-4 z-10">
                    <a href="javascript:history.back()" class="px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                        Go Back
                    </a>
                </div>
                <br>
                <h1>Completed Tasks</h1>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Start Date</th>
                            <th>Completion Date</th>
                            <th>Duration to Complete (Days)</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $completedTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="<?php echo e(!$task->is_creator ? 'assigned-task' : '', false); ?>">
                                <td>
                                    <?php echo e($task->title, false); ?>

                                    <?php if($task->is_creator): ?>
                                        <span class="task-badge created-badge">Created</span>
                                    <?php else: ?>
                                        <span class="task-badge assigned-badge">Assigned</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($task->description, false); ?></td>
                                <td><?php echo e(ucfirst($task->priority), false); ?></td>
                                <td><?php echo e($task->start_date ? $task->start_date->timezone('Asia/Kathmandu')->format('Y-m-d H:i:s') : 'N/A', false); ?></td>
                                <td><?php echo e($task->completed_at ? $task->completed_at->timezone('Asia/Kathmandu')->format('Y-m-d H:i:s') : 'N/A', false); ?></td>
                                <td>
                                    <?php if($task->duration_to_complete !== null): ?>
                                        <?php echo e($task->duration_to_complete, false); ?> days
                                    <?php else: ?>
                                        N/A
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($task->is_creator): ?>
                                        <small>Created by you</small>
                                    <?php else: ?>
                                        <small>Created by: <?php echo e($task->user->name, false); ?></small>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>
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
<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/taskshow.blade.php ENDPATH**/ ?>