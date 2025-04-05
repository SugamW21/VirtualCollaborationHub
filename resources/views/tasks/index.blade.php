
{{-- 
<x-app-layout>
    
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
                justify-content: flex-start;
                 /* Aligns content to the top */
            }
            .container {
                background-color: rgba(0, 0, 0, 0.452); /* Semi-transparent background for better text readability */
                border-radius: 10px;
                padding: 20px;
                margin-top: 20px;
                max-width: 1000px; /* Adds space above the container */
            }
      
            th, td {
                color: white;
                 /* Set text color for table cells */
            }
            .assigned-task {
                background-color: rgba(70, 130, 180, 0.3); /* Light blue background for assigned tasks */
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
    <div id="notification-container" class="notification-area"></div>
    <div class="background">
        <div class="container"> 
            <div class="text-center">
                <h1>Task Management</h1>
                <h2>Todo List</h2> 
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <div>
                <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Create Task</a>
                <a href="{{ route('taskshow') }}" class="btn btn-secondary mb-3">Show Completed Tasks</a>
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
                        <th>Time Left</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr class="{{ $task->user_id != auth()->id() ? 'assigned-task' : '' }}">
                        <td>
                            {{ $task->title }}
                            @if($task->user_id == auth()->id())
                                <span class="task-badge created-badge">Created</span>
                            @else
                                <span class="task-badge assigned-badge">Assigned</span>
                            @endif
                        </td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->start_date }}</td>
                        <td>{{ $task->due_date }}</td>
                        <td>
                            @php
                                $remaining = \Carbon\Carbon::now()->diffForHumans(\Carbon\Carbon::parse($task->due_date), ['parts' => 2]);
                            @endphp
                            {{ $remaining }}
                        </td>
                        <td>
                            @php
                                $currentDate = now();
                                $dueDate = \Carbon\Carbon::parse($task->due_date);

                                if ($dueDate->isFuture()) {
                                    $timeLeft = $currentDate->diff($dueDate);
                                    echo $timeLeft->days . " days, " . $timeLeft->h . " hours, " . $timeLeft->i . " minutes";
                                } else {
                                    echo "Time expired";
                                }
                            @endphp
                        </td>
                        <td>
                            @if($task->user_id == auth()->id())
                                <small>Created by you</small>
                                @if($task->assignedUsers->count() > 0)
                                    <br><small>Assigned to: {{ $task->assignedUsers->pluck('name')->implode(', ') }}</small>
                                @endif
                            @else
                                <small>Created by: {{ $task->user->name }}</small>
                            @endif
                        </td>
                        <td>
                            @if($task->user_id == auth()->id())
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endif
                            <br>
                            <br>
                            @if (!$task->completed)
                            <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">Complete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>

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
    <!--End of Tawk.to Script-->
</x-app-layout> --}}


