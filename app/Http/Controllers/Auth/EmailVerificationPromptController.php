<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|Response
    {
        return $request->user()->hasVerifiedEmail()
                    ? $this->redirectToRoleBasedRoute($request->user())
                    : Inertia::render('Auth/VerifyEmail', ['status' => session('status')]);
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
