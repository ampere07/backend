<?php

// In app/Http/Controllers/StudentCreationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentDetails;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StudentCreationController extends Controller
{
    public function createStudent(Request $request)
    {
        $validatedData = $request->validate([
            'studentNumber' => 'required|string|unique:student_details,student_number',
            'firstName' => 'required|string|max:255',
            'middleName' => 'nullable|string|max:255',
            'lastName' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|in:Male,Female,Other',
            'birthdate' => 'required|date',
            'contactNumber' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email',
            'course' => 'required|string|in:Bachelor of Science in Computer Science,Bachelor of Science in Information Technology',
            'yearLevel' => 'required|string|in:First Year,Second Year,Third Year,Fourth Year',
            'semester' => 'required|string|in:First Semester,Second Semester,Summer',
            'guardianName' => 'required|string|max:255',
            'guardianPhone' => 'required|string|max:20',
            'studentStatus' => 'required|string|in:Regular,Irregular,transferee,freshmen',
            'enrollmentStatus' => 'required|string|in:Pending,Approved,Declined',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['firstName'] . ' ' . $validatedData['lastName'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'student', // Assuming role field exists and is used
        ]);

        // Create the student details
        $studentDetails = StudentDetails::create([
            'user_id' => $user->id,
            'student_number' => $validatedData['studentNumber'],
            'first_name' => $validatedData['firstName'],
            'middle_name' => $validatedData['middleName'],
            'last_name' => $validatedData['lastName'],
            'address' => $validatedData['address'],
            'sex' => $validatedData['gender'],
            'birthdate' => $validatedData['birthdate'],
            'phone' => $validatedData['contactNumber'],
            'email' => $validatedData['email'],
            'course' => $validatedData['course'],
            'year_level' => $validatedData['yearLevel'],
            'semester' => $validatedData['semester'],
            'guardian_name' => $validatedData['guardianName'],
            'guardian_phone' => $validatedData['guardianPhone'],
            'student_status' => $validatedData['studentStatus'],
            'enrollment_status' => $validatedData['enrollmentStatus'],
        ]);

        return response()->json(['message' => 'Student account created successfully!'], 201);
    }
}

