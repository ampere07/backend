<?php

// In app/Http/Middleware/RedirectIfAuthenticated.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();
                return $this->redirectToRoleBasedRoute($user);
            }
        }

        return $next($request);
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
