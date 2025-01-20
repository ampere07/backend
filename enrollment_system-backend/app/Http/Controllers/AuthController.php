<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\User; 
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    // Attempt to log in with the provided credentials
    if (Auth::attempt($credentials)) {
        $user = Auth::user(); 

        // Retrieve student_id if available
        $student_id = $user->student_id; // Assuming this column exists in the users table

        // Generate a token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        // Return a response with the user role, token, and student_id
        return response()->json([
            'message' => 'Login successful!',
            'role' => $user->role, 
            'token' => $token,
            'student_id' => $student_id // Include student_id in the response
        ], 200);
    }

    // Handle invalid credentials
    throw ValidationException::withMessages([
        'email' => ['Invalid credentials!'],
    ]);
}


    public function logout(Request $request)
    {
        $user = Auth::user(); 
    
        if ($user) {
            
            $user->tokens()->where('id', $request->user()->currentAccessToken()->id)->delete(); 
    
            return response()->json(['message' => 'Logout successful!'], 200);
        }
    
        return response()->json(['message' => 'User not authenticated.'], 401);
    }
    



}
