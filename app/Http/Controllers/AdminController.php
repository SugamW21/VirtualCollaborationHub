<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    // public function loadDashboard()
    // {
    //     // Get the total number of users
    //     $totalUsers = User::count();
    
    //     // Get the global active sessions list
    //     $activeSessions = Cache::get('active_sessions', []);
    
    //     // Count how many active sessions are present
    //     $activeSessionCount = count($activeSessions);
    
    //     // Get all users
    //     $users = User::all();
    
    //     // Pass the necessary data to the view
    //     return view('admin.dashboard', compact('totalUsers', 'activeSessionCount', 'users'));
    // }


//     public function loadDashboard()
// {
//     if (Auth::guard('admin')->check()) {
//         // Admin is authenticated, proceed with dashboard loading
//         $totalUsers = User::count();
//         $activeSessions = Cache::get('active_sessions', []);
//         $activeSessionCount = count($activeSessions);
//         $users = User::all();

//         return view('admin.dashboard', compact('totalUsers', 'activeSessionCount', 'users'));
//     }

//     // Redirect if not authenticated
//     return redirect(route('admin.login'));
// }
public function loadDashboard()
{
    if (Auth::guard('admin')->check()) {
        // Admin is authenticated, proceed with dashboard loading
        $totalUsers = User::count();
        $activeSessions = Cache::get('active_sessions', []);
        $activeSessionCount = count($activeSessions);
        $users = User::all();

        return view('admin.dashboard', compact('totalUsers', 'activeSessionCount', 'users'));
    }

    // Redirect if not authenticated as admin
    return redirect(route('admin.login'))->with('error', 'You must be logged in as an admin to access this page.');
}



    public function edit(User $user)
{
    return view('admin.edit-user', compact('user'));
}


public function update(Request $request, User $user)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $user->id,
    ]);

    $user->update($validatedData);

    return redirect()->route('admin.dashboard')->with('success', 'User updated successfully!');
}

    

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->back()->with('success', 'User deleted successfully!');
}

    
    
}

