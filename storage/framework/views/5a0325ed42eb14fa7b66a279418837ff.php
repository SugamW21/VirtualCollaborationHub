
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
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .background {
                background-image: url('images/group.jpg'); /* Change to your image path */
                background-size: cover; /* Ensures the image covers the full area */
                background-position: top center; /* Aligns the image to the top center */
                background-repeat: no-repeat; /* Prevents repeating the image */
                min-height: 100vh; /* Full height */
                padding: 20px;
                color: white; /* Adjust text color for visibility */
                display: flex; /* Allows for vertical centering */
                flex-direction: column; /* Aligns children in a column */
                justify-content: flex-start; /* Aligns content to the top */
            }
            .container {
                background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background for better text readability */
                border-radius: 10px;
                padding: 20px;
                margin-top: 20px; /* Adds space above the container */
            }
            th, td {
                color: white; /* Set text color for table cells */
            }
        </style>
    </head>

    <div class="background">
        <div class="container"> 
            <div class="text-center">
                <h1>Task Management</h1>
                <h2>Todo List</h2> 
                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('success'), false); ?>

                    </div>
                <?php endif; ?>
            </div>

            <div>
                <a href="<?php echo e(route('task.create'), false); ?>" class="btn btn-primary mb-3">Create Task</a>
                <a href="<?php echo e(route('taskshow'), false); ?>" class="btn btn-secondary mb-3">Show Completed Tasks</a>
            </div>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Priority</th>
                        <th>Start Date</th>
                        <th>Due Date</th>
                        <th>Time Remaining</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($task->title, false); ?></td>
                        <td><?php echo e($task->description, false); ?></td>
                        <td><?php echo e($task->priority, false); ?></td>
                        <td><?php echo e($task->start_date, false); ?></td>
                        <td><?php echo e($task->due_date, false); ?></td>
                        <td>
                            <?php
                                $remaining = \Carbon\Carbon::now()->diffForHumans(\Carbon\Carbon::parse($task->due_date), ['parts' => 2]);
                            ?>
                            <?php echo e($remaining, false); ?>

                        </td>
                        <td>
                            <?php
                                $currentDate = now();
                                $dueDate = \Carbon\Carbon::parse($task->due_date);

                                if ($dueDate->isFuture()) {
                                    $timeLeft = $currentDate->diff($dueDate);
                                    echo $timeLeft->days . " days, " . $timeLeft->h . " hours, " . $timeLeft->i . " minutes";
                                } else {
                                    echo "Time expired";
                                }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo e(route('tasks.edit', $task->id), false); ?>" class="btn btn-primary btn-sm">Edit</a>
                            <form action="<?php echo e(route('tasks.destroy', $task->id), false); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <br>
                            <br>
                            <?php if(!$task->completed): ?>
                            <form action="<?php echo e(route('tasks.complete', $task->id), false); ?>" method="POST" style="display:inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-warning btn-sm">Complete</button>
                            </form>
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
<?php endif; ?><?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/tasks/index.blade.php ENDPATH**/ ?>