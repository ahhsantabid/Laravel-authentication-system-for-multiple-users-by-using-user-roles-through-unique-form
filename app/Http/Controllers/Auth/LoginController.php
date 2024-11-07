<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Update with your actual login view path
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Redirect based on role
            return $this->authenticated($request, Auth::user());
        }

        // Redirect back with an error message if login fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle the authenticated user redirection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, User $user)
    {
        // Redirect based on user role
        switch ($user->role->name) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'HQ_store':
                return redirect()->route('hq-store.dashboard');
            case 'factory_store':
                return redirect()->route('factory-store.dashboard');
            case 'trims':
                return redirect()->route('trims.dashboard');
            case 'purchage':
                return redirect()->route('purchage.dashboard');
            case 'accounts':
                return redirect()->route('accounts.dashboard');
            default:
                return redirect('/home'); // Fallback if role doesn't match
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/'); // Redirect to home page after logout
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
