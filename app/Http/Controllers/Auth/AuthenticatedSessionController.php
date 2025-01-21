<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $this->redirectToRoleBasedRoute(Auth::user());
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

    /**
     * Redirect to the appropriate route based on user role.
     */
    protected function redirectToRoleBasedRoute($user)
    {
        switch ($user->role) {
            case 'admin':
                return redirect('http://localhost:5173/admin');
            case 'student':
                return redirect('http://localhost:5173/home');
            case 'officers':
                return redirect('http://localhost:5173/officers');
            case 'faculty':
                return redirect('http://localhost:5173/faculty');
            default:
                return redirect('http://localhost:5173');
        }
    }
}
