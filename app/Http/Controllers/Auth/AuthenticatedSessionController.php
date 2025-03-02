<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Store active session in cache
        // Store active session for each user in a global active sessions list
        Cache::put('active_session_' . Auth::id(), true, now()->addMinutes(30)); // Active for 30 minutes

        // Add the active session to the global active session list
        $activeSessions = Cache::get('active_sessions', []);
        $activeSessions[Auth::id()] = true; // Add user ID to the active sessions array
        Cache::put('active_sessions', $activeSessions, now()->addMinutes(30)); // Update the global active sessions list


        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Remove the user's active session from the global active sessions list
        $activeSessions = Cache::get('active_sessions', []);
        unset($activeSessions[Auth::id()]);
        Cache::put('active_sessions', $activeSessions, now()->addMinutes(30)); // Update the global active sessions list

        // Also remove the user's specific active session key
        Cache::forget('active_session_' . Auth::id());


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/welcome');
    }
}
