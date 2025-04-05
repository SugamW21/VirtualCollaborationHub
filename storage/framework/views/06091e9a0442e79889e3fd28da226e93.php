
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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <style>
                :root {
                    --primary: #4361ee;
                    --secondary: #3f37c9;
                    --success: #4cc9f0;
                    --danger: #f72585;
                    --warning: #f8961e;
                    --info: #4895ef;
                    --light: #f8f9fa;
                    --dark: #212529;
                }
                
                body {
                    font-family: 'Poppins', sans-serif;
                    background: linear-gradient(135deg, #4361ee, #3a0ca3);
                    min-height: 100vh;
                    padding: 20px;
                }
                
                .form-container {
                    background: rgba(255, 255, 255, 0.9);
                    border-radius: 16px;
                    padding: 40px;
                    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                    max-width: 800px;
                    margin: 40px auto;
                    position: relative;
                    overflow: hidden;
                }
                
                .form-container::before {
                    content: '';
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 10px;
                    background: linear-gradient(90deg, var(--primary), var(--info));
                }
                
                .form-title {
                    font-weight: 700;
                    margin-bottom: 30px;
                    color: var(--primary);
                    font-size: 2.2rem;
                    position: relative;
                    display: inline-block;
                }
                
                .form-title::after {
                    content: '';
                    position: absolute;
                    bottom: -10px;
                    left: 0;
                    width: 50px;
                    height: 4px;
                    background: linear-gradient(90deg, var(--primary), var(--info));
                    border-radius: 2px;
                }
                
                .form-group {
                    margin-bottom: 25px;
                }
                
                .form-label {
                    font-weight: 600;
                    color: var(--dark);
                    margin-bottom: 8px;
                    font-size: 0.95rem;
                }
                
                .form-control {
                    border-radius: 10px;
                    padding: 12px 15px;
                    border: 1px solid rgba(0, 0, 0, 0.1);
                    font-size: 1rem;
                    transition: all 0.3s ease;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
                }
                
                .form-control:focus {
                    border-color: var(--primary);
                    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
                }
                
                .form-select {
                    border-radius: 10px;
                    padding: 12px 15px;
                    height: auto;
                    border: 1px solid rgba(0, 0, 0, 0.1);
                    font-size: 1rem;
                    transition: all 0.3s ease;
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
                }
                
                .form-select:focus {
                    border-color: var(--primary);
                    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
                }
                
                .form-text {
                    color: rgba(0, 0, 0, 0.5);
                    font-size: 0.85rem;
                    margin-top: 5px;
                }
                
                .btn-back {
                    position: absolute;
                    top: 20px;
                    left: 20px;
                    background: var(--danger);
                    color: white;
                    border: none;
                    border-radius: 50px;
                    padding: 10px 20px;
                    font-weight: 500;
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 10px rgba(247, 37, 133, 0.3);
                }
                
                .btn-back:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 6px 15px rgba(247, 37, 133, 0.4);
                    color: white;
                }
                
                .btn-submit {
                    background: linear-gradient(45deg, var(--primary), var(--info));
                    color: white;
                    border: none;
                    border-radius: 50px;
                    padding: 12px 30px;
                    font-weight: 600;
                    font-size: 1rem;
                    transition: all 0.3s ease;
                    box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
                    width: 100%;
                    margin-top: 10px;
                }
                
                .btn-submit:hover {
                    transform: translateY(-3px);
                    box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
                }
                
                /* Select2 Customization */
                .select2-container--default .select2-selection--multiple {
                    border-radius: 10px;
                    padding: 6px 10px;
                    border: 1px solid rgba(0, 0, 0, 0.1);
                    min-height: 50px;
                }
                
                .select2-container--default.select2-container--focus .select2-selection--multiple {
                    border-color: var(--primary);
                    box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
                }
                
                .select2-container--default .select2-selection--multiple .select2-selection__choice {
                    background-color: var(--primary);
                    color: white;
                    border: none;
                    border-radius: 50px;
                    padding: 5px 10px;
                    margin-right: 5px;
                    margin-top: 5px;
                }
                
                .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                    color: white;
                    margin-right: 5px;
                }
                
                .select2-container--default .select2-results__option--highlighted[aria-selected] {
                    background-color: var(--primary);
                }
                
                .select2-dropdown {
                    border-radius: 10px;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                    border: 1px solid rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }
                
                .select2-search__field {
                    border-radius: 5px !important;
                    padding: 8px !important;
                }
                
                .form-floating {
                    position: relative;
                }
                
                .form-floating > .form-control,
                .form-floating > .form-select {
                    height: calc(3.5rem + 2px);
                    padding: 1rem 0.75rem;
                }
                
                .form-floating > label {
                    position: absolute;
                    top: 0;
                    left: 0;
                    height: 100%;
                    padding: 1rem 0.75rem;
                    pointer-events: none;
                    border: 1px solid transparent;
                    transform-origin: 0 0;
                    transition: opacity .1s ease-in-out,transform .1s ease-in-out;
                }
                
                .form-floating > .form-control:focus ~ label,
                .form-floating > .form-control:not(:placeholder-shown) ~ label,
                .form-floating > .form-select ~ label {
                    opacity: .65;
                    transform: scale(.85) translateY(-.5rem) translateX(.15rem);
                }
                
                .priority-options {
                    display: flex;
                    gap: 15px;
                    margin-top: 10px;
                }
                
                .priority-option {
                    flex: 1;
                    position: relative;
                }
                
                .priority-option input[type="radio"] {
                    position: absolute;
                    opacity: 0;
                    width: 0;
                    height: 0;
                }
                
                .priority-option label {
                    display: block;
                    background: #f8f9fa;
                    border: 2px solid #e9ecef;
                    border-radius: 10px;
                    padding: 15px;
                    text-align: center;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }
                
                .priority-option:nth-child(1) label {
                    color: #40916c;
                }
                
                .priority-option:nth-child(2) label {
                    color: #f9844a;
                }
                
                .priority-option:nth-child(3) label {
                    color: #f72585;
                }
                
                .priority-option input[type="radio"]:checked + label {
                    transform: translateY(-3px);
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                }
                
                .priority-option:nth-child(1) input[type="radio"]:checked + label {
                    background: #40916c;
                    color: white;
                    border-color: #40916c;
                }
                
                .priority-option:nth-child(2) input[type="radio"]:checked + label {
                    background: #f9844a;
                    color: white;
                    border-color: #f9844a;
                }
                
                .priority-option:nth-child(3) input[type="radio"]:checked + label {
                    background: #f72585;
                    color: white;
                    border-color: #f72585;
                }
                
                .date-inputs {
                    display: flex;
                    gap: 20px;
                }
                
                .date-inputs .form-group {
                    flex: 1;
                }
                
                @media (max-width: 768px) {
                    .form-container {
                        padding: 30px 20px;
                        margin: 20px auto;
                    }
                    
                    .form-title {
                        font-size: 1.8rem;
                    }
                    
                    .date-inputs {
                        flex-direction: column;
                        gap: 10px;
                    }
                    
                    .priority-options {
                        flex-direction: column;
                        gap: 10px;
                    }
                }
            </style>
        </head>
        <body>
            <div class="form-container">
                <a href="javascript:history.back()" class="btn btn-back">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
                
                <h1 class="form-title">Create New Task</h1>
                
                <form action="<?php echo e(route('task.store'), false); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter task title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" placeholder="Describe the task details"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Priority Level</label>
                        <div class="priority-options">
                            <div class="priority-option">
                                <input type="radio" id="priority-low" name="priority" value="low" checked>
                                <label for="priority-low">
                                    <i class="fas fa-arrow-down mb-2"></i><br>
                                    Low
                                </label>
                            </div>
                            <div class="priority-option">
                                <input type="radio" id="priority-medium" name="priority" value="medium">
                                <label for="priority-medium">
                                    <i class="fas fa-minus mb-2"></i><br>
                                    Medium
                                </label>
                            </div>
                            <div class="priority-option">
                                <input type="radio" id="priority-high" name="priority" value="high">
                                <label for="priority-high">
                                    <i class="fas fa-arrow-up mb-2"></i><br>
                                    High
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="date-inputs">
                        <div class="form-group">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date">
                        </div>
                        
                        <div class="form-group">
                            <label for="due_date" class="form-label">Due Date</label>
                            <input type="date" class="form-control" id="due_date" name="due_date">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="assigned_users" class="form-label">Assign to Team Members</label>
                        <select class="form-control select2" id="assigned_users" name="assigned_users[]" multiple>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id, false); ?>"><?php echo e($user->name, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <small class="form-text">Select team members who will work on this task</small>
                    </div>
                    
                    <button type="submit" class="btn btn-submit">
                        <i class="fas fa-plus-circle me-2"></i> Create Task
                    </button>
                </form>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('.select2').select2({
                        placeholder: "Select team members to assign",
                        allowClear: true,
                        theme: "classic"
                    });
                    
                    // Animate form elements on load
                    const formElements = $('.form-group');
                    formElements.each(function(index) {
                        $(this).css({
                            'opacity': 0,
                            'transform': 'translateY(20px)'
                        });
                        
                        setTimeout(() => {
                            $(this).css({
                                'transition': 'all 0.3s ease',
                                'opacity': 1,
                                'transform': 'translateY(0)'
                            });
                        }, 100 * index);
                    });
                    
                    // Validate due date is after start date
                    $('#due_date').on('change', function() {
                        const startDate = new Date($('#start_date').val());
                        const dueDate = new Date($(this).val());
                        
                        if (startDate && dueDate && startDate > dueDate) {
                            alert('Due date must be after start date');
                            $(this).val('');
                        }
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
<?php endif; ?>

<?php /**PATH C:\laragon\www\VirtualCollaborationHub\resources\views/tasks/create.blade.php ENDPATH**/ ?>