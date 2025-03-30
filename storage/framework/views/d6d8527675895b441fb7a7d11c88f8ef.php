

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
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="icon" href="/images/logo.png" type="image/x-icon">
            <title>Virtual Collaboration Hub</title>
            <!-- Other meta tags and CSS links -->
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        </head>
        <body>
            <!-- Go Back Button -->
            <div class="absolute top-25 left-4 z-10">
                <a href="javascript:history.back()" class="px-6 py-3 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Go Back
                </a>
            </div>
            <!-- Your content here -->
            <br>
            <br>
            <div class="container">
                <h1>Edit Task</h1>
                
                <form action="<?php echo e(route('tasks.update', $task->id), false); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo e($task->title, false); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?php echo e($task->description, false); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="form-control" id="priority" name="priority" required>
                            <option value="low" <?php if($task->priority == 'low'): ?> selected <?php endif; ?>>Low</option>
                            <option value="medium" <?php if($task->priority == 'medium'): ?> selected <?php endif; ?>>Medium</option>
                            <option value="high" <?php if($task->priority == 'high'): ?> selected <?php endif; ?>>High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="<?php echo e($task->due_date, false); ?>">
                    </div>
                    <div class="form-group">
                        <label for="assigned_users">Assign to Users</label>
                        <select class="form-control select2" id="assigned_users" name="assigned_users[]" multiple>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id, false); ?>" <?php echo e(in_array($user->id, $assignedUserIds) ? 'selected' : '', false); ?>>
                                    <?php echo e($user->name, false); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text text-muted">Select users to assign this task to</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </form>
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.select2').select2({
                        placeholder: "Select users to assign",
                        allowClear: true
                    });
                });
            </script>
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
<?php endif; ?><?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/tasks/edit.blade.php ENDPATH**/ ?>