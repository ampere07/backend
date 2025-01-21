<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // In app/Http/Controllers/Auth/LoginController.php

// In app/Http/Controllers/Auth/LoginController.php

// In app/Http/Controllers/Auth/LoginController.php

// In app/Http/Controllers/Auth/LoginController.php

protected function authenticated(Request $request, $user)
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
