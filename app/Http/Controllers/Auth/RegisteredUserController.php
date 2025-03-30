<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $imageName = '';
    if ($request->image) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imageName = 'images/'.$imageName;
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'image' => $imageName
    ]);

    event(new Registered($user));

    Auth::login($user);

    // Update active session after login
    Cache::put('active_session_' . Auth::id(), true, now()->addMinutes(30)); // Active for 30 minutes

    $activeSessions = Cache::get('active_sessions', []);
    $activeSessions[Auth::id()] = true; // Add user ID to the active sessions array
    Cache::put('active_sessions', $activeSessions, now()->addMinutes(30)); // Update the global active sessions list

    return redirect(RouteServiceProvider::HOME);
}

}