<x-app-layout>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            }
            
            .background {
                background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('images/group.jpg');
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                min-height: 100vh;
                padding: 20px;
                color: white;
            }
            
            .container-custom {
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 16px;
                padding: 30px;
                margin-top: 20px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
                border: 1px solid rgba(255, 255, 255, 0.18);
            }
            
            .page-title {
                font-weight: 700;
                margin-bottom: 5px;
                font-size: 2.5rem;
                background: linear-gradient(45deg, var(--primary), var(--info));
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            }
            
            .page-subtitle {
                font-weight: 500;
                margin-bottom: 25px;
                color: rgba(255, 255, 255, 0.8);
            }
            
            .action-btn {
                border-radius: 50px;
                padding: 10px 25px;
                font-weight: 500;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                margin-right: 10px;
                border: none;
            }
            
            .btn-create {
                background: linear-gradient(45deg, var(--primary), var(--info));
                color: white;
            }
            
            .btn-create:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
                color: white;
            }
            
            .btn-completed {
                background: rgba(255, 255, 255, 0.2);
                color: white;
            }
            
            .btn-completed:hover {
                background: rgba(255, 255, 255, 0.3);
                transform: translateY(-3px);
                color: white;
            }
            
            .task-table {
                border-radius: 10px;
                overflow: hidden;
                border-collapse: separate;
                border-spacing: 0;
                width: 100%;
                margin-top: 20px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }
            
            .task-table thead {
                background: linear-gradient(45deg, var(--primary), var(--secondary));
                color: white;
            }
            
            .task-table th {
                padding: 15px;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.85rem;
                letter-spacing: 1px;
                border: none;
            }
            
            .task-table td {
                padding: 15px;
                vertical-align: middle;
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                color: rgba(255, 255, 255, 0.9);
                font-size: 0.95rem;
            }
            
            .task-table tbody tr {
                transition: all 0.3s ease;
                background: rgba(255, 255, 255, 0.05);
            }
            
            .task-table tbody tr:hover {
                background: rgba(255, 255, 255, 0.1);
                transform: translateY(-2px);
            }
            
            .assigned-task {
                background: rgba(67, 97, 238, 0.15) !important;
            }
            
            .assigned-task:hover {
                background: rgba(67, 97, 238, 0.25) !important;
            }
            
            .task-badge {
                display: inline-block;
                padding: 5px 12px;
                border-radius: 50px;
                font-size: 0.75rem;
                font-weight: 600;
                margin-bottom: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            
            .created-badge {
                background: linear-gradient(45deg, #4cc9f0, #4895ef);
                color: white;
            }
            
            .assigned-badge {
                background: linear-gradient(45deg, #f72585, #b5179e);
                color: white;
            }
            
            .priority-badge {
                display: inline-block;
                padding: 5px 12px;
                border-radius: 50px;
                font-size: 0.75rem;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 1px;
            }
            
            .priority-low {
                background: linear-gradient(45deg, #52b788, #40916c);
                color: white;
            }
            
            .priority-medium {
                background: linear-gradient(45deg, #f8961e, #f9844a);
                color: white;
            }
            
            .priority-high {
                background: linear-gradient(45deg, #f72585, #dc2f02);
                color: white;
            }
            
            .action-buttons {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
            }
            
            .btn-action {
                border-radius: 50px;
                padding: 8px 15px;
                font-size: 0.8rem;
                font-weight: 500;
                transition: all 0.3s ease;
                border: none;
                display: inline-flex;
                align-items: center;
                gap: 5px;
            }
            
            .btn-edit {
                background: linear-gradient(45deg, #4895ef, #4cc9f0);
                color: white;
            }
            
            .btn-delete {
                background: linear-gradient(45deg, #f72585, #dc2f02);
                color: white;
            }
            
            .btn-complete {
                background: linear-gradient(45deg, #f8961e, #f9844a);
                color: white;
            }
            
            .btn-action:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                color: white;
            }
            
            .time-remaining {
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.8);
            }
            
            .time-expired {
                color: #f72585;
                font-weight: 500;
            }
            
            .status-info {
                font-size: 0.85rem;
                color: rgba(255, 255, 255, 0.7);
                line-height: 1.5;
            }
            
            .status-info strong {
                color: rgba(255, 255, 255, 0.9);
            }
            
            .alert-success {
                background: rgba(76, 201, 240, 0.2);
                border: 1px solid rgba(76, 201, 240, 0.3);
                color: white;
                border-radius: 10px;
                padding: 15px;
                margin-bottom: 20px;
                animation: fadeIn 0.5s ease;
            }
            
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            
            .task-title {
                font-weight: 600;
                color: white;
                margin-bottom: 5px;
            }
            
            .task-description {
                color: rgba(255, 255, 255, 0.8);
                font-size: 0.9rem;
                max-width: 250px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            
            .task-description:hover {
                white-space: normal;
                overflow: visible;
            }
            
            .assigned-users {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                margin-top: 5px;
            }
            
            .user-pill {
                background: rgba(255, 255, 255, 0.1);
                border-radius: 50px;
                padding: 3px 10px;
                font-size: 0.75rem;
                display: inline-flex;
                align-items: center;
                gap: 5px;
            }
            
            .user-pill i {
                font-size: 0.7rem;
            }
            
            /* Responsive adjustments */
            @media (max-width: 992px) {
                .task-table {
                    display: block;
                    overflow-x: auto;
                }
                
                .container-custom {
                    padding: 20px;
                }
            }
        </style>
    </head>
    
    <div id="notification-container" class="notification-area"></div>
    <div class="background">
        <div class="container container-custom">
            <div class="text-center mb-4">
                <h1 class="page-title">Task Management</h1>
                <h2 class="page-subtitle">Organize, Collaborate, Succeed</h2>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="{{ route('task.create') }}" class="btn action-btn btn-create">
                        <i class="fas fa-plus me-2"></i> Create Task
                    </a>
                    <a href="{{ route('taskshow') }}" class="btn action-btn btn-completed">
                        <i class="fas fa-check-circle me-2"></i> Completed Tasks
                    </a>
                </div>
                <div class="d-none d-md-block">
                    <span class="text-white-50">
                        <i class="fas fa-tasks me-2"></i> {{ count($tasks) }} Active Tasks
                    </span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="task-table">
                    <thead>
                        <tr>
                            <th>Task Details</th>
                            <th>Priority</th>
                            <th>Timeline</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr class="{{ $task->user_id != auth()->id() ? 'assigned-task' : '' }}">
                            <td>
                                <div class="task-title">{{ $task->title }}</div>
                                <div class="task-description">{{ $task->description }}</div>
                                <div class="mt-2">
                                    @if($task->user_id == auth()->id())
                                        <span class="task-badge created-badge">
                                            <i class="fas fa-user-edit me-1"></i> Created
                                        </span>
                                    @else
                                        <span class="task-badge assigned-badge">
                                            <i class="fas fa-user-check me-1"></i> Assigned
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <span class="priority-badge priority-{{ strtolower($task->priority) }}">
                                    @if(strtolower($task->priority) == 'high')
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                    @elseif(strtolower($task->priority) == 'medium')
                                        <i class="fas fa-arrow-circle-up me-1"></i>
                                    @else
                                        <i class="fas fa-arrow-circle-down me-1"></i>
                                    @endif
                                    {{ ucfirst($task->priority) }}
                                </span>
                            </td>
                            <td>
                                <div>
                                    <i class="far fa-calendar-alt me-1"></i> 
                                    <strong>Start:</strong> {{ \Carbon\Carbon::parse($task->start_date)->format('M d, Y') }}
                                </div>
                                <div>
                                    <i class="far fa-calendar-check me-1"></i> 
                                    <strong>Due:</strong> {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                                </div>
                                <div class="time-remaining mt-2">
                                    @php
                                        $currentDate = now();
                                        $dueDate = \Carbon\Carbon::parse($task->due_date);

                                        if ($dueDate->isFuture()) {
                                            $timeLeft = $currentDate->diff($dueDate);
                                            echo '<i class="far fa-clock me-1"></i> ' . $timeLeft->days . "d " . $timeLeft->h . "h " . $timeLeft->i . "m remaining";
                                        } else {
                                            echo '<i class="fas fa-exclamation-triangle me-1"></i> <span class="time-expired">Time expired</span>';
                                        }
                                    @endphp
                                </div>
                            </td>
                            <td>
                                <div class="status-info">
                                    @if($task->user_id == auth()->id())
                                        <div><i class="fas fa-user me-1"></i> <strong>Created by you</strong></div>
                                        @if($task->assignedUsers->count() > 0)
                                            <div class="mt-2"><i class="fas fa-users me-1"></i> <strong>Assigned to:</strong></div>
                                            <div class="assigned-users">
                                                @foreach($task->assignedUsers as $user)
                                                    <span class="user-pill">
                                                        <i class="fas fa-user-circle"></i> {{ $user->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @endif
                                    @else
                                        <div><i class="fas fa-user me-1"></i> <strong>Created by:</strong> {{ $task->user->name }}</div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if($task->user_id == auth()->id())
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-action btn-edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this task?')">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </form>
                                    @endif
                                    
                                    @if (!$task->completed)
                                        <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-action btn-complete">
                                                <i class="fas fa-check"></i> Complete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
        <script>
            // Add animations
            $(document).ready(function() {
                // Animate table rows on page load
                $('tbody tr').each(function(index) {
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
                
                // Tooltip initialization
                $('[data-bs-toggle="tooltip"]').tooltip();
            });
        </script>
    </div>

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
    <!--End of Tawk.to Script-->
</x-app-layout>

