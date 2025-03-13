<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RatingFeedbackController;
use App\Http\Controllers\MeetingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');
// Route for the opening video
Route::get('/', function () {
    return view('video'); // Opening video page
})->name('video');

// Route for the landing page
Route::get('/welcome', function () {
    return view('welcome'); // Landing page
})->name('home');

Route::get('/dashboard', [UserController::class, 'loadDashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';

Route::post('/save-chat',[UserController::class, 'saveChat']);
Route::post('/load-chats',[UserController::class, 'loadChats']);

Route::post('/delete-chat',[UserController::class, 'deleteChat']);
Route::post('/update-chat',[UserController::class, 'updateChat']);




//group routes
Route::get('/groups', [UserController::class, 'loadGroups'])
    ->middleware(['auth', 'verified'])
    ->name('groups');

    Route::post('/create-group', [UserController::class, 'createGroup'])
    ->middleware(['auth', 'verified'])
    ->name('createGroup');

    Route::post('/get-members', [UserController::class, 'getMembers'])
    ->middleware(['auth', 'verified'])
    ->name('getMembers');

    Route::post('/add-member', [UserController::class, 'addMembers'])
    ->middleware(['auth', 'verified'])
    ->name('addMembers');

    Route::post('/delete-group', [UserController::class, 'deleteGroup'])
    ->middleware(['auth', 'verified'])
    ->name('deleteGroup');

    Route::post('/update-group', [UserController::class, 'updateGroup'])
    ->middleware(['auth', 'verified'])
    ->name('updateGroup');

    Route::get('/share-group/{id}', [UserController::class, 'shareGroup'])
    ->middleware(['auth', 'verified'])
    ->name('shareGroup');

    Route::post('/join-group', [UserController::class, 'joinGroup'])
    ->middleware(['auth', 'verified'])
    ->name('joinGroup');


    Route::get('/group-chats', [UserController::class, 'groupChats'])
    ->middleware(['auth', 'verified'])
    ->name('groupChats');

    Route::post('/save-group-chat',[UserController::class, 'saveGroupChat']);
    
    Route::post('/load-group-chats',[UserController::class, 'loadGroupChats']);

    Route::post('/delete-group-chat',[UserController::class, 'deleteGroupChat']);

    Route::post('/update-group-chat',[UserController::class, 'updateGroupChat']);
    
    


    // Route::get('/task', [TaskController::class, 'loadtasks'])
    // ->middleware(['auth', 'verified'])
    // ->name('task');
    
    // Route::get('/task/create', [TaskController::class, 'create'])
    // ->middleware(['auth', 'verified'])
    // ->name('task.create');

    // Route::get('/task/create', [TaskController::class, 'store'])
    // ->middleware(['auth', 'verified'])
    // ->name('task.store');

    Route::get('/tasks', [TaskController::class, 'loadtasks'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.index'); // Change to 'tasks.index' // This route is named 'task'

Route::get('/task/create', [TaskController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('task.create');

Route::post('/task', [TaskController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('task.store');

    Route::get('/task/{task}', [TaskController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.edit');

    Route::put('/task/{task}', [TaskController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.update');

    Route::delete('/task/{task}', [TaskController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('tasks.destroy');



    Route::post('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');


    Route::get('/taskshow', [TaskController::class, 'showComplete'])
    ->middleware(['auth', 'verified'])
    ->name('taskshow'); // Corrected this line

    Route::get('/admin/dashboard', [AdminController::class, 'loadDashboard'])->name('admin.dashboard');


    // Route to show the edit form (GET method)
Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('users.edit');

// Define the route for the update action
Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('users.update');

Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('users.destroy');
    

    

    Route::post('/submit-feedback', [RatingFeedbackController::class, 'submitFeedback'])->name('submit-feedback');
    Route::get('/admin/feedbacks', [RatingFeedbackController::class, 'showFeedback'])->name('admin.feedbacks');
    
    
    Route::get('/feedbackandrating', function () {
        return view('feedbackandrating');
    })->name('feedbackandrating');
    




    Route::get('/meetings', [MeetingController::class, 'loadMeeting'])
    ->middleware(['auth', 'verified'])
    ->name('meetings.meeting');

    Route::get('/create-meeting', [MeetingController::class, 'generateMeeting']);



    
    

