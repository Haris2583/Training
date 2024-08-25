<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
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
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Redirect based on the user's role
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'employer') {
            return redirect()->route('employer.dashboard');
        } elseif ($user->role === 'job_seeker') {
            return redirect()->route('job_seeker.dashboard');
        }
    
        // Default fallback
        return redirect()->intended(RouteServiceProvider::HOME);
    }
    

    /**
     * Determine the redirection route based on the user's role.
     */
    protected function redirectTo($role)
    {
        return match ($role) {
            'admin' => 'admin.dashboard',
            'jobseeker' => 'jobseeker.dashboard',
            'employer' => 'employer.dashboard',
            default => RouteServiceProvider::HOME,
        };
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
