<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->redirectToRoleBasedRoute($request->user(), true);
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return $this->redirectToRoleBasedRoute($request->user(), true);
    }

    /**
     * Redirect to the appropriate route based on user role.
     */
    protected function redirectToRoleBasedRoute($user, $verified = false)
    {
        $suffix = $verified ? '?verified=1' : '';

        switch ($user->role) {
            case 'admin':
                return redirect('http://localhost:5173/admin' . $suffix);
            case 'student':
                return redirect('http://localhost:5173/home' . $suffix);
            case 'officers':
                return redirect('http://localhost:5173/officers' . $suffix);
            case 'faculty':
                return redirect('http://localhost:5173/faculty' . $suffix);
            default:
                return redirect('http://localhost:5173' . $suffix);
        }
    }
}
