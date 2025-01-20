<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentChecklistController extends Controller
{
    public function show($userId)
    {
        try {
            // Debugging: Log the received userId
            Log::info('Received userId: ' . $userId);

            $student = Student::with(['checklist.grades.professor', 'checklist.curriculum'])
                               ->where('user_id', $userId)
                               ->first();

            if ($student) {
                return response()->json($student);
            } else {
                // Debugging: Log when no student is found
                Log::info('Student not found for userId: ' . $userId);
                return response()->json(['message' => 'Student not found'], 404);
            }
        } catch (\Exception $e) {
            // Debugging: Log the exception message
            Log::error('Error fetching student checklist: ' . $e->getMessage());
            return response()->json(['message' => 'Server error'], 500);
        }
    }
}




