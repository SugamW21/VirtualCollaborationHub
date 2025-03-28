{{-- <x-app-layout>
    <div class="container mt-4"> 
        <!DOCTYPE html>
        <html lang="en">
        
        <head>
            <!-- Other meta tags and CSS links -->
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        </head>
        
        <body>
            <br>
            <br>
            <div class="container text-center">
                <h1>Task Management</h1>
        
                <h2>Todo List</h2> 
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        
            <div class="container">
               <a href="{{ route('task.create') }}" class="btn btn-primary mb-3">Create Task</a>
               <a href="{{ route('taskshow') }}" class="btn btn-secondary mb-3">Show Completed Tasks</a>
        
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Priority</th>
                            <th>Start Date</th>
                            <th>Due Date</th>
                            <th>Time Remaining</th>
                            <th>Time Left</th> <!-- New Column -->
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
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
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
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
        </body>
        
        </html>
    </div>
</x-app-layout> --}}
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
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
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
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
</x-app-layout>