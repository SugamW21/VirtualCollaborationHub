<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TaskController extends Controller
{
// TaskController.php

public function loadtasks()
{
    $tasks = Task::where('user_id', auth()->id()) // Only tasks for the authenticated user
                 ->where('completed', false)
                 ->orderBy('priority', 'desc')
                 ->orderBy('due_date')
                 ->get();

    return view('tasks.index', compact('tasks'));
}



    public function create() {
        return view('tasks.create');
    }

    // TaskController.php

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required|max:255',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|max:255'
        ]);
    
        // Create Task and associate it with the authenticated user
        Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'start_date' => $request->input('start_date'),
            'user_id' => auth()->id(), // Associate task with the logged-in user
        ]);
    
        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }
    


public function edit(Task $task) {
    // Check if the task belongs to the authenticated user
    if ($task->user_id !== auth()->id()) {
        abort(403); // Unauthorized action
    }

    return view('tasks.edit', compact('task'));
}


public function update(Request $request, Task $task) {
    // Check if the task belongs to the authenticated user
    if ($task->user_id !== auth()->id()) {
        abort(403); // Unauthorized action
    }

    // Validation
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'priority' => 'required|in:low,medium,high',
        'due_date' => 'nullable|max:255'
    ]);

    // Update Task
    $task->update([
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'priority' => $request->input('priority'),
        'due_date' => $request->input('due_date'),
    ]);

    // Redirect
    return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
}


public function destroy(Task $task) {
    // Check if the task belongs to the authenticated user
    if ($task->user_id !== auth()->id()) {
        abort(403); // Unauthorized action
    }

    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
}

public function complete(Task $task) {
    // Ensure the task belongs to the authenticated user
    if ($task->user_id !== auth()->id()) {
        abort(403); // Unauthorized action
    }

    // Mark the task as completed and set the completion timestamp
    $task->update([
        'completed' => true,
        'completed_at' => now(), // Set the current timestamp
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
}




// public function showComplete()
// {
//     $completedTasks = Task::where('user_id', auth()->id())
//                       ->where('completed', true)
//                       ->orderBy('completed_at', 'desc')
//                       ->get(['title', 'description', 'priority', 'completed_at']);
//  // Include 'completed_at'

//     return view('taskshow', compact('completedTasks'));
// }
    

public function showComplete()
{
    $completedTasks = Task::where('user_id', auth()->id())
                          ->where('completed', true)
                          ->orderBy('completed_at', 'desc')
                          ->get(['title', 'description', 'priority', 'completed_at', 'start_date']);

    // Calculate duration for each task
    foreach ($completedTasks as $task) {
        if ($task->start_date && $task->completed_at) {
            $startDate = Carbon::parse($task->start_date);
            $completedAt = Carbon::parse($task->completed_at);
            $task->duration_to_complete = $startDate->diffInDays($completedAt);
        } else {
            $task->duration_to_complete = null;
        }
    }

    return view('taskshow', compact('completedTasks'));
}
}