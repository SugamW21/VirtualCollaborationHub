//views/tasks/edit.blade.php
<x-app-layout>
    <div class="container mt-4"> 
<!DOCTYPE html>
<html lang="en">
<head>
    
        <link rel="icon" href="/images/logo.png" type="image/x-icon">
        <title>Virtual Collaboration Hub</title>
    
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
</x-app-layout>