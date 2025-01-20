<?php

// app/Http/Controllers/StudentDetailsController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class StudentDetailsController extends Controller
{
    public function getStudentDetails()
    {
        $user = Auth::user();
        $user->load('studentDetails'); // Load the studentDetails relationship
        return response()->json($user);
    }


    
}


