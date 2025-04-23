{{-- 

<x-app-layout>
    
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
                
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="form-control" id="priority" name="priority" required>
                            <option value="low" @if($task->priority == 'low') selected @endif>Low</option>
                            <option value="medium" @if($task->priority == 'medium') selected @endif>Medium</option>
                            <option value="high" @if($task->priority == 'high') selected @endif>High</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="due_date">Due Date</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}">
                    </div>
                    <div class="form-group">
                        <label for="assigned_users">Assign to Users</label>
                        <select class="form-control select2" id="assigned_users" name="assigned_users[]" multiple>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ in_array($user->id, $assignedUserIds) ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
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
</x-app-layout>  --}}
<x-app-layout>
    <div class="container mt-4"> 
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="icon" href="/images/logo.png" type="image/x-icon">
            <title>Virtual Collaboration Hub</title>
            <!-- Other meta tags and CSS links -->
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            
            <!-- Modern Professional UI CSS -->
            <style>
                /* Base Styles & Variables */
                :root {
                  --primary: #4361ee;
                  --primary-dark: #3a56e4;
                  --primary-light: #4895ef;
                  --success: #4cc9f0;
                  --warning: #f72585;
                  --danger: #7209b7;
                  --dark: #212529;
                  --light: #f8f9fa;
                  --gray-100: #f8f9fa;
                  --gray-200: #e9ecef;
                  --gray-300: #dee2e6;
                  --gray-400: #ced4da;
                  --gray-500: #adb5bd;
                  --gray-600: #6c757d;
                  --gray-700: #495057;
                  --gray-800: #343a40;
                  --gray-900: #212529;
                  --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
                  --shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
                  --shadow-md: 0 6px 12px rgba(0, 0, 0, 0.08);
                  --border-radius: 8px;
                  --border-radius-lg: 12px;
                  --transition: all 0.2s ease;
                }

                body {
                  background-color: #f5f7ff;
                  color: var(--dark);
                  font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
                  line-height: 1.6;
                }

                /* Container Styling */
                .container {
                  max-width: 850px;
                  margin: 2rem auto;
                  padding: 0 1.5rem;
                }

                /* Card Styling */
                .task-form-card {
                  background: white;
                  border-radius: var(--border-radius-lg);
                  box-shadow: var(--shadow-md);
                  padding: 2rem;
                  position: relative;
                  overflow: hidden;
                }

                /* Heading Styles */
                h1 {
                  color: var(--dark);
                  font-size: 1.75rem;
                  font-weight: 600;
                  margin-bottom: 1.5rem;
                  position: relative;
                  display: inline-block;
                }

                h1::after {
                  content: '';
                  position: absolute;
                  bottom: -6px;
                  left: 0;
                  width: 40px;
                  height: 3px;
                  background: var(--primary);
                  border-radius: 2px;
                }

                /* Form Group Styling */
                .form-group {
                  margin-bottom: 1.5rem;
                  position: relative;
                }

                .form-group label {
                  display: block;
                  font-weight: 500;
                  margin-bottom: 0.5rem;
                  color: var(--gray-700);
                  font-size: 0.95rem;
                }

                /* Input Styling */
                .form-control {
                  width: 100%;
                  padding: 0.65rem 1rem;
                  font-size: 1rem;
                  line-height: 1.5;
                  color: var(--gray-800);
                  background-color: var(--gray-100);
                  border: 1px solid var(--gray-300);
                  border-radius: var(--border-radius);
                  transition: var(--transition);
                }

                .form-control:focus {
                  background-color: white;
                  border-color: var(--primary-light);
                  outline: 0;
                  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
                }

                textarea.form-control {
                  min-height: 100px;
                  resize: vertical;
                }

                /* Select Styling */
                select.form-control {
                  appearance: none;
                  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236c757d' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
                  background-repeat: no-repeat;
                  background-position: right 1rem center;
                  background-size: 1em;
                  padding-right: 2.5rem;
                }

                /* Priority Styling */
                .priority-indicator {
                  display: inline-block;
                  width: 10px;
                  height: 10px;
                  border-radius: 50%;
                  margin-right: 6px;
                }

                .priority-low { background-color: var(--success); }
                .priority-medium { background-color: var(--warning); }
                .priority-high { background-color: var(--danger); }

                /* Select2 Custom Styling */
                .select2-container--default .select2-selection--multiple {
                  background-color: var(--gray-100);
                  border: 1px solid var(--gray-300);
                  border-radius: var(--border-radius);
                  min-height: 42px;
                  padding: 0.25rem 0.5rem;
                }

                .select2-container--default.select2-container--focus .select2-selection--multiple {
                  background-color: white;
                  border-color: var(--primary-light);
                  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
                }

                .select2-container--default .select2-selection--multiple .select2-selection__choice {
                  background-color: var(--primary-light);
                  border: none;
                  border-radius: 50px;
                  color: white;
                  padding: 2px 10px;
                  margin-top: 4px;
                }

                .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
                  color: white;
                  margin-right: 5px;
                  border-right: none;
                }

                .select2-dropdown {
                  border: 1px solid var(--gray-300);
                  border-radius: var(--border-radius);
                  box-shadow: var(--shadow);
                }

                /* Button Styling */
                .btn {
                  display: inline-block;
                  font-weight: 500;
                  text-align: center;
                  white-space: nowrap;
                  vertical-align: middle;
                  user-select: none;
                  border: 1px solid transparent;
                  padding: 0.65rem 1.25rem;
                  font-size: 1rem;
                  line-height: 1.5;
                  border-radius: var(--border-radius);
                  transition: var(--transition);
                }

                .btn-primary {
                  color: rgb(255, 255, 255);
                  background-color: var(--primary);
                  border-color: var(--primary);
                }

                .btn-primary:hover {
                  background-color: var(--primary-dark);
                  border-color: var(--primary-dark);
                  transform: translateY(-1px);
                  box-shadow: 0 4px 8px rgba(67, 97, 238, 0.2);
                }

                .btn-primary:focus {
                  box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.3);
                }

                /* Go Back Button */
                .back-button {
                  display: inline-flex;
                  align-items: center;
                  padding: 0.5rem 1rem;
                  margin-bottom: 1rem;
                  background-color: rgb(233, 111, 111);
                  color: red;
                  border: 1px solid var(--gray-300);
                  border-radius: var(--border-radius);
                  text-decoration: none;
                  font-size: 0.95rem;
                  transition: var(--transition);
                  box-shadow: var(--shadow-sm);
                }

                .back-button:hover {
                  background-color: var(--gray-100);
                  color: var(--gray-900);
                  text-decoration: none;
                  transform: translateX(-2px);
                }

                .back-button svg {
                  margin-right: 6px;
                }

                /* Form Text */
                .form-text {
                  display: block;
                  margin-top: 0.375rem;
                  font-size: 0.875rem;
                  color: var(--gray-600);
                }

                /* Responsive Adjustments */
                @media (max-width: 768px) {
                  .container {
                    padding: 0 1rem;
                  }
                  
                  .task-form-card {
                    padding: 1.5rem;
                  }
                  
                  h1 {
                    font-size: 1.5rem;
                  }
                }
                
                /* Custom styling for the Go Back button in your existing markup */
                .absolute.top-25.left-4.z-10 a {
                  display: inline-flex;
                  align-items: center;
                  padding: 0.5rem 1rem;
                  background-color: white;
                  color: var(--gray-700);
                  border: 1px solid var(--gray-300);
                  border-radius: var(--border-radius);
                  text-decoration: none;
                  font-size: 0.95rem;
                  transition: var(--transition);
                  box-shadow: var(--shadow-sm);
                }
                
                .absolute.top-25.left-4.z-10 a:hover {
                  background-color: var(--gray-100);
                  color: var(--gray-900);
                  text-decoration: none;
                  transform: translateX(-2px);
                }
                
                .absolute.top-25.left-4.z-10 a svg {
                  margin-right: 6px;
                }
                
                /* Form layout improvements */
                .form-row {
                  display: flex;
                  flex-wrap: wrap;
                  margin-right: -10px;
                  margin-left: -10px;
                }
                
                .form-col {
                  flex: 0 0 50%;
                  max-width: 50%;
                  padding-right: 10px;
                  padding-left: 10px;
                }
                
                @media (max-width: 768px) {
                  .form-col {
                    flex: 0 0 100%;
                    max-width: 100%;
                  }
                }
                
                /* Subtle form field hover effect */
                .form-control:hover:not(:focus) {
                  border-color: var(--gray-400);
                }
                
                /* Subtle card border */
                .task-form-card {
                  border: 1px solid var(--gray-200);
                }
            </style>
        </head>
        <body>
            <!-- Go Back Button -->
            <div class="absolute top-25 left-4 z-10">
                <a href="javascript:history.back()" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                    Go Back
                </a>
            </div>
            
            <div class="container">
                <div class="task-form-card">
                    <h1>Edit Task</h1>
                    
                    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="priority">
                                        <span class="priority-indicator priority-{{ $task->priority }}"></span>
                                        Priority
                                    </label>
                                    <select class="form-control" id="priority" name="priority" required>
                                        <option value="low" @if($task->priority == 'low') selected @endif>Low</option>
                                        <option value="medium" @if($task->priority == 'medium') selected @endif>Medium</option>
                                        <option value="high" @if($task->priority == 'high') selected @endif>High</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="due_date">Due Date</label>
                                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="assigned_users">Assign to Users</label>
                            <select class="form-control select2" id="assigned_users" name="assigned_users[]" multiple>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ in_array($user->id, $assignedUserIds) ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Select users to assign this task to</small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </form>
                </div>
            </div>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Initialize Select2
                    $('.select2').select2({
                        placeholder: "Select users to assign",
                        allowClear: true
                    });
                    
                    // Update priority indicator when priority changes
                    $('#priority').on('change', function() {
                        const priority = $(this).val();
                        $('.priority-indicator')
                            .removeClass('priority-low priority-medium priority-high')
                            .addClass('priority-' + priority);
                    });
                    
                    // Trigger change to set initial priority indicator
                    $('#priority').trigger('change');
                });
            </script>
        </body>
        </html>
    </div>
</x-app-layout>