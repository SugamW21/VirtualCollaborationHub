<x-app-layout>
    <div class="container mt-4"> 
        <html lang="en">
        <head>
            <link rel="icon" href="images/logo.png" type="image/x-icon">
            <title>Virtual Collaboration Hub</title>
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                            <th>Start Date</th> <!-- New Column -->
                            <th>Completion Date</th>
                            <th>Duration to Complete (Days)</th> <!-- New Column -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($completedTasks as $task)
                            <tr>
                                <td>{{ $task->title }}</td>
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
</x-app-layout>
