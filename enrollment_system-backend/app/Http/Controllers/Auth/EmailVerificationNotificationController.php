<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return $this->redirectToRoleBasedRoute($request->user());
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
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
