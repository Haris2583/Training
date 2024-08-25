<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'], // Ensure role is included in validation
        ]);
        $role = $request->input('role'); // Get the role from the request
    \Log::info('Role selected during registration: ' . $role); // Log the role for debugging

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $role, // Save the role
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect based on the user's role
        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'employer') {
            return redirect()->route('employer.dashboard');
        } elseif ($role === 'job_seeker') {
            return redirect()->route('job_seeker.dashboard');
        }

        // Redirect to the root route if no role match
        return redirect('/');
    }
}
