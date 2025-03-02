<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredUserController;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('admin.register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])
                ->name('admin.login');

    Route::post('login', [LoginController::class, 'store']);

   
});

// Route::prefix('admin')->middleware('auth:admin')->group(function () {
//     // admin.dashboard
    
//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');



   
//     Route::post('logout', [LoginController::class, 'destroy'])
//                 ->name('admin.logout');
// });

// Route::prefix('admin')->middleware('auth:admin')->group(function () {
//     // Admin dashboard
//     Route::get('/dashboard', [AdminController::class, 'loadDashboard'])
//         ->name('admin.dashboard');
    
//     // Other protected routes
//     // Example: Route::get('some-path', [SomeController::class, 'someMethod']);
    
//     Route::post('logout', [LoginController::class, 'destroy'])
//         ->name('admin.logout');
// });
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');


    
    // Other admin routes that require authentication
    // Example: Route::get('some-path', [SomeController::class, 'someMethod']);
    
    Route::post('logout', [LoginController::class, 'destroy'])
        ->name('admin.logout');
});


