

{{-- <x-app-layout>
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
                        @foreach ($completedTasks as $task)
                            <tr class="{{ !$task->is_creator ? 'assigned-task' : '' }}">
                                <td>
                                    {{ $task->title }}
                                    @if($task->is_creator)
                                        <span class="task-badge created-badge">Created</span>
                                    @else
                                        <span class="task-badge assigned-badge">Assigned</span>
                                    @endif
                                </td>
                                <td>{{ $task->description }}</td>
                                <td>{{ ucfirst($task->priority) }}</td>
                                <td>{{ $task->start_date ? $task->start_date->timezone('Asia/Kathmandu')->format('Y-m-d H:i:s') : 'N/A'}}</td>
                                <td>{{ $task->completed_at ? $task->completed_at->timezone('Asia/Kathmandu')->format('Y-m-d H:i:s') : 'N/A' }}</td>
                                <td>
                                    @if ($task->duration_to_complete !== null)
                                        {{ $task->duration_to_complete }} days
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    @if($task->is_creator)
                                        <small>Created by you</small>
                                    @else
                                        <small>Created by: {{ $task->user->name }}</small>
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
        </body>
        </html>
    </div>
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
                --completed: #52b788;
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
                background: linear-gradient(45deg, var(--completed), var(--success));
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
            
            .btn-active {
                background: rgba(255, 255, 255, 0.2);
                color: white;
            }
            
            .btn-active:hover {
                background: rgba(255, 255, 255, 0.3);
                transform: translateY(-3px);
                color: white;
            }
            
            .btn-create {
                background: linear-gradient(45deg, var(--completed), var(--success));
                color: white;
            }
            
            .btn-create:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
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
                background: linear-gradient(45deg, var(--completed), var(--success));
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
            
            .completed-badge {
                background: linear-gradient(45deg, #52b788, #40916c);
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
            
            .btn-restore {
                background: linear-gradient(45deg, #4895ef, #4cc9f0);
                color: white;
            }
            
            .btn-delete {
                background: linear-gradient(45deg, #f72585, #dc2f02);
                color: white;
            }
            
            .btn-action:hover {
                transform: translateY(-2px);
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                color: white;
            }
            
            .completion-info {
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.8);
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
            
            .completion-check {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 30px;
                height: 30px;
                background: var(--completed);
                color: white;
                border-radius: 50%;
                margin-right: 10px;
                box-shadow: 0 3px 10px rgba(82, 183, 136, 0.3);
            }
            
            .empty-state {
                text-align: center;
                padding: 50px 20px;
            }
            
            .empty-state-icon {
                font-size: 5rem;
                color: rgba(255, 255, 255, 0.2);
                margin-bottom: 20px;
            }
            
            .empty-state-text {
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.6);
                margin-bottom: 30px;
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
                <h1 class="page-title">Completed Tasks</h1>
                <h2 class="page-subtitle">Your Achievements & Milestones</h2>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <a href="{{ route('tasks.index') }}" class="btn action-btn btn-active">
                        <i class="fas fa-tasks me-2"></i> Active Tasks
                    </a>
                    <a href="{{ route('task.create') }}" class="btn action-btn btn-create">
                        <i class="fas fa-plus me-2"></i> Create Task
                    </a>
                </div>
                <div class="d-none d-md-block">
                    <span class="text-white-50">
                        <i class="fas fa-check-circle me-2"></i> {{ count($completedTasks) }} Completed Tasks
                    </span>
                </div>
            </div>

            @if(count($completedTasks) > 0)
            <div class="table-responsive">
                <table class="task-table">
                    <thead>
                        <tr>
                            <th>Task Details</th>
                            <th>Priority</th>
                            <th>Timeline</th>
                            <th>Completion</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($completedTasks as $task)
                        <tr class="{{ $task->user_id != auth()->id() ? 'assigned-task' : '' }}">
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="completion-check">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <div>
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
                                            <span class="task-badge completed-badge">
                                                <i class="fas fa-check-circle me-1"></i> Completed
                                            </span>
                                        </div>
                                    </div>
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
                                <div class="completion-info mt-2">
                                    @php
                                        $dueDate = \Carbon\Carbon::parse($task->due_date);
                                        $completedDate = \Carbon\Carbon::parse($task->completed_at);
                                        
                                        if ($completedDate->lte($dueDate)) {
                                            echo '<i class="fas fa-trophy me-1 text-warning"></i> Completed on time';
                                        } else {
                                            $daysLate = $completedDate->diffInDays($dueDate);
                                            echo '<i class="fas fa-hourglass-end me-1 text-danger"></i> Completed ' . $daysLate . ' days late';
                                        }
                                    @endphp
                                </div>
                            </td>
                            <td>
                                <div class="status-info">
                                    <div>
                                        <i class="fas fa-calendar-check me-1"></i> 
                                        <strong>Completed:</strong> {{ \Carbon\Carbon::parse($task->completed_at)->format('M d, Y') }}
                                    </div>
                                    <div class="mt-2">
                                        <i class="fas fa-clock me-1"></i>
                                        <strong>Time ago:</strong> {{ \Carbon\Carbon::parse($task->completed_at)->diffForHumans() }}
                                    </div>
                                    
                                    @if($task->user_id == auth()->id())
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
                                        <div class="mt-2"><i class="fas fa-user me-1"></i> <strong>Created by:</strong> {{ $task->user->name }}</div>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    @if($task->user_id == auth()->id())
                                        <!-- Changed to use a direct URL instead of a named route -->
                                        <form action="{{ url('/tasks/'.$task->id.'/restore') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-action btn-restore" onclick="return confirm('Restore this task to active status?')">
                                                <i class="fas fa-redo-alt"></i> Restore
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-action btn-delete" onclick="return confirm('Permanently delete this task?')">
                                                <i class="fas fa-trash-alt"></i> Delete
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
            @else
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="empty-state-text">
                    You don't have any completed tasks yet.<br>
                    Complete some tasks to see them here!
                </div>
                <a href="{{ route('tasks.index') }}" class="btn action-btn btn-create">
                    <i class="fas fa-arrow-left me-2"></i> Back to Active Tasks
                </a>
            </div>
            @endif
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



