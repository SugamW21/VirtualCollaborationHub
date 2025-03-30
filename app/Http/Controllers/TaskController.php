<?php

// namespace App\Http\Controllers;
// use App\Models\Task;
// use Carbon\Carbon;

// use Illuminate\Http\Request;

// class TaskController extends Controller
// {
// // TaskController.php

// public function loadtasks()
// {
//     $tasks = Task::where('user_id', auth()->id()) // Only tasks for the authenticated user
//                  ->where('completed', false)
//                  ->orderBy('priority', 'desc')
//                  ->orderBy('due_date')
//                  ->get();

//     return view('tasks.index', compact('tasks'));
// }



//     public function create() {
//         return view('tasks.create');
//     }

//     // TaskController.php

//     public function store(Request $request)
//     {
//         // Validation
//         $request->validate([
//             'title' => 'required|max:255',
//             'description' => 'nullable',
//             'priority' => 'required|max:255',
//             'start_date' => 'nullable|date',
//             'due_date' => 'nullable|max:255'
//         ]);
    
//         // Create Task and associate it with the authenticated user
//         Task::create([
//             'title' => $request->input('title'),
//             'description' => $request->input('description'),
//             'priority' => $request->input('priority'),
//             'due_date' => $request->input('due_date'),
//             'start_date' => $request->input('start_date'),
//             'user_id' => auth()->id(), // Associate task with the logged-in user
//         ]);
    
//         return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
//     }
    


// public function edit(Task $task) {
//     // Check if the task belongs to the authenticated user
//     if ($task->user_id !== auth()->id()) {
//         abort(403); // Unauthorized action
//     }

//     return view('tasks.edit', compact('task'));
// }


// public function update(Request $request, Task $task) {
//     // Check if the task belongs to the authenticated user
//     if ($task->user_id !== auth()->id()) {
//         abort(403); // Unauthorized action
//     }

//     // Validation
//     $request->validate([
//         'title' => 'required|max:255',
//         'description' => 'nullable',
//         'priority' => 'required|in:low,medium,high',
//         'due_date' => 'nullable|max:255'
//     ]);

//     // Update Task
//     $task->update([
//         'title' => $request->input('title'),
//         'description' => $request->input('description'),
//         'priority' => $request->input('priority'),
//         'due_date' => $request->input('due_date'),
//     ]);

//     // Redirect
//     return redirect()->route('tasks.index')->with('success', 'Task Updated Successfully');
// }


// public function destroy(Task $task) {
//     // Check if the task belongs to the authenticated user
//     if ($task->user_id !== auth()->id()) {
//         abort(403); // Unauthorized action
//     }

//     $task->delete();
//     return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully');
// }

// public function complete(Task $task) {
//     // Ensure the task belongs to the authenticated user
//     if ($task->user_id !== auth()->id()) {
//         abort(403); // Unauthorized action
//     }

//     // Mark the task as completed and set the completion timestamp
//     $task->update([
//         'completed' => true,
//         'completed_at' => now(), // Set the current timestamp
//     ]);

//     return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
// }




// // public function showComplete()
// // {
// //     $completedTasks = Task::where('user_id', auth()->id())
// //                       ->where('completed', true)
// //                       ->orderBy('completed_at', 'desc')
// //                       ->get(['title', 'description', 'priority', 'completed_at']);
// //  // Include 'completed_at'

// //     return view('taskshow', compact('completedTasks'));
// // }
    

// public function showComplete()
// {
//     $completedTasks = Task::where('user_id', auth()->id())
//                           ->where('completed', true)
//                           ->orderBy('completed_at', 'desc')
//                           ->get(['title', 'description', 'priority', 'completed_at', 'start_date']);

//     // Calculate duration for each task
//     foreach ($completedTasks as $task) {
//         if ($task->start_date && $task->completed_at) {
//             $startDate = Carbon::parse($task->start_date);
//             $completedAt = Carbon::parse($task->completed_at);
//             $task->duration_to_complete = $startDate->diffInDays($completedAt);
//         } else {
//             $task->duration_to_complete = null;
//         }
//     }

//     return view('taskshow', compact('completedTasks'));
// }
// }



namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function loadtasks()
    {
        // Get tasks created by the user
        $createdTasks = Task::where('user_id', auth()->id())
                     ->where('completed', false)
                     ->orderBy('priority', 'desc')
                     ->orderBy('due_date')
                     ->get();
        
        // Get tasks assigned to the user
        $assignedTasks = Task::whereHas('assignedUsers', function($query) {
                        $query->where('users.id', auth()->id());
                     })
                     ->where('completed', false)
                     ->where('user_id', '!=', auth()->id()) // Exclude tasks created by the user
                     ->orderBy('priority', 'desc')
                     ->orderBy('due_date')
                     ->get();
        
        // Merge both collections
        $tasks = $createdTasks->merge($assignedTasks);
        
        return view('tasks.index', compact('tasks'));
    }

    public function create() {
        // Get all users except the current user for assignment
        $users = User::where('id', '!=', auth()->id())->get();
        return view('tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'priority' => 'required|max:255',
            'start_date' => 'nullable|date',
            'due_date' => 'nullable|max:255',
            'assigned_users' => 'nullable|array',
            'assigned_users.*' => 'exists:users,id'
        ]);
    
        // Create Task and associate it with the authenticated user
        $task = Task::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
            'start_date' => $request->input('start_date'),
            'user_id' => auth()->id(), // Associate task with the logged-in user
        ]);
        
        // Assign users if any are selected
        if ($request->has('assigned_users')) {
            $task->assignedUsers()->attach($request->input('assigned_users'));
        }
    
        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }
    
    public function edit(Task $task) {
        // Check if the task belongs to the authenticated user
        if ($task->user_id !== auth()->id()) {
            abort(403); // Unauthorized action
        }
        
        // Get all users except the current user for assignment
        $users = User::where('id', '!=', auth()->id())->get();
        
        // Get IDs of currently assigned users
        $assignedUserIds = $task->assignedUsers->pluck('id')->toArray();
        
        return view('tasks.edit', compact('task', 'users', 'assignedUserIds'));
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
            'due_date' => 'nullable|max:255',
            'assigned_users' => 'nullable|array',
            'assigned_users.*' => 'exists:users,id'
        ]);

        // Update Task
        $task->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'priority' => $request->input('priority'),
            'due_date' => $request->input('due_date'),
        ]);
        
        // Update assigned users
        if ($request->has('assigned_users')) {
            $task->assignedUsers()->sync($request->input('assigned_users'));
        } else {
            $task->assignedUsers()->detach(); // Remove all assignments if none selected
        }

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
        // Check if the task belongs to the authenticated user or is assigned to them
        $isAssigned = $task->assignedUsers()->where('users.id', auth()->id())->exists();
        
        if ($task->user_id !== auth()->id() && !$isAssigned) {
            abort(403); // Unauthorized action
        }

        // Mark the task as completed and set the completion timestamp
        $task->update([
            'completed' => true,
            'completed_at' => now(), // Set the current timestamp
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
    }

    public function showComplete()
    {
        // Get completed tasks created by the user
        $createdCompletedTasks = Task::where('user_id', auth()->id())
                              ->where('completed', true)
                              ->orderBy('completed_at', 'desc')
                              ->get(['id', 'title', 'description', 'priority', 'completed_at', 'start_date', 'user_id']);
        
        // Get completed tasks assigned to the user
        $assignedCompletedTasks = Task::whereHas('assignedUsers', function($query) {
                                $query->where('users.id', auth()->id());
                             })
                             ->where('completed', true)
                             ->where('user_id', '!=', auth()->id()) // Exclude tasks created by the user
                             ->orderBy('completed_at', 'desc')
                             ->get(['id', 'title', 'description', 'priority', 'completed_at', 'start_date', 'user_id']);
        
        // Merge both collections
        $completedTasks = $createdCompletedTasks->merge($assignedCompletedTasks);

        // Calculate duration for each task
        foreach ($completedTasks as $task) {
            if ($task->start_date && $task->completed_at) {
                $startDate = Carbon::parse($task->start_date);
                $completedAt = Carbon::parse($task->completed_at);
                $task->duration_to_complete = $startDate->diffInDays($completedAt);
            } else {
                $task->duration_to_complete = null;
            }
            
            // Add a flag to indicate if the task was created by the current user
            $task->is_creator = ($task->user_id === auth()->id());
        }

        return view('taskshow', compact('completedTasks'));
    }
}